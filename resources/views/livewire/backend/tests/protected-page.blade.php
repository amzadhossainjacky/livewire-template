<main class="flex-grow">
    <x-backend.partials.breadcrumb-component :pageTitle="$page_title" :breadcrumbLinks="$breadcrumb_links">
    </x-backend.partials.breadcrumb-component>

    <x-backend.addons.card-component cardTitle="list" :cardAddonButtons="$card_addon_buttons">
        <button wire:click.prevent="delete_user_except_admin" title="{{ __('delete user') }}" class="btn_delete">
            <i class="action_btn {{ _icons('delete') }}"></i>
            {{ __('delete user') }}
        </button>

        <button wire:click.prevent="delete_all_contacts" title="{{ __('delete contacts') }}" class="btn_delete">
            <i class="action_btn {{ _icons('delete') }}"></i>
            {{ __('delete contacts') }}
        </button>
    </x-backend.addons.card-component>

</main>
