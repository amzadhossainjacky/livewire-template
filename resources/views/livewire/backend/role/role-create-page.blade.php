<main>
    <x-backend.partials.breadcrumb-component :pageTitle="$page_title" :breadcrumbLinks="$breadcrumb_links">
    </x-backend.partials.breadcrumb-component>

    <x-backend.addons.card-component cardTitle="create" :cardAddonButtons="$card_addon_buttons">

        <div class="grid grid-cols-1 md:grid-cols-1 gap-6 mt-6">

            <div class="grid grid-cols-1 md:grid-cols-1 gap-6 mt-6">
                <div>
                    <select wire:model.live="state.route_segment" class="form-select">
                        <option value="">{{ __('select segment') }}</option>
                        @foreach (_route_segments() as $key => $value)
                            <option value="{{ $value }}" wire:key="route_segment{{ $key }}">
                                {{ __($value) }}</option>
                        @endforeach
                    </select>

                <div>

                @if ($errors->has('route_segment'))
                    <div class="text_help text-red-500"> {{ $errors->first('route_segment') }}</div>
                @else
                    <div class="text_help">{{ __('route segment required') }}</div>
                @endif
            </div>
            <div class="mt-2">
                <div class="flex" >
                    <div
                        class="inline-flex items-center px-4 rounded-s border border-e-0 border-gray-200 bg-gray-50 text-gray-500 dark:bg-gray-700 dark:border-gray-700 dark:text-gray-400">
                        <i class="{{ _icons('role') }} text-gray-400"></i>
                    </div>
                    <input wire:model.blur="state.name" type="text" class="form-input rounded-none">
                    <div
                        class="inline-flex items-center px-4 rounded-e border border-s-0 border-gray-200 bg-gray-50 text-gray-500 dark:bg-gray-700 dark:border-gray-700 dark:text-gray-400">
                        <div class="flex items-center">
                            <input wire:model.live="state.is_active" class="form-switch text-success" type="checkbox"
                                id="is_active" checked>
                            <label class="ms-3" for="is_active">{{ __($is_active_text) }}</label>
                        </div>
                    </div>
                </div>
                <!-- /.flex -->
                @if ($errors->has('name'))
                    <div class="text_help text-red-500"> {{ __($errors->first('name')) }}</div>
                @else
                    <div class="text_help">
                        {{ __('role name length in character between', ['min' => 2, 'max' => 50]) }}
                        ({{ __('required') }})
                    </div>
                @endif
            </div>
            <!-- /.div -->
        </div>
        <!-- /.grid -->

        <div class="grid lg:grid-cols-4 grid-cols-1 gap-6 p-6">
            @isset($permissions)
                @foreach ($permissions as $module_index => $item)
                    <div class="card" wire:key="module_name">
                        <div class="card-header">
                            <div class="flex justify-between items-center">
                                <h4 class="card-title">{{ $item['label'] }}</h4>
                                <div class="flex items-center gap-2" title="{{ __('check all') }}">
                                    <div class="flex items-center">
                                        <input wire:click="parent_checked('{{ $module_index }}')" id="{{ $module_index }}"
                                            class="form-switch" type="checkbox"
                                            @if ($item['parent_checked']) checked @endif>
                                        <label class="ms-1.5" for="is_active"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->

                        <div class="p-6">
                            <ul class="max-w-xs flex flex-col divide-y divide-gray-200 dark:divide-gray-700">

                                @foreach ($item['permissions'] as $permission_index => $single_list)
                                    <li class="inline-flex items-center gap-x-2 py-2.5 px-4 text-sm font-medium text-gray-800 dark:text-white"
                                        wire:key="list_key_{{ rand() }}">
                                        <div class="flex justify-between w-full">
                                            <span>{{ $single_list['name'] }}</span>
                                            {{-- <label class="ms-1.5" for="customckeck1">Primary</label> --}}
                                            <input
                                                wire:click="child_checked('{{ $module_index }}','{{ $permission_index }}')"
                                                class="form-checkbox rounded text-primary" type="checkbox"
                                                value="{{ $module_index . ' ' . $single_list['name'] }}"
                                                id="list_key_{{ $module_index }}_{{ $permission_index }}"
                                                @if ($single_list['checked']) checked @endif>
                                        </div>
                                    </li>
                                @endforeach

                            </ul>
                            <!-- /ul -->
                        </div>
                        <!-- /div -->
                    </div>
                    <!-- /.card -->
                @endforeach
            @endisset
        </div>
        <!-- /.grid -->

        <div class="grid sm:flex flex-row-reverse items-center justify-between gap-3 mt-6 ihelp_card_footer">

            <button wire:click.prevent="create" wire:loading.class.remove="btn_save" class="btn_save"
                wire:loading.class="btn_loading" wire:loading.attr="disabled">
                <div wire:loading wire:target="create" class="ihelp_loader_for_btn">
                    <span class="sr-only">Loading...</span>
                </div>
                <i class="{{ _icons('save') }}" wire:loading.remove wire:target="create"></i>
                {{ __('save') }}
            </button>
        </div>
        <!-- /.grid -->

    </x-backend.addons.card-component>

</main>
