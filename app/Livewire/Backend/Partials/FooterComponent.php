<?php

namespace App\Livewire\Backend\Partials;

use Livewire\Component;

use Livewire\Attributes\On;
use Illuminate\Contracts\View\View;

/**
 * FooterComponent livewire component
 * @author Sakil Jomadder <sakil.diu.cse@gmail.com>
 */

class FooterComponent extends Component
{
    public string $copyright_year;

    /**
     * Set initial data
     *
     * @return  void
     */
    public function mount(): void
    {
        $this->copyright_year = date('Y');
    }



    /**
     * Get the view / contents that represent the component.
     * @return \Illuminate\Contracts\View\View
     */
    public function render(): View
    {
        return view('livewire.backend.partials.footer-component');
    }

}
