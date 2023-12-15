<!DOCTYPE html>
<html lang="en">

<head>
    {{ Vite::useBuildDirectory('/frontend') }}
    <meta charset="utf-8">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
    <meta name="keywords" content="cmr, ihlepbd.com crm, ihelp crm, praava crm, crm product in bangladesh">
    <meta content="ihelpbd.com" name="author">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Page Title' }} : Praava CRM</title>

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ Vite::frontend_image('favicon.ico') }}">

    <!-- Theme Config Js -->
    {{-- <script src="assets/js/config.js"></script> --}}
    @livewireStyles
    @vite(['resources/css/frontend_app.css', 'resources/js/frontend_app.js'])

</head>

<body>

    <div class="bg-gradient-to-r from-rose-100 to-teal-100 dark:from-gray-700 dark:via-gray-900 dark:to-black">

        {{-- @php
        dump($email);
    @endphp --}}
        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        {{ $slot }}

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->



    <script>
        window.addEventListener('invalid_credentials', event => {
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
    <script>
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
    </script>
    @stack('dynamic_js')
</body>

</html>
