<?php

namespace App\Livewire\Backend;

use Livewire\Component;
use Livewire\WithPagination;

/**
 * LivewireBackendComponent  livewire component class
 * @author Sakil Jomadder <sakil.diu.cse@gmail.com>
 */
class LivewireBackendComponent extends Component
{
    use WithPagination;

    ## Other properties
    protected $auth_id;

    ## Filter properties
    private string $search_placeholder_text;
    private string $order_by;
    private string $order_by_type;
    private string $graph_container_height;


    public function __construct()
    {
        $this->auth_id = auth()->id();
        $this->search_placeholder_text = 'search here';
        $this->order_by = 'id';
        $this->order_by_type = 'desc';
        $this->graph_container_height = '365px';
    }

    /**
     * updatingSearch abstract method Resetting Pagination After Filtering Data
     *
     * @return void
     */
    // abstract public function updatingSearch(): void;


    /**
     * get_per_page() method to return number of items to display per page on a list page
     * @return int
     */
    public function get_per_page(): int
    {
        $list = array_values(array_filter($this->get_per_page_list(), function ($item) {
            return $item['default'];
        }));
        return $list[0]['number'];
    }

    /**
     * get_order_by() method to return number of items to display per page on a list page
     * @return string
     */
    public function get_order_by(): string
    {
        return $this->order_by;
    }


    /**
     * get_order_by_type() method to return number of items to display per page on a list page
     * @return string
     */
    public function get_order_by_type(): string
    {
        return $this->order_by_type;
    }

    /**
     * get_search_placeholder_text() method to return number of items to display per page on a list page
     * @return string
     */
    public function get_search_placeholder_text(): string
    {
        return $this->search_placeholder_text;
    }

    /**
     * get_per_page_list() method to return number of items to display per page on a list page
     * @return array
     */
    public function get_per_page_list(): array
    {
        return [
            ['number' => 5, 'label' => __('five'), 'default' => true],
            ['number' => 10, 'label' => __('ten'), 'default' => false],
            ['number' => 25, 'label' => __('twenty five'), 'default' => false],
            ['number' => 50, 'label' => __('fifty'), 'default' => false],
            ['number' => 100, 'label' => __('one hundred'), 'default' => false],
            ['number' => 200, 'label' => __('two hundred'), 'default' => false],
            ['number' => 500, 'label' => __('five hundred'), 'default' => false],
        ];
    }


    /**
     * get_graph_container_height method return the graph container height for all graphs by default
     * @return string
     */
    public function get_graph_container_height(): string
    {
        return $this->graph_container_height;
    }
}
