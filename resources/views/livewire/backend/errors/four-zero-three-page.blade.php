<div class="flex flex-col justify-center text-center gap-6">
    <p class="text-4xl font-semibold text-primary">{{ __('four zero three') }}</p>
    <h1 class="text-5xl font-bold tracking-tight dark:text-gray-100">
        {{ __('unauthorized') }}
    </h1>
    <p class="text-base text-gray-600 dark:text-gray-300">
        {{ __('sorry') }},
        {{ __('you do not have the right permissions') }}.
        {{ __('please talk to system administrator') }}

        <!-- USER DOES NOT HAVE THE RIGHT PERMISSIONS -->
    </p>
    <a href="{{ route(session('route_segment') . '.dashboard') }}" class="four_zero_four" wire:navigate>
        {{ __('go back home') }}
    </a>

</div>