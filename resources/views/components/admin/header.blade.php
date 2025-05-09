<div class="dropdown dropdown-bottom dropdown-end">
    <div tabindex="0" role="button" class="btn btn-ghost m-1">
        <div class="w-8 h-8 overflow-hidden rounded-full content-center">
            <i class="fad fa-user"></i>
        </div>
        <div class="ml-2 capitalize flex ">
            <h1 class="text-sm text-gray-800 font-semibold m-0 p-0 leading-none">
                {{ Auth::user()->name }}
            </h1>
            <i class="fad fa-chevron-down ml-2 text-xs leading-none"></i>
        </div>
    </div>
    <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-[1] w-52 p-2 shadow">
        <li><a> <i class="fad fa-user-edit text-xs mr-1"></i>
                Thông tin cá nhân</a></li>
        <li></li>
        <li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="">
                    <i class="fas fa-sign-out-alt mr-1"></i>
                    {{ __('Đăng xuất') }}
                </button>
            </form>
        </li>
    </ul>
</div>
