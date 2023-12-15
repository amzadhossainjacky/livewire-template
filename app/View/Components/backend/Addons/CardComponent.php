<?php

namespace App\View\Components\Backend\Addons;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * CardComponent component
 * @author Sakil Jomadder <sakil.diu.cse@gmail.com>
 */

class CardComponent extends Component
{
    public string $cardTitle;
    public array $cardAddonButtons;
    public int $showCardHeader = 1;

    /**
     * Create a new component instance.
     */
    public function __construct(string $cardTitle = 'default', array $cardAddonButtons = [], int $showCardHeader = 1)
    {
        $this->cardTitle = $cardTitle;
        $this->cardAddonButtons = $cardAddonButtons;
        $this->showCardHeader = $showCardHeader;
    }

    /**
     * Get the view / contents that represent the component.
     * @return mixed \Illuminate\Contracts\View\View
     */
    public function render(): View
    {
        return view('components.backend.addons.card-component');
    }
}
