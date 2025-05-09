<head>
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.12.1/css/pro.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/map/map.js'])
    @livewireStyles
    @stack('styles')

</head>

<body class="font-sans antialiased">
    <div x-data="{ panelOpen: false }" class="contents justify-between">
        <!-- Panel -->
        <div x-show="panelOpen" x-transition class="panel-container absolute z-10 shadow-lg"
            style="width: -webkit-fill-available;">
            <ul class="menu block bg-base-200 bg-opacity-80 text-base-content min-h-full">
                <div x-data="{ open: false }">
                    <div @click="open =! open" :class="open && 'bg-slate-100 '"
                        class="flex cursor-pointer items-center justify-between px-4 py-2 text-sm font-bold tracking-tight text-slate-700 hover:bg-slate-100">
                        <div class="flex items-start">
                            <span class="mr-2 h-5 w-5 rounded-full">
                                <svg class="fill-current text-slate-700 group-hover:text-white" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 153 150">
                                    <path
                                        d="M2.2 47.4c.5-.3.8-.4 1.2-.6 23.9-12 47.8-23.9 71.7-35.9.5-.2.8-.3 1.3 0 23.3 11.7 46.7 23.4 70.1 35 .9.5 1.8.9 2.9 1.5-.5.2-.8.4-1.1.6L79.9 82.2c-1.2.6-2.4 1.1-3.5 1.8-.4.2-.8.2-1.2 0-18.6-9.4-37.1-18.7-55.7-28-5.4-2.7-10.8-5.4-16.2-8-.3-.2-.7-.4-1.1-.6zM149.3 102.6c-1.2.6-2.3 1.2-3.4 1.7l-69.6 34.8c-.3.1-.8.1-1.1 0-19.7-9.8-39.4-19.7-59.1-29.5l-12.6-6.3c-.4-.2-.8-.4-1.3-.7.3-.2.6-.3.8-.5 4.4-2.2 8.9-4.4 13.3-6.6.3-.2.8-.2 1.1 0 15.9 7.9 31.8 15.9 47.8 23.9 3.3 1.6 6.5 3.2 9.8 4.9.6.3 1.1.3 1.7 0 15.8-7.9 31.7-15.9 47.5-23.8 3.3-1.6 6.6-3.3 9.9-4.9.3-.1.8-.2 1-.1 4.6 2.3 9.3 4.6 13.9 6.9.1 0 .1.1.3.2z">
                                    </path>
                                    <path
                                        d="M149.3 75c-1.4.7-2.7 1.4-4 2-15.8 7.9-31.7 15.8-47.5 23.8-7.1 3.5-14.2 7.1-21.3 10.6-.5.2-.9.3-1.4 0-15.4-7.6-30.7-15.3-46.1-23-8.6-4.3-17.3-8.6-25.9-12.9-.3-.1-.5-.3-.9-.5l5-2.5c3-1.5 6.1-3 9.1-4.5.5-.2.8-.2 1.3 0C36.8 77.6 56 87.2 75.1 96.8c.5.3.9.2 1.4 0C95.7 87.1 114.8 77.5 134 68c.3-.2.8-.3 1.1-.1l13.8 6.9c.1 0 .2 0 .4.2z">
                                    </path>
                                </svg>
                            </span>
                            <span>@lang('web.basemaps')</span>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-4 w-4">
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
                                    class="h-4 w-4 rounded border-slate-300 bg-slate-200 text-blue-600 focus:ring-2 focus:ring-blue-500" />
                                <label for="turnoff-map-radio" class="ml-2 text-sm font-medium text-slate-900">
                                    @lang('web.basemap_hide')
                                </label>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-start">
                                <input id="road-map-radio" type="radio" name="basemap" value="m"
                                    class="h-4 w-4 rounded border-slate-300 bg-slate-200 text-blue-600 focus:ring-2 focus:ring-blue-500"
                                    checked />
                                <label for="road-map-radio" class="ml-2 text-sm font-medium text-slate-900">
                                    @lang('web.basemap_road')
                                </label>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-start">
                                <input id="satellite-radio" type="radio" name="basemap" value="s"
                                    class="h-4 w-4 rounded border-slate-300 bg-slate-200 text-blue-600 focus:ring-2 focus:ring-blue-500" />
                                <label for="satellite-radio" class="ml-2 text-sm font-medium text-slate-900">
                                    @lang('web.basemap_satellite')
                                </label>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-start">
                                <input id="terrain-radio" type="radio" name="basemap" value="p"
                                    class="h-4 w-4 rounded border-slate-300 bg-slate-200 text-blue-600 focus:ring-2 focus:ring-blue-500" />
                                <label for="terrain-radio" class="ml-2 text-sm font-medium text-slate-900">
                                    @lang('web.basemap_terrain')
                                </label>
                            </div>
                        </li>
                    </ul>
                    <div x-data="{ open: false }">
                        <div @click="open =! open" :class="open && 'bg-slate-100 '"
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
                                <span>
                                    @lang('web.administrative_layers')
                                </span>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-4 w-4">
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
                                    <input id="districts-checkbox" type="checkbox" name="districts" value="d"
                                        class="h-4 w-4 rounded border-slate-300 bg-slate-200 text-blue-600 focus:ring-2 focus:ring-blue-500"
                                        checked />
                                    <label for="districts-checkbox" class="ml-2 text-sm font-medium text-slate-900">
                                        @lang('web.layer_districts')
                                    </label>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-start">
                                    <input id="communes-checkbox" type="checkbox" name="communes" value="m"
                                        class="h-4 w-4 rounded border-slate-300 bg-slate-200 text-blue-600 focus:ring-2 focus:ring-blue-500"
                                        checked />
                                    <label for="communes-checkbox" class="ml-2 text-sm font-medium text-slate-900">
                                        @lang('web.layer_communes')
                                    </label>
                                </div>
                            </li>
           
                        </ul>
                    </div>
                    <div x-data="{ open: true }">
                        <div @click="open =! open" :class="open && 'bg-slate-100 '"
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
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-4 w-4">
                                <path x-cloak x-show="open" fill-rule="evenodd"
                                    d="M11.47 7.72a.75.75 0 011.06 0l7.5 7.5a.75.75 0 11-1.06 1.06L12 9.31l-6.97 6.97a.75.75 0 01-1.06-1.06l7.5-7.5z"
                                    clip-rule="evenodd" />
                                <path x-show="!open" fill-rule="evenodd"
                                    d="M12.53 16.28a.75.75 0 01-1.06 0l-7.5-7.5a.75.75 0 011.06-1.06L12 14.69l6.97-6.97a.75.75 0 111.06 1.06l-7.5 7.5z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
               </div>
            </ul>
        </div>

        <!-- Nút Đóng/Mở -->
        <div @click="panelOpen = !panelOpen"
            class="absolute bottom-0 z-20 col-span-3 flex w-full gap-1 bg-slate-100 bg-opacity-80">
            <div class="flex h-8 w-1/2 cursor-pointer items-center justify-center text-slate-700">
                <i class="fad fa-layer-group w-5 fill-current group-hover:text-white"></i>
            </div>
        </div>

    </div>


    <div class="w-auto h-96" id="map">

    </div>
    <div class="hidden">
        <x-website.map.control />
    </div>

    @livewireScripts
    @stack('scripts_bottom')
</body>

</html>
