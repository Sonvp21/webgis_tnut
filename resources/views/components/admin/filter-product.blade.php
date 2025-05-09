<div class="col-span-2 flex flex-col md:flex-row justify-between">
    <form method="POST" action="{{ $action }}" id="filterForm" class="flex flex-col md:flex-row items-center">
        @csrf
        <div class="form-control mx-1 w-full">
            <label class="label">
                <span class="label-text">Tìm kiếm</span>
            </label>
            <input type="text" name="search" id="search" value="{{ request('search') }}" placeholder="Nhập từ khóa"
                class="input input-sm input-bordered w-auto">
        </div>

        @foreach ($filters as $filter)
            <div class="form-control mx-1 w-full md:w-1/4 @if (!in_array($filter['name'], ['commune_id', 'price', 'weight'])) hidden @endif">
                <label class="label w-32">
                    <span class="label-text">{{ $filter['label'] }}</span>
                </label>
                <select name="{{ $filter['name'] }}" id="filter{{ ucfirst($filter['name']) }}"
                    class="input input-bordered !h-8 !p-1 text-sm">
                    <option value="">Tất cả</option>

                    @foreach ($filter['options'] as $key => $option)
                        @if ($filter['name'] == 'commune_id')
                            <!-- Lấy ID xã làm value, hiển thị tên -->
                            <option value="{{ $key }}" {{ request('commune_id') == $key ? 'selected' : '' }}>
                                {{ $option }}
                            </option>
                        @else
                            <!-- Giá & Khối lượng: Lấy trực tiếp giá trị -->
                            <option value="{{ $option }}" {{ request($filter['name']) == $option ? 'selected' : '' }}>
                                {{ $option }}
                            </option>
                        @endif
                    @endforeach

                </select>
            </div>
        @endforeach
    </form>
</div>
