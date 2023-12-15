<?php

namespace App\Livewire\Backend\Users;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\UserService;
use Livewire\Attributes\Title;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Rules\MobileNumberValidationRule;
use Illuminate\Support\Facades\Validator;
use App\Livewire\Backend\LivewireBackendComponent;

/**
 * UserCreatePage livewire component
 * @author Sakil Jomadder <sakil.diu.cse@gmail.com>
 */

class UserCreatePage extends LivewireBackendComponent
{
    ## Breadcrumb properties
    public string $page_title = 'users';
    public array $breadcrumb_links = [];

    ## Input Properties
    public array $state;
    public array $roles;

    ## Service properties
    private UserService $user_service;

    ## Others properties
    public array $card_addon_buttons;
    public string $segment = '';

    /**
     * Create a new component instance.
     * @return void
     */

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
        $this->get_state_default_values();
        $this->roles = $this->user_service->get_all_roles();
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
            ['link' => false, 'name' => 'create'],
        ];
    }

    /**
     * get_state_default method return default values of state property
     *
     * @return void
     */
    private function get_state_default_values(): void
    {
        $this->state = [
            'name' => '',
            'email' => '',
            'code' => '',
            'mobile' => '',
            'password' => '',
            'gender' => 1,
            'role' => '',
            'is_active' => true,
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
            'mobile.min' => __('user phone') . ' ' . __('min length in characters', ['min' => ':min']),
            'mobile.max' => __('user phone') . ' ' . __('max length in characters', ['max' => ':max']),
            'mobile.unique' => __('user phone') . ' ' . __('already exist'),
            'mobile.required' => __('user phone required'),
            'password.required' => __('user password required'),
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
            'email' => ['required', 'email', 'min:5', 'max:50', 'unique:users,email'],
            'mobile' => ['required', new MobileNumberValidationRule, 'unique:users,mobile'],
            'password' => ['required', 'min:8', 'max:100'],
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
     * create method to store data
     *
     * @return void
     */
    public function create()
    {

        # Validate state values
        $this->call_for_validation();

        try {
            $this->user_service->create($this->state);

            ##reset state default value
            $this->get_state_default_values();

            ## Dispatch events
            $this->dispatch('toast_alert', message: 'Action successful', type: 'success');
            // NotificationEvent::dispatch();
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
        $this->get_state_default_values();
    }

    /**
     * Get the view / contents that represent the component.
     * @return \Illuminate\Contracts\View\View
     */
    #[Title('Create New User')]
    public function render(): View
    {
        return view('livewire.backend.users.user-create-page');
    }
}
