<?php

namespace App\Livewire\Backend\Dashboard;

use Livewire\Component;
use Livewire\Attributes\Title;
use Illuminate\Contracts\View\View;

/**
 * Dashboard livewire component
 * @author Md. Amzad Hossain Jacky <amzadhossainjacky@gmail.com>
 */

class DashboardPage extends Component
{

    /**
     * Render view
     *
     * @return \Illuminate\Contracts\View\View
     */
    #[Title('Dashboard')]
    public function render(): View
    {
        return view('livewire.backend.dashboard.dashboard-page');
    }
}
