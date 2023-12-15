<?php

namespace App\View\Components\Backend\Partials;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * BreadcrumbComponent component
 * @author Sakil Jomadder <sakil.diu.cse@gmail.com>
 */

class BreadcrumbComponent extends Component
{
    public string $pageTitle;
    public array $breadcrumbLinks;
    // public string $dashboard_route;

    /**
     * Create a new component instance.
     */
    public function __construct($pageTitle = '', array $breadcrumbLinks = [])
    {
        // $this->dashboard_route = route(request()->segment(1) . '.dashboard');
        $this->pageTitle = $pageTitle ? __($pageTitle) : null;
        $this->breadcrumbLinks = $breadcrumbLinks;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.backend.partials.breadcrumb-component');
    }
}
