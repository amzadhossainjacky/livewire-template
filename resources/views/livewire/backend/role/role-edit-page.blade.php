<main>
    <x-backend.partials.breadcrumb-component :pageTitle="$page_title" :breadcrumbLinks="$breadcrumb_links">
    </x-backend.partials.breadcrumb-component>
    <x-backend.addons.card-component cardTitle="edit" :cardAddonButtons="$card_addon_buttons">

        <div class="grid grid-cols-1 p-3">
            {{-- @json($db_permissions) --}}
            <div class="relative">
                <div class="flex">
                    <div
                        class="inline-flex items-center px-4 rounded-s border border-e-0 border-gray-200 bg-gray-50 text-gray-500 dark:bg-gray-700 dark:border-gray-700 dark:text-gray-400">
                        <i class="{{ _icons('role') }} text-gray-400"></i>
                    </div>
                    <input wire:model.blur="state.name" type="text" class="form-input rounded-none" readonly>
                    <div
                        class="inline-flex items-center px-4 rounded-e border border-s-0 border-gray-200 bg-gray-50 text-gray-500 dark:bg-gray-700 dark:border-gray-700 dark:text-gray-400">
                        <div class="flex items-center">
                            <input wire:model.live="state.is_active" class="form-switch text-success" type="checkbox"
                                id="is_active" disabled>
                            <label class="ms-3" for="is_active">{{ __($is_active_text) }}</label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.relative -->
        </div>
        <!-- /.grid -->

        <!-- ##### Permission list ##### -->
        <div class="grid lg:grid-cols-4 grid-cols-1 gap-3 p-3">
            @isset($db_permissions)
                @foreach ($db_permissions as $module_index => $moduel)
                    @if (count($moduel['permissions']))
                        <div class="card" wire:key="module_name_{{ $module_index }}">
                            <div class="card-header">
                                <div class="flex justify-between items-center">
                                    <h4 class="card-title">
                                        {{ _str_conversion($moduel['label'], 'ucwords', false, false, false) }}
                                    </h4>
                                    <input wire:model.live="db_permissions.{{ $module_index }}.parent_checked"
                                        wire:click="parent_checked('{{ $module_index }}')" class="form-switch"
                                        type="checkbox">
                                </div>
                            </div>
                            <!-- /.card-header -->

                            <div class="p-3">
                                <ul class="max-w-xs flex flex-col divide-y divide-gray-200 dark:divide-gray-700">

                                    @foreach ($moduel['permissions'] as $permission_index => $permission)
                                        <li class="inline-flex items-center gap-x-2 py-2.5 px-4 text-sm font-medium text-gray-800 dark:text-white"
                                            wire:key="permission_key_{{ $permission_index }}_{{ $permission['id'] }}">
                                            <div class="flex justify-between w-full">
                                                <span>{{ _str_conversion($permission['name'], 'ucwords', true, false, false) }}</span>

                                                <input
                                                    wire:model.live="db_permissions.{{ $module_index }}.permissions.{{ $permission_index }}.checked"
                                                    wire:click="child_checked('{{ $module_index }}','{{ $permission_index }}')"
                                                    class="form-checkbox rounded text-primary" type="checkbox">
                                            </div>
                                        </li>
                                    @endforeach

                                </ul>
                                <!-- /.flex -->
                            </div>
                            <!-- /.p-6 -->
                        </div>
                        <!-- /.card -->
                    @endif
                @endforeach
            @endisset
        </div>
        <!-- /.grid -->
        <!-- ##### End: Permission list ##### -->

        <div class="grid sm:flex flex-row-reverse items-center justify-between gap-3 mt-6 ihelp_card_footer">

            <button wire:click.prevent="update" wire:loading.class.remove="btn_save" class="btn_save"
                wire:loading.class="btn_loading" wire:loading.attr="disabled">
                <div wire:loading wire:target="update" class="ihelp_loader_for_btn">
                    <span class="sr-only">Loading...</span>
                </div>
                <i class="{{ _icons('save') }}" wire:loading.remove wire:target="update"></i>
                {{ __('update') }}
            </button>
        </div>
        <!-- /.grid -->

    </x-backend.addons.card-component>

</main>
