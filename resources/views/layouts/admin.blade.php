<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Title -->
    <title>{{ env('APP_NAME', 'MAP - TNUT') }}</title> <!-- Meta Tags -->
    <meta name="author" content="{{ env('APP_NAME', 'MAP - TNUT') }}">
    <meta name="keywords" content="admin, dashboard, ui, kit">
    <meta name="description"
        content="Welcome to {{ env('APP_NAME', 'MAP - TNUT') }}. Visit us at {{ env('APP_URL', 'https://gaokrongana.girc.edu.vn') }}">
    <!-- Open Graph Meta -->
    <meta property="og:title" content="{{ env('APP_NAME', 'MAP - TNUT') }}">
    <meta property="og:description"
        content="Welcome to {{ env('APP_NAME', 'MAP - TNUT') }}. Visit us at {{ env('APP_URL', 'https://gaokrongana.girc.edu.vn') }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ env('APP_URL', 'https://gaokrongana.girc.edu.vn') }}">
    <meta property="og:image" content="{{ asset('homepage/logo/logo_gaokrongana.jpg') }}"> 

    <link rel="shortcut icon" type="image/png" href="{{ asset('homepage/logo/logo_gaokrongana.jpg') }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>{{ config('app.name', 'MAP - TNUT') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')

    <link href="https://kit-pro.fontawesome.com/releases/v5.12.1/css/pro.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.min.js"></script>

    <style>
        /* Custom NProgress */
        #nprogress .bar {
            background: #57c73e !important;
            height: 2px !important;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }

        .dataTables_length select {
            padding: 4px 24px 4px 10px;
            border-radius: 10px;
        }

        /* Mobile sidebar (default hidden) */
        #sidebar {
            transform: translateX(-100%);
            transition: transform 0.3s ease-in-out;
        }

        #sidebar.open {
            transform: translateX(0);
        }

        /* Desktop sidebar (default visible) */
        @media (min-width: 1024px) {
            #sidebar {
                transform: translateX(0);
                left: 0;
            }

            #sidebar.closed {
                transform: translateX(-100%);
                /* Closed state for desktop */
            }

            #main-content {
                margin-left: 18rem;
            }

            #main-content.no-sidebar {
                margin-left: 0;
                /* Remove margin when sidebar is closed */
            }
        }
    </style>
</head>

<body class="bg-[#f6f9ff] font-sans antialiased">
    <main>
        <!-- Sidebar -->
        <aside id="sidebar"
            class="fixed z-30 h-full w-72 overflow-y-auto border-r bg-white text-slate-800 shadow-xl transition-all">
            <div class="text-sm">
                <x-admin.sidebar />
                <!-- Thêm các menu khác -->
            </div>
        </aside>

        <!-- Main Content -->
        <div id="main-content" class="relative h-auto #f6f9ff transition-all">
            <nav
                class="sticky top-0 z-20 flex h-12 w-full items-center justify-between gap-4 border-b border-slate-100 bg-white px-6 backdrop-blur">
                <div class="flex items-center gap-2 font-['Montserrat'] text-xl font-extrabold">
                    <button id="sidebar-toggle" class="cursor-pointer rounded p-1 hover:bg-slate-100">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </button>
                </div>
                <div class="flex items-center justify-end">
                    <x-admin.header />
                </div>
            </nav>

            <div>
                {{ $slot }}
            </div>
        </div>
    </main>

    <!-- Script for Sidebar -->
    <script>
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('main-content');
        const toggleButton = document.getElementById('sidebar-toggle');

        toggleButton.addEventListener('click', () => {
            const screenWidth = window.innerWidth;

            if (screenWidth < 1024) {
                // Mobile: Toggle sidebar in overlay mode
                sidebar.classList.toggle('open');
            } else {
                // Desktop: Toggle sidebar and adjust main content
                sidebar.classList.toggle('closed');
                mainContent.classList.toggle('no-sidebar');
            }
        });

        // Close sidebar on click outside on mobile
        document.addEventListener('click', function(event) {
            if (window.innerWidth < 1024) {
                const isClickInside = sidebar.contains(event.target) || toggleButton.contains(event.target);
                if (!isClickInside && sidebar.classList.contains('open')) {
                    sidebar.classList.remove('open');
                }
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            NProgress.start();
        });

        window.addEventListener('load', function() {
            NProgress.done();
        });
    </script>
    <x-admin.alerts.toast />
    @stack('bottom_scripts')
</body>

</html>
