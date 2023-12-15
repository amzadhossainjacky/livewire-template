<main class="flex-grow">
    <x-backend.partials.breadcrumb-component :pageTitle="$page_title" :breadcrumbLinks="$breadcrumb_links">
    </x-backend.partials.breadcrumb-component>
    <x-backend.addons.card-component cardTitle="show" :cardAddonButtons="$card_addon_buttons">

        <!-- @Author: Md. Asad Sheikh Sujat <mdasadask@gmail.com> -->
        <main class="flex-grow p-6">
            <div class="flex flex-col gap-6">
                <div class="card">
                    <div class="card-header">
                        <div class="content-center">
                            <img src="{{ Vite::image('user-6.jpg') }}" alt="">
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="grid lg:grid-cols-3 gap-6">
                            <div>
                                <label for="simpleinput"
                                    class="text-gray-800 text-sm font-medium inline-block mb-2">Text</label>
                                <input type="text" id="simpleinput" class="form-input">
                            </div>
                            <div>
                                <label for="example-email"
                                    class="text-gray-800 text-sm font-medium inline-block mb-2">Email</label>
                                <input type="email" id="example-email" name="example-email" class="form-input"
                                    placeholder="Email">
                            </div>
                            <div>
                                <label for="example-password"
                                    class="text-gray-800 text-sm font-medium inline-block mb-2">Password</label>
                                <input type="password" id="example-password" class="form-input" value="password">
                            </div>
                            <div>
                                <label for="example-palaceholder"
                                    class="text-gray-800 text-sm font-medium inline-block mb-2">Placeholder</label>
                                <input type="text" id="example-palaceholder" class="form-input"
                                    placeholder="placeholder">
                            </div>
                            <div>
                                <label for="example-select"
                                    class="text-gray-800 text-sm font-medium inline-block mb-2">Input Select</label>
                                <select class="form-select" id="example-select">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- @Author: Md. Asad Sheikh Sujat <mdasadask@gmail.com> -->


        <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
            <div class="col-span-1">
                <div class="card p-3">
                    <div class="flex justify-center items-center mb-4">
                        <h4 class="card-title">{{ __('image upload') }}</h4>
                    </div>
                    <div class="file_upload_custom_container">
                        <input id="attachment" type="file" class="file_upload_custom" multiple>
                        <i class="{{ _icons('upload') }} text-8xl text-gray-400"></i>
                    </div>
                </div>
                <!-- /.card -->

                <div class="card_bordered mt-3 ">
                    <div class="card-header">
                        <div class="flex justify-between items-center">
                            <h4 class="card-title">{{ __('change password') }}</h4>
                            <div class="flex items-center gap-2">

                                <button wire:click="profile_password_update" type="submit"
                                    wire:loading.class.remove="btn_send" class="btn_send btn_inactive"
                                    wire:loading.attr="disabled">
                                    <div wire:loading wire:target="profile_password_update" class="ihelp_loader">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                    <i class="{{ _icons('save') }}" wire:loading.remove
                                        wire:target="profile_password_update"></i>
                                    {{ __('save') }}
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header-->
                    <div class="p-6">
                        <div class="relative">
                            <input wire:model.live="state.password" type="password" class="form-input ps-11"
                                id="password">
                            <div class="absolute inset-y-0 start-4 flex items-center z-20">
                                <i class="{{ _icons('password') }} text-gray-400"></i>
                            </div>
                        </div>

                        @if ($errors->has('password'))
                            <div class="text_help text-red-500"> {{ $errors->first('password') }}</div>
                        @else
                            <div class="text_help">{{ __('password optional') }}</div>
                        @endif
                        <!-- /.grid-->
                    </div>
                    <!-- /.p-->
                </div>

            </div>
            <!-- /.col-span -->
            <div class="col-span-2">
                <div class="card p-3">
                    <div class="col_left grid grid-cols-1 md:grid-cols-1 gap-3">
                        <div class="col-span-1 md:col-span-1">
                            <div class="card-header">
                                <div class="px-2">
                                    <div class="text-center">
                                        <h4 class="card-title">{{ __('user info') }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-1 md:col-span-1">
                            <p class="ps-6 my-1">
                                <strong>Name</strong> :
                                <span
                                    class="inline-flex items-center gap-1.5 rounded-full text-xs font-medium text-black my-2">
                                    {{ @$state['name'] }}
                                </span>
                            </p>
                            <p class="ps-6 my-1">
                                <strong>Email</strong> :
                                <span
                                    class="inline-flex items-center gap-1.5 rounded-full text-xs font-medium text-black my-2">
                                    {{ @$state['email'] }}
                                </span>
                            </p>
                            <p class="ps-6 my-1">
                                <strong>Code</strong> :
                                <span
                                    class="inline-flex items-center gap-1.5 rounded-full text-xs font-medium text-black my-2">
                                    {{ @$state['code'] }}
                                </span>
                            </p>
                            <p class="ps-6 my-1">
                                <strong>Mobile</strong> :
                                <span
                                    class="inline-flex items-center gap-1.5 rounded-full text-xs font-medium text-black my-2">
                                    {{ @$state['mobile'] }}
                                </span>
                            </p>
                            <p class="ps-6 my-1">
                                <strong>Gender</strong> :
                                <span
                                    class="inline-flex items-center gap-1.5 rounded-full text-xs font-medium text-black my-2 ">{{ _get_genders(@$state['gender']) }}
                                </span>
                            </p>

                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col-span -->

        </div>
        <!-- /.grid -->



    </x-backend.addons.card-component>

</main>
<!-- /.flex -->
