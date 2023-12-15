<?php

namespace App\View\Components\Backend\Layout;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * SettingsPageLayout layout component
 * @author Sakil Jomadder <sakil.diu.cse@gmail.com>
 */


class SettingsPageLayout extends Component
{
    public string $title;
    /**
     * Create a new component instance.
     */
    public function __construct(string $title = 'default')
    {
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.backend.layout.settings-page-layout');
    }
}
