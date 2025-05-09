<div class="space-y-3 lg:block md:px-3">
    {{-- liên hệ  --}}
    <div class="md:flex flex-row justify-between hidden">
        <a href="{{ route('web.contacts.index') }}" class="flex items-center gap-1 hover:text-yellow-600">
            <span class="rounded-sm bg-yellow-500 p-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="h-5 w-5 text-white">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                </svg>
            </span>
            <span class="text-sm">Liên hệ</span>
        </a>
        <a href="{{ route('web.faqs.index') }}" class="flex items-center gap-1 hover:text-yellow-600">
            <span class="rounded-sm bg-yellow-500 p-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="h-5 w-5 text-white">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
                </svg>
            </span>
            <span class="text-sm">Hỏi đáp</span>
        </a>
        <a href="{{ route('login') }}" class="flex items-center gap-1 hover:text-yellow-600">
            <span class="rounded-sm bg-yellow-500 p-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="h-5 w-5 text-white">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75">
                    </path>
                </svg>
            </span>
            <span class="text-sm">Đăng nhập</span>
        </a>
    </div>

    @if (request()->routeIs('home'))
        {{-- Bản đồ --}}
        <div>
            <div class="relative flex h-9 items-center overflow-hidden bg-lime-500 px-4">
                <svg fill="currentColor" class="absolute -right-6 h-full w-auto text-orange-500"
                    xmlns="http://www.w3.org/2000/svg" shape-rendering="geometricPrecision"
                    text-rendering="geometricPrecision" viewBox="0 0 120 36">
                    <path d="M120 36s.064942-36 0-36H42.896282C21.448141 0 21.448141 36 0 36h120Z" />
                </svg>
                <a href="{{ route('home') }}"
                    class="flex items-center justify-between gap-2 text-sm font-bold uppercase text-white hover:underline">
                    <i class="far fa-map mt-1"></i>
                    <span>Bản đồ vùng trồng</span>
                </a>
            </div>
            <div class="map-wrapper relative">
                @include('web.map.index-sidebar')
            </div>
        </div>
    @endif

    <div class="flex h-auto flex-col gap-4 !mt-3">
        <div class="grow">
            <div class="relative flex h-9 items-center overflow-hidden bg-lime-500 px-4">
                <svg fill="currentColor" class="absolute right-0 h-full w-auto text-orange-500"
                    xmlns="http://www.w3.org/2000/svg" shape-rendering="geometricPrecision"
                    text-rendering="geometricPrecision" viewBox="0 0 120 36">
                    <path d="M120 36s.064942-36 0-36H42.896282C21.448141 0 21.448141 36 0 36h120Z" />
                </svg>
                <a href="{{ route('web.notifies.index') }}"
                    class="flex items-center justify-between gap-2 text-sm font-bold uppercase text-white hover:underline">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 01-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 011.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 00-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 01-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 00-3.375-3.375h-1.5a1.125 1.125 0 01-1.125-1.125v-1.5a3.375 3.375 0 00-3.375-3.375H9.75" />
                    </svg>
                    <span>Thông báo</span>
                </a>
            </div>
            <div class="border border-lime-500">
                <div id="scroll-container-document"
                    class="max-h-[320px] overflow-scroll overscroll-contain scrollbar-hide">
                    <ul class="flex flex-col divide-y divide-dashed divide-lime-500 text-sm text-slate-500">
                        @foreach ($notifies as $notify)
                            <li class="p-2 italic hover:text-slate-800">
                                <a href="{{ route('web.notifies.show', $notify->slug) }}">
                                    {{ $notify->title }}
                                </a>
                            </li>
                        @endforeach
                        @if ($notifies->isEmpty())
                            <li class="p-3 text-gray-500 italic">Hiện chưa có thông báo nào.</li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="grow bg-slate-100">
        <div class="relative flex h-9 items-center overflow-hidden bg-lime-500 px-4">
            <svg fill="currentColor" class="absolute -right-6 h-full w-auto text-orange-500"
                xmlns="http://www.w3.org/2000/svg" shape-rendering="geometricPrecision"
                text-rendering="geometricPrecision" viewBox="0 0 120 36">
                <path d="M120 36s.064942-36 0-36H42.896282C21.448141 0 21.448141 36 0 36h120Z" />
            </svg>
            <div class="flex items-center justify-between gap-2 text-sm font-bold uppercase text-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="h-5 w-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418" />
                </svg>
                <span>Liên kết website</span>
            </div>
        </div>
        <div class="mt-1">
            <ul class="flex flex-col divide-y overflow-hidden text-sm text-slate-500">
                @foreach ($websiteLinks as $link)
                    <li class="px-3 hover:text-slate-800">
                        <a target="_blank" href="{{ $link->url }}" class="flex items-center gap-2 py-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="h-4 w-4 flex-none text-blue-500">
                                <path fill-rule="evenodd"
                                    d="M4.25 5.5a.75.75 0 00-.75.75v8.5c0 .414.336.75.75.75h8.5a.75.75 0 00.75-.75v-4a.75.75 0 011.5 0v4A2.25 2.25 0 0112.75 17h-8.5A2.25 2.25 0 012 14.75v-8.5A2.25 2.25 0 014.25 4h5a.75.75 0 010 1.5h-5z"
                                    clip-rule="evenodd"></path>
                                <path fill-rule="evenodd"
                                    d="M6.194 12.753a.75.75 0 001.06.053L16.5 4.44v2.81a.75.75 0 001.5 0v-4.5a.75.75 0 00-.75-.75h-4.5a.75.75 0 000 1.5h2.553l-9.056 8.194a.75.75 0 00-.053 1.06z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span>{{ $link->name }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    
    <div class="grow bg-slate-100">
        <div class="relative flex h-9 items-center overflow-hidden bg-lime-500 px-4">
            <svg fill="currentColor" class="absolute -right-6 h-full w-auto text-orange-500"
                xmlns="http://www.w3.org/2000/svg" shape-rendering="geometricPrecision"
                text-rendering="geometricPrecision" viewBox="0 0 120 36">
                <path d="M120 36s.064942-36 0-36H42.896282C21.448141 0 21.448141 36 0 36h120Z" />
            </svg>
            <div class="flex items-center justify-between gap-2 text-sm font-bold uppercase text-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="h-5 w-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418" />
                </svg>
                <a href="{{ route('web.videos.index') }}">Video</a>
            </div>
        </div>
        
        <div>
            @if($latestVideo)
                <div class="relative w-full h-40">
                    <video controls class="w-full h-full">
                        <source src="{{ asset('storage/' . $latestVideo->file_path) }}" type="video/mp4">
                        Trình duyệt của bạn không hỗ trợ video.
                    </video>
                </div>
            @else
                <p class="text-center text-gray-500">Chưa có video nào được đăng.</p>
            @endif
        </div>
    </div>
    
</div>
