@props(['showCardHeader' => 1, 'cardTitle', 'cardAddonButtons'])
<div class="card mb-3">
    @if ($showCardHeader)
        <div class="card-header mb-3">
            <div class="flex justify-between items-center h-10">
                @isset($card_header_left_buttons)
                    <div class="flex flex-wrap items-center gap-3">
                        {{ $card_header_left_buttons }}
                    </div>
                @endisset


                <p class="card-title ihelp_capitalize">
                    {{ $cardTitle }}
                </p>

                @if (isset($cardAddonButtons) && count($cardAddonButtons))
                    <div class="flex items-center gap-2">
                        @foreach ($cardAddonButtons as $item)
                            @if ($item['name'] == 'add new')
                                @if ($item['visible'])
                                    @isset($item['permission'])
                                        @can($item['permission'])
                                            <a href="{{ $item['link'] }}" class="btn-code fc-collapse" wire:navigate
                                                wire:key="addon_button_{{ rand() }}">
                                                <i class="{{ $item['icon'] }} text-xl"></i>
                                                <span class="ms-1 capitalize">{{ __($item['name']) }}</span>
                                            </a>
                                        @endcan
                                    @endisset
                                @endif
                            @else
                                @if ($item['visible'])
                                    <a href="{{ $item['link'] }}" class="btn-code fc-collapse" wire:navigate
                                        wire:key="addon_button_{{ rand() }}">
                                        <i class="{{ $item['icon'] }} text-xl"></i>
                                        <span class="ms-1 capitalize">{{ __($item['name']) }}</span>
                                    </a>
                                @endif
                            @endif
                        @endforeach
                    </div>
                @endif

                @isset($dropdown)
                    <div class="flex items-center gap-2">
                        {{ $dropdown ?? null }}
                    </div>
                @endisset
            </div>
        </div>
        <!-- /.card-header -->
    @endif

    <div class="px-3 pt-0 pb-3">

        {{ $slot }}

    </div>
</div>
<!-- /.card -->
