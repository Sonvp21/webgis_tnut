
<li class="hover:text-white flex gap-1 items-center justify-center">
    <div class="inline-flex items-center gap-1 w-max">
        {{ svg('heroicon-c-chart-bar', 'size-4 flex-none animate-pulse') }}
        <small class="flex-grow contents">Đang online: {{ $current }}</small>
    </div>
</li>
<li class="hover:text-white flex gap-1 items-center justify-center ml-3">
    <div class="inline-flex items-center gap-1 w-max">
        {{ svg('heroicon-o-clock', 'size-4 flex-none') }}
        <small class="flex-grow contents">Hôm nay: {{ $today }}</small>
    </div>
</li>
<li class="hover:text-white flex gap-1 items-center justify-center ml-3">
    <div class="inline-flex items-center gap-1 w-max">
        {{ svg('heroicon-o-users', 'flex-none size-4') }}
        <small class="flex-grow w-max contents">Tổng lượt truy cập: {{ $total }}</small>
    </div>
</li>
