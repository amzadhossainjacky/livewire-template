<?php

namespace App\Livewire\Backend\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class LogoutPage extends Component
{
    public function mount()
    {
        ## Logout currently login user
        Auth::logout();


        ## Invalidate the user's session
        request()->session()->invalidate();

        ## Regenerate their CSRF token
        request()->session()->regenerateToken();

        return redirect()->to('login');
    }
}
