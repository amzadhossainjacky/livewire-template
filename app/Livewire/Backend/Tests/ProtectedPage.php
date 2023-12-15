<?php

namespace App\Livewire\Backend\Tests;

use Livewire\Component;
use App\Services\LeadService;
use App\Services\UserService;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\DB;

/**
 * ProtectedPage livewire component
 * @author Sakil Jomadder <sakil.diu.cse@gmail.com>
 */
class ProtectedPage extends Component
{
    ## Page properties
    public string $page_title = 'clear temp date';
    public array $breadcrumb_links = [];
    public array $card_addon_buttons;
    public string $segment = '';

    ## Service properties
    private UserService $user_service;
    private LeadService $lead_service;

    /**
     * boot method to set initial values
     *
     * @return void
     */
    public function boot(): void
    {
        $this->user_service = new UserService();
        $this->lead_service = new LeadService();
    }

    /**
     * Create a new component instance.
     * @return void
     */
    public function mount(): void
    {
        $this->segment = request()->segment(1);
        $this->initial();
    }


    /**
     * Set component initial values
     *
     * @return void
     */
    public function initial(): void
    {
        $this->get_breadcrumb_links();
    }


    /**
     * Set and get breadcrumb links
     *
     * @return void
     */
    private function get_breadcrumb_links(): void
    {
        $this->breadcrumb_links = [
            ['link' =>  route($this->segment . '.protected_page'), 'name' => $this->page_title],
            ['link' => false, 'name' => 'list'],
        ];
    }

    /**
     * delete_user_except_admin method delete all temp users except admin
     *
     * @return void
     */
    public function delete_user_except_admin(): void
    {
        $this->user_service->delete_user_except_admin();
    }

    /**
     * delete_user_except_admin method delete all temp users except admin
     *
     * @return void
     */
    public function delete_all_contacts(): void
    {
        DB::statement("SET foreign_key_checks=0");
        DB::table('lead_associates')->truncate();
        DB::table('lead_call_logs')->truncate();
        DB::table('lead_descendants')->truncate();
        DB::table('lead_dial_logs')->truncate();
        DB::table('lead_follow_ups')->truncate();
        DB::table('lead_queries')->truncate();
        DB::table('lead_sms')->truncate();
        DB::table('lead_emails')->truncate();
        DB::table('leads')->truncate();
        DB::statement("SET foreign_key_checks=1");
    }


    /**
     * Get the view / contents that represent the component.
     * @return \Illuminate\Contracts\View\View
     */
    #[Title('Clear Temp Data')]
    public function render()
    {
        return view('livewire.backend.tests.protected-page');
    }
}
