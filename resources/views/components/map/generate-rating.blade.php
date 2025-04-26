<div>
    <div class="flex items-center gap-2">
        @if ($count > 1)
            <span class="w-4 flex-none text-right text-xs text-lime-700">{{ $total }}</span>
        @endif
        <div class="flex items-center gap-1">{!! $rating !!}</div>
    </div>
</div>
