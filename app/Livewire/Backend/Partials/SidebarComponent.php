<?php

namespace App\Livewire\Backend\Partials;

use Illuminate\Contracts\View\View;
use Livewire\Component;

/**
 * SidebarComponent livewire component
 * @author Sakil Jomadder <sakil.diu.cse@gmail.com>
 */

class SidebarComponent extends Component
{

    /**
     * Get the view / contents that represent the component.
     * @return \Illuminate\Contracts\View\View
     */
    public function render(): View
    {
        return view('livewire.backend.partials.sidebar-component');
    }
}
