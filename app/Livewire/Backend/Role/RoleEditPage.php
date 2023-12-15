<?php

namespace App\Livewire\Backend\Role;

use Livewire\Component;
use App\Services\RoleService;
use Livewire\Attributes\Title;
use App\Services\PermissionService;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\Collection;

/**
 * RoleEditPage livewire component
 * @author Md. Amzad Hossain Jacky <amzadhossainajacky@gmail.com>
 */


class RoleEditPage extends Component
{

    ## Page properties
    public string $page_title = 'role';
    public array $breadcrumb_links = [];
    public string $segment = '';
    public array $card_addon_buttons;

    ## Input Properties
    public array $state;
    public string $is_active_text = 'active';

    ## Set -1 if validation error check when changes the route encryption id
    public int $action_id = -1;

    ## Collections    
    public mixed $db_permissions;
    public mixed $role_permissions;
    public bool $is_all_checked = false;

    ## Service properties
    private RoleService $role_service;
    private PermissionService $permission_service;


    /**
     * boot method to set initial values
     *
     * @return void
     */
    public function boot(): void
    {
        $this->role_service = new RoleService();
        $this->permission_service = new PermissionService();
    }


    /**
     * Create a new component instance.
     * @return mixed
     */
    public function mount($id)
    {
        try {
            $this->segment = request()->segment(1);
            $this->get_breadcrumb_links();
            $this->get_card_addon_buttons();
            $this->action_id = decrypt($id);
            $this->get_state_default();
            $this->role_permissions = $this->role_service->get_role_permissions($this->action_id);
            // $this->db_permissions = $this->permission_service->get_db_unchecked_permissions_list();
            $this->db_permissions = $this->permission_service->get_selected_permissions_list_by_role($this->role_permissions);
        } catch (DecryptException $e) {
            ## Handle the error, such as redirecting to an error page
            $this->dispatch('toast_alert', message: $e->getMessage(), type: 'error');
        }
    }


    /**
     * Set and get card addons buttons
     *
     * @return void
     */

    private function get_card_addon_buttons(): void
    {
        $this->card_addon_buttons = [
            ['link' => route("{$this->segment}.roles"), 'name' => _static_strings('back'), 'visible' => true, 'icon' => _icons('arrow_left')],
        ];
    }

    /**
     * Set and get breadcrumb links
     *
     * @return void
     */
    private function get_breadcrumb_links(): void
    {
        $this->breadcrumb_links = [
            ['link' => route("{$this->segment}.roles"), 'name' => $this->page_title],
            ['link' => false, 'name' => 'edit'],
        ];
    }

    /**
     * get_state_default method return default values of state property
     *
     * @return void
     */
    public function get_state_default(): void
    {
        $role = $this->role_service->edit($this->action_id);
        $this->is_active_text = $role->is_active ? 'active' : 'inactive';
        $this->state =  [
            'id' => $role->id,
            'name' => $role->name,
            'guard_name' => $role->guard_name,
            'is_active' => $role->is_active ? true : false,
            'route_segment' => $role->route_segment,
        ];
    }

    /**
     * get_validation_error_message method sets and display validation error messages
     * @return array<string, mixed>
     */

    private function get_validation_error_message(): array
    {
        return [
            'name.required' => __('role name required'),
            'name.unique' => __('role name already exist'),
            'guard_name.required' => __('role guard name required'),
            'is_active.required' => __('role active status required'),
            'route_segment.required' => __('route segment required'),
        ];
    }

    /**
     * call_for_validation method validate input fields
     * @return void
     */
    private function call_for_validation(): void
    {
        ## Validation rules
        $rules = [
            'name' => ['required', 'unique:roles,name,' . $this->action_id],
            'is_active' => ['required'],
            'guard_name' => ['required'],
            'route_segment' => ['required'],
        ];

        ## Validate rules
        Validator::make(
            $this->state,
            $rules,
            $this->get_validation_error_message()
        )->validate();
    }

    /**
     * create method to store data
     *
     * @return Role
     */
    public function update()
    {
        ## Validate state values
        $this->call_for_validation();

        try {
            // dd($this->state, $this->db_permissions);
            $filtered_permissions_for_update = $this->filter_permissions_for_update();
            $this->role_service->update([...$this->state, 'permissions' => $filtered_permissions_for_update]);

            ## Dispatch events
            $this->dispatch('toast_alert', message: 'Action successful', type: 'success');
        } catch (\Throwable $th) {
            $this->dispatch('toast_alert', message: $th->getMessage(), type: 'error');
        }
    }

    /**
     * parent_checked method check parent itself and its all children
     *
     * @param [int] $module_index
     * @return void
     * @author Sakil Jomadder <sakil.diu.cse@gmail.com>
     */
    public function parent_checked(int $module_index): void
    {
        if (array_key_exists($module_index, $this->db_permissions)) {

            if (array_key_exists($module_index, $this->db_permissions)) {
                $checked_module = $this->db_permissions[$module_index];
                foreach ($checked_module['permissions'] as $permission_index => $permission_item) {
                    $parent_checked_status = $checked_module['parent_checked'];
                    $checked_module['permissions'][$permission_index]['checked'] = $parent_checked_status;
                }
                $this->db_permissions[$module_index] = $checked_module;
            }
        }
    }

    /**
     * child_checked method check module total permission and count selected permission and finally return module selected or not
     *
     * @param [int] $module_index
     * @param [int] $permission_index
     * @return void
     * @author Sakil Jomadder <sakil.diu.cse@gmail.com>
     */
    public function child_checked(int $module_index, int $permission_index): void
    {
        if (array_key_exists($module_index, $this->db_permissions)) {
            $checked_module = $this->db_permissions[$module_index];
            $module_permission_collection = collect($checked_module['permissions']);
            $count_selected_permission_of_a_module = $module_permission_collection->reduce(function (?int $count_total_permissions = 0, $permission) {
                return ($count_total_permissions) + (int) $permission['checked'];
            });
            if ($module_permission_collection->count() == $count_selected_permission_of_a_module) {
                $checked_module['parent_checked'] = true;
            } else {
                $checked_module['parent_checked'] = false;
            }
            $this->db_permissions[$module_index] = $checked_module;
        }
    }


    /**
     * filter_permissions_for_update method returns filtered permission of a role to update
     *
     * @return array
     */
    public function filter_permissions_for_update(): array
    {
        $selected_permission_for_update = [];
        foreach ($this->db_permissions as $module_index => $module) {
            foreach ($module['permissions'] as $permission_index => $permission) {
                if ($permission['checked']) {
                    $selected_permission_for_update[] = $permission['id'];
                }
            }
        }
        return $selected_permission_for_update;
    }

    /**
     * Get the view / contents that represent the component.
     * @return \Illuminate\Contracts\View\View
     */
    #[Title('Role Edit')]
    public function render(): View
    {
        return view('livewire.backend.role.role-edit-page');
    }
}
