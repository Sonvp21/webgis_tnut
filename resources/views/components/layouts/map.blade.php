<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="app-url" content="{{ config('app.url') }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <style>
        html,
        body {
            height: 100%;
            margin: 0;
        }

        .tnut-red {
            background-color: #a61d37;
        }

        .tnut-text-red {
            color: #a61d37;
        }

        .tnut-hover:hover {
            color: #a61d37;
        }
    </style>

    <script defer src="https://unpkg.com/@alpinejs/persist@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://unpkg.com/alpine@3.x.x/dist/cdn.min.js"></script>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/map/map.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen">
        {{-- Header gộp Navigation --}}
        <header class="tnut-red text-white">
            <div class="container px-4 py-3">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between">

                    {{-- Logo và tên trường --}}
                    <div class="flex items-center space-x-4 w-full justify-center md:justify-start">
                        <img src="/images/tnut-logo.png" alt="TNUT Logo" class="h-16 w-auto">
                        <div class="text-center md:text-left">
                            <p class="text-xs md:text-sm uppercase">Đại học Thái Nguyên</p>
                            <h1 class="text-xl md:text-2xl font-extrabold leading-tight">TRƯỜNG ĐẠI HỌC KỸ THUẬT CÔNG
                                NGHIỆP</h1>
                            <p class="text-xs md:text-sm">THAINGUYEN UNIVERSITY OF TECHNOLOGY</p>
                        </div>
                    </div>

                    {{-- Navigation menu --}}
                    <nav class="mt-4 md:mt-0 w-full">
                        <ul
                            class="flex flex-wrap justify-center md:justify-end items-center space-x-4 md:space-x-6 text-sm md:text-base font-medium">
                            <li><a href="/"
                                    class="hover:text-yellow-300 flex items-center space-x-1"><span>🏠</span><span>Trang
                                        chủ</span></a></li>
                            <li><a href="{{ route('gioi-thieu') }}" class="hover:text-yellow-300">Giới thiệu</a></li>
                            <li><a href="/lien-he" class="hover:text-yellow-300">Liên hệ</a></li>
                            {{-- Đăng nhập / Đăng xuất --}}
                            @guest
                                <li>
                                    <a href="{{ route('login') }}"
                                        class="hover:text-yellow-300 flex items-center space-x-1">
                                        <span>🔐</span><span>Đăng nhập</span>
                                    </a>
                                </li>
                            @else
                                <li>
                                    <a href="#"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                        class="hover:text-yellow-300 flex items-center space-x-1 cursor-pointer">
                                        <span>🔓</span><span>Đăng xuất</span>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                        @csrf
                                    </form>
                                </li>
                            @endguest
                        </ul>
                    </nav>

                </div>
            </div>
        </header>
        {{-- Tìm kiếm --}}
        <div class="bg-gray-100 py-2 px-4 shadow-md">
            <div class="max-w-7xl mx-auto flex items-center space-x-2">
                <input type="text" placeholder="Tìm địa điểm hoặc cột mốc trên bản đồ TNUT"
                    class="flex-grow px-4 py-2 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-tnut-red">
                <button class="bg-tnut-red text-white px-4 py-2 rounded hover:bg-red-700">🔍</button>
            </div>
        </div>
        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
</body>

</html>