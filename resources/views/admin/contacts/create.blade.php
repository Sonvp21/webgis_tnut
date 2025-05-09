<x-admin-layout>
    <div class="flex-grow w-full p-5 text-center ">
        <div class="breadcrumbs text-sm">
            <ul>
                <li><a href="{{ route('admin.contacts.index') }}">Danh sách liên hệ</a></li>
                <li><a class="text-teal-600">Thêm mới</a></li>
            </ul>
        </div>
        
        <div class="overflow-x-auto bg-white rounded-lg mt-5">

            <form action="{{ route('admin.contacts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="grid xl:grid-cols-3 grid-cols-1 gap-4 !m-0">
                    <div class="col-span-2">
                        <div class="bg-base-100 shadow-xl form-control p-2 rounded-lg">

                            <x-text-input label="Họ & tên" name="full_name" placeholder="" value="{{ old('full_name') }}" />

                            <x-text-input label="Tiêu đề" name="titile" placeholder="" value="{{ old('titile') }}" />
                            <label class="form-control ">
                                <div class="label">
                                    <span class="label-text">@lang('admin.content')</span>
                                </div>
                                <textarea name="content" id="content"
                                    class="form-input rounded-md shadow-sm mt-1 block w-full {{ $errors->has('content') ? 'input-error' : '' }}"
                                    rows="1">{{ old('content') }}</textarea>
                                @error('content')
                                    <small class="text-red-500 text-left">{{ $message }}</small>
                                @enderror
                            </label>
                        </div>

                    </div>
                    <div class="xl:col-span-1 col-span-2">
                        <div class="bg-base-100 shadow-xl form-control p-2 rounded-lg mt-3">
                            <x-text-input label="Email" name="email" placeholder="" value="{{ old('email') }}"/>
                            <x-text-input label="Số điện thoại" name="phone" placeholder="" value="{{ old('phone') }}" />
                        </div>
                    </div>
                </div>

                <div class="flex justify-center pb-3 pt-5">
                    <a href="{{ route('admin.contacts.index') }}"
                        class="btn btn-outline btn-error !min-h-9 h-9 w-fit mt-2 mx-4">Huỷ</a>
                        <button type="submit"
                        class="btn btn-outline btn-accent !min-h-9 h-9 w-fit mt-2 mx-4">Thêm</button>

                </div>
            </form>

        </div>
    </div>


    @pushonce('bottom_scripts')
        <x-admin.forms.tinymce-config column="content" model="Contact" id="content" />
        {{-- Sử dụng filepond --}}
        @include('components.filepond-create')
    @endpushonce

</x-admin-layout>