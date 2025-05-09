<x-website-layout>
    <div class="col-span-8 lg:col-span-6 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-row items-center gap-1 bg-slate-100 px-4 py-2 text-xs uppercase text-slate-500">
            <a class="hover:text-slate-900 hover:underline" href="{{ route('home') }}">
                Trang chủ
            </a>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="h-4 w-4 text-slate-300">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
            </svg>
            <span>Liên hệ</span>
        </div>

        <section class="mt-4 border-l-2 border-blue-500">
            <form action="{{ route('web.contacts.store') }}" method="POST" class="relative">
                @csrf

                <div class="relative z-20">
                    <div class="bg-[#f1f3f4] p-5">
                        <h2 class="col-span-2 text-xl font-semibold uppercase">Liên hệ</h2>
                        <div class="grid grid-cols-3 gap-x-4 gap-y-2">
                            <div class="text-normal col-span-2 sm:col-span-1">
                                <label class="text-sm text-gray-700">
                                    Họ tên <span class="text-red-500">*</span>
                                </label>
                                <input name="full_name" value="{{ old('full_name') }}"
                                    class="col-span-2 w-full rounded-sm border-slate-300 py-1 text-sm shadow-sm focus:border-lime-500 focus:ring-lime-500"
                                    type="text">
                                @error('full_name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="text-normal col-span-2 sm:col-span-1">
                                <label class="text-sm text-gray-700">
                                    Điện thoại <span class="text-red-500">*</span>
                                </label>
                                <input name="phone" value="{{ old('phone') }}"
                                    class="col-span-2 w-full rounded-sm border-slate-300 py-1 text-sm shadow-sm focus:border-lime-500 focus:ring-lime-500"
                                    type="text">
                                @error('phone')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="text-normal col-span-3 sm:col-span-1">
                                <label class="text-sm text-gray-700">Email</label>
                                <input name="email" value="{{ old('email') }}"
                                    class="col-span-2 w-full rounded-sm border-slate-300 py-1 text-sm shadow-sm focus:border-lime-500 focus:ring-lime-500"
                                    type="email">
                                @error('email')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="text-normal col-span-3">
                                <label class="text-sm text-gray-700">
                                    Tiêu đề <span class="text-red-500">*</span>
                                </label>
                                <input name="title" value="{{ old('title') }}"
                                    class="col-span-2 w-full rounded-sm border-slate-300 py-1 text-sm shadow-sm focus:border-lime-500 focus:ring-lime-500"
                                    type="text">
                                @error('title')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="text-normal col-span-3">
                                <label class="text-sm text-gray-700">
                                    Nội dung <span class="text-red-500">*</span>
                                </label>
                                <textarea name="content"
                                    class="col-span-2 w-full rounded-sm border-slate-300 py-1 text-sm shadow-sm focus:border-lime-500 focus:ring-lime-500"
                                    rows="6">{{ old('content') }}</textarea>
                                @error('content')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-2 flex items-center justify-end text-right">
                            <button type="submit"
                                class="inline-flex items-center rounded border bg-blue-500 px-10 py-1 text-white hover:bg-blue-600 focus:bg-blue-500 focus:outline-none">
                                <i class="far fa-paper-plane mr-2 size-4"></i>
                                <span> Gửi </span>
                            </button>
                        </div>
                    </div>
                </div>
            </form>

            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7421.920758484804!2d105.83941473610567!3d21.548404492809613!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313521406ca0840d%3A0x40cb6f8d2cad2168!2zVHLGsOG7nW5nIMSQ4bqhaSBI4buNYyBL4bu5IFRodeG6rXQgQ8O0bmcgTmdoaeG7h3A!5e0!3m2!1svi!2s!4v1746780655575!5m2!1svi!2s" width="100%" height="415" style="border: 0" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </section>
    </div>
</x-website-layout>