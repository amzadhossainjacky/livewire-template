<?php

namespace App\Livewire\Backend\Role;

use App\Models\Role;
use App\Services\PermissionService;
use App\Services\RoleService;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Validator;
use Livewire\Attributes\Title;
use Livewire\Component;

/**
 * RoleCreatePage
 * @author Md. Amzad Hossain Jacky <amzadhossainajacky@gmail.com>
 */

class RoleCreatePage extends Component
{

    ## Page properties
    public string $page_title = 'role';
    public array $breadcrumb_links = [];
    public string $segment = '';
    public array $card_addon_buttons;

    ## Input Properties
    public array $state;
    public array $permissions;
    public string $is_active_text = 'active';

    ## Role Permission List Properties
    public array $role_permissions = [];
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
     * @return void
     */
    public function mount(): void
    {
        $this->segment = request()->segment(1);
        $this->initial();
    }

    /**
     * Set component initial values
     *
     * @return void
     */
    public function initial(): void
    {
        $this->get_card_addon_buttons();
        $this->get_state_default();
        $this->get_breadcrumb_links();
        $this->permissions = $this->permission_service->get_dynamic_permissions_list();
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
            ['link' => false, 'name' => 'create'],
        ];
    }

    /**
     * get_state_default method return default values of state property
     *
     * @return void
     */
    public function get_state_default(): void
    {
        $this->state = [
            'name' => '',
            'guard_name' => 'web',
            'is_active' => true,
            'route_segment' => '',
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
            'name' => ['required', 'min:2', 'max:50', 'unique:roles'],
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
     * @return void
     */
    public function create()
    {
        # Validate state values
        $this->call_for_validation();

        try {

            $this->role_service->create([...$this->state, 'permissions' => $this->permissions]);
             ## reset state default value
            $this->get_state_default();
            ## Dispatch events
            $this->dispatch('toast_alert', message: 'Action successful', type: 'success');

        } catch (\Throwable $th) {
            $this->dispatch('toast_alert', message: $th->getMessage(), type: 'error');
        }
    }

    /**
     * parent_checked method check parent itself and its all children
     *
     * @param [string] $module
     * @return void
     */
    public function parent_checked(string $module): void
    {
        if (array_key_exists($module, $this->permissions)) {
            $new = [];
            $this->permissions = array_map(function ($item, $index) use ($module, &$new) {
                if ($index == $module) {
                    $is_parent_checked = !$this->permissions[$index]['parent_checked'];
                    $this->permissions[$module]['parent_checked'] = $is_parent_checked;
                    foreach ($item['permissions'] as $key => $permission_item) {
                        $this->permissions[$module]['permissions'][$key]['checked'] = $is_parent_checked;
                    }
                }
                $new[$index] = $this->permissions[$index];
            }, $this->permissions, array_keys($this->permissions));
            $this->permissions = $new;
        }
    }

    /**
     * child_checked method check child itself
     *
     * @param [string] $parent_index
     * @param [string] $child_index
     * @return void
     */

    public function child_checked($parent_index, $child_index): void
    {

        $is_parent_checked = false;
        ## Reverse permission checked type
        $this->permissions[$parent_index]['permissions'][$child_index]['checked'] = !$this->permissions[$parent_index]['permissions'][$child_index]['checked'];
        ## Check parent module if all child permissions checked
        foreach ($this->permissions[$parent_index]['permissions'] as $permission_key => $permission_item) {
            if (!$permission_item['checked']) {
                $is_parent_checked = false;
                break;
            }
            $is_parent_checked = true;
        }
        $this->permissions[$parent_index]['parent_checked'] = $is_parent_checked;

    }

    /**
     * Get the view / contents that represent the component.
     * @return \Illuminate\Contracts\View\View
     */
    #[Title('Create Role With Permissions')]
    public function render(): View
    {
        return view('livewire.backend.role.role-create-page');
    }
}
