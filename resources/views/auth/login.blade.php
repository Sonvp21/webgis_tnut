<x-guest-layout>
    <main>
        <div class="absolute right-2 top-2 flex">
            <a aria-label="Go to homepage" class="rounded-full p-2 hover:bg-slate-200" rel="noopener noreferrer"
                target="_blank" href="{{ route('home') }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="h-6 w-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418">
                    </path>
                </svg>
            </a>
        </div>
        </div>

        <div class="flex min-h-screen flex-col justify-center py-6 sm:py-12">
            <div class="w-5xl relative py-3 sm:mx-auto sm:max-w-xl">
                <div class="w-5xl relative bg-white px-4 py-10 shadow-lg sm:min-w-[450px] sm:rounded-3xl sm:p-20">
                    <h2 class="mb-2 text-left font-bold uppercase text-slate-600">
                        Đăng nhập </h2>
                    <div class="w-5xl mx-auto">
                        <div class="mb-2 flex flex-row align-bottom">
                            <div class="flex font-['Montserrat'] text-6xl font-extrabold">
                                <span>MAP - TNUT</span>
                            </div>
                        </div>

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="space-y-4 py-4 text-base leading-6 text-slate-700 sm:text-lg sm:leading-7">
                                <div class="relative">
                                    <input value="" autocomplete="on" id="email" name="email" type="text"
                                        class="peer h-10 w-full border-b border-l-0 border-r-0 border-t-0 border-b-slate-300 text-slate-900 placeholder-transparent focus:border-b-sky-600 focus:outline-none focus:ring-0"
                                        placeholder="Email address" autofocus>
                                    <label for="email"
                                        class="peer-placeholder-shown:text-slate-440 absolute -top-3.5 left-0 text-sm text-slate-600 transition-all peer-placeholder-shown:top-2 peer-placeholder-shown:text-base peer-focus:-top-3.5 peer-focus:text-xs peer-focus:text-slate-600">
                                        Email Address
                                    </label>
                                    @error('email')
                                        <small class="text-red-500">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="relative">
                                    <input autocomplete="off" id="password" name="password" type="password"
                                        class="peer h-10 w-full border-b border-l-0 border-r-0 border-t-0 border-b-slate-300 text-slate-900 placeholder-transparent focus:border-b-sky-600 focus:outline-none focus:ring-0"
                                        placeholder="Password">
                                    <label for="password"
                                        class="peer-placeholder-shown:text-slate-440 absolute -top-3.5 left-0 text-sm text-slate-600 transition-all peer-placeholder-shown:top-2 peer-placeholder-shown:text-base peer-focus:-top-3.5 peer-focus:text-xs peer-focus:text-slate-600">
                                        Password
                                    </label>
                                    @error('password')
                                        <small class="text-red-500">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="flex items-center justify-between">
                                    <div class="mt-4 block">
                                        <label for="remember_me" class="inline-flex items-center">
                                            <input id="remember_me" type="checkbox"
                                                class="border-gray-300 text-indigo-600 focus:ring-indigo-500 rounded shadow-sm"
                                                name="remember" />
                                            <span class="text-gray-600 ms-2 text-sm">Remember me</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="relative pt-5">
                                    <button type="submit"
                                        class="disabled:opacity-75 inline-flex items-center px-4 py-2 bg-slate-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-slate-700 focus:bg-slate-700 active:bg-slate-900 focus:outline-none focus:ring-2 focus:ring-lime-500 focus:ring-offset-2 transition ease-in-out duration-150 w-full justify-center">
                                        Đăng nhập
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-guest-layout>
