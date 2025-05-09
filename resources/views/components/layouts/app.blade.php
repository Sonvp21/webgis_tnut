<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="app-url" content="{{ config('app.url') }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <style>
        html, body {
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

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen">
        
        <!-- Header -->
        <header class="tnut-red text-white shadow-md">
            <div class=" px-4 py-4">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                    
                    <!-- Logo và Tên trường -->
                    <div class="flex items-center justify-center md:justify-start space-x-4 flex-wrap md:flex-nowrap w-full">
                        <!-- Logo -->
                        <img src="/images/tnut-logo.png" alt="Logo Trường Đại học Kỹ thuật Công nghiệp Thái Nguyên" class="h-16 w-auto shrink-0">
                    
                        <!-- Tên trường -->
                        <div class="flex flex-col leading-tight whitespace-nowrap overflow-hidden">
                            <p class="text-xs md:text-sm uppercase">Đại học Thái Nguyên</p>
                            <h1 class="text-xl md:text-2xl font-extrabold truncate">TRƯỜNG ĐẠI HỌC KỸ THUẬT CÔNG NGHIỆP</h1>
                            <p class="text-xs md:text-sm truncate">THAINGUYEN UNIVERSITY OF TECHNOLOGY</p>
                        </div>
                    </div>

                    <!-- Navigation -->
                    <nav class="mt-4 md:mt-0 w-full">
                        <ul class="pl-6 flex flex-wrap justify-center md:justify-end items-center gap-2 md:gap-4 text-sm md:text-base font-medium">
                            <li><a href="/" class="hover:text-yellow-300 flex items-center space-x-1"><span>🏠</span><span>Trang chủ</span></a></li>
                            <li><a href="{{ route('ktx.index') }}" class="hover:text-yellow-300">quản trị ktx</a></li>
                            <li><a href="{{ route('campus.index') }}" class="hover:text-yellow-300">quản trị khuân viên</a></li>
                            <li><a href="{{ route('cantine.index') }}" class="hover:text-yellow-300">quản trị canteen</a></li>
                            <li><a href="{{ route('conference.index') }}" class="hover:text-yellow-300">quản trị conference</a></li>
                            <li><a href="{{ route('gate.index') }}" class="hover:text-yellow-300">quản trị gate</a></li>
                            <li><a href="{{ route('giangduong.index') }}" class="hover:text-yellow-300">quản trị giảng đường</a></li>
                            <li><a href="{{ route('hoitruong.index') }}" class="hover:text-yellow-300">quản trị hội trường</a></li>
                            <li><a href="{{ route('thuvien.index') }}" class="hover:text-yellow-300">quản trị thư viện</a></li>
                            <li><a href="{{ route('vpkhoa.index') }}" class="hover:text-yellow-300">quản trị VPkhoa</a></li>
                            <li><a href="{{ route('xuong.index') }}" class="hover:text-yellow-300">quản trị Xưởng</a></li>
                            <li><a href="{{ route('yte.index') }}" class="hover:text-yellow-300">quản trị Ytế</a></li>
                            
                            @guest
                                <li>
                                    <a href="{{ route('login') }}" class="hover:text-yellow-300 flex items-center space-x-1">
                                        <span>🔐</span><span>Đăng nhập</span>
                                    </a>
                                </li>
                            @else
                                <li>
                                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
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

        <!-- Tìm kiếm -->
        <div class="bg-gray-100 py-3 px-4 shadow">
            <div class="max-w-7xl mx-auto flex items-center gap-2">
                <input id="search-input" type="text" placeholder="Tìm địa điểm hoặc cột mốc trên bản đồ TNUT"
                       class="flex-grow px-4 py-2 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-tnut-red">
                <button onclick="searchLocation()"
                        class="bg-tnut-red text-white px-4 py-2 rounded hover:bg-red-700 transition duration-200">🔍</button>
            </div>
        </div>

        <!-- Nội dung chính -->
        <main>
            {{ $slot }}
            <div id="map" class="w-full h-[600px]"></div>
        </main>
    </div>

    <!-- Popup bản đồ -->
    <div id="popup" class="ol-popup hidden absolute bg-white border rounded shadow-md p-2 z-50">
        <div id="popup-content"></div>
    </div>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ol/6.9.0/ol.js"></script>
    <script>
        const APP_URL = "{{ url('') }}";
    </script>
    <script src="{{ asset('js/map.js') }}"></script>

    <script>
        // Hàm tìm kiếm vị trí
        function searchLocation() {
            const query = document.getElementById('search-input').value.trim();
            if (!query) {
                alert("Vui lòng nhập từ khóa tìm kiếm.");
                return;
            }

            fetch(`/api/search-geojson?q=${encodeURIComponent(query)}`)
                .then(res => res.json())
                .then(data => {
                    const features = new ol.format.GeoJSON().readFeatures(data, {
                        featureProjection: 'EPSG:3857'
                    });

                    if (features.length === 0) {
                        alert("Không tìm thấy kết quả phù hợp.");
                        return;
                    }

                    const searchLayer = new ol.layer.Vector({
                        source: new ol.source.Vector({ features }),
                        style: new ol.style.Style({
                            stroke: new ol.style.Stroke({ color: '#FF0000', width: 2 }),
                            fill: new ol.style.Fill({ color: 'rgba(255,0,0,0.2)' }),
                        })
                    });

                    map.addLayer(searchLayer);
                    map.getView().fit(searchLayer.getSource().getExtent(), {
                        padding: [50, 50, 50, 50],
                        duration: 1000
                    });
                })
                .catch(error => {
                    console.error("Lỗi khi tìm kiếm:", error);
                    alert("Đã xảy ra lỗi khi tìm kiếm.");
                });
        }

        // Khởi tạo bản đồ
        const map = new ol.Map({
            target: 'map',
            layers: [
                new ol.layer.Tile({
                    source: new ol.source.OSM(),
                })
            ],
            view: new ol.View({
                center: [0, 0],
                zoom: 2,
            }),
        });
    </script>
</body>
</html>
