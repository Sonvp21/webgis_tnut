<x-layouts.map>
    <div>
        <div x-cloak x-data="{ mapsidebar: $persist(true), legendInfoBox: false }"
            class="flex h-[calc(100vh_-_36px)] select-none bg-slate-200">
            <aside :class="mapsidebar || '-ml-80'"
                class="aside z-20 w-80 flex-none overflow-y-scroll overscroll-contain bg-white shadow-[6px_0_6px_-7px_#333] transition-all ease-in-out">
                <div class="aside-header sticky top-0 z-20 flex items-center justify-between bg-white p-4">
                    <div class="flex flex-row items-center gap-2">
                        <div class="flex font-['Montserrat'] text-3xl font-extrabold">
                            <span class="text-[#99572f]">T</span>
                            <span class="text-[#117f43]">N</span>
                            <span class="text-[#ed3337]">U</span>
                            <span class="text-[#f9a51a]">T</span>
                        </div>
                    </div>
                    <div x-on:click="mapsidebar = ! mapsidebar"
                        class="cursor-pointer rounded bg-slate-50 p-1 hover:bg-slate-200" title="Hide mapsidebar">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                        </svg>
                    </div>
                </div>
                <div class="aside-body space-y-2">
                    <div x-data="{ open: false }">
                        <div @click="open =! open" :class="{ 'bg-slate-100': open }"
                            class="flex cursor-pointer items-center justify-between px-4 py-2 text-sm font-bold tracking-tight text-slate-700 hover:bg-slate-100">
                            <div class="flex items-start">
                                <span class="mr-2 h-5 w-5 rounded-full">
                                    <svg class="fill-current text-slate-700 group-hover:text-white"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 153 150">
                                        <path
                                            d="M2.2 47.4c.5-.3.8-.4 1.2-.6 23.9-12 47.8-23.9 71.7-35.9.5-.2.8-.3 1.3 0 23.3 11.7 46.7 23.4 70.1 35 .9.5 1.8.9 2.9 1.5-.5.2-.8.4-1.1.6L79.9 82.2c-1.2.6-2.4 1.1-3.5 1.8-.4.2-.8.2-1.2 0-18.6-9.4-37.1-18.7-55.7-28-5.4-2.7-10.8-5.4-16.2-8-.3-.2-.7-.4-1.1-.6zM149.3 102.6c-1.2.6-2.3 1.2-3.4 1.7l-69.6 34.8c-.3.1-.8.1-1.1 0-19.7-9.8-39.4-19.7-59.1-29.5l-12.6-6.3c-.4-.2-.8-.4-1.3-.7.3-.2.6-.3.8-.5 4.4-2.2 8.9-4.4 13.3-6.6.3-.2.8-.2 1.1 0 15.9 7.9 31.8 15.9 47.8 23.9 3.3 1.6 6.5 3.2 9.8 4.9.6.3 1.1.3 1.7 0 15.8-7.9 31.7-15.9 47.5-23.8 3.3-1.6 6.6-3.3 9.9-4.9.3-.1.8-.2 1-.1 4.6 2.3 9.3 4.6 13.9 6.9.1 0 .1.1.3.2z">
                                        </path>
                                        <path
                                            d="M149.3 75c-1.4.7-2.7 1.4-4 2-15.8 7.9-31.7 15.8-47.5 23.8-7.1 3.5-14.2 7.1-21.3 10.6-.5.2-.9.3-1.4 0-15.4-7.6-30.7-15.3-46.1-23-8.6-4.3-17.3-8.6-25.9-12.9-.3-.1-.5-.3-.9-.5l5-2.5c3-1.5 6.1-3 9.1-4.5.5-.2.8-.2 1.3 0C36.8 77.6 56 87.2 75.1 96.8c.5.3.9.2 1.4 0C95.7 87.1 114.8 77.5 134 68c.3-.2.8-.3 1.1-.1l13.8 6.9c.1 0 .2 0 .4.2z">
                                        </path>
                                    </svg>
                                </span>
                                <span>Bản đồ nền</span>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="h-4 w-4">
                                <path x-cloak x-show="open" fill-rule="evenodd"
                                    d="M11.47 7.72a.75.75 0 011.06 0l7.5 7.5a.75.75 0 11-1.06 1.06L12 9.31l-6.97 6.97a.75.75 0 01-1.06-1.06l7.5-7.5z"
                                    clip-rule="evenodd" />
                                <path x-show="!open" fill-rule="evenodd"
                                    d="M12.53 16.28a.75.75 0 01-1.06 0l-7.5-7.5a.75.75 0 011.06-1.06L12 14.69l6.97-6.97a.75.75 0 111.06 1.06l-7.5 7.5z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <ul x-cloak x-show="open" x-transition
                            class="ml-6 space-y-2 border-l border-slate-300 border-l-slate-300 p-2">
                            <li>
                                <div class="flex items-start">
                                    <input id="turnoff-map-radio" type="radio" name="basemap"
                                        class="h-4 w-4 rounded border-slate-300 bg-slate-200 text-blue-600 focus:ring-2 focus:ring-blue-500">
                                    <label for="turnoff-map-radio" class="ml-2 text-sm font-medium text-slate-900">Ẩn
                                        nền</label>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-start">
                                    <input id="road-map-radio" type="radio" name="basemap" value="m"
                                        class="h-4 w-4 rounded border-slate-300 bg-slate-200 text-blue-600 focus:ring-2 focus:ring-blue-500"
                                        checked>
                                    <label for="road-map-radio" class="ml-2 text-sm font-medium text-slate-900">Địa
                                        lý</label>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-start">
                                    <input id="satellite-radio" type="radio" name="basemap" value="s"
                                        class="h-4 w-4 rounded border-slate-300 bg-slate-200 text-blue-600 focus:ring-2 focus:ring-blue-500">
                                    <label for="satellite-radio" class="ml-2 text-sm font-medium text-slate-900">Vệ
                                        tinh</label>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-start">
                                    <input id="terrain-radio" type="radio" name="basemap" value="p"
                                        class="h-4 w-4 rounded border-slate-300 bg-slate-200 text-blue-600 focus:ring-2 focus:ring-blue-500">
                                    <label for="terrain-radio" class="ml-2 text-sm font-medium text-slate-900">Địa
                                        hình</label>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div x-data="{ open: false }">
                        <div @click="open =! open" :class="{ 'bg-slate-100': open }"
                            class="flex cursor-pointer items-center justify-between px-4 py-2 text-sm font-bold tracking-tight text-slate-700 hover:bg-slate-100">
                            <div class="flex items-start">
                                <span class="mr-2 h-5 w-5 rounded-full">
                                    <svg class="fill-current text-slate-700 group-hover:text-white"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 153 150">
                                        <path
                                            d="M2.2 47.4c.5-.3.8-.4 1.2-.6 23.9-12 47.8-23.9 71.7-35.9.5-.2.8-.3 1.3 0 23.3 11.7 46.7 23.4 70.1 35 .9.5 1.8.9 2.9 1.5-.5.2-.8.4-1.1.6L79.9 82.2c-1.2.6-2.4 1.1-3.5 1.8-.4.2-.8.2-1.2 0-18.6-9.4-37.1-18.7-55.7-28-5.4-2.7-10.8-5.4-16.2-8-.3-.2-.7-.4-1.1-.6zM149.3 102.6c-1.2.6-2.3 1.2-3.4 1.7l-69.6 34.8c-.3.1-.8.1-1.1 0-19.7-9.8-39.4-19.7-59.1-29.5l-12.6-6.3c-.4-.2-.8-.4-1.3-.7.3-.2.6-.3.8-.5 4.4-2.2 8.9-4.4 13.3-6.6.3-.2.8-.2 1.1 0 15.9 7.9 31.8 15.9 47.8 23.9 3.3 1.6 6.5 3.2 9.8 4.9.6.3 1.1.3 1.7 0 15.8-7.9 31.7-15.9 47.5-23.8 3.3-1.6 6.6-3.3 9.9-4.9.3-.1.8-.2 1-.1 4.6 2.3 9.3 4.6 13.9 6.9.1 0 .1.1.3.2z">
                                        </path>
                                        <path
                                            d="M149.3 75c-1.4.7-2.7 1.4-4 2-15.8 7.9-31.7 15.8-47.5 23.8-7.1 3.5-14.2 7.1-21.3 10.6-.5.2-.9.3-1.4 0-15.4-7.6-30.7-15.3-46.1-23-8.6-4.3-17.3-8.6-25.9-12.9-.3-.1-.5-.3-.9-.5l5-2.5c3-1.5 6.1-3 9.1-4.5.5-.2.8-.2 1.3 0C36.8 77.6 56 87.2 75.1 96.8c.5.3.9.2 1.4 0C95.7 87.1 114.8 77.5 134 68c.3-.2.8-.3 1.1-.1l13.8 6.9c.1 0 .2 0 .4.2z">
                                        </path>
                                    </svg>
                                </span>
                                <span>Lớp hành chính</span>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="h-4 w-4">
                                <path x-cloak x-show="open" fill-rule="evenodd"
                                    d="M11.47 7.72a.75.75 0 011.06 0l7.5 7.5a.75.75 0 11-1.06 1.06L12 9.31l-6.97 6.97a.75.75 0 01-1.06-1.06l7.5-7.5z"
                                    clip-rule="evenodd" />
                                <path x-show="!open" fill-rule="evenodd"
                                    d="M12.53 16.28a.75.75 0 01-1.06 0l-7.5-7.5a.75.75 0 011.06-1.06L12 14.69l6.97-6.97a.75.75 0 111.06 1.06l-7.5 7.5z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <ul x-cloak x-show="open" x-transition
                            class="ml-6 space-y-2 border-l border-slate-300 border-l-slate-300 p-2">
                            <li>
                                <div class="flex items-start">
                                    <input id="gate-checkbox" type="checkbox" name="gate"
                                        class="h-4 w-4 rounded gate-slate-300 bg-slate-200 text-blue-600 focus:ring-2 focus:ring-blue-500">
                                    <label for="gate-checkbox" class="ml-2 text-sm font-medium text-slate-900">
                                        Lớp Cổng
                                    </label>
                                </div>
                            </li>
                            <li hidden>
                                <div class="flex items-start">
                                    <input id="districts-checkbox" type="checkbox" name="districts" value="m"
                                        class="h-4 w-4 rounded border-slate-300 bg-slate-200 text-blue-600 focus:ring-2 focus:ring-blue-500">
                                    <label for="districts-checkbox" class="ml-2 text-sm font-medium text-slate-900">
                                        Ranh giới huyện</label>
                                </div>
                            </li>
                            <li hidden>
                                <div class="flex items-start">
                                    <input id="communes-checkbox" type="checkbox" name="communes" value="m"
                                        class="h-4 w-4 rounded border-slate-300 bg-slate-200 text-blue-600 focus:ring-2 focus:ring-blue-500">
                                    <label for="communes-checkbox" class="ml-2 text-sm font-medium text-slate-900">
                                        Ranh giới xã
                                    </label>
                                </div>
                            </li>

                        </ul>
                    </div>
                    <div x-data="{ open: false }">
                        <div @click="open =! open" :class="{ 'bg-slate-100': open }"
                            class="flex cursor-pointer items-center justify-between px-4 py-2 text-sm font-bold tracking-tight text-slate-700 hover:bg-slate-100">
                            <div class="flex items-start">
                                <span class="mr-2 h-5 w-5 rounded-full">
                                    <svg class="fill-current text-slate-700 group-hover:text-white"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 153 150">
                                        <path
                                            d="M2.2 47.4c.5-.3.8-.4 1.2-.6 23.9-12 47.8-23.9 71.7-35.9.5-.2.8-.3 1.3 0 23.3 11.7 46.7 23.4 70.1 35 .9.5 1.8.9 2.9 1.5-.5.2-.8.4-1.1.6L79.9 82.2c-1.2.6-2.4 1.1-3.5 1.8-.4.2-.8.2-1.2 0-18.6-9.4-37.1-18.7-55.7-28-5.4-2.7-10.8-5.4-16.2-8-.3-.2-.7-.4-1.1-.6zM149.3 102.6c-1.2.6-2.3 1.2-3.4 1.7l-69.6 34.8c-.3.1-.8.1-1.1 0-19.7-9.8-39.4-19.7-59.1-29.5l-12.6-6.3c-.4-.2-.8-.4-1.3-.7.3-.2.6-.3.8-.5 4.4-2.2 8.9-4.4 13.3-6.6.3-.2.8-.2 1.1 0 15.9 7.9 31.8 15.9 47.8 23.9 3.3 1.6 6.5 3.2 9.8 4.9.6.3 1.1.3 1.7 0 15.8-7.9 31.7-15.9 47.5-23.8 3.3-1.6 6.6-3.3 9.9-4.9.3-.1.8-.2 1-.1 4.6 2.3 9.3 4.6 13.9 6.9.1 0 .1.1.3.2z">
                                        </path>
                                        <path
                                            d="M149.3 75c-1.4.7-2.7 1.4-4 2-15.8 7.9-31.7 15.8-47.5 23.8-7.1 3.5-14.2 7.1-21.3 10.6-.5.2-.9.3-1.4 0-15.4-7.6-30.7-15.3-46.1-23-8.6-4.3-17.3-8.6-25.9-12.9-.3-.1-.5-.3-.9-.5l5-2.5c3-1.5 6.1-3 9.1-4.5.5-.2.8-.2 1.3 0C36.8 77.6 56 87.2 75.1 96.8c.5.3.9.2 1.4 0C95.7 87.1 114.8 77.5 134 68c.3-.2.8-.3 1.1-.1l13.8 6.9c.1 0 .2 0 .4.2z">
                                        </path>
                                    </svg>
                                </span>
                                <span>Lớp chuyên đề</span>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="h-4 w-4">
                                <path x-cloak x-show="open" fill-rule="evenodd"
                                    d="M11.47 7.72a.75.75 0 011.06 0l7.5 7.5a.75.75 0 11-1.06 1.06L12 9.31l-6.97 6.97a.75.75 0 01-1.06-1.06l7.5-7.5z"
                                    clip-rule="evenodd" />
                                <path x-show="!open" fill-rule="evenodd"
                                    d="M12.53 16.28a.75.75 0 01-1.06 0l-7.5-7.5a.75.75 0 011.06-1.06L12 14.69l6.97-6.97a.75.75 0 111.06 1.06l-7.5 7.5z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>

                        <ul x-cloak x-show="open" x-transition
                            class="ml-6 space-y-2 border-l border-slate-300 border-l-slate-300 p-2">
                            {{-- <li>
                                <div class="flex items-start">
                                    <input id="thamtv-checkbox" value="t" type="checkbox" name="thamtv"
                                        class="h-4 w-4 rounded border-slate-300 bg-slate-200 text-blue-600 focus:ring-2 focus:ring-blue-500">
                                    <label for="thamtv-checkbox" class="ml-2 text-sm font-medium text-slate-900">Thảm
                                        thực vật</label>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-start">
                                    <input id="sinhcanh-checkbox" value="sc" type="checkbox" name="sinhcanh"
                                        class="h-4 w-4 rounded border-slate-300 bg-slate-200 text-blue-600 focus:ring-2 focus:ring-blue-500">
                                    <label for="sinhcanh-checkbox" class="ml-2 text-sm font-medium text-slate-900">Sinh cảnh</label>
                                </div>
                            </li> --}}
                        </ul>

                    </div>
                    
                    {{--
                    <x-website.map.company-layer /> --}}
                    {{--
                    <livewire:website.map.layer.product /> --}}
                </div>
            </aside>
            <div x-cloak :class="mapsidebar && '-ml-10'"
                class="absolute z-50 h-[calc(100vh_-_36px)] w-5 border-r border-r-white bg-white/70 backdrop-blur-sm transition-all delay-150 ease-out">
                <span x-on:click="mapsidebar = ! mapsidebar"
                    class="absolute -right-4 top-8 flex cursor-pointer rounded-full border border-lime-500 bg-lime-700 p-1 hover:bg-lime-800"
                    title="Show mapsidebar">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="h-4 w-4 text-white">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                    </svg>
                </span>
            </div>
            <div class="relative h-full w-full overflow-auto bg-checkered-pattern bg-[length:16px_16px]">
                <div id="map" class="relative h-full">

                    {{--
                    <livewire:website.map.info.products />
                    <livewire:website.map.info.companies /> --}}
                    {{-- <livewire:map.info.districts /> --}}
                    {{--
                    <livewire:website.map.info.communes /> --}}

                    <x-map.legend-info-box />
                </div>
            </div>
            <x-map.control />
            <x-map.legend />
        </div>
    </div>
    @pushOnce('scripts')
    @vite('resources/js/map/map.js')
    <script>
        var aside = document.querySelectorAll('.aside');
            var asideHeader = document.getElementsByClassName('aside-header');
            var asideBody = document.getElementsByClassName('aside-body');

            aside.forEach(function(el, i) {
                el.addEventListener('scroll', function(e) {
                    if (asideBody[i].getBoundingClientRect().top < 95) {
                        asideHeader[i].classList.add('shadow-lg')
                    } else {
                        asideHeader[i].classList.remove('shadow-lg')
                    }
                });
            })
    </script>
    @endPushOnce
</x-layouts.map>