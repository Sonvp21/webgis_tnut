<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/png" href="{{ asset('homepage/logo_main.png') }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>{{ config('app.name', 'SHTT') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')

    <link href="https://kit-pro.fontawesome.com/releases/v5.12.1/css/pro.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.min.js"></script>

    <style>
        /* Custom NProgress */
        #nprogress .bar {
            background: #38b2ac !important;
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
        <div class="relative h-auto #f6f9ff transition-all">
            <div>
                {{ $slot }}
            </div>
        </div>
    </main>

    <x-admin.alerts.toast />
    @stack('bottom_scripts')
</body>

</html>
