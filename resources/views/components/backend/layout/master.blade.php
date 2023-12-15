<!DOCTYPE html>
<html lang="en" data-sidenav-view="hidden">

<head>
    <meta charset="utf-8" />
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta name="keywords" content="cmr, ihlepbd.com crm, ihelp crm, praava crm, crm product in bangladesh" />
    <meta content="ihelpbd.com" name="author" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{ $title ?? 'Page Title' }} : Praava CRM</title>

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ Vite::image('favicon.png') }}" />
    @stack('dynamic_css')
    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="flex wrapper">
        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <!-- Sidenav Menu -->
         @persist('sidebar')
        <div class="app-menu">

            <!-- Sidenav Brand Logo -->
            <a href="index.html" class="logo-box">
                <!-- Light Brand Logo -->
                <div class="logo-light">
                   <img src="{{ Vite::image('logo.png') }}" class="h-12 mr-6" alt="Light logo">
                    <img src="assets/images/logo-sm.png" class="logo-sm" alt="Small logo">
                </div>

                <!-- Dark Brand Logo -->
                <div class="logo-dark">
                    <img src="{{ Vite::image('logo.png') }}" class="h-12 mr-6" alt="Light logo">
                    <img src="assets/images/logo-sm.png" class="logo-sm" alt="Small logo">
                </div>
            </a>

            <!-- Sidenav Menu Toggle Button -->
            <button id="button-hover-toggle" class="absolute top-5 end-2 rounded-full p-1.5">
                <span class="sr-only">Menu Toggle Button</span>
                <i class="mgc_round_line text-xl"></i>
            </button>

            <!--- Menu -->
            <div class="srcollbar" data-simplebar>
                <ul class="menu" data-fc-type="accordion">
                    <li class="menu-item">
                        <a href="{{ route(session('route_segment') . '.dashboard') }}" class="menu-link"  wire:navigate>
                            <span class="menu-icon"><i class="{{_icons('edit')}}"></i></span>
                              <span>{{ __('dashboard') }}</span>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="{{ route(session('route_segment') . '.settings') }}" class="menu-link"  wire:navigate>
                            <span class="menu-icon"><i class="{{_icons('edit')}}"></i></span>
                            <span>{{ __('settings') }}</span>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="javascript:void(0)" data-fc-type="collapse" class="menu-link"  >
                            <span class="menu-icon">
                                    <i class="{{ _icons('arrow_right') }}"></i></span>
                            <span class="menu-text">{{ __('system settings') }}</span>
                            <span class="menu-icon"><i class="{{ _icons('arrow_caret_down') }} text-gray-400"></i></span>
                        </a>

                        <ul class="sub-menu hidden">
                            @can('permission-list')
                                <li class="menu-item">
                                    <a href="{{ route(session('route_segment') . '.permissions') }}" class="menu-link"  wire:navigate>
                                        <span>{{ __('permissions') }}</span>
                                    </a>
                                </li>
                            @endcan
                            @can('role-list')
                                <li class="menu-item">
                                    <a href="{{ route(session('route_segment') . '.roles') }}" class="menu-link"  wire:navigate>
                                       <span>{{ __('roles') }}</span>
                                    </a>
                                </li>
                            @endcan
                            @can('permission-list')
                                <li class="menu-item">
                                    <a href="{{ route(session('route_segment') . '.users') }}" class="menu-link"  wire:navigate>
                                       <span>{{ __('users') }}</span>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        @endpersist
        <!-- Sidenav Menu End  -->

        <div class="page-content">
            @persist('header')
                <!-- header -->
                <livewire:backend.partials.header-component />
                <!-- end: header -->
            @endpersist

            <!-- Topbar Search Modal -->
            <div>
                <div id="topbar-search-modal" class="fc-modal hidden w-full h-full fixed top-0 start-0 z-50">
                    <div
                        class="fc-modal-open:opacity-100 fc-modal-open:duration-500 opacity-0 transition-all sm:max-w-lg sm:w-full m-12 sm:mx-auto">
                        <div
                            class="mx-auto max-w-2xl overflow-hidden rounded-xl bg-white shadow-2xl transition-all dark:bg-slate-800">
                            <div class="relative">
                                <div
                                    class="pointer-events-none absolute top-3.5 start-4 text-gray-900 text-opacity-40 dark:text-gray-200">
                                    <i class="mgc_search_line text-xl"></i>
                                </div>
                                <input type="search"
                                    class="h-12 w-full border-0 bg-transparent ps-11 pe-4 text-gray-900 placeholder-gray-500 dark:placeholder-gray-300 dark:text-gray-200 focus:ring-0 sm:text-sm"
                                    placeholder="Search here..." />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <section class="flex-grow px-3 pb-3 pt-1">
                {{ $slot }}
            </section>

            @persist('footer')
                <!-- Footer Start -->
                <livewire:backend.partials.footer-component />
                <!-- Footer End -->
            @endpersist
        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->
    </div>

    <!-- Back to Top Button -->
    <button data-toggle="back-to-top"
        class="fixed hidden h-10 w-10 items-center justify-center rounded-full z-10 bottom-20 end-14 p-2.5 bg-primary cursor-pointer shadow-lg text-white">
        <i class="{{ _icons('arrow_up') }} text-lg"></i>
    </button>

    <script>
        /* Toast notification after any action */

        window.addEventListener("toast_alert", (event) => {
            event.preventDefault();
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                showCloseButton: true,
                didOpen: (toast) => {
                    toast.addEventListener("mouseenter", Swal.stopTimer);
                    toast.addEventListener("mouseleave", Swal.resumeTimer);
                },
            });

            Toast.fire({
                icon: event.detail.type,
                title: event.detail.message,
            });
        });

        /* Start: Toast notification for invalid request */
        window.addEventListener("invalid_credentials", (event) => {
            /* console.log(event.detail.message)*/
            // alert(event.detail.message)
            event.preventDefault();
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                showCloseButton: true,
                didOpen: (toast) => {
                    toast.addEventListener("mouseenter", Swal.stopTimer);
                    toast.addEventListener("mouseleave", Swal.resumeTimer);
                },
            });

            Toast.fire({
                icon: "error",
                title: event.detail.message,
            });
        });
        /* End: Toast notification for invalid request */
    </script>

    @livewireScripts
    @stack('dynamic_js')
</body>

</html>
