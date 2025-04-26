<div id="{{ $el }}" tabindex="-1" aria-hidden="true" class="absolute inset-0 z-50 hidden w-full overflow-y-auto">
    <div class="min:w-min relative h-full p-4 md:h-auto">
        <!-- Modal content -->
        <div class="relative select-none overflow-hidden rounded-lg bg-white shadow">
            <!-- Modal header -->
            <div class="flex items-start justify-between rounded-t border-b p-2">
                <h3 class="text-md font-semibold text-slate-900">
                    {{ $title }}
                </h3>

            </div>
            <div class="max-h-96 overflow-y-auto overscroll-contain">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
