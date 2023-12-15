<?php

namespace App\View\Components\Backend\Addons;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * IsActiveStatusComponent component
 * @author Sakil Jomadder <sakil.diu.cse@gmail.com>
 */

class IsActiveStatusComponent extends Component
{
    public int $isActive = 0;
    public string $statusText = '';
    public string $classList = '';


    /**
     * Create a new component instance.
     */
    public function __construct($isActive)
    {
        $isActive = (int) $isActive;
        $this->isActive = $isActive;

        $this->statusText = $isActive ? 'active' : 'inactive';
        $this->classList = $isActive ? 'btn_status_active' : 'btn_status_inactive';
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.backend.addons.is-active-status-component');
    }
}
