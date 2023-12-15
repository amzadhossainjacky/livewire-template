<main>
    <x-backend.partials.breadcrumb-component :pageTitle="$page_title" :breadcrumbLinks="$breadcrumb_links">
    </x-backend.partials.breadcrumb-component>

    <x-backend.addons.card-component cardTitle="list" :cardAddonButtons="$card_addon_buttons">

        {{-- @dump($models) --}}

        <div class="table_responsive">
            <table class="w-full">
                <thead class="table_head">
                    <tr>
                        <th class="table_head_th text-left w-16">
                            #
                        </th>
                        <th class="table_head_th text-left w-52">
                            {{ __('role name') }}
                        </th>
                        <th class="table_head_th text-left w-40">
                            {{ __('route segment') }}
                        </th>
                        <th class="table_head_th text-left">
                            {{ __('applied permission') }}
                        </th>
                        <th class="table_head_th text-center w-32">
                            {{ __('status') }}
                        </th>
                        <th class="table_head_th text-center w-52">
                            {{ __('counts') }}
                        </th>

                        @can('role-edit')
                            <th class="table_head_th text-center w-32">
                                {{ __('action') }}
                            </th>
                        @else
                            @can('role-delete')
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
                                    {{ $model->route_segment }}
                                </td>

                                <td class="table_body_td">
                                    @if (count($model->permissions) > 0)
                                        @foreach ($model->permissions as $key => $item)
                                            <span
                                                class="inline-flex items-center mb-1 gap-1 py-1 px-1.5 rounded-md text-xs font-medium bg-indigo-100 text-gray-950 text">
                                                <span class="w-1.5 h-1.5 inline-block bg-indigo-400 rounded-full"></span>
                                                {{ _str_conversion($item->name, 'ucwords', true, false, false) }}
                                            </span>
                                        @endforeach
                                    @else
                                        @if ($model->name)
                                        @endif
                                        {!! '<del class="text-secondary text-capitalize">' !!}
                                        {{ __('no role') }}
                                        {!! '</del>' !!}
                                    @endif
                                </td>

                                <td class="table_body_td text-center">
                                    <x-backend.addons.is-active-status-component isActive="{{ $model->is_active }}" />
                                </td>
                                <td class="table_body_td text-center">
                                    <p>
                                        {{ __('total users') }}:
                                        <strong>{{ $model->users->count() }}</strong>
                                    </p>
                                    <p>
                                        {{ __('total permissions') }}:
                                        <strong>{{ $model->permissions->count() }}</strong>
                                    </p>


                                </td>

                                @can('role-edit')
                                    <td class="table_body_td text-center ">
                                        @can('role-edit')
                                            <a wire:navigate
                                                href="{{ route(session('route_segment') . '.roles.edit', ['id' => encrypt($model->id)]) }}"
                                                title="{{ __('edit') }}" class="btn_edit">
                                                <i class="action_btn {{ _icons('edit') }}"></i>
                                            </a>
                                        @endcan

                                        {{-- @can('role-delete')
                                                <a href="javascript:void(0)" wire:click.prevent="delete({{ $model->id }})"
                                                    title="{{ __('delete') }}" class="btn_delete">
                                                    <i class="action_btn {{ _icons('delete') }}"></i>
                                                </a>
                                            @endcan --}}
                                    </td>
                                @else
                                    @can('role-delete')
                                        <td class="table_body_td text-center ">
                                            @can('role-edit')
                                                <a wire:navigate
                                                    href="{{ route(session('route_segment') . '.roles.edit', ['id' => encrypt($model->id)]) }}"
                                                    title="{{ __('edit') }}" class="btn_edit">
                                                    <i class="action_btn {{ _icons('edit') }}"></i>
                                                </a>
                                            @endcan

                                            {{-- @can('role-delete')
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
                                <td colspan="3">
                                    <p class="no_matching_records_found">
                                        {{ _static_strings('no_matching_records_found') }}
                                    </p>
                                </td>
                            </tr>
                        @endforelse
                    @endisset
                </tbody>

            </table>
            <!-- /table -->
        </div>
        <!-- /.table_responsive -->

        {{ $models->links() }}
        <!-- /pagination -->

    </x-backend.addons.card-component>
</main>
