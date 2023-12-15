<?php

namespace App\Livewire\Backend\Partials;

use Livewire\Component;

/**
 * SaveBtnComponent livewire component
 * @author Sakil Jomadder <sakil.diu.cse@gmail.com>
 */

class SaveBtnComponent extends Component
{
    public string $action_name;

    /**
     * Called when a component is created
     * @return  void
     */
    public function mount(string $action_name = 'save'): void
    {
        $this->action_name = $action_name;
    }

    /**
     * Get the view / contents that represent the component.
     * @return mixed \Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('livewire.backend.partials.save-btn-component');
    }
}
