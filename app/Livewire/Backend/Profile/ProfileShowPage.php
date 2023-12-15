<?php

namespace App\Livewire\Backend\Profile;

use Illuminate\Http\Request;
use App\Services\UserService;
use Livewire\Attributes\Title;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Validator;
use App\Livewire\Backend\LivewireBackendComponent;

class ProfileShowPage extends LivewireBackendComponent
{
    ## Breadcrumb properties
    public string $page_title = 'profile';
    public array $breadcrumb_links = [];

    ## Input Properties
    public array $state;

    ## Set -1 if validation error check when changes the route encryption id
    public int $action_id = -1;

    ## Service properties
    private UserService $user_service;

    ## Others properties
    public array $card_addon_buttons;
    public string $segment = '';

    /**
     * Create a new component instance.
     * @return void
     */
    public function mount(Request $request): void
    {      
        $this->segment = $request->segment(1);
        $this->get_breadcrumb_links();
        $this->get_state_default();
    }

    /**
     * boot method to set initial values
     *
     * @return void
     */
    public function boot(): void
    {
        $this->user_service = new UserService();
    }


    /**
     * Set and get breadcrumb links
     *
     * @return void
     */
    private function get_breadcrumb_links(): void
    {
        $this->breadcrumb_links = [
            ['link' => route("{$this->segment}.profile.show"), 'name' => $this->page_title],
            ['link' => false, 'name' => 'show']
        ];
    }

    /**
     * get_state_default method return default values of state property
     *
     * @return void
     */
    public function get_state_default(): void
    {
        $user = $this->user_service->edit($this->auth_id);
        $this->state =  [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'code' => $user->code,
            'mobile' => $user->mobile,
            'password' => '',
            'gender' => $user->gender,
            'role' => $user->roles->first()->id,
            'is_active' => $user->is_active,
        ];
    }

    /**
     * get_validation_error_message method sets and display validation error messages
     * @return array<string, mixed>
     */
    private function get_validation_error_message(): array
    {
        return [
            'password.required' => __('user password required'),
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
            'password' => ['required', 'min:8', 'max:100'],
        ];

        ## Validate rules
        Validator::make(
            $this->state,
            $rules,
            $this->get_validation_error_message()
        )->validate();
    }

    /**
     * update method to store data
     *
     * @return User
     */
    public function profile_password_update()
    {
        ## Validate state values
        $this->call_for_validation();
        try {
            $this->user_service->profile_password_update($this->state);
            $this->get_state_default();

            ## Dispatch events
           $this->dispatch('toast_alert', message: 'Action successful', type: 'success');

        } catch (\Throwable $th) {
            $this->dispatch('toast_alert', message: $th->getMessage(), type: 'error');
        }
    }

    /**
     * clear method to clear state properties
     *
     * @return void
     */
    public function clear()
    {
        ##reset state default value
        $this->get_state_default();
    }

    /**
     * Get the view / contents that represent the component.
     * @return \Illuminate\Contracts\View\View
     */
    #[Title('Show Profile')]
    public function render()
    {
        return view('livewire.backend.profile.profile-show-page');
    }
}
