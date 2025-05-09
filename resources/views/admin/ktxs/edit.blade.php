<x-admin-layout>
    <div class="flex-grow w-full p-5 text-center ">
        <div class="breadcrumbs text-sm">
            <ul>
                <li><a href="{{ route('admin.ktxs.index') }}">KTX</a></li>
                <li><a class="text-teal-600">Chỉnh sửa</a></li>
            </ul>
        </div>

        <div class="overflow-x-auto bg-white rounded-lg mt-2">

            <form action="{{ route('admin.ktxs.update', $ktx->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

                <div class="gap-4 !m-0">
                    <div class="bg-base-100 shadow-xl form-control p-2 rounded-lg">
                        <x-text-input label="Tên" name="name" placeholder="" value="{{ old('name', $ktx->name) }}" />

                        <label class="form-control ">
                            <div class="label">
                                <span class="text-sm font-medium text-gray-700">@lang('admin.content')</span>
                            </div>
                            <textarea name="content" id="content"
                                class="form-input rounded-md shadow-sm mt-1 block w-full {{ $errors->has('content') ? 'input-error' : '' }}"
                                rows="1">{{ old('content', $ktx->content) }}</textarea>
                            @error('content')
                            <small class="text-red-500 text-left">{{ $message }}</small>
                            @enderror
                        </label>
                    </div>
                </div>
                <div class="flex justify-center pb-3 pt-5">
                    <a href="{{ route('admin.ktxs.index') }}"
                        class="btn btn-outline btn-error !min-h-9 h-9 w-fit mt-2 mx-4">Huỷ</a>
                    <button type="submit"
                        class="btn btn-outline btn-accent !min-h-9 h-9 w-fit mt-2 mx-4">Lưu</button>

                </div>
            </form>

        </div>
    </div>


    @pushonce('bottom_scripts')
    <x-admin.forms.tinymce-config column="content" model="KTX" id="content" />
    @endpushonce

</x-admin-layout>