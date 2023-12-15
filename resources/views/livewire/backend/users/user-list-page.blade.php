<main class="flex-grow">
    <x-backend.partials.breadcrumb-component :pageTitle="$page_title" :breadcrumbLinks="$breadcrumb_links">
    </x-backend.partials.breadcrumb-component>
    <x-backend.addons.card-component cardTitle="list" :cardAddonButtons="$card_addon_buttons">
        <div class="table_responsive">
            <table class="w-full table">
                <thead class="table_head">
                    <tr>
                        <th class="table_head_th text-left w-16">
                            #
                        </th>
                        <th class="table_head_th text-left">
                            {{ __('name') }}
                        </th>
                        <th class="table_head_th text-left">
                            {{ __('email') }}
                        </th>
                        <th class="table_head_th text-left w-48">
                            {{ __('mobile') }}
                        </th>
                        <th class="table_head_th text-left w-48">
                            {{ __('role') }}
                        </th>
                        <th class="table_head_th text-center w-48">
                            {{ __('status') }}
                        </th>
                        @can('user-edit')
                            <th class="table_head_th text-center w-32">
                                {{ __('action') }}
                            </th>
                        @else
                            @can('user-delete')
                                <th class="table_head_th text-center w-32">
                                    {{ __('action') }}
                                </th>
                            @endcan

                        @endcan

                    </tr>
                </thead>
                <!-- /.table_head -->

                <tbody class="table_body">
                    @isset($models)
                        @forelse ($models as $index => $model)
                            <tr class="{{ $index % 2 == 0 ? 'table_tbody_tr_even' : 'table_tbody_tr_odd' }}">
                                <td class="table_body_td">
                                    {{ $models->firstItem() + $index }}
                                </td>
                                <td class="table_body_td">
                                    {{ $model->name }}
                                </td>

                                <td class="table_body_td">
                                    {{ $model->email }}
                                </td>
                                <td class="table_body_td">
                                    {{ $model->mobile }}
                                </td>
                                <td class="table_body_td">
                                    {{ @$model->getRoleNames()[0] }}
                                </td>
                                </td>
                                <td class="table_body_td text-center">
                                    <x-backend.addons.is-active-status-component isActive="{{ $model->is_active }}"
                                        wire:key="status_key_{{ $model->id }}" />
                                </td>

                                @can('user-edit')
                                    <td class="table_body_td text-center ">
                                        @can('user-edit')
                                            <a wire:navigate
                                                href="{{ route($segment . '.users.edit', ['id' => encrypt($model->id)]) }}"
                                                title="{{ __('edit') }}" class="btn_edit">
                                                <i class="action_btn {{ _icons('edit') }}"></i>
                                            </a>
                                        @endcan

                                        {{-- @can('user-delete')
                                            <a href="javascript:void(0)" wire:click.prevent="delete({{ $model->id }})"
                                                title="{{ __('delete') }}" class="btn_delete">
                                                <i class="action_btn {{ _icons('delete') }}"></i>
                                            </a>
                                        @endcan --}}
                                    </td>
                                @else
                                    @can('user-delete')
                                        <td class="table_body_td text-center ">
                                            @can('user-edit')
                                                <a wire:navigate
                                                    href="{{ route($segment . '.users.edit', ['id' => encrypt($model->id)]) }}"
                                                    title="{{ __('edit') }}" class="btn_edit">
                                                    <i class="action_btn {{ _icons('edit') }}"></i>
                                                </a>
                                            @endcan

                                            {{-- @can('user-delete')
                                                <a href="javascript:void(0)" wire:click.prevent="delete({{ $model->id }})"
                                                    title="{{ __('delete') }}" class="btn_delete">
                                                    <i class="action_btn {{ _icons('delete') }}"></i>
                                                </a>
                                            @endcan --}}
                                        </td>
                                    @endcan
                                @endcan
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">
                                    <p class="no_matching_records_found">
                                        {{ _static_strings('no_matching_records_found') }}
                                    </p>
                                </td>
                            </tr>
                        @endforelse
                    @endisset
                </tbody>
                <!-- /.table_body -->

            </table>
            <!-- /.table -->
        </div>
        <!-- /.table_responsive -->

        {{ $models->links() }}


    </x-backend.addons.card-component>
</main>
