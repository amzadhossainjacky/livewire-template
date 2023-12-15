<div class="app-menu">

    <!-- Sidenav Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="logo-box" wire:navigate>
        <!-- Light Brand Logo -->
        <div class="logo-light">
            <img src="{{ Vite::image('logo-light.png') }}" class="logo-lg h-6" alt="Light logo">
            <img src="{{ Vite::image('logo-sm.png') }}" class="logo-sm" alt="Small logo">
        </div>

        <!-- Dark Brand Logo -->
        <div class="logo-dark">
            <img src="{{ Vite::image('logo-dark.png') }}" class="logo-lg h-6" alt="Dark logo">
            <img src="{{ Vite::image('logo-sm.png') }}" class="logo-sm" alt="Small logo">
        </div>
    </a>

    <!-- Sidenav Menu Toggle Button -->
    <button id="button-hover-toggle" class="absolute top-5 end-2 rounded-full p-1.5">
        <span class="sr-only">Menu Toggle Button</span>
        <i class="{{ _icons('list2') }} text-xl"></i>
    </button>

    <!--- Menu -->
    <div class="srcollbar" data-simplebar>
        <ul class="menu" data-fc-type="accordion">
            <li class="menu-title">Menu</li>

            <li class="menu-item">
                <a href="{{ route('admin.dashboard') }}" class="menu-link" wire:navigate>
                    <span class="menu-icon">
                        <i class="{{ _icons('home') }}"></i>
                    </span>
                    <span class="menu-text"> Dashboard </span>
                </a>
            </li>
            <!-- /.menu-item -->

            <li class="menu-title">Apps</li>
            <li class="menu-item">
                <a href="{{ route('admin.leads') }}" class="menu-link" wire:navigate>
                    <span class="menu-icon">
                        <i class="{{ _icons('lead') }}"></i>
                    </span>
                    <span class="menu-text"> Lead </span>
                </a>
            </li>
            <!-- /.menu-item -->

            <li class="menu-title">{{ __('settings') }}</li>

            <li class="menu-item">
                <a href="{{ route('admin.roles') }}" class="menu-link" wire:navigate>
                    <span class="menu-icon">
                        <i class="{{ _icons('role') }}"></i>
                    </span>
                    <span class="menu-text"> Role </span>
                </a>
            </li>
            <!-- /.menu-item -->

            <li class="menu-item">
                <a href="{{ route('admin.users') }}" class="menu-link" wire:navigate>
                    <span class="menu-icon">
                        <i class="{{ _icons('users') }}"></i>
                    </span>
                    <span class="menu-text"> {{ __('users') }} </span>
                </a>
            </li>
            <!-- /.menu-item -->
        </ul>
        <!-- /.menu -->
    </div>
    <!-- /.srcollbar -->
</div>
<!-- /.app-menu -->
