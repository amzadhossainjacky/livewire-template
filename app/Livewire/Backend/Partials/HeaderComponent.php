<?php

namespace App\Livewire\Backend\Partials;

use Livewire\Component;
use Illuminate\Contracts\View\View;

/**
 * HeaderComponent livewire component
 * @author Sakil Jomadder <sakil.diu.cse@gmail.com>
 */

class HeaderComponent extends Component
{

    /**
     * Get the view / contents that represent the component.
     * @return \Illuminate\Contracts\View\View
     */

    public function render(): View
    {
        return view('livewire.backend.partials.header-component');
    }
}
