{{-- <header class="app-header justify-between flex items-center px-4 gap-3">
    <img src="{{ Vite::image('logo.png') }}" class="h-12 mr-6" alt="Light logo">

    <div class="right_section flex items-center gap-4">
        <ul class="navbar md:flex items-center gap-6 hidden">
            <li>
                <a href="{{ route(session('route_segment') . '.dashboard') }}"
                    class="text-xs text-grey rounded-md py-1 px-1.5 font-medium" role="alert" wire:navigate>
                    <span>{{ __('dashboard') }}</span>
                </a>
            </li>


            @can('setting-list')
                <li>
                    <a href="{{ route(session('route_segment') . '.settings') }}"
                        class="text-xs text-grey rounded-md py-1 px-1.5 font-medium" role="alert" wire:navigate>
                        <span>{{ __('settings') }}</span>
                    </a>
                </li>
            @endcan


           

            @can('system-setting-list')

                <li>
                    <div class="relative settings_dropdown">

                        <a href="javascript:void(0)" data-fc-type="dropdown" data-fc-placement="bottom-end" type="button"
                            class="nav-link">
                            <span class="menu-text">{{ __('system settings') }}</span>
                            <span class="menu-icon"><i class="{{ _icons('arrow_caret_down') }} text-gray-400"></i></span>
                        </a>


                        <div
                            class="fc-dropdown fc-dropdown-open:opacity-100 hidden opacity-0 w-48 z-50 transition-[margin,opacity] duration-300 mt-2 bg-white shadow-lg border rounded-lg p-2 border-gray-200 dark:border-gray-700 dark:bg-gray-800">

                            @can('permission-list')
                                <a class="nav_dropdown_item" href="{{ route(session('route_segment') . '.permissions') }}"
                                    wire:navigate>
                                    <i class="{{ _icons('arrow_right') }}"></i>
                                    <span>{{ __('permissions') }}</span>
                                </a>
                            @endcan

                            @can('role-list')
                                <a class="nav_dropdown_item" href="{{ route(session('route_segment') . '.roles') }}"
                                    wire:navigate>
                                    <i class="{{ _icons('arrow_right') }}"></i>
                                    <span>{{ __('roles') }}</span>
                                </a>
                            @endcan

                            @can('user-list')
                                <a class="nav_dropdown_item" href="{{ route(session('route_segment') . '.users') }}"
                                    wire:navigate>
                                    <i class="{{ _icons('arrow_right') }}"></i>
                                    <span>{{ __('users') }}</span>
                                </a>
                            @endcan
                        </div>
                        <!-- /.fc-dropdown -->
                    </div>
                    <!-- /.settings_dropdown -->

                </li>
            @endcan

        </ul>
        <!-- /.navbar -->

        <div class="relative language">
            <button data-fc-type="dropdown" data-fc-placement="bottom-end" type="button"
                class="nav-link p-2 fc-dropdown">
                <span class="flex items-center justify-center h-6 w-6">
                    <img src="{{ Vite::image('flags/us.jpg') }}" alt="user-image" class="h-4 w-6">
                </span>
            </button>
            <div
                class="fc-dropdown fc-dropdown-open:opacity-100 hidden opacity-0 w-40 z-50 mt-2 transition-[margin,opacity] duration-300 bg-white dark:bg-gray-800 shadow-lg border border-gray-200 dark:border-gray-700 rounded-lg p-2">
                <!-- item-->
                <a href="javascript:void(0);"
                    class="flex items-center gap-2.5 py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300">
                    <img src="{{ Vite::image('flags/germany.jpg') }}" alt="user-image" class="h-4">
                    <span class="align-middle">German</span>
                </a>

                <!-- item-->
                <a href="javascript:void(0);"
                    class="flex items-center gap-2.5 py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300">
                    <img src="{{ Vite::image('flags/italy.jpg') }}" alt="user-image" class="h-4">
                    <span class="align-middle">Italian</span>
                </a>
            </div>
        </div>
        <!-- /.language -->

        <!-- Fullscreen Toggle Button -->
        <div class="md:flex hidden">
            <button data-toggle="fullscreen" type="button" class="nav-link p-2" title="{{ __('full screen') }}">
                <span class="sr-only">Fullscreen Mode</span>
                <span class="flex items-center justify-center h-6 w-6">
                    <i class="{{ _icons('fullscreen') }} text-xl"></i>
                </span>
            </button>
        </div>

        <!-- /header-notification-component -->
        <livewire:backend.partials.header-notification-component />

        <!-- Light/Dark Toggle Button -->
        <div class="flex">
            <button id="light-dark-mode" type="button" class="nav-link p-2">
                <span class="sr-only">Light/Dark Mode</span>
                <span class="flex items-center justify-center h-6 w-6">
                    <i class="{{ _icons('moon') }} text-xl"></i>
                </span>
            </button>
        </div>

        <!-- Profile Dropdown Button -->
        <div class="relative profile">
            <button data-fc-type="dropdown" data-fc-placement="bottom-end" type="button" class="nav-link">
                <img src="{{ Vite::image('user-6.jpg') }}" alt="user-image" class="rounded-full h-10">
            </button>
            <div
                class="fc-dropdown fc-dropdown-open:opacity-100 hidden opacity-0 w-44 z-50 transition-[margin,opacity] duration-300 mt-2 bg-white shadow-lg border rounded-lg p-2 border-gray-200 dark:border-gray-700 dark:bg-gray-800">

                <div class="flex items-center border border-gray-200 dark:border-gray-700 rounded px-3 py-2">

                    <div class="flex-grow">
                        <h5 class="font-semibold mb-1 capitalize">{{ _str_conversion(_get_user_info(), 'ucwords') }}
                        </h5>
                        <p class="text-gray-400">{{ _get_user_info('email') }}</p>
                        <div class="border border-gray-200 dark:border-gray-700 p-1 mt-1">
                            <p class="text-gray-400">Role: {{ _str_conversion(_get_user_info('role'), 'ucwords') }}
                            </p>
                            <p class="text-gray-400">Panel:
                                {{ _str_conversion(_get_user_info('route_segment'), 'ucwords') }} </p>
                        </div>
                    </div>
                    <div>
                        <button class="text-gray-400" data-fc-type="tooltip" data-fc-placement="top">
                            <i class="mgc_information_line text-xl"></i>
                        </button>
                        <div class="bg-slate-700 hidden px-2 py-1 rounded transition-all text-white opacity-0 z-50"
                            role="tooltip">
                            Info <div class="bg-slate-700 w-2.5 h-2.5 rotate-45 -z-10 rounded-[1px]" data-fc-arrow="">
                            </div>
                        </div>
                    </div>
                </div>
                <a wire:navigate href="{{ route(session('route_segment') . '.profile.show') }}"
                    class="nav_dropdown_item">
                    <i class="{{ _icons('user') }} me-2"></i>
                    <span>{{ __('profile') }}</span>
                </a>
                <hr class="my-2 -mx-2 border-gray-200 dark:border-gray-700">
                <a class="nav_dropdown_item" href="{{ route(session('route_segment') . '.logout') }}">
                    <i class="{{ _icons('logout') }} me-2"></i>
                    <span>{{ __('logout') }}</span>
                </a>
            </div>
            <!-- /.fc-dropdown -->
        </div>
        <!-- /.profile -->
    </div>
    <!-- /.right_section -->
</header> --}}
<!-- /.app-header -->


