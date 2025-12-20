<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/favicon.png') }}" />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.44.0/tabler-icons.min.css">
    <!-- Core Css -->
    <link rel="stylesheet" href="{{ asset('assets/css/theme.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.css" rel="stylesheet">

    <title>Modernize TailwindCSS HTML Admin Template</title>
    @yield('style')
    @stack('style')
</head>
<body class="bg-info/5">

    <!--start the project-->
    <main>
        <div id="main-wrapper" class="flex h-screen">
            @include('admin.layouts.sidebar')

            <div class="w-full page-wrapper flex flex-col">
                <!-- HEADER -->
                <div class="shrink-0">
                    @include('admin.layouts.header')
                </div>

                <!-- CONTENT (SCROLL DI SINI) -->
                <main class="flex-1 overflow-y-auto px-4 pb-4">
                    @yield('content')

                    {{-- global components modal --}}
                    @include('components.delete-modal-component')
                    @include('components.confirm-modal-component')
                </main>
            </div>
        </div>
    </main>
    <!-- Main Content End -->

    </div>
    </div>
    <!--end of project-->
    </main>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.js"></script>

    <script src="{{ asset('assets/libs/simplebar/dist/simplebar.min.js') }} "></script>
    <script src="{{ asset('assets/libs/iconify-icon/dist/iconify-icon.min.js') }} "></script>
    <script src="{{ asset('assets/libs/preline/dist/preline.js') }} "></script>
    <script src="{{ asset('assets/libs/@preline/dropdown/index.js') }} "></script>
    <script src="{{ asset('assets/libs/@preline/overlay/index.js') }} "></script>
    <script src="{{ asset('assets/js/sidebarmenu.js') }} "></script>

    <script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>

    @yield('script')
    @stack('script')
</body>

</html>
