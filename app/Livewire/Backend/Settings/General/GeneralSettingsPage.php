<?php

namespace App\Livewire\Backend\Settings\General;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use App\Services\SettingsService;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;

/**
 * GeneralSettingsPage livewire full page component
 * @author Sakil Jomadder <sakil.diu.cse@gmail.com>
 */
class GeneralSettingsPage extends Component
{
    ## Page properties
    public string $page_title = 'settings';
    public string $page_sub_title = 'general settings';
    public array $breadcrumb_links = [];
    public array $card_addon_buttons;
    public string $segment = '';

    ## State Properties
    public int $system_mode;
    public string $system_mode_updated_at;

    ## Collections
    public Collection $settings_list;

    ## Service properties
    private SettingsService $settings_service;

    /**
     * boot method to set initial values
     *
     * @return void
     */
    public function boot(): void
    {
        $this->settings_service = new SettingsService();
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
    private function initial(): void
    {
        $this->get_card_addon_buttons();
        $this->get_breadcrumb_links();
        $this->get_all_settings();
        $this->get_state_default();
    }

    /**
     * get_all_settings method returns collection settings 
     *
     * @return void
     */
    public function get_all_settings(): void
    {
        $this->settings_list = $this->settings_service->get_all();
    }

    /**
     * Set and get breadcrumb links
     *
     * @return void
     */
    private function get_breadcrumb_links(): void
    {
        $this->breadcrumb_links = [
            ['link' => route("{$this->segment}.settings"), 'name' => $this->page_title],
            ['name' => $this->page_sub_title],
        ];
    }


    /**
     * Set and get card addons buttons
     *
     * @return void
     */
    private function get_card_addon_buttons(): void
    {
        $this->card_addon_buttons = [
            ['link' => route('admin.dashboard'), 'name' => __('back'), 'visible' => true, 'icon' => _icons('arrow_left')]
        ];
    }

    /**
     * get_state_default method return default values of state property
     *
     * @return void
     */
    private function get_state_default(): void
    {
        $this->get_system_mode();
    }

    /**
     * get_system_mode method get system mode values from settings
     *
     * @return void
     */
    private function get_system_mode(): void
    {
        $system_mode = $this->settings_list->filter(function ($item) {
            return $item->type === 'system_mode';
        });
        if ($system_mode->count()) {
            $this->system_mode =  $system_mode[0]->value;
            $this->system_mode_updated_at =  _date_format($system_mode[0]->updated_at, 'd M, Y');
        }
    }

    /**
     * are_you_sure open a confirmation prompt
     *
     * @return void
     */
    public function are_you_sure(): void
    {
        $this->dispatch('are_you_sure_js_event', ['alert_text' => _static_strings('you_can_not_revert'), 'alert_title' => _static_strings('are_you_sure'), 'callback_event' => 'save_system_mode']);
    }

    /**
     * save_system_mode method save system mode 
     *
     * @return void
     */
    #[On('save_system_mode')]
    public function save_system_mode(): void
    {
        try {
            ## Update or create
            $this->settings_service->update_or_create(['type' => 'system_mode', 'value' => $this->system_mode]);

            ## Reset
            $this->get_all_settings();
            $this->get_system_mode();
            ## Dispatch toast alert
            $this->dispatch('toast_alert', message: __(_static_strings('action_successful')), type: 'success');
        } catch (\Throwable $th) {
            $this->dispatch('toast_alert', message: $th->getMessage(), type: 'error');
        }
    }

    /**
     * Render view
     *
     * @return \Illuminate\Contracts\View\View
     */
    #[Title('General Settings')]
    public function render(): View
    {
        return view('livewire.backend.settings.general.general-settings-page');
    }
}