<!-- Topbar Start -->
<header class="app-header flex items-center px-4 gap-3">
    <!-- Sidenav Menu Toggle Button -->
    <button id="button-toggle-menu" class="nav-link p-2">
        <span class="sr-only">Menu Toggle Button</span>
        <span class="flex items-center justify-center h-6 w-6">
            <i class="{{_icons('bar')}}"></i>
        </span>
    </button>

    <!-- Topbar Search Modal Button -->
    <button type="button" data-fc-type="modal" data-fc-target="topbar-search-modal" class="nav-link p-2 me-auto">
        <span class="sr-only">Search</span>
        <span class="flex items-center justify-center h-6 w-6">
            <i class="{{_icons('search')}}"></i>
        </span>
    </button>

    <!-- Language Dropdown Button -->
    <div class="relative">
        <button data-fc-type="dropdown" data-fc-placement="bottom-end" type="button" class="nav-link p-2 fc-dropdown">
            <span class="flex items-center justify-center h-6 w-6">
                  <img src="{{ Vite::image('flags/germany.jpg') }}" alt="user-image" class="h-4">
            </span>
        </button>
        <div class="fc-dropdown fc-dropdown-open:opacity-100 hidden opacity-0 w-40 z-50 mt-2 transition-[margin,opacity] duration-300 bg-white dark:bg-gray-800 shadow-lg border border-gray-200 dark:border-gray-700 rounded-lg p-2">
            <!-- item-->
            <a href="javascript:void(0);" class="flex items-center gap-2.5 py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300">
                <img src="{{ Vite::image('flags/germany.jpg') }}" alt="user-image" class="h-4">
                <span class="align-middle">German</span>
            </a>
        </div>
    </div>

     <!-- Fullscreen Toggle Button -->
        <div class="md:flex hidden">
            <button data-toggle="fullscreen" type="button" class="nav-link p-2" title="{{ __('full screen') }}">
                <span class="sr-only">Fullscreen Mode</span>
                <span class="flex items-center justify-center h-6 w-6">
                    <i class="{{ _icons('fullscreen') }} text-xl"></i>
                </span>
            </button>
        </div>
        
    <!-- Notification Bell Button -->
     <livewire:backend.partials.header-notification-component />

    <!-- Light/Dark Toggle Button -->
    <div class="flex">
        <button id="light-dark-mode" type="button" class="nav-link p-2">
            <span class="sr-only">Light/Dark Mode</span>
            <span class="flex items-center justify-center h-6 w-6">
                <i class="{{_icons('dark')}}"></i>
            </span>
        </button>
    </div>

    <!-- Profile Dropdown Button -->
    <div class="relative">
        <button data-fc-type="dropdown" data-fc-placement="bottom-end" type="button" class="nav-link">
            <img src="{{ Vite::image('user-5.jpg') }}" alt="user-image" class="rounded-full h-10">
        </button>
        <div class="fc-dropdown fc-dropdown-open:opacity-100 hidden opacity-0 w-44 z-50 transition-[margin,opacity] duration-300 mt-2 bg-white shadow-lg border rounded-lg p-2 border-gray-200 dark:border-gray-700 dark:bg-gray-800">

            <div class="flex-grow">
                <h5 class="font-semibold mb-1 capitalize">{{ _str_conversion(_get_user_info(), 'ucwords') }}
                </h5>
                <p class="text-gray-400">{{ _get_user_info('email') }}</p>
                <div class="border border-gray-200 dark:border-gray-700 p-1 mt-1">
                    <p class="text-gray-400">Role: {{ _str_conversion(_get_user_info('role'), 'ucwords') }}
                    </p>
                    <p class="text-gray-400">Panel:
                        {{ _str_conversion(_get_user_info('route_segment'), 'ucwords') }} </p>
                </div>
            </div>
            <hr class="my-2 -mx-2 border-gray-200 dark:border-gray-700">
            <a class="flex items-center py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" href="{{ route(session('route_segment') . '.profile.show') }}">
                <i class="{{ _icons('user') }} me-2"></i>
                    <span>{{ __('profile') }}</span>
            </a>
            <a class="flex items-center py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" href="{{ route(session('route_segment') . '.logout') }}">
                <i class="{{ _icons('logout') }} me-2"></i>
                <span>{{ __('logout') }}</span>
            </a>
        </div>

        
    </div>
</header>
