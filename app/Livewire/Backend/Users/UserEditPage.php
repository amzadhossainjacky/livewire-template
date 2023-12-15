<?php

namespace App\Livewire\Backend\Users;

use Illuminate\Http\Request;
use App\Services\UserService;
use Livewire\Attributes\Title;
use App\Events\NotificationEvent;
use Illuminate\Contracts\View\View;
use App\Rules\MobileNumberValidationRule;
use Illuminate\Support\Facades\Validator;
use App\Livewire\Backend\LivewireBackendComponent;
use Illuminate\Contracts\Encryption\DecryptException;

class UserEditPage extends LivewireBackendComponent
{
    ## Breadcrumb properties
    public string $page_title = 'users';
    public array $breadcrumb_links = [];

    ## Input Properties
    public array $state;
    public array $roles;

    ## Set -1 if validation error check when changes the route encryption id
    public int $action_id = -1;

    ## Service properties
    private UserService $user_service;

    ## Others properties
    public array $card_addon_buttons;
    public string $segment = '';

    /**
     * Create a new component instance.
     * @return mixed
     */
    public function mount(Request $request, $id)
    {

        $this->segment = $request->segment(1);
        $this->get_card_addon_buttons();
        $this->get_breadcrumb_links();
        $this->roles = $this->user_service->get_all_roles();

        try {
            $this->action_id = decrypt($id);
            $this->get_state_default();
        } catch (DecryptException $e) {
            ## Handle the error, such as redirecting to an error page
            $dis = $this->dispatch('toast_alert', message: $e->getMessage(), type: 'error');
        }
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
     * Set and get card addons buttons
     *
     * @return void
     */
    private function get_card_addon_buttons(): void
    {
        $this->card_addon_buttons = [
            ['link' => route("{$this->segment}.users"), 'name' => _static_strings('back'), 'visible' => true, 'icon' => _icons('arrow_left')],
            ['link' => route("{$this->segment}.users.create"), 'name' => _static_strings('add new'), 'visible' => true, 'icon' => _icons('add'), 'permission' => 'user-create'],
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
        $user = $this->user_service->edit($this->action_id);
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
            'name.required' => __('user name required'),
            'name.min' => __('user name') . ' ' . __('min length in characters', ['min' => ':min']),
            'name.max' => __('user name') . ' ' . __('max length in characters', ['max' => ':max']),
            'email.required' => __('user email required'),
            'email.min' => __('user email') . ' ' . __('min length in characters', ['min' => ':min']),
            'email.max' => __('user email') . ' ' . __('max length in characters', ['max' => ':max']),
            'email.unique' => __('user email') . ' ' . __('already exist'),
            'password.required' => __('user password required'),
            'mobile.min' => __('user phone') . ' ' . __('min length in characters', ['min' => ':min']),
            'mobile.max' => __('user phone') . ' ' . __('max length in characters', ['max' => ':max']),
            'mobile.unique' => __('user phone') . ' ' . __('already exist'),
            'mobile.required' => __('user phone required'),
            'is_active.required' => __('user') . ' ' . __('active status must be 0 or 1'),
            'roles.required' => __('user role required'),
            'code.required' => __('user code required'),
            'role.required' => __('user role required'),
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
            'name' => ['required', 'min:5', 'max:100'],
            'code' => ['required'],
            'gender' => ['required'],
            'role' => ['required'],
            'email' => ['required', 'email', 'min:5', 'max:50', "unique:users,email,{$this->action_id}"],
            'mobile' => ['required',  new MobileNumberValidationRule, "unique:users,mobile,{$this->action_id}"],
            'password' => ['sometimes', 'min:8', 'max:100'],
            'is_active' => ['required:in([0,1])'],
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
    public function update()
    {
        ## Validate state values
        $this->call_for_validation();

        try {
            ## Update model
            if (empty($this->state['password'])) {
                unset($this->state['password']);
            }
            $this->user_service->update($this->state);
            $this->get_state_default();

            ## Dispatch events
            $this->dispatch('toast_alert', message: 'Action successful', type: 'success');
            NotificationEvent::dispatch();
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
    #[Title('Edit User')]
    public function render()
    {
        return view('livewire.backend.users.user-edit-page');
    }
}
