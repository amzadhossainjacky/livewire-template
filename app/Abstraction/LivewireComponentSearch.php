<?php

namespace App\Abstraction;

use App\Livewire\Backend\LivewireBackendComponent;

/**
 * LivewireComponentSearch abstraction class for livewire component search
 * @author Sakil Jomadder <sakil.diu.cse@gmail.com>
 */

abstract class LivewireComponentSearch extends LivewireBackendComponent
{
    /**
     * query parameter
     *
     * @var string $search_text
     */
    public $search_text = '';

    /**
     *  queryString method on the component to search for
     *
     * @return void
     */
    public  function queryString(): array
    {
        return [
            'search_text' => [
                'as' => 'search',
                'except' => '',
                'history' => true
            ],
        ];
    }

    /**
     * updatedSearchText method reset page on every search request
     * 
     * @return void
     */
    public function updatedSearchText(): void
    {
        $this->resetPage();
    }
}
