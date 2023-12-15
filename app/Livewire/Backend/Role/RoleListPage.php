<?php

namespace App\Livewire\Backend\Role;

use App\Models\Role;
use App\Services\RoleService;
use Livewire\Attributes\Title;
use Illuminate\Contracts\View\View;
use App\Livewire\Backend\LivewireBackendComponent;

/**
 * RoleCreatePage
 * @author Md. Amzad Hossain Jacky <amzadhossainajacky@gmail.com>
 */

class RoleListPage extends LivewireBackendComponent
{
    ## Page properties
    public string $page_title = 'role';
    public array $breadcrumb_links = [];
    public string $segment = '';

    ## Others properties
    public array $card_addon_buttons;

    ## Filter and search properties
    public string $search = '';
    public array $filter = [];

    ## Service properties
    private RoleService $role_service;

    /**
     * Create a new component instance.
     * @return void
     */
    public function mount(): void
    {
        $this->initial();
    }

    /**
     * boot method to set initial values
     *
     * @return void
     */
    public function boot(): void
    {
        $this->role_service = new RoleService();
    }

    /**
     * Set component initial values
     *
     * @return void
     */
    public function initial(): void
    {

        $this->segment = request()->segment(1);
        $this->get_breadcrumb_links();
        // $this->get_card_addon_buttons();
        $this->filter_default_values();
    }

    /**
     * Set and get card addons buttons
     *
     * @return void
     */
    // private function get_card_addon_buttons(): void
    // {
    //     $this->card_addon_buttons = [
    //         ['link' => route("{$this->segment}.roles.create"), 'name' => _static_strings('add_new'), 'visible' => true, 'icon' => _icons('add'), 'permission' => 'role-create'],
    //     ];
    // }

    /**
     * filter_default_values method to set default values for filter property
     *
     * @return void
     */
    protected function filter_default_values(): void
    {
        $this->filter =  [
            'search_placeholder_text' => $this->get_search_placeholder_text(),
            'per_page' => $this->get_per_page(),
            'per_page_list' => $this->get_per_page_list(),
            'order_by_field' => $this->get_order_by(),
            'order_by_type' => $this->get_order_by_type(),
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
            ['link' => false, 'name' => 'list'],
        ];
    }

    /**
     * create method to store data
     * @param int $id
     * @return void
     */
    public function delete(int $id)
    {
        try {

            $this->role_service->delete($id);

            ## Dispatch events
            $this->dispatch('toast_alert', message: 'Action successful', type: 'success');
            return redirect()->route("{$this->segment}.roles");
        } catch (\Throwable $th) {
            $this->dispatch('toast_alert', message: $th->getMessage(), type: 'error');
        }
    }

    /**
     * Get the view / contents that represent the component.
     * @return \Illuminate\Contracts\View\View
     */
    #[Title('Role List')]
    public function render(): View
    {
        $filter_options = [
            'paginate' => $this->filter['per_page'],
            'select' => '*',
            'order_by_field' => 'name',
            'order_by_type' => 'asc',
        ];

        $data['models'] = $this->role_service->get_filtered($filter_options);

        return view('livewire.backend.role.role-list-page', $data);
    }
}
