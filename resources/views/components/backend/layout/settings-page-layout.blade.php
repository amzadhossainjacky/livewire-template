<div class="flex pt-3">
    <div id="default-offcanvas"
        class="lg:block top-0 left-0 transform h-full min-w-[16rem] me-6 card rounded-none lg:rounded-md fc-offcanvas-open:translate-x-0 lg:z-0 z-50 fixed lg:static lg:translate-x-0 -translate-x-full transition-all duration-300 fc-offcanvas hidden"
        tabindex="-1">
        <div class="p-3">
            <div class="relative">
                <a href="javascript:void(0)" data-fc-type="dropdown" data-fc-placement="bottom" type="button"
                    class="btn_save inline-flex justify-center items-center bg-primary text-white w-full fc-dropdown">
                    <i class="mgc_add_line text-lg me-2"></i>
                    {{ __('app settings') }}
                </a>
            </div>

            <div class="space-y-2 mt-4" id="menu_item_container">
                @can('general-settings')
                    <a href="{{ route(session('route_segment') . '.settings.general') }}"
                        class="flex items-center py-2 px-4 text-sm rounded text-gray-500 bg-slate-100 hover:text-slate-700 dark:text-gray-400 dark:bg-gray-700 dark:hover:text-gray-300 gap-1"
                        wire:navigate>

                        <span class="{{ _icons('settings') }}"></span>
                        <span>
                            {{ __('general settings') }}
                        </span>
                    </a>
                @endcan

            </div>
            <!-- /#menu_item_container -->

        </div>
        <!-- /.p-3 -->
    </div>
    <!-- /#default-offcanvas -->

    <div class="w-full">
        <div class="flex items-center justify-between gap-4" id="mobile_menu_icon">
            <div class="lg:hidden block">
                <button data-fc-target="default-offcanvas" data-fc-type="offcanvas"
                    class="inline-flex items-center justify-center text-gray-700 border border-gray-300 rounded shadow hover:bg-slate-100 dark:text-gray-400 hover:dark:bg-gray-800 dark:border-gray-700 transition h-9 w-9 duration-100">
                    <span class="{{ _icons('bars') }}"></span>
                    <div class="mgc_menu_line text-lg"></div>
                </button>
            </div>

        </div>
        <!-- /#mobile_menu_icon -->

        <div class="card">
            <div class="card-header">
                <h6 class="card-title">
                    {{ __($title) }}
                </h6>
            </div>
            <!-- /.card-header -->

            {{ $slot }}
        </div>
        <!-- /.card -->
    </div>
    <!-- /.w-full -->
</div>
