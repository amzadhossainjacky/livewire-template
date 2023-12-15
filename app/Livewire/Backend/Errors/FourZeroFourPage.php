<?php

namespace App\Livewire\Backend\Errors;

use Livewire\Component;
use Livewire\Attributes\Title;

/**
 * FourZeroFourPage livewire component
 * @author Sakil Jomadder <sakil.diu.cse@gmail.com>
 */

class FourZeroFourPage extends Component
{
    /**
     * Get the view / contents that represent the component.
     * @return \Illuminate\Contracts\View\View
     */
    #[Title('404 - Page Not Found')]
    public function render()
    {
        return view('livewire.backend.errors.four-zero-four-page');
    }
}
