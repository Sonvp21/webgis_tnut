<div class="absolute right-5 top-20 block space-y-3 lg:top-28">
    <!-- You can open the modal using ID.showModal() method -->
    <button class="p-2 py-1 rounded border border-white bg-white/70 text-slate-500 shadow backdrop-blur-md" onclick="my_modal_3.showModal()">
        <i class="fad fa-info-circle text-xl"></i>
    </button>
    <dialog id="my_modal_3" class="modal">
        <div class="modal-box">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>
            <h3 class="text-lg font-bold">Chú giải bản đồ:</h3>
            <div class="max-h-auto relative space-y-4 overflow-x-auto p-4 sm:rounded-lg">
                <div class="space-y-2">
                    <h3 class="font-bold">
                        {{-- @lang('website.administrative_layers') --}}
                        Lớp Hành chính
                    </h3>
                    <div class="flex items-center gap-2 pl-5">
                        <span class="text-sm font-medium text-slate-900">Ranh giới tỉnh</span>
                        <span class="h-1 w-1/2 bg-[#ff00c5]"></span>
                    </div>
                    <div class="flex items-center gap-2 pl-5">
                        <span class="text-sm font-medium text-slate-900">Ranh giới huyện</span>
                        <span class="w-1/2 border-b-2 border-dashed border-slate-500"></span>
                    </div>
                    <div class="flex items-center gap-2 pl-5">
                        <span class="text-sm font-medium text-slate-900">Ranh giới xã</span>
                        <span class="w-1/2 border-b border-slate-500"></span>
                    </div>
                </div>

                <div class="space-y-2">
                    <h3 class="font-bold">
                        Lớp chuyên đề
                    </h3>
                    <div class="flex items-center gap-2 pl-5">
                        <div style="width: 25px; height: 20px;">
                            
                        </div>
                        <span class="text-sm font-medium text-slate-900">Vùng trồng</span>
                    </div>
                </div>
            </div>
        </div>
    </dialog>
</div>
