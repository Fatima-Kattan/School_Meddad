<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield ('title', 'Dashboard') | {{ config('app.name', 'Laravel') }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>

<body>
    <div class="sidebar-overlay" id="sidebarOverlay" onclick="toggleSidebar()"></div>

    <div class="dashboard-wrapper">
        <!-- ===== SIDEBAR ===== -->
        @include('dashboard.components.sidebar')

        <!-- ===== MAIN CONTENT ===== -->
        <div class="main-content">
            <!-- ===== NAVBAR ===== -->
            @include('dashboard.components.navbar')

            <!-- ===== BREADCRUMB ===== -->
            {{--   <div class="col-sm-20 ml-8 mt-10 ">
                <ol class="breadcrumb float-sm-left">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a>
                    </li>
                    @yield('breadcrumb')
                </ol>
            </div> --}}
                        <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right ms-64 mt-5">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a>
                                </li>
                                @yield('breadcrumb')
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ===== PAGE CONTENT ===== -->
            <div class="page-content">
                @yield('content')
            </div>

            <!-- ===== FOOTER ===== -->
            @include('dashboard.components.footer')
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // ===== Toggle Sidebar =====
        function toggleSidebar() {
            document.querySelector('.sidebar').classList.toggle('show');
            document.querySelector('.sidebar-overlay').classList.toggle('show');
        }

        // ===== Auto close sidebar on resize =====
        window.addEventListener('resize', function() {
            if (window.innerWidth > 768) {
                document.querySelector('.sidebar').classList.remove('show');
                document.querySelector('.sidebar-overlay').classList.remove('show');
            }
        });

        // ===== Active link highlight =====
        document.addEventListener('DOMContentLoaded', function() {
            const currentUrl = window.location.pathname;
            document.querySelectorAll('.sidebar .nav-link').forEach(link => {
                const href = link.getAttribute('href');
                if (href && href !== '#' && currentUrl.includes(href)) {
                    link.classList.add('active');
                }
            });
        });
    </script>

    @stack('scripts')
</body>

</html>
