<main>
    {{-- @json($is_maintenance_mode) --}}
    <!-- ###### Scheduled Maintenance-->
    @if ($is_maintenance_mode)
        {{-- <div
            class="bg-gradient-to-r from-rose-100 to-teal-100 fixed top-0 left-0 w-full h-full flex items-center justify-center">
            <div class="h-screen w-screen flex justify-center items-center">
                <div class="flex flex-col justify-center text-center gap-6">
                    <a href="index.html" class="flex justify-center mx-auto">
                        <img class="h-6 block dark:hidden" src="assets/images/logo-dark.png" alt="">
                        <img class="h-6 hidden dark:block" src="assets/images/logo-light.png" alt="">
                    </a>
                    <div class="flex items-center justify-center gap-2">
                        <span
                            class="inline-block items-center gap-1.5 py-3 px-8 rounded-full text-3sl font-semibold bg-red-500 text-white">
                            {{ __('notice') }}</span>
                    </div>
                    <h1 class="text-4xl font-bold tracking-tight dark:text-gray-100">
                        {{ __('we are under scheduled maintenance') }}
                    </h1>
                    <p class="text-base text-gray-600 dark:text-gray-300">
                        {{ __('for more details please talk to system administrator') }}
                    </p>
                </div>
            </div>
        </div> --}}
    @endif
    <!-- ###### End: Scheduled Maintenance-->

    <div class="h-screen w-screen flex justify-center items-center">
        <div class="2xl:w-1/4 lg:w-1/3 md:w-1/2 w-full">
            <!-- ###### Scheduled Maintenance-->
            @if ($is_maintenance_mode)
                <div class="space-y-4 mb-3">
                    <div class="bg-yellow-50 border border-yellow-200 rounded-md p-4" role="alert">

                        <div class="flex justify-center mb-3">
                            <span
                                class="inline-block items-center gap-1.5 py-3 px-8 rounded-full text-3sl font-semibold bg-red-500 text-white">
                                {{ __('notice') }}</span>
                        </div>
                        <div class="flex justify-center items-center flex-col">
                            <h3 class="text-lg text-yellow-800 font-semibold">
                                {{ __('we are under scheduled maintenance') }}
                            </h3>
                            <div class="mt-1 text-sm text-yellow-700">
                                {{ __('for more details please talk to system administrator') }}
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <!-- ###### End: Scheduled Maintenance-->

            <div class="card overflow-hidden sm:rounded-md rounded-none">
                <form wire:submit.prevent="login_process">
                    <div class="p-6">
                        <a class="flex items-center justify-center mb-8 ">
                            <img class="" src="{{ Vite::image('logo.png') }}" alt="logo">
                        </a>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-600 dark:text-gray-200 mb-2"
                                for="email">
                                {{ __('email address') }}
                            </label>
                            <input wire:model.lazy="email" id="email"
                                class="form-input @error('email') is-invalid @enderror" type="email">

                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-600 dark:text-gray-200 mb-2"
                                for="password">
                                {{ __('password') }}
                            </label>
                            <input wire:model.lazy="password" id="password"
                                class="form-input  @error('password') is-invalid @enderror" type="password">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        <div class="flex justify-center mb-6">
                            <button class="btn w-full text-white bg-primary" type="submit"> Log In </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

    {{-- @push('login_js')
        <script module>
            /* Toast notification for invalid request */

            window.addEventListener('invalid_credentials', event => {
                alert('ok');
                console.log(event);

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
    @endpush --}}
</main>
