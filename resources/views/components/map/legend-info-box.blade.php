<div x-show="legendInfoBox" class="absolute" style="width: 330px;height: 100%;margin-left: 620px;">
    <div
        class="absolute z-20 flex w-full items-center justify-center overflow-y-hidden overflow-x-hidden scrollbar-hide md:h-full">
        <div class="relative max-h-[90%] w-auto max-w-xl">
            <!-- Modal content -->
            <div class="pb-10">
                <div class="relative min-w-[20rem] rounded-lg border-b-2 bg-white shadow">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between rounded-t border-b px-4 py-2">
                        <h3 class="text-sm font-semibold uppercase text-slate-900">Chú giải bản đồ</h3>
                        <button type="button" @click="legendInfoBox = false"
                            class="ml-auto inline-flex items-center rounded-lg bg-transparent p-1.5 text-sm text-slate-400 hover:bg-slate-200 hover:text-slate-900"
                            data-modal-hide="staticModal">
                            <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="max-h-auto relative space-y-4 overflow-x-auto p-4 sm:rounded-lg">
                        <div class="space-y-2">
                            <h3 class="font-bold">
                                {{-- @lang('website.administrative_layers') --}}
                                Lớp Hành chính
                            </h3>
                            <div class="flex items-center gap-2 pl-5">
                                <span class="text-sm font-medium text-slate-900">Ranh giới VQG</span>
                                <span class="h-1 w-1/2 bg-[#ff00c5]"></span>
                            </div>
                            {{-- <div class="flex items-center gap-2 pl-5">
                                <span class="text-sm font-medium text-slate-900">Ranh giới huyện</span>
                                <span class="w-1/2 border-b-2 border-dashed border-slate-500"></span>
                            </div> --}}
                            <div class="flex items-center gap-2 pl-5">
                                <span class="text-sm font-medium text-slate-900">Ranh giới xã</span>
                                <span class="w-1/2 border-b border-slate-500"></span>
                            </div>
                            <div class="flex items-center gap-2 pl-5">
                                <span class="text-sm font-medium text-slate-900">Giao thông</span>
                                <span class="w-1/2 border-b border-slate-500" style="border-color: red;"></span>
                            </div>
                        </div>

                        <div class="space-y-2">
                            <h3 class="font-bold">
                                Lớp chuyên đề
                            </h3>
                            <div class="flex items-center gap-2 pl-5">
                                <div style="width: 40px; height: 20px; background-color: #00AAFF;"></div>
                                <span class="text-sm font-medium text-slate-900">Hồ, sông, suối</span>
                            </div>
                            <div class="flex items-center gap-2 pl-5">
                                <div style="width: 40px; height: 20px; background-color: #cddd9c;"></div>
                                <span class="text-sm font-medium text-slate-900">Vùng đệm</span>
                            </div>
                            <div class="flex items-center gap-2 pl-5">
                                <div style="width: 40px; height: 20px; background-color: #d6cd68;"></div>
                                <span class="text-sm font-medium text-slate-900">Vùng lõi</span>
                            </div>
                            <div class="flex items-center gap-2 pl-5">
                                <div style="width: 40px; height: 20px; background-color: #cf802c;"></div>
                                <span class="text-sm font-medium text-slate-900">Khu bảo vệ nghiêm ngặt</span>
                            </div>
                            <div class="flex items-center gap-2 pl-5">
                                <div style="width: 40px; height: 20px; background-color: #96e944;"></div>
                                <span class="text-sm font-medium text-slate-900">Khu phục hồi sinh thái</span>
                            </div>
                        </div>

                        <div class="space-y-2">
                            <h3 class="font-bold">
                                Lớp Bản đồ phân bố
                            </h3>
                            <div class="flex items-center">
                                <svg width='60' height='24'>
                                    <circle cx='40' cy='12' r='10' fill='white' stroke='orange' stroke-width='4' fill-opacity='0.5'/>
                                 </svg>
                                <span class="text-sm font-medium text-slate-900">Bò sát</span>
                            </div>
                            <div class="flex items-center">
                                <svg width='60' height='24'>
                                    <circle cx='40' cy='12' r='10' fill='white' stroke='#12ba1d' stroke-width='4' fill-opacity='0.5'/>
                                 </svg>
                                <span class="text-sm font-medium text-slate-900">Cá</span>
                            </div>
                            <div class="flex items-center">
                                <svg width='60' height='24'>
                                    <circle cx='40' cy='12' r='10' fill='white' stroke='#d1d15b' stroke-width='4' fill-opacity='0.5'/>
                                 </svg>
                                <span class="text-sm font-medium text-slate-900">Côn trùng</span>
                            </div>
                            <div class="flex items-center ">
                                <svg width='60' height='24'>
                                    <circle cx='40' cy='12' r='10' fill='white' stroke='#3edce0' stroke-width='4' fill-opacity='0.5'/>
                                 </svg>
                                <span class="text-sm font-medium text-slate-900">Chim</span>
                            </div>
                            <div class="flex items-center">
                                <svg width='60' height='24'>
                                    <circle cx='40' cy='12' r='10' fill='white' stroke='#5248f1' stroke-width='4' fill-opacity='0.5'/>
                                 </svg>
                                <span class="text-sm font-medium text-slate-900">Động vật đáy</span>
                            </div>
                            <div class="flex items-center">
                                <svg width='60' height='24'>
                                    <circle cx='40' cy='12' r='10' fill='white' stroke='#c87f7f' stroke-width='4' fill-opacity='0.5'/>
                                 </svg>
                                <span class="text-sm font-medium text-slate-900">Động vật nổi</span>
                            </div>
                            <div class="flex items-center">
                                <svg width='60' height='24'>
                                    <circle cx='40' cy='12' r='10' fill='white' stroke='#dc74e6' stroke-width='4' fill-opacity='0.5'/>
                                 </svg>
                                <span class="text-sm font-medium text-slate-900">Thuỷ sinh</span>
                            </div>
                            <div class="flex items-center">
                                <svg width='60' height='24'>
                                    <circle cx='40' cy='12' r='10' fill='white' stroke='#fb5959' stroke-width='4' fill-opacity='0.5'/>
                                 </svg>
                                <span class="text-sm font-medium text-slate-900">Thú</span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>