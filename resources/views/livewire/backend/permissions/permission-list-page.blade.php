<main class="flex-grow">
    <x-backend.partials.breadcrumb-component :pageTitle="$page_title" :breadcrumbLinks="$breadcrumb_links">
    </x-backend.partials.breadcrumb-component>
    <!-- <x-backend.animation.loading-indicator /> -->
    <div class="card">
        <div class="card-header">
            <div class="flex justify-between items-center">
                <h4 class="card-title">List</h4>
                <div class="flex items-center gap-2">
                    <button class="btn-code fc-collapse">
                        <i class="{{ _icons('permission') }} text-xl -rotate-90"></i>
                        <span class="ms-1 capitalize">
                            {{ __('permission exist') }} ({{ $count_system_permissions }})
                        </span>
                    </button>

                    <button wire:click.prevent="create_permission_confirmation_dispatcher"
                        wire:loading.class.remove="btn_save" class="btn_save" wire:loading.class="btn_loading"
                        wire:loading.attr="disabled">
                        <div wire:loading wire:target="create_permission_confirmation_dispatcher"
                            class="ihelp_loader_for_btn">
                            <span class="sr-only">Loading...</span>
                        </div>
                        <i class="{{ _icons('add') }}" wire:loading.remove
                            wire:target="create_permission_confirmation_dispatcher"></i>
                        {{ __('generate') }}
                    </button>
                </div>
            </div>
        </div>
        <div class="grid lg:grid-cols-4 grid-cols-1 gap-6 p-6">
            @isset($permissions)
                @foreach ($permissions as $index => $item)
                    <div class="card" wire:key="item_key_{{ $index }}">
                        <div class="card-header">
                            <div class="flex justify-between items-center">
                                <h4 class="card-title">{{ $item['label'] }}</h4>
                                <div class="flex items-center gap-2" title="{{ __('check all') }}">
                                    <div class="flex items-center">
                                        <input wire:click="parent_checked('{{ $index }}')" id="{{ $index }}"
                                            class="form-switch" type="checkbox" id="is_active"
                                            @if ($item['parent_checked']) checked @endif>
                                        <label class="ms-1.5" for="is_active"></label>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="p-6">
                            <ul class="max-w-xs flex flex-col divide-y divide-gray-200 dark:divide-gray-700">

                                @foreach ($item['list'] as $list_key => $single_list)
                                    <li class="inline-flex items-center gap-x-2 py-2.5 px-4 text-sm font-medium text-gray-800 dark:text-white"
                                        wire:key="list_key_{{ $list_key }}">
                                        <div class="flex justify-between w-full"
                                            for="list_key_{{ $index }}_{{ $list_key }}">
                                            <span>{{ $single_list['name'] }}</span>
                                            <!-- <label class="ms-1.5" for="customckeck1">Primary</label> -->
                                            <input wire:click="child_checked('{{ $index }}','{{ $list_key }}')"
                                                class="form-checkbox rounded text-primary" type="checkbox"
                                                value="{{ $index . ' ' . $single_list['name'] }}"
                                                id="list_key_{{ $index }}_{{ $list_key }}"
                                                @if ($single_list['checked']) checked @endif>
                                        </div>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                @endforeach
            @endisset

        </div>
    </div>

</main>
