<div>
    <div class="relative flex h-9 items-center overflow-hidden bg-lime-500 px-4">
        <svg fill="currentColor" class="absolute right-0 h-full w-auto text-orange-500" xmlns="http://www.w3.org/2000/svg" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" viewBox="0 0 120 36">
            <path d="M120 36s.064942-36 0-36H42.896282C21.448141 0 21.448141 36 0 36h120Z" />
        </svg>
        <a href="{{ route('map') }}" class="flex items-center justify-between gap-2 text-sm font-bold uppercase text-white hover:underline">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 6.75V15m6-6v8.25m.503 3.498l4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 00-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0z" />
            </svg>
            <span>@lang('website.bentre_map')</span>
        </a>
    </div>
    <div id="{{ $slot }}" class="map-wrapper relative mt-1 h-96 w-full overflow-hidden bg-checkered-pattern bg-[length:16px_16px]" x-data="{ layers: 0 }">
        <div x-cloak :class="layers == 1 || '-ml-[50rem] lg:-ml-80'" class="absolute inset-0 z-10 h-full w-full bg-slate-100 bg-opacity-90 px-2 py-4 transition-all duration-500">
            <div class="">
                <div class="flex items-center justify-between px-4 py-2 text-sm font-bold tracking-tight text-slate-700 hover:bg-slate-100">
                    <div class="flex items-start">
                        <span class="mr-2 h-5 w-5 rounded-full">
                            <svg class="fill-current text-slate-700 group-hover:text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 153 150">
                                <path d="M2.2 47.4c.5-.3.8-.4 1.2-.6 23.9-12 47.8-23.9 71.7-35.9.5-.2.8-.3 1.3 0 23.3 11.7 46.7 23.4 70.1 35 .9.5 1.8.9 2.9 1.5-.5.2-.8.4-1.1.6L79.9 82.2c-1.2.6-2.4 1.1-3.5 1.8-.4.2-.8.2-1.2 0-18.6-9.4-37.1-18.7-55.7-28-5.4-2.7-10.8-5.4-16.2-8-.3-.2-.7-.4-1.1-.6zM149.3 102.6c-1.2.6-2.3 1.2-3.4 1.7l-69.6 34.8c-.3.1-.8.1-1.1 0-19.7-9.8-39.4-19.7-59.1-29.5l-12.6-6.3c-.4-.2-.8-.4-1.3-.7.3-.2.6-.3.8-.5 4.4-2.2 8.9-4.4 13.3-6.6.3-.2.8-.2 1.1 0 15.9 7.9 31.8 15.9 47.8 23.9 3.3 1.6 6.5 3.2 9.8 4.9.6.3 1.1.3 1.7 0 15.8-7.9 31.7-15.9 47.5-23.8 3.3-1.6 6.6-3.3 9.9-4.9.3-.1.8-.2 1-.1 4.6 2.3 9.3 4.6 13.9 6.9.1 0 .1.1.3.2z"></path>
                                <path d="M149.3 75c-1.4.7-2.7 1.4-4 2-15.8 7.9-31.7 15.8-47.5 23.8-7.1 3.5-14.2 7.1-21.3 10.6-.5.2-.9.3-1.4 0-15.4-7.6-30.7-15.3-46.1-23-8.6-4.3-17.3-8.6-25.9-12.9-.3-.1-.5-.3-.9-.5l5-2.5c3-1.5 6.1-3 9.1-4.5.5-.2.8-.2 1.3 0C36.8 77.6 56 87.2 75.1 96.8c.5.3.9.2 1.4 0C95.7 87.1 114.8 77.5 134 68c.3-.2.8-.3 1.1-.1l13.8 6.9c.1 0 .2 0 .4.2z"></path>
                            </svg>
                        </span>
                        <span>@lang('website.basemaps')</span>
                    </div>
                </div>
                <ul class="ml-6 space-y-2 border-l border-slate-300 border-l-slate-300 p-2">
                    <li>
                        <div class="flex items-start">
                            <input id="basemap_hide" type="radio" name="basemap" class="h-4 w-4 rounded border-slate-300 bg-slate-200 text-blue-600 focus:ring-2 focus:ring-blue-500">
                            <label for="basemap_hide" class="ml-2 text-sm font-medium text-slate-900">@lang('website.basemap_hide')</label>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-start">
                            <input id="basemap_road" type="radio" name="basemap" value="m" class="h-4 w-4 rounded border-slate-300 bg-slate-200 text-blue-600 focus:ring-2 focus:ring-blue-500" checked>
                            <label for="basemap_road" class="ml-2 text-sm font-medium text-slate-900">@lang('website.basemap_road')</label>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-start">
                            <input id="basemap_satellite" type="radio" name="basemap" value="s" class="h-4 w-4 rounded border-slate-300 bg-slate-200 text-blue-600 focus:ring-2 focus:ring-blue-500">
                            <label for="basemap_satellite" class="ml-2 text-sm font-medium text-slate-900">@lang('website.basemap_satellite')</label>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-start">
                            <input id="terrain-radio" type="radio" name="basemap" value="p" class="h-4 w-4 rounded border-slate-300 bg-slate-200 text-blue-600 focus:ring-2 focus:ring-blue-500">
                            <label for="terrain-radio" class="ml-2 text-sm font-medium text-slate-900">@lang('website.basemap_terrain')</label>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="">
                <div class="flex items-center justify-between px-4 py-2 text-sm font-bold tracking-tight text-slate-700 hover:bg-slate-100">
                    <div class="flex items-start">
                        <span class="mr-2 h-5 w-5 rounded-full">
                            <svg class="fill-current text-slate-700 group-hover:text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 153 150">
                                <path d="M2.2 47.4c.5-.3.8-.4 1.2-.6 23.9-12 47.8-23.9 71.7-35.9.5-.2.8-.3 1.3 0 23.3 11.7 46.7 23.4 70.1 35 .9.5 1.8.9 2.9 1.5-.5.2-.8.4-1.1.6L79.9 82.2c-1.2.6-2.4 1.1-3.5 1.8-.4.2-.8.2-1.2 0-18.6-9.4-37.1-18.7-55.7-28-5.4-2.7-10.8-5.4-16.2-8-.3-.2-.7-.4-1.1-.6zM149.3 102.6c-1.2.6-2.3 1.2-3.4 1.7l-69.6 34.8c-.3.1-.8.1-1.1 0-19.7-9.8-39.4-19.7-59.1-29.5l-12.6-6.3c-.4-.2-.8-.4-1.3-.7.3-.2.6-.3.8-.5 4.4-2.2 8.9-4.4 13.3-6.6.3-.2.8-.2 1.1 0 15.9 7.9 31.8 15.9 47.8 23.9 3.3 1.6 6.5 3.2 9.8 4.9.6.3 1.1.3 1.7 0 15.8-7.9 31.7-15.9 47.5-23.8 3.3-1.6 6.6-3.3 9.9-4.9.3-.1.8-.2 1-.1 4.6 2.3 9.3 4.6 13.9 6.9.1 0 .1.1.3.2z"></path>
                                <path d="M149.3 75c-1.4.7-2.7 1.4-4 2-15.8 7.9-31.7 15.8-47.5 23.8-7.1 3.5-14.2 7.1-21.3 10.6-.5.2-.9.3-1.4 0-15.4-7.6-30.7-15.3-46.1-23-8.6-4.3-17.3-8.6-25.9-12.9-.3-.1-.5-.3-.9-.5l5-2.5c3-1.5 6.1-3 9.1-4.5.5-.2.8-.2 1.3 0C36.8 77.6 56 87.2 75.1 96.8c.5.3.9.2 1.4 0C95.7 87.1 114.8 77.5 134 68c.3-.2.8-.3 1.1-.1l13.8 6.9c.1 0 .2 0 .4.2z"></path>
                            </svg>
                        </span>
                        <span>@lang('website.administrative_layers')</span>
                    </div>
                </div>
                <ul class="ml-6 space-y-2 border-l border-slate-300 border-l-slate-300 p-2">
                    <li>
                        <div class="flex items-start">
                            <input id="border-checkbox" type="checkbox" name="border" class="h-4 w-4 rounded border-slate-300 bg-slate-200 text-blue-600 focus:ring-2 focus:ring-blue-500" checked="">
                            <label for="border-checkbox" class="ml-2 text-sm font-medium text-slate-900">Ranh giới</label>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-start">
                            <input id="districts-checkbox" type="checkbox" name="districts" value="m" class="h-4 w-4 rounded border-slate-300 bg-slate-200 text-blue-600 focus:ring-2 focus:ring-blue-500" checked="">
                            <label for="districts-checkbox" class="ml-2 text-sm font-medium text-slate-900">Ranh giới huyện</label>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-start">
                            <input id="communes-checkbox" type="checkbox" name="communes" value="m" class="h-4 w-4 rounded border-slate-300 bg-slate-200 text-blue-600 focus:ring-2 focus:ring-blue-500" checked="">
                            <label for="communes-checkbox" class="ml-2 text-sm font-medium text-slate-900">Ranh giới xã</label>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <div x-cloak :class="layers == 2 || '-ml-[50rem] lg:-ml-80'" class="absolute inset-0 z-10 h-full w-full bg-slate-100 bg-opacity-90 px-2 py-4 transition-all duration-500">
            <div class="">
                <div class="flex items-center justify-between px-4 py-2 text-sm font-bold tracking-tight text-slate-700 hover:bg-slate-100">
                    <div class="flex items-start">
                        <span class="mr-2 h-5 w-5 rounded-full">
                            <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                <path d="M576 216v16c0 13.255-10.745 24-24 24h-8l-26.113 182.788C514.509 462.435 494.257 480 470.37 480H105.63c-23.887 0-44.139-17.565-47.518-41.212L32 256h-8c-13.255 0-24-10.745-24-24v-16c0-13.255 10.745-24 24-24h67.341l106.78-146.821c10.395-14.292 30.407-17.453 44.701-7.058 14.293 10.395 17.453 30.408 7.058 44.701L170.477 192h235.046L326.12 82.821c-10.395-14.292-7.234-34.306 7.059-44.701 14.291-10.395 34.306-7.235 44.701 7.058L484.659 192H552c13.255 0 24 10.745 24 24zM312 392V280c0-13.255-10.745-24-24-24s-24 10.745-24 24v112c0 13.255 10.745 24 24 24s24-10.745 24-24zm112 0V280c0-13.255-10.745-24-24-24s-24 10.745-24 24v112c0 13.255 10.745 24 24 24s24-10.745 24-24zm-224 0V280c0-13.255-10.745-24-24-24s-24 10.745-24 24v112c0 13.255 10.745 24 24 24s24-10.745 24-24z" />
                            </svg>
                        </span>
                        <span>@lang('website.layer_products')</span>
                    </div>
                </div>
                <ul class="ml-6 space-y-2 border-l border-slate-300 border-l-slate-300 p-2">
                    @foreach ($categories as $category)
                        <li>
                            <div class="flex items-start">
                                <input value="{{ $category->id }}" id="category-checkbox-{{ $category->id }}" type="checkbox" name="product-category" class="h-4 w-4 rounded border-slate-300 bg-slate-200 text-blue-600 focus:ring-2 focus:ring-blue-500" checked>
                                <label for="category-checkbox-{{ $category->id }}" class="ml-2 text-sm font-medium text-slate-900">{{ $category->name }} <span class="text-xs italic text-lime-700">({{ $category->products_count }})</span></label>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div x-cloak :class="layers == 3 || '-ml-[50rem] lg:-ml-80'" class="absolute inset-0 z-10 h-full w-full bg-slate-100 bg-opacity-90 px-2 py-4 transition-all duration-500">
            <div class="">
                <div class="flex items-center justify-between px-4 py-2 text-sm font-bold tracking-tight text-slate-700 hover:bg-slate-100">
                    <div class="flex items-start">
                        <span class="mr-2 h-5 w-5 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 fill-current text-slate-700 group-hover:text-white"">
                                <path fill-rule="evenodd" d="M4.5 2.25a.75.75 0 000 1.5v16.5h-.75a.75.75 0 000 1.5h16.5a.75.75 0 000-1.5h-.75V3.75a.75.75 0 000-1.5h-15zM9 6a.75.75 0 000 1.5h1.5a.75.75 0 000-1.5H9zm-.75 3.75A.75.75 0 019 9h1.5a.75.75 0 010 1.5H9a.75.75 0 01-.75-.75zM9 12a.75.75 0 000 1.5h1.5a.75.75 0 000-1.5H9zm3.75-5.25A.75.75 0 0113.5 6H15a.75.75 0 010 1.5h-1.5a.75.75 0 01-.75-.75zM13.5 9a.75.75 0 000 1.5H15A.75.75 0 0015 9h-1.5zm-.75 3.75a.75.75 0 01.75-.75H15a.75.75 0 010 1.5h-1.5a.75.75 0 01-.75-.75zM9 19.5v-2.25a.75.75 0 01.75-.75h4.5a.75.75 0 01.75.75v2.25a.75.75 0 01-.75.75h-4.5A.75.75 0 019 19.5z" clip-rule="evenodd"></path>
                            </svg>
                        </span>
                        <span>@lang('website.layer_companies')</span>
                    </div>
                </div>
                <ul class="ml-6 space-y-2 border-l border-slate-300 border-l-slate-300 p-2">
                    @foreach ($types as $type)
                        <li>
                            <div class="flex items-start">
                                <input value="{{ $type->id }}" id="company-type-checkbox-{{ $type->id }}" type="checkbox" name="company-type" class="h-4 w-4 rounded border-slate-300 bg-slate-200 text-blue-600 focus:ring-2 focus:ring-blue-500">
                                <label for="company-type-checkbox-{{ $type->id }}" class="ml-2 text-sm font-medium text-slate-900">{{ $type->name }} <span class="text-xs italic text-lime-700">({{ $type->companies_count }})</span></label>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="absolute bottom-0 z-20 col-span-3 grid w-full grid-flow-col gap-1 bg-slate-100 bg-opacity-80">
            <div @click="layers = layers == 1 ? 0 : 1" class="flex h-8 cursor-pointer items-center justify-center text-slate-700">
                <svg :class="layers == 1 && 'text-orange-500'" class="w-5 fill-current group-hover:text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 153 150">
                    <path d="M2.2 47.4c.5-.3.8-.4 1.2-.6 23.9-12 47.8-23.9 71.7-35.9.5-.2.8-.3 1.3 0 23.3 11.7 46.7 23.4 70.1 35 .9.5 1.8.9 2.9 1.5-.5.2-.8.4-1.1.6L79.9 82.2c-1.2.6-2.4 1.1-3.5 1.8-.4.2-.8.2-1.2 0-18.6-9.4-37.1-18.7-55.7-28-5.4-2.7-10.8-5.4-16.2-8-.3-.2-.7-.4-1.1-.6zM149.3 102.6c-1.2.6-2.3 1.2-3.4 1.7l-69.6 34.8c-.3.1-.8.1-1.1 0-19.7-9.8-39.4-19.7-59.1-29.5l-12.6-6.3c-.4-.2-.8-.4-1.3-.7.3-.2.6-.3.8-.5 4.4-2.2 8.9-4.4 13.3-6.6.3-.2.8-.2 1.1 0 15.9 7.9 31.8 15.9 47.8 23.9 3.3 1.6 6.5 3.2 9.8 4.9.6.3 1.1.3 1.7 0 15.8-7.9 31.7-15.9 47.5-23.8 3.3-1.6 6.6-3.3 9.9-4.9.3-.1.8-.2 1-.1 4.6 2.3 9.3 4.6 13.9 6.9.1 0 .1.1.3.2z"></path>
                    <path d="M149.3 75c-1.4.7-2.7 1.4-4 2-15.8 7.9-31.7 15.8-47.5 23.8-7.1 3.5-14.2 7.1-21.3 10.6-.5.2-.9.3-1.4 0-15.4-7.6-30.7-15.3-46.1-23-8.6-4.3-17.3-8.6-25.9-12.9-.3-.1-.5-.3-.9-.5l5-2.5c3-1.5 6.1-3 9.1-4.5.5-.2.8-.2 1.3 0C36.8 77.6 56 87.2 75.1 96.8c.5.3.9.2 1.4 0C95.7 87.1 114.8 77.5 134 68c.3-.2.8-.3 1.1-.1l13.8 6.9c.1 0 .2 0 .4.2z"></path>
                </svg>
            </div>
            <div @click="layers = layers == 2 ? 0 : 2" class="flex h-8 cursor-pointer items-center justify-center text-slate-700">
                <svg :class="layers == 2 && 'text-orange-500'" class="w-5 fill-current group-hover:text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                    <path d="M576 216v16c0 13.255-10.745 24-24 24h-8l-26.113 182.788C514.509 462.435 494.257 480 470.37 480H105.63c-23.887 0-44.139-17.565-47.518-41.212L32 256h-8c-13.255 0-24-10.745-24-24v-16c0-13.255 10.745-24 24-24h67.341l106.78-146.821c10.395-14.292 30.407-17.453 44.701-7.058 14.293 10.395 17.453 30.408 7.058 44.701L170.477 192h235.046L326.12 82.821c-10.395-14.292-7.234-34.306 7.059-44.701 14.291-10.395 34.306-7.235 44.701 7.058L484.659 192H552c13.255 0 24 10.745 24 24zM312 392V280c0-13.255-10.745-24-24-24s-24 10.745-24 24v112c0 13.255 10.745 24 24 24s24-10.745 24-24zm112 0V280c0-13.255-10.745-24-24-24s-24 10.745-24 24v112c0 13.255 10.745 24 24 24s24-10.745 24-24zm-224 0V280c0-13.255-10.745-24-24-24s-24 10.745-24 24v112c0 13.255 10.745 24 24 24s24-10.745 24-24z"></path>
                </svg>
            </div>
            <div @click="layers = layers == 3 ? 0 : 3" class="flex h-8 cursor-pointer items-center justify-center text-slate-700">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" :class="layers == 3 && 'text-orange-500'" class="w-5 fill-current group-hover:text-white"">
                    <path fill-rule="evenodd" d="M4.5 2.25a.75.75 0 000 1.5v16.5h-.75a.75.75 0 000 1.5h16.5a.75.75 0 000-1.5h-.75V3.75a.75.75 0 000-1.5h-15zM9 6a.75.75 0 000 1.5h1.5a.75.75 0 000-1.5H9zm-.75 3.75A.75.75 0 019 9h1.5a.75.75 0 010 1.5H9a.75.75 0 01-.75-.75zM9 12a.75.75 0 000 1.5h1.5a.75.75 0 000-1.5H9zm3.75-5.25A.75.75 0 0113.5 6H15a.75.75 0 010 1.5h-1.5a.75.75 0 01-.75-.75zM13.5 9a.75.75 0 000 1.5H15A.75.75 0 0015 9h-1.5zm-.75 3.75a.75.75 0 01.75-.75H15a.75.75 0 010 1.5h-1.5a.75.75 0 01-.75-.75zM9 19.5v-2.25a.75.75 0 01.75-.75h4.5a.75.75 0 01.75.75v2.25a.75.75 0 01-.75.75h-4.5A.75.75 0 019 19.5z" clip-rule="evenodd"></path>
                </svg>
            </div>
        </div>
    </div>
</div>
