<nav class="sticky top-0 z-50 w-full bg-red-800 text-white shadow backdrop-blur">
    <div class="lg:hidden">
        <label class="swap swap-rotate text-white p-3 h-14">
            <input id="menu-toggle" type="checkbox" class="hidden" />
            <svg class="swap-off fill-current" xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                viewBox="0 0 512 512">
                <path d="M64,384H448V341.33H64Zm0-106.67H448V234.67H64ZM64,128v42.67H448V128Z" />
            </svg>
            <svg class="swap-on fill-current !-top-8 relative" xmlns="http://www.w3.org/2000/svg" width="32"
                height="32" viewBox="0 0 512 512">
                <polygon
                    points="400 145.49 366.51 112 256 222.51 145.49 112 112 145.49 222.51 256 112 366.51 145.49 400 256 289.49 366.51 400 400 366.51 289.49 256 400 145.49" />
            </svg>
        </label>
    </div>

    <div id="menu"
        class="hidden mx-auto md:flex flex-col justify-between px-4 py-3 sm:px-6 md:items-center lg:flex lg:flex-row lg:px-8">

        <div class="flex items-center space-x-4 w-full justify-center md:justify-start">
            <img src="{{ asset('homepage/images/tnut-logo.png') }}" alt="TNUT Logo" class="h-16 w-auto">
            <div class="text-center md:text-left">
                <p class="text-xs md:text-sm uppercase">Đại học Thái Nguyên</p>
                <h1 class="text-xl md:text-2xl font-extrabold leading-tight">TRƯỜNG ĐẠI HỌC KỸ THUẬT CÔNG
                    NGHIỆP</h1>
                <p class="text-xs md:text-sm">THAINGUYEN UNIVERSITY OF TECHNOLOGY</p>
            </div>
        </div>
        <div class="text-normal flex w-full flex-col text-xs lg:flex-row lg:divide-x-0 lg:divide-y-0">


            <ul class="flex flex-wrap justify-center md:justify-end items-center space-x-4 md:space-x-6 text-sm md:text-base font-medium">
                <li><a href="/" class="hover:text-yellow-300 flex items-center space-x-1"><span>🏠</span><span>Trang
                            chủ</span></a></li>
                <li><a href="/gioi-thieu" class="hover:text-yellow-300">Giới thiệu</a></li>
                <li><a href="/lien-he" class="hover:text-yellow-300">Liên hệ</a></li>

                <li class="relative flex-row whitespace-nowrap">
                    @guest
                    <a class="hover:text-yellow-300" href="{{ route('login') }}">
                        <span class="border-white px-2 lg:border-l">
                            🔐 Đăng nhập
                        </span>
                    </a>
                    @else

                    <a class="hover:text-yellow-300" href="{{ route('dashboard') }}">
                        <span class="border-white px-2 lg:border-l">
                            🛠️ Quản trị
                        </span>
                    </a>

                    <!-- Liên kết đăng xuất -->
                    <a class="hover:text-yellow-300" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <span class="border-white px-2 lg:border-l">
                            🚪 Đăng xuất
                        </span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    @endguest
                </li>
            </ul>


        </div>
        <div>
            <form class="relative flex !w-40 items-center lg:w-auto" action="">
                <input name="q" type="text" class="h-8 w-full border-none pl-6 lg:h-7" />
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="absolute left-1 h-4 w-4 text-slate-600">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>
            </form>
        </div>
    </div>

    <script>
        //bật tắt ở mobile
        document.getElementById("menu-toggle").addEventListener("change", function() {
            const menu = document.getElementById("menu");
            if (this.checked) {
                menu.classList.remove("hidden");
                menu.classList.add("flex");
            } else {
                menu.classList.add("hidden");
                menu.classList.remove("flex");
            }
        });

        //hover menu
        document.querySelectorAll("li.relative").forEach((menuItem) => {
            const subMenu = menuItem.querySelector("div.hidden");
            menuItem.addEventListener("mouseenter", () => {
                if (subMenu) {
                    subMenu.classList.remove("hidden");
                }
            });
            menuItem.addEventListener("mouseleave", () => {
                if (subMenu) {
                    subMenu.classList.add("hidden");
                }
            });
        });
    </script>
</nav>