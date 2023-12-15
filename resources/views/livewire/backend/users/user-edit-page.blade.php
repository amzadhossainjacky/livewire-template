<main class="flex-grow">
    <x-backend.partials.breadcrumb-component :pageTitle="$page_title" :breadcrumbLinks="$breadcrumb_links">
    </x-backend.partials.breadcrumb-component>
    <div class="grid lg:grid-cols-3 gap-6">
        <div class="lg:col-span-3">
            <x-backend.addons.card-component cardTitle="edit user" :cardAddonButtons="$card_addon_buttons">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mt-6">
                    <div class="md:col-span-2">
                        <label for="name"
                            class="text-gray-800 text-sm font-medium inline-block mb-2">{{ __('full name') }}</label>
                        <div class="relative">
                            <input wire:model.live="state.name" type="text" class="form-input ps-11" id="name">
                            <div class="absolute inset-y-0 start-4 flex items-center z-20">
                                <i class="{{ _icons('name_first') }} text-gray-400"></i>
                            </div>
                        </div>

                        @if ($errors->has('name'))
                            <div class="text_help text-red-500"> {{ $errors->first('name') }}</div>
                        @else
                            <div class="text_help">{{ __('full name required') }}</div>
                        @endif
                    </div>
                    <!-- /.col-span -->

                    <div class="md:col-span-2">
                        <label for="email"
                            class="text-gray-800 text-sm font-medium inline-block mb-2">{{ __('email address') }}</label>
                        <div class="relative">
                            <input wire:model.live="state.email" type="email" class="form-input ps-11" id="email">
                            <div class="absolute inset-y-0 start-4 flex items-center z-20">
                                <i class="{{ _icons('email') }} text-gray-400"></i>
                            </div>
                        </div>

                        @if ($errors->has('email'))
                            <div class="text_help text-red-500"> {{ $errors->first('email') }}</div>
                        @else
                            <div class="text_help">{{ __('valid email required') }}</div>
                        @endif
                    </div>
                    <!-- /.col-span -->


                    <div class="md:col-span-2">
                        <label for="code"
                            class="text-gray-800 text-sm font-medium inline-block mb-2">{{ __('employee code') }}</label>
                        <div class="relative">
                            <input wire:model.live="state.code" type="text" class="form-input ps-11"
                                id="code">
                            <div class="absolute inset-y-0 start-4 flex items-center z-20">
                                <i class="{{ _icons('id') }} text-gray-400"></i>
                            </div>
                        </div>

                        @if ($errors->has('code'))
                            <div class="text_help text-red-500"> {{ $errors->first('code') }}</div>
                        @else
                            <div class="text_help">{{ __('employee code required') }}</div>
                        @endif
                    </div>
                    <!-- /.col-span -->

                    <div class="md:col-span-2">
                        <label for="mobile"
                            class="text-gray-800 text-sm font-medium inline-block mb-2">{{ __('mobile number') }}</label>
                        <div class="relative">
                            <input wire:model.live="state.mobile" type="number" class="form-input ps-11" id="mobile">
                            <div class="absolute inset-y-0 start-4 flex items-center z-20">
                                <i class="{{ _icons('telephone') }} text-gray-400"></i>
                            </div>
                        </div>

                        @if ($errors->has('mobile'))
                            <div class="text_help text-red-500"> {{ $errors->first('mobile') }}</div>
                        @else
                            <div class="text_help">{{ __('mobile required') }}</div>
                        @endif
                    </div>
                    <!-- /.col-span -->

                    <div class="md:col-span-2">
                        <label for="password"
                            class="text-gray-800 text-sm font-medium inline-block mb-2">{{ __('password')}}</label>
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
                    </div>
                    <!-- /.col-span -->

                    <div class="md:col-span-1">
                        <label for="gender"
                            class="text-gray-800 text-sm font-medium inline-block mb-2">{{ __('gender') }}</label>
                        <div class="relative">
                            <select wire:model.live="state.gender" class="form-select" id="gender">
                                <option value="" selected disabled>{{ __('select gender') }}</option>
                                @foreach (_get_genders() as $key => $gender)
                                    <option value="{{$key}}">{{ __($gender) }}</option>
                                @endforeach
                            </select>
                        </div>
                        @if ($errors->has('gender'))
                            <div class="text_help text-red-500"> {{ $errors->first('gender') }}</div>
                        @else
                            <div class="text_help">{{ __('gender required') }}</div>
                        @endif
                    </div>
                    <!-- /.col-span -->

                    <div class="md:col-span-1">
                        <label for="role"
                            class="text-gray-800 text-sm font-medium inline-block mb-2">{{ __('role') }}</label>
                        <div class="relative">
                            <select wire:model.live="state.role" class="form-select" id="role">
                                <option value="" selected>{{ __('select role') }}</option>
                                @foreach($roles as $role)
                                    <option value="{{ $role['id']}}">{{ $role['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        @if ($errors->has('role'))
                            <div class="text_help text-red-500"> {{ $errors->first('role') }}</div>
                        @else
                            <div class="text_help">{{ __('role optional') }}</div>
                        @endif
                    </div>
                    <!-- /.col-span -->
                </div>
                <!-- /.grid -->

                <div class="grid sm:flex flex-row-reverse items-center justify-between gap-3 mt-6 ihelp_card_footer">
                    <div class="flex items-center">
                        <input wire:model.live="state.is_active" class="form-switch" type="checkbox" id="is_active" @if (isset($state['is_active']) && $state['is_active'] == 1) checked @endif>
                        <label class="ms-1.5" for="is_active">{{ __('active or inactive') }}</label>
                    </div>
                    <!-- /.flex -->
                    <div class="flex items-center gap-3">
                        <button wire:click="clear" type="button" class="btn bg-secondary text-white gap-2">
                            <i class="{{ _icons('reset') }}"></i>
                            {{ __('reset') }}
                        </button>
                        <button wire:click.prevent="update" wire:loading.class.remove="btn_save" class="btn_save"
                            wire:loading.class="btn_loading" wire:loading.attr="disabled">
                            <div wire:loading wire:target="update" class="ihelp_loader_for_btn">
                                <span class="sr-only">Loading...</span>
                            </div>
                            <i class="{{ _icons('save') }}" wire:loading.remove wire:target="update"></i>
                            {{ __('update') }}
                        </button>
                    </div>

                </div>
                <!-- /.grid -->
            </x-backend.addons.card-component>
            <!-- /x-backend.addons.card-component -->

        </div>
        <!-- /.col -->

    </div>
    <!-- /.grid -->
</main>
<!-- /.flex -->
