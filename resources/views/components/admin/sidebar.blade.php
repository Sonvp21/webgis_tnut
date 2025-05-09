<aside class="bg-base-100">
    <div data-sveltekit-preload-data
        class="bg-base-100 sticky h-12 top-0 z-20 hidden items-center gap-2 bg-opacity-90 px-4 py-2 backdrop-blur lg:flex">
        <a href="#" aria-current="page" aria-label="Homepage" class="flex-0 px-2">
            <div class="font-title inline-flex text-lg md:text-2xl">MAP - TNUT</div>
        </a>
    </div>
    <ul class="menu py-0">
        <li><a href="{{ route('dashboard') }}"
                class="group font-semibold {{ Request::routeIs('dashboard') ? 'active' : '' }}">
                <i class="fab fa-dashcube"></i>Bảng điều khiển
            </a>
        </li>
        <li></li>
        <li>
            <details {{ Request::routeIs('admin.ktxs.*') || Request::routeIs('admin.campus.*') ? 'open' : '' }}>
                <summary class="font-semibold group">
                    <i class="fad fa-map"></i>Bản đồ
                </summary>
                <ul>
                    <li>
                        <a href="{{ route('admin.ktxs.index') }}"
                            class="group font-semibold {{ Request::routeIs('admin.ktxs.*') ? 'active' : '' }}">
                            <i class="far fa-map-marked"></i>
                            Ký túc xá
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.campus.index') }}"
                            class="group font-semibold {{ Request::routeIs('admin.campus.*') ? 'active' : '' }}">
                            <i class="far fa-map-marked-alt"></i>
                            Khuôn viên
                        </a>
                    </li>
                </ul>
            </details>
        </li>
        <li>
            <a {{ Request::routeIs('admin.contacts.*') ? 'open' : '' }} href="{{ route('admin.contacts.index') }}"
                class="group font-semibold {{ Request::routeIs('admin.contacts.*') ? 'active' : '' }}">
                <i class="far fa-mail-bulk"></i>Liên hệ
            </a>
        </li>

        <li>
            <details
                {{ Request::routeIs('admin.users.*') || Request::routeIs('admin.roles.*') || Request::routeIs('admin.permissions*') ? 'open' : '' }}>
                <summary class="group font-semibold">
                    <i class="fal fa-file-user"></i>Tài khoản
                </summary>
                <ul>
                    <li>
                        <a href="{{ route('admin.users.index') }}"
                            class="group font-semibold {{ Request::routeIs('admin.users.*') ? 'active' : '' }}">
                            <i class="fas fa-users"></i>
                            Danh sách tài khoản
                        </a>
                    </li>
                </ul>
            </details>
        </li>
        <li></li>
        <li><a target="_blank" href="{{ route('home') }}" class="font-semibold group">
                <i class="fad fa-home-alt"></i>
                Trang chủ
            </a>
        </li>
    </ul>
    <script>
        function scrollToOpenMenu() {
            const openDetails = document.querySelector('details[open]');
            if (openDetails) {
                openDetails.scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });
            }
        }

        // Tự động thêm sự kiện onclick cho tất cả các <a> trong menu
        document.querySelectorAll('aside .menu a').forEach(link => {
            link.addEventListener('click', scrollToOpenMenu);
        });

        // Cuộn đến menu mở khi trang tải
        window.addEventListener('load', scrollToOpenMenu);

        // Hàm cuộn đến phần tử được đánh dấu là "active"
        function scrollToActiveMenu() {
            const activeLink = document.querySelector('aside .menu a.active');

            if (activeLink) {
                // Cuộn đến liên kết active với hành vi mượt mà
                activeLink.scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });
            }
        }

        // Tự động cuộn đến mục "active" khi trang tải
        window.addEventListener('load', scrollToActiveMenu);
    </script>

</aside>
