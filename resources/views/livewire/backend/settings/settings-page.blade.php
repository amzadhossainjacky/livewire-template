<main class="flex-grow">
    <x-backend.partials.breadcrumb-component :pageTitle="$page_title" :breadcrumbLinks="$breadcrumb_links">
    </x-backend.partials.breadcrumb-component>
    {{-- @json($system_mode)
    @json($settings_list) --}}
    <x-backend.addons.card-component showCardHeader="0">

        <x-backend.layout.settings-page-layout :title="$page_sub_title">

        </x-backend.layout.settings-page-layout>
    </x-backend.addons.card-component>

</main>
