<div class="flex justify-between items-center px-1 py-2">
    <h4 class="text-slate-200 dark:text-slate-400 text-sm font-medium ihelp_capitalize ">{{ __($pageTitle) }}</h4>

    <div class="md:flex hidden items-center gap-2.5 text-sm">
        <div class="flex items-center gap-2">
            {{-- <a href="{{ route(session('route_segment') . '.dashboard') }}" --}}
            <a class="text-xs font-normal text-slate-200 dark:text-slate-400">
                {{ __('dashboard') }}
            </a>
        </div>
        @if (isset($breadcrumbLinks) && count($breadcrumbLinks))
            @foreach ($breadcrumbLinks as $link)
                <div class="flex items-center gap-2">
                    <i class="{{ _icons('arrow_right_3') }}"></i>
                    @if (!empty($link['link']))
                        <a href="{{ $link['link'] }}" class="breadcrumb_nav_link" wire:navigate>
                            {{ __($link['name']) }}
                        </a>
                    @else
                        <a class="breadcrumb_nav_link">
                            {{ __($link['name']) }}
                        </a>
                    @endif
                </div>
            @endforeach
        @endif
    </div>
</div>
