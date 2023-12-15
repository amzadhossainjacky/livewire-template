<?php

namespace App\Livewire\Backend\Errors;

use Livewire\Component;
use Livewire\Attributes\Title;

/**
 * FourZeroThreePage livewire component
 * @author Sakil Jomadder <sakil.diu.cse@gmail.com>
 */

class FourZeroThreePage extends Component
{
    /**
     * Get the view / contents that represent the component.
     * @return \Illuminate\Contracts\View\View
     */
    #[Title('403 - Unauthorized')]
    public function render()
    {
        return view('livewire.backend.errors.four-zero-three-page');
    }
}
