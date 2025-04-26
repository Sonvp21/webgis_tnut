<div class="absolute h-full w-full">
    @if ($commune)
        <div class="@if ($openInfoBox) flex @else hidden @endif absolute z-10 h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden bg-black/50 p-4 md:h-full">
            <div class="relative max-h-[90%] w-auto max-w-xl">
                <!-- Modal content -->
                <div class="relative min-w-[20rem] rounded-lg border-b-2 bg-white shadow" style="border-bottom-color: ">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between rounded-t border-b px-4 py-2" style="border-bottom-color: ">
                        <h3 class="text-sm font-semibold uppercase text-slate-900">
                            {{-- @lang('website.commune_info') --}}THÔNG TIN XÃ/PHƯỜNG
                        </h3>
                        <button type="button" wire:click="$dispatchTo('website.map.info.communes', 'closeInfoBox')" class="ml-auto inline-flex items-center rounded-lg bg-transparent p-1.5 text-sm text-slate-400 hover:bg-slate-200 hover:text-slate-900" data-modal-hide="staticModal">
                            <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="max-h-auto relative overflow-x-auto sm:rounded-lg">
                        <table class="w-full text-left text-sm text-slate-500">
                            <tbody>
                                <tr class="border-b bg-white">
                                    <th class="whitespace-nowrap px-3 py-1 font-medium text-slate-500">
                                        {{-- @lang('website.commune_name') --}}Xã/Phường
                                    </th>
                                    <td class="px-2 py-1 text-slate-700">
                                        {{ $commune->name }}
                                    </td>
                                </tr>
                                {{-- <tr class="border-b bg-white">
                                    <th class="whitespace-nowrap px-3 py-1 font-medium text-slate-500">
                                        @lang('website.district_name')
                                    </th>
                                    <td class="px-2 py-1 text-slate-700">
                                        {{ $commune->district->name }}
                                    </td>
                                </tr> --}}
                                <tr class="border-b bg-white">
                                    <th class="whitespace-nowrap px-3 py-1 font-medium text-slate-500">
                                        {{-- @lang('website.area') --}}Diện tích
                                        <span class="text-xs">(Km<sup>2</sup>)</span>
                                    </th>
                                    <td class="px-2 py-1 text-slate-700">
                                        {{ rtrim(sprintf('%.2f', $commune->area), '0') }}
                                    </td>
                                </tr>
                                <tr class="border-b bg-white">
                                    <th class="whitespace-nowrap px-3 py-1 font-medium text-slate-500">
                                        Hộ gia đình
                                    </th>
                                    <td class="px-2 py-1 text-slate-700">
                                        {{ $commune->household }}
                                    </td>
                                </tr>
                                <tr class="border-b bg-white">
                                    <th class="whitespace-nowrap px-3 py-1 font-medium text-slate-500">
                                        Mật độ dân số
                                        <span class="text-xs">(Người/Km<sup>2</sup>)</span>
                                    </th>
                                    <td class="px-2 py-1 text-slate-700">
                                        {{ rtrim(sprintf('%.2f', $commune->density), '0') }}
                                    </td>
                                </tr>
                                <tr class="border-b bg-white">
                                    <th class="whitespace-nowrap px-3 py-1 font-medium text-slate-500">
                                        {{-- @lang('website.population') --}}Dân số
                                    </th>
                                    <td class="px-2 py-1 text-slate-700">
                                        {{ $commune->population }}
                                    </td>
                                </tr>
                                <tr class="border-b bg-white">
                                    <th class="whitespace-nowrap px-3 py-1 font-medium text-slate-500">
                                        {{-- @lang('website.updated_year') --}}Năm cập nhật
                                    </th>
                                    <td class="px-2 py-1 text-slate-700">
                                        {{ rtrim(sprintf('%.2f', $commune->time_updat), '0') }}
                                    </td>
                                </tr>
                                {{--@if ($commune->companies_count)
                                    <tr class="border-b bg-white">
                                        <th class="whitespace-nowrap px-3 py-1 font-medium text-slate-500">
                                            @lang('website.total_ocop_company')
                                        </th>
                                        <td class="px-2 py-1 text-slate-700">
                                            {{ $commune->companies_count }}
                                        </td>
                                    </tr>
                                @endif
                                @if ($productsTotal)
                                    <tr class="border-b bg-white">
                                        <th class="whitespace-nowrap px-3 py-1 font-medium text-slate-500">
                                            @lang('website.total_ocop_products')
                                        </th>
                                        <td class="flex flex-row gap-3 p-2">
                                            <span class="self-center rounded-full bg-lime-600 px-3 text-lime-50">
                                                {{ $productsTotal }}
                                            </span>
                                            <div>
                                                @foreach ($productsPerRatings as $star => $productsPerRate)
                                                    <x-website.map.generate-rating :rate="$star" :count="count($productsPerRatings)" :total="$productsPerRate->count()" />
                                                @endforeach
                                            </div>
                                        </td>
                                    </tr>
                                @endif --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
