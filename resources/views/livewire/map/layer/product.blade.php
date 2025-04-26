<div class="relative" x-data="{ open: true }">
    <div @click="open =! open" :class="{ 'bg-slate-100': open } '" class="flex cursor-pointer items-center justify-between px-4 py-2 text-sm font-bold tracking-tight text-slate-700 hover:bg-slate-100">
        <div class="flex items-start">
            <span class="mr-2 h-5 w-5 rounded-full">
                <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                    <path d="M576 216v16c0 13.255-10.745 24-24 24h-8l-26.113 182.788C514.509 462.435 494.257 480 470.37 480H105.63c-23.887 0-44.139-17.565-47.518-41.212L32 256h-8c-13.255 0-24-10.745-24-24v-16c0-13.255 10.745-24 24-24h67.341l106.78-146.821c10.395-14.292 30.407-17.453 44.701-7.058 14.293 10.395 17.453 30.408 7.058 44.701L170.477 192h235.046L326.12 82.821c-10.395-14.292-7.234-34.306 7.059-44.701 14.291-10.395 34.306-7.235 44.701 7.058L484.659 192H552c13.255 0 24 10.745 24 24zM312 392V280c0-13.255-10.745-24-24-24s-24 10.745-24 24v112c0 13.255 10.745 24 24 24s24-10.745 24-24zm112 0V280c0-13.255-10.745-24-24-24s-24 10.745-24 24v112c0 13.255 10.745 24 24 24s24-10.745 24-24zm-224 0V280c0-13.255-10.745-24-24-24s-24 10.745-24 24v112c0 13.255 10.745 24 24 24s24-10.745 24-24z" />
                </svg>
            </span>
            <span>@lang('website.layer_products')</span>
        </div>
        <svg wire:loading wire:target="commune_id,district_id,selectedCategories,selectedStars" class="h-5 w-5 animate-spin text-lime-900" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
        <svg wire:loading.remove wire:target="commune_id,district_id,selectedCategories,selectedStars" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-4 w-4">
            <path x-show="open" fill-rule="evenodd" d="M11.47 7.72a.75.75 0 011.06 0l7.5 7.5a.75.75 0 11-1.06 1.06L12 9.31l-6.97 6.97a.75.75 0 01-1.06-1.06l7.5-7.5z" clip-rule="evenodd" />
            <path x-show="!open" fill-rule="evenodd" d="M12.53 16.28a.75.75 0 01-1.06 0l-7.5-7.5a.75.75 0 011.06-1.06L12 14.69l6.97-6.97a.75.75 0 111.06 1.06l-7.5 7.5z" clip-rule="evenodd" />
        </svg>
    </div>
    <ul x-show="open" x-transition class="ml-6 space-y-2 border-l border-slate-300 border-l-slate-300 p-2" wire:loading.class="opacity-70" wire:target="commune_id,district_id,selectedCategories,selectedStars">
        @foreach ($categories as $category)
            <li>
                <div class="flex items-start">
                    <input wire:model="selectedCategories" value="{{ $category->id }}" id="product-category-checkbox-{{ $category->id }}" type="checkbox" class="h-4 w-4 rounded border-slate-300 bg-slate-200 text-blue-600 focus:ring-2 focus:ring-blue-500" checked>
                    <label for="product-category-checkbox-{{ $category->id }}" class="ml-2 text-sm font-medium text-slate-900">{{ $category->name }} <span class="text-xs italic text-lime-700">({{ $category->published_products_count }})</span></label>
                </div>
            </li>
        @endforeach
        <li class="flex flex-col space-y-2 border-t border-b py-2">
            @foreach ($stars as $star)
                <div class="flex items-center">
                    <input wire:model="selectedStars" value="{{ $star->rating }}" id="product-star-checkbox-{{ $star->rating }}" type="checkbox" class="h-4 w-4 rounded border-slate-300 bg-slate-200 text-blue-600 focus:ring-2 focus:ring-blue-500" checked>
                    <label for="product-star-checkbox-{{ $star->rating }}" class="ml-2 text-sm font-medium lowercase text-slate-900">{{ $star->rating }} @lang('website.star') <span class="text-xs italic text-lime-700">({{ $star->total }})</span></label>
                </div>
            @endforeach
            @if ($stars->count() === 2)
                <div class="flex items-start">
                    <input wire:model="selectedStars" value="5" id="product-star-checkbox-5" type="checkbox" class="h-4 w-4 rounded border-slate-300 bg-slate-200 text-blue-600 focus:ring-2 focus:ring-blue-500" checked>
                    <label for="product-star-checkbox-5" class="ml-2 text-sm font-medium lowercase text-slate-900">5 @lang('website.star') <span class="text-xs italic text-lime-700">(0)</span></label>
                </div>
            @endif
        </li>
        <li>
            <label for="district_id" class="text-sm font-medium text-slate-900">@lang('website.district')</label>
            <select wire:model="district_id" id="district_id" class="focus:shadow-outline h-auto w-full appearance-none rounded-lg border py-1 px-2 text-sm placeholder-gray-600">
                <option value="all">@lang('website.select_all')</option>
                @foreach ($districts as $district)
                    <option value="{{ $district->id }}">{{ $district->name }}</option>
                @endforeach
            </select>
        </li>
        @if ($district_id !== 'all')
            <li>
                <label for="commune_id" class="text-sm font-medium text-slate-900">@lang('website.commune')</label>
                <select wire:model="commune_id" class="focus:shadow-outline h-auto w-full appearance-none rounded-lg border py-1 px-2 text-sm placeholder-gray-600">
                    <option value="all">@lang('website.select_all')</option>
                    @foreach ($communes as $commune)
                        <option value="{{ $commune->id }}">{{ $commune->name }}</option>
                    @endforeach
                </select>
            </li>
        @endif
        <li class="flex flex-row items-center gap-3 py-2">
            <span class="self-center rounded-full bg-lime-600 px-3 text-lime-50">
                {{ $productsTotal }}
            </span>
            <div>
                @foreach ($productsPerRatings as $star => $productsPerRate)
                    <x-website.map.generate-rating :rate="$star" :count="count($productsPerRatings)" :total="$productsPerRate->count()" />
                @endforeach
            </div>
        </li>
    </ul>
</div>
