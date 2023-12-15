<main class="flex-grow">
    <x-backend.partials.breadcrumb-component :pageTitle="$page_title" :breadcrumbLinks="$breadcrumb_links">
    </x-backend.partials.breadcrumb-component>
    {{-- @json($system_mode)
    @json($settings_list) --}}
    <x-backend.addons.card-component showCardHeader="0">

        <x-backend.layout.settings-page-layout :title="$page_sub_title">
            <div class="p-3">
                <div class="flex flex-auto flex-col">
                    <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-3">
                        <div class="card">
                            <div class="card-header">
                                <div class="flex justify-between items-center">
                                    <h5>
                                        {{ __('brand name') }}
                                    </h5>

                                    <div class="bg-slate-200 text-xs text-black rounded-md py-1 px-1.5 font-medium cursor-pointer"
                                        role="alert" title="{{ __('save') }}">
                                        <span>
                                            <i class="{{ _icons('save') }}"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-col">
                                <div class="p-3">

                                    <div class="mb-3">

                                        <input type="email" class="form-input" id="exampleInputEmail1"
                                            aria-describedby="emailHelp">
                                        <small id="emailHelp" class="help_text">
                                            {{ __('brand name can not be empty') }}
                                        </small>
                                    </div>

                                </div>

                                <div class="border-t p-3 border-gray-300 dark:border-gray-700">
                                    <div class="flex items-center justify-between gap-2 text-gray-400">
                                        <span class="text-sm">
                                            <i class="mgc_calendar_line text-lg me-2"></i>
                                            <span class="align-text-bottom ">
                                                {{ __('last update') }}
                                            </span>
                                        </span>

                                        <span class="text-sm">
                                            <i class="mgc_comment_line text-lg me-2"></i>
                                            <span class="align-text-bottom">
                                                {{ $system_mode_updated_at }}
                                            </span>
                                        </span>
                                    </div>
                                    <!-- /.flex -->
                                </div>
                                <!-- /.border-->
                            </div>
                        </div>
                        <!-- /.card -->

                        <!-- ##### System Mode ##### -->
                        <div class="card">
                            <div class="card-header">
                                <div class="flex justify-between items-center">
                                    <h5>
                                        {{ __('system mode') }}
                                    </h5>

                                    <div wire:click="are_you_sure"
                                        class="bg-slate-200 text-xs text-black rounded-md py-1 px-1.5 font-medium cursor-pointer"
                                        role="alert" title="{{ __('save') }}">
                                        <span>
                                            <i class="{{ _icons('save') }}"></i>
                                        </span>
                                    </div>
                                </div>
                                <!-- /.flex -->
                            </div>
                            <!-- /.card-header -->
                            <div class="flex flex-col">
                                <div class="p-3">
                                    <div class="flex flex-col gap-2">
                                        <div class="form-check">
                                            <input wire:model.live="system_mode" type="radio"
                                                class="form-radio  text-success" name="system_mode" id="live_mode"
                                                value="1">
                                            <label class="ms-1.5" for="live_mode">
                                                {{ __('live') }}
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input wire:model.live="system_mode" type="radio"
                                                class="form-radio text_brand" name="system_mode" id="maintenance_mode"
                                                value="2">
                                            <label class="ms-1.5" for="maintenance_mode">
                                                {{ __('maintenance') }}
                                            </label>
                                        </div>
                                    </div>
                                    <!-- /.flex -->
                                </div>
                                <!-- /.p-3 -->

                                <div class="border-t p-3 border-gray-300 dark:border-gray-700">
                                    <div class="flex items-center justify-between gap-2 text-gray-400">
                                        <span class="text-sm">
                                            <i class="mgc_calendar_line text-lg me-2"></i>
                                            <span class="align-text-bottom ">
                                                {{ __('last update') }}
                                            </span>
                                        </span>

                                        <span class="text-sm">
                                            <i class="mgc_comment_line text-lg me-2"></i>
                                            <span class="align-text-bottom">
                                                {{ $system_mode_updated_at }}
                                            </span>
                                        </span>
                                    </div>
                                    <!-- /.flex -->
                                </div>
                                <!-- /.border-->
                            </div>
                            <!-- /.flex -->
                        </div>
                        <!-- /.card -->

                        <!-- ##### End: System Mode ##### -->

                    </div>
                    <!-- /.grid -->

                </div>
                <!-- /.flex -->
            </div>
            <!-- /.p-3 -->
        </x-backend.layout.settings-page-layout>
    </x-backend.addons.card-component>

</main>
