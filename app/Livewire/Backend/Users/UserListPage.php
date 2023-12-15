<?php

namespace App\Livewire\Backend\Users;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\UserService;
use Livewire\Attributes\Title;
use App\Events\NotificationEvent;
use Illuminate\Support\Facades\Gate;
use App\Livewire\Backend\LivewireBackendComponent;

/**
 * UserListPage livewire component
 * @author Sakil Jomadder <sakil.diu.cse@gmail.com>
 */

class UserListPage extends LivewireBackendComponent
{
    ## Page properties
    public string $page_title = 'users';
    public array $breadcrumb_links = [];
    public array $card_addon_buttons;
    public string $segment = '';

    ## Filter and search properties
    public string $search = '';
    public array $filter = [];


    ## Service properties
    private UserService $user_service;


    /**
     * Create a new component instance.
     * @return void
     */
    public function mount(Request $request): void
    {
        $this->segment = request()->segment(1);
        $this->initial();
    }

    /**
     * boot method to set initial values
     *
     * @return void
     */
    public function boot(): void
    {
        // $this->middleware('permission:user-list', ['only' => ['render']]);
        $this->user_service = new UserService();
    }

    /**
     * Set component initial values
     *
     * @return void
     */
    public function initial(): void
    {
        $this->get_card_addon_buttons();
        $this->get_breadcrumb_links();
        $this->filter_default_values();
    }

    /**
     * Set and get card addons buttons
     *
     * @return void
     */
    private function get_card_addon_buttons(): void
    {

        $this->card_addon_buttons = [
            ['link' => route("{$this->segment}.users.create"), 'name' => _static_strings('add new'), 'visible' => true, 'icon' => _icons('add'), 'permission' => 'user-create']
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
            ['link' => route("{$this->segment}.users"), 'name' => $this->page_title],
            ['link' => false, 'name' => 'list'],
        ];
    }


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
     * delete method to store data
     * @param int $id
     * @return void
     */
    public function delete(int $id)
    {
        try {

            $this->user_service->delete($id);

            ## Dispatch events
            $this->dispatch('toast_alert', message: 'Action successful', type: 'success');
            NotificationEvent::dispatch();
            return redirect()->route("{$this->segment}.users");
        } catch (\Throwable $th) {
            $this->dispatch('toast_alert', message: $th->getMessage(), type: 'error');
        }
    }

    /**
     * Get the view / contents that represent the component.
     * @return \Illuminate\Contracts\View\View
     */
    #[Title('User List')]
    public function render()
    {

        // if (Gate::allows('list', User::class)) {
        $data['models'] = User::search($this->search)
            ->select(['id', 'name', 'mobile', 'email', 'is_active'])
            ->orderBy($this->filter['order_by_field'], $this->filter['order_by_type'])
            ->paginate($this->filter['per_page']);
        return view('livewire.backend.users.user-list-page', $data);
        // }
    }
}
