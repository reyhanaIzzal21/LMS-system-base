<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.44.0/tabler-icons.min.css">
    <!-- Core Css -->
    <link rel="stylesheet" href="{{ asset('assets/css/theme.css') }}" />
    <title>Modernize TailwindCSS HTML Admin Template</title>
    @yield('style')
    @stack('style')
</head>

<body class="bg-info/5">
    <main>
        <!--start the project-->
        <div id="main-wrapper" class="flex ">
            @include('admin.layouts.sidebar')

            <div class="w-full page-wrapper overflow-hidden">
                <!--  Header Start -->
                <div class=" w-full">
                    <!-- ========== HEADER ========== -->
                    @include('admin.layouts.header')
                    <!-- ========== END HEADER ========== -->
                </div>
                <!--  Header End -->

                <!-- Main Content -->
                <main class="h-full overflow-y-auto  max-w-full  pt-4">
                    @yield('content')
                </main>
            </div>
        </div>
    </main>
    <!-- Main Content End -->

    </div>
    </div>
    <!--end of project-->
    </main>


    @yield('script')
    @stack('script')
    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }} "></script>
    <script src="{{ asset('assets/libs/simplebar/dist/simplebar.min.js') }} "></script>
    <script src="{{ asset('assets/libs/iconify-icon/dist/iconify-icon.min.js') }} "></script>
    <script src="{{ asset('assets/libs/preline/dist/preline.js') }} "></script>
    <script src="{{ asset('assets/libs/@preline/dropdown/index.js') }} "></script>
    <script src="{{ asset('assets/libs/@preline/overlay/index.js') }} "></script>
    <script src="{{ asset('assets/js/sidebarmenu.js') }} "></script>
</body>

</html>
