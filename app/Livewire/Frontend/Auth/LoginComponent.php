<?php

namespace App\Livewire\Frontend\Auth;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use App\Services\SettingsService;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Routing\Exception\RouteNotFoundException;

/**
 * AuthController
 * @author Md. Amzad Hossain Jacky <amzadhossainjacky@gmail.com>
 */
class LoginComponent extends Component
{
    ## State properties
    public string $email;
    public string $password;
    public bool $remember_me;
    public bool $is_maintenance_mode;

    ## Service properties
    private SettingsService $settings_service;

    /**
     * Validation rules
     * @var array
     */
    protected $rules = [
        'email'             => ['required', 'email'],
        'password'          => ['required', 'min:8'],
    ];

    /**
     * Customize the validation messages
     * @var array
     */
    protected $messages = [
        'email.required'    => 'Email can not be empty',
        'email.email'       => 'Email format is invalid',
        'password.required' => 'Password can not be empty',
        'password.min'      => 'Password minimum length is 8',
    ];

    /**
     * boot method to set initial values
     *
     * @return void
     */
    public function boot(): void
    {
        $this->settings_service = new SettingsService();
    }

    /**
     * To initialize value just for once
     * @return void
     */

    public function mount()
    {
        $this->email = 'admin@gmail.com';
        $this->password = '12345678';
        $this->remember_me = false;
        $this->check_maintenance_mode();
    }

    /**
     * To validate an input field after every update
     * @return void
     */

    public function updated($propertyName): void
    {
        $this->validateOnly($propertyName);
    }

    /**
     * Login process
     */

    public function login_process()
    {

        ## Validate rules
        $this->validate();

        try {
            ## Attempt to login
            if (Auth::attemptWhen(['email' => $this->email, 'password' => $this->password], function (User $user) {
                return $user->is_active == 1;
            }, $this->remember_me)) {
                $user = User::with(['roles'])->find(auth()->id());
                $this->check_maintenance_mode();

                ## Super admin with id 1 only can login on 'maintenance mode'
                if ($this->is_maintenance_mode && $user->id !== 1) {

                    $this->dispatch('toast_alert', message: __(_static_strings('system_is_in_maintenance_mode')), type: 'error');
                    return;
                }

                $session_inputs = [
                    'user_full_name' => $user->name,
                    'user_email' => $user->email,
                    'role' => $user->first_role,
                    'route_segment' => $user->route_segment,
                ];

                session($session_inputs);
                request()->session()->regenerate();
                return redirect()->route($session_inputs['route_segment'] . '.dashboard');
            } else {
                $this->dispatch('invalid_credentials', message: 'Invalid email or password');
            }
        } catch (\Throwable $th) {

            if ($th instanceof RouteNotFoundException) {

                ## Invalidate the user's session
                request()->session()->invalidate();

                ## Regenerate their CSRF token
                request()->session()->regenerateToken();

                return redirect()->route('login');
            }
            $this->dispatch('invalid_credentials', message: $th->getMessage());
        }
    }

    /**
     * check_maintenance_mode method check and set maintenance mode status
     *
     * @return void
     */
    private function check_maintenance_mode(): void
    {
        $this->is_maintenance_mode = $this->settings_service->check_is_maintenance_mode('system_mode');
    }


    /**
     * Get the view / contents that represent the component.
     * @return \Illuminate\Contracts\View\View
     */
    #[Layout('components.backend.layout.admin-login-layout')]
    #[Title('Login')]
    public function render()
    {
        return view('livewire.frontend.auth.login-component');
    }
}
