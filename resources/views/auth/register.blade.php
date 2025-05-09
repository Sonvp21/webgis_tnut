<x-guest-layout>
    <div class="flex min-h-screen flex-col justify-center py-6 sm:py-12">
        <div class="w-5xl relative py-3 sm:mx-auto sm:max-w-xl">
            <div class="absolute inset-0 -skew-y-6 transform bg-gradient-to-r from-sky-300 to-sky-600 shadow-lg sm:-rotate-6 sm:skew-y-0 sm:rounded-3xl"
                style="background: #7bffff;">
            </div>
            <div class="w-5xl relative bg-white px-4 py-10 shadow-lg sm:min-w-[450px] sm:rounded-3xl sm:p-20">
                <h2 class="mb-2 text-left font-bold uppercase text-slate-600">
                    Đăng ký </h2>
                <div class="w-5xl mx-auto">
                    <div class="mb-2 flex flex-row align-bottom">
                        <div class="flex font-['Montserrat'] text-6xl font-extrabold">
                            <span>MAP - TNUT</span>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="text-base leading-6 text-slate-700 sm:text-lg sm:leading-7">
                            <div class="relative">
                                <x-text-input id="name" label="Tên tài khoản" value="" placeholder=""
                                    class="mt-1 block w-full" type="text" name="name" :value="old('name')" required
                                    autofocus autocomplete="name" />
                            </div>
                            <div class="relative">
                                <x-text-input id="email" label="Email" value="" placeholder=""
                                    class="mt-1 block w-full" type="email" name="email" :value="old('email')" required
                                    autocomplete="username" />
                            </div>
                            <div class="relative">
                                <x-text-input id="password" label="Mật khẩu" value="" placeholder=""
                                    class="mt-1 block w-full" type="password" name="password" required
                                    autocomplete="new-password" />
                            </div>
                            <div class="relative">
                                <x-text-input id="password_confirmation" label="Xác nhận mật khẩu" value=""
                                    placeholder="" class="mt-1 block w-full" type="password"
                                    name="password_confirmation" required autocomplete="new-password" />
                            </div>
                            <div class="mt-4 flex items-center justify-end">
                                <a class="text-gray-600 hover:text-gray-900 focus:ring-indigo-500 rounded-md text-sm underline focus:outline-none focus:ring-2 focus:ring-offset-2"
                                    href="{{ route('login') }}">
                                    Bạn đã có tài khoản?
                                </a>

                                <button class="btn-outline btn ml-auto" type="submit">
                                    <span>@lang('admin.register')</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-guest-layout>