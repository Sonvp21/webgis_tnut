<div class="absolute h-[-webkit-fill-available] w-full">
    @if ($yte)
        <div class="@if ($openInfoBox) flex @else @endif absolute z-10 h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden bg-black/50 p-4 md:h-full">
            <div class="relative max-h-[90%] w-auto max-w-xl">
                <!-- Modal content -->
                <div class="relative min-w-[20rem] rounded-lg border-b-2 bg-white shadow" style="border-bottom-color: ">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between rounded-t border-b px-4 py-2" style="border-bottom-color: ">
                        <h3 class="text-sm font-semibold uppercase text-slate-900">
                            {{-- @lang('website.yte_info') --}}THÔNG TIN Y tế
                        </h3>
                        <button type="button" wire:click="$dispatchTo('website.map.info.ytes', 'closeInfoBox')" class="ml-auto inline-flex items-center rounded-lg bg-transparent p-1.5 text-sm text-slate-400 hover:bg-slate-200 hover:text-slate-900" data-modal-hide="staticModal">
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
                                        Tên 
                                    </th>
                                    <td class="px-2 py-1 text-slate-700">
                                        {{ $yte->name }}
                                    </td>
                                </tr>
                                <tr class="border-b bg-white">
                                    <th class="whitespace-nowrap px-3 py-1 font-medium text-slate-500">
                                        chi tiết
                                    </th>
                                    <td class="px-2 py-1 text-slate-700">
                                        {!! $yte->content !!}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
