<div class="card">

    <livewire:backend.dashboard-widgets.addons.filter-date wire:model.live="selected_date_string"
        title="conversion cc report" />

    <x-backend.addons.graph-container-component>

        <livewire:backend.dashboard-widgets.conversion-report-cc-graph-component :$dates
            wire:key="{{ now() }}" />

    </x-backend.addons.graph-container-component>


</div>
