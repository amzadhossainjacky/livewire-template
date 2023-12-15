<?php

namespace App\Livewire\Backend\Permissions;

use App\Models\Module;
use Livewire\Attributes\On;
use Illuminate\Http\Request;
use Livewire\Attributes\Title;
use App\Services\PermissionService;
use Illuminate\Contracts\View\View;
use App\Livewire\Backend\LivewireBackendComponent;

class PermissionListPage extends LivewireBackendComponent
{

    ## Page properties
    public string $page_title = 'permissions';
    public array $breadcrumb_links = [];
    public array $card_addon_buttons;
    public string $segment = '';

    ## Filter and search properties
    public string $search = '';
    public array $filter = [];

    ## Service properties
    private PermissionService $permission_service;

    ## State properties
    public array $permissions;
    public bool $is_all_checked = false;
    public int $count_system_permissions;

    /**
     * Create a new component instance.
     * @return void
     */
    public function mount(Request $request): void
    {
        $this->segment = $request->segment(1);
        $this->initial();
    }

    /**
     * boot method to set initial values
     *
     * @return void
     */
    public function boot(): void
    {
        $this->permission_service = new PermissionService();
    }

    /**
     * Set component initial values
     *
     * @return void
     */
    public function initial(): void
    {
        $this->get_breadcrumb_links();
        $this->permissions = $this->permission_service->get_permission_lists();
        $this->count_system_permissions = $this->permission_service->count_system_permissions();
    }

    /**
     * Set and get breadcrumb links
     *
     * @return void
     */
    private function get_breadcrumb_links(): void
    {
        $this->breadcrumb_links = [
            ['link' => route("{$this->segment}.permissions"), 'name' => $this->page_title],
            ['link' => false, 'name' => 'list'],
        ];
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
                    foreach ($item['list'] as $key => $permission_item) {
                        $this->permissions[$module]['list'][$key]['checked'] = $is_parent_checked;
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
        $this->permissions[$parent_index]['list'][$child_index]['checked'] = !$this->permissions[$parent_index]['list'][$child_index]['checked'];
    }

    /**
     * all_checked method check grandparent itself its all descendants
     * @return void
     */
    public function all_checked(): void
    {
        $is_all_checked = $this->is_all_checked;
        $new = [];
        $this->permissions = array_map(function ($item, $index) use ($is_all_checked, &$new) {

            $this->permissions[$index]['parent_checked'] = $is_all_checked;
            foreach ($item['list'] as $key => $permission_item) {
                $this->permissions[$index]['list'][$key]['checked'] = $is_all_checked;
            }

            $new[$index] = $this->permissions[$index];
        }, $this->permissions, array_keys($this->permissions));
        $this->permissions = $new;
    }

    /**
     * updatedIsAllChecked method trigger on every update of is_all_checked property updated
     * @return void
     */

    public function updatedIsAllChecked(): void
    {
        $this->all_checked();
    }

    /**
     * click_to_call_take_confirmation_dispatcher method take an action to take a confirmation as a dispatcher
     *
     * @return void
     */
    public function create_permission_confirmation_dispatcher(): void
    {
        $this->dispatch('are_you_sure_event', ['alert_title' => __('are you sure'), 'alert_text' => __('are you sure to generate permission'), 'dispatch_event' => 'create_permission']);
    }

    /**
     * permission_create method itself
     *
     * @return array
     */
    #[On('create_permission')]
    public function create()
    {
        try {
            $existing_db_module = Module::all()->count();

            if ($existing_db_module > 0) {
                $this->permission_service->update($this->permissions);
            } else {
                $this->permission_service->create($this->permissions);
            }

            ## Dispatch events
            $this->dispatch('toast_alert', message: _static_strings('action_successful'), type: 'success');
        } catch (\Throwable $th) {
            $this->dispatch('toast_alert', message: $th->getMessage(), type: 'error');
        }
    }

    /**
     * Get the view / contents that represent the component.
     * @return \Illuminate\Contracts\View\View
     */
    #[Title('Permission list')]
    public function render(): View
    {
        return view('livewire.backend.permissions.permission-list-page');
    }
}
