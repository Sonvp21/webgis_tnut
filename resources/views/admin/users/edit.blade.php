<x-admin-layout>
    <div class="flex-grow w-full p-5 text-center ">
        <div class="breadcrumbs text-sm">
            <ul>
                <li><a href="{{ route('admin.users.index') }}">Danh sách tài khoản</a></li>
                <li><a class="text-teal-600">Thêm mới</a></li>
            </ul>
        </div>
        
        <div class="overflow-x-auto bg-white rounded-lg mt-5">
            <div class="p-5 overflow-x-auto">
                <form action="{{ route('admin.users.update', $user) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                    <div class="grid xl:grid-cols-2 grid-cols-1 gap-4 !m-0">
                        {{-- cột 1 --}}
                        <div class="col-span-1">
                            <label class="form-control w-[95%]">
                                <div class="label">
                                    <span class="text-sm font-medium text-gray-700">Huyện</span>
                                </div>
                                <select name="district_id" id="district_id"
                                    class="input input-bordered w-full @error('district_id') border-red-500 @enderror">
                                    <option value="">Chọn huyện</option>
                                    @foreach ($districts as $district)
                                        <option value="{{ $district->id }}"
                                            {{ old('district_id', $user->district_id) == $district->id ? 'selected' : '' }}>
                                            {{ $district->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('district_id')
                                    <small class="text-red-500 text-left">{{ $message }}</small>
                                @enderror
                            </label>

                            {{-- Commune --}}
                            <label class="form-control w-[95%]">
                                <div class="label">
                                    <span class="text-sm font-medium text-gray-700">Xã</span>
                                </div>
                                <select name="commune_id" id="commune_id"
                                    class="input input-bordered w-full @error('commune_id') border-red-500 @enderror">
                                    <option value="">Chọn xã</option>
                                    @foreach ($communes as $commune)
                                        <option value="{{ $commune->id }}"
                                            {{ old('commune_id', $user->commune_id) == $commune->id ? 'selected' : '' }}>
                                            {{ $commune->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('commune_id')
                                    <small class="text-red-500 text-left">{{ $message }}</small>
                                @enderror
                            </label>

                            <label class="form-control w-[95%]">
                                <div class="label">
                                    <span class="text-sm font-medium text-gray-700">Số điện thoại</span>
                                </div>
                                <input type="text" name="phone" placeholder="09987..."
                                    value="{{ old('phone', $user->phone) }}"
                                    class="input input-bordered w-full {{ $errors->has('phone') ? 'input-error' : '' }}" />
                                @error('phone')
                                    <small class="text-red-500 text-left">{{ $message }}</small>
                                @enderror
                            </label>

                            <label class="form-control w-[95%]">
                                <div class="label">
                                    <span class="text-sm font-medium text-gray-700">Địa chỉ chi tiết</span>
                                </div>
                                <input type="text" name="address" placeholder="vd: thôn...xã..."
                                    value="{{ old('address', $user->address) }}"
                                    class="input input-bordered w-full {{ $errors->has('address') ? 'input-error' : '' }}" />
                                @error('address')
                                    <small class="text-red-500 text-left">{{ $message }}</small>
                                @enderror
                            </label>
                            <label class="form-control w-[95%]">
                                <div class="label">
                                    <span class="text-sm font-medium text-gray-700">Sinh nhật </span>
                                </div>
                                <input type="date" name="birthday" placeholder="vd: 22/09/1987"
                                    value="{{ old('birthday', $user->birthday ? \Carbon\Carbon::parse($user->birthday)->format('Y-m-d') : '') }}"
                                    class="input input-bordered w-full {{ $errors->has('birthday') ? 'input-error' : '' }}" />
                                @error('birthday')
                                    <small class="text-red-500 text-left">{{ $message }}</small>
                                @enderror
                            </label>

                        </div>
                        {{-- Cột 2 --}}
                        <div class="xl:col-span-1 col-span-2">
                            {{-- <label class="form-control w-[95%]">
                                <div class="label">
                                    <span class="text-sm font-medium text-gray-700">Vai trò</span>
                                </div>
                                <select name="category_id" id="category_id"
                                    class="input input-bordered w-full @error('category_id') border-red-500 @enderror">
                                    <option value="">Chọn category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('category_id', $user->category_id) == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <small class="text-red-500 text-left">{{ $message }}</small>
                                @enderror
                            </label> --}}
                            <label class="form-control w-[95%]">
                                <div class="label">
                                    <span class="text-sm font-medium text-gray-700">Vai trò</span>
                                </div>
                                <select name="role_id"
                                    class="input input-bordered w-full @error('role_id') border-red-500 @enderror">
                                    <option value="">Chọn vai trò</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}"
                                            {{ in_array($role->id, $user->roles->pluck('id')->toArray()) ? 'selected' : '' }}>
                                            {{ $role->display_name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('role_id')
                                    <small class="text-red-500 text-left">{{ $message }}</small>
                                @enderror
                            </label>
                            <label class="form-control w-[95%]">
                                <div class="label">
                                    <span class="text-sm font-medium text-gray-700">Tên người dùng</span>
                                </div>
                                <input type="text" name="name" placeholder="..."
                                    value="{{ old('name', $user->name) }}"
                                    class="input input-bordered w-full {{ $errors->has('name') ? 'input-error' : '' }}" />
                                @error('name')
                                    <small class="text-red-500 text-left">{{ $message }}</small>
                                @enderror
                            </label>
                            <label class="form-control w-[95%]">
                                <div class="label">
                                    <span class="text-sm font-medium text-gray-700">Tên đầy đủ</span>
                                </div>
                                <input type="text" name="full_name" placeholder="Nguyễn Văn A"
                                    value="{{ old('full_name', $user->full_name) }}"
                                    class="input input-bordered w-full {{ $errors->has('full_name') ? 'input-error' : '' }}" />
                                @error('full_name')
                                    <small class="text-red-500 text-left">{{ $message }}</small>
                                @enderror
                            </label>

                            <label class="form-control w-[95%]">
                                <div class="label">
                                    <span class="text-sm font-medium text-gray-700">Email</span>
                                </div>
                                <input type="text" name="email" placeholder="vd: abc@gmail.com" autocomplete
                                    value="{{ old('email', $user->email) }}"
                                    class="input input-bordered w-full {{ $errors->has('email') ? 'input-error' : '' }}" />
                                @error('email')
                                    <small class="text-red-500 text-left">{{ $message }}</small>
                                @enderror
                            </label>

                            <div class="form-group mt-5">
                                <button type="button" id="change-password-toggle"
                                    class="btn btn-outline btn-accent !min-h-9 h-9 w-fit mt-2 mx-4">Đổi mật
                                    khẩu</button>
                            </div>

                            <div id="password-fields" style="display: none;">
                                <label class="form-control w-[95%]">
                                    <div class="label">
                                        <span class="text-sm font-medium text-gray-700">Mật khẩu cũ</span>
                                    </div>
                                    <input type="password" name="current_password" placeholder="Current password"
                                        class="input input-bordered w-full @error('current_password') input-error @enderror" />
                                    @error('current_password')
                                        <small class="text-red-500 text-left">{{ $message }}</small>
                                    @enderror
                                </label>

                                <label class="form-control w-[95%]">
                                    <div class="label">
                                        <span class="text-sm font-medium text-gray-700">Mật khẩu mới</span>
                                    </div>
                                    <input type="password" name="password" placeholder="New password"
                                        class="input input-bordered w-full @error('password') input-error @enderror" />
                                    @error('password')
                                        <small class="text-red-500 text-left">{{ $message }}</small>
                                    @enderror
                                </label>

                                <label class="form-control w-[95%]">
                                    <div class="label">
                                        <span class="text-sm font-medium text-gray-700">Xác nhận mật khẩu mới</span>
                                    </div>
                                    <input type="password" name="password_confirmation"
                                        placeholder="Confirm new password"
                                        class="input input-bordered w-full @error('password_confirmation') input-error @enderror" />
                                    @error('password_confirmation')
                                        <small class="text-red-500 text-left">{{ $message }}</small>
                                    @enderror
                                </label>
                            </div>

                            <!-- Chỉ hiển thị checkbox đặt lại mật khẩu mặc định nếu người dùng đang đăng nhập có vai trò admin -->
                            @if (auth()->user()->hasRole('admin'))
                                <div class="flex items-center mt-4">
                                    <input type="checkbox" name="reset_password" id="reset_password"
                                        class="form-checkbox h-4 w-4 text-indigo-600">
                                    <label for="reset_password" class="ml-2 block text-sm text-gray-900">
                                        Đặt lại mật khẩu mặc định
                                    </label>
                                </div>
                            @endif

                        </div>
                        {{-- Cột 3 --}}
                        <div class="col-span-2">
                            <label class="form-control w-[95%]">
                                <div class="label">
                                    <span class="text-sm font-medium text-gray-700">Trạng thái</span>
                                </div>
                                <select name="status"
                                    class="input input-bordered w-full @error('status') border-red-500 @enderror">
                                    <option value="inactive"
                                        {{ old('status', $user->status ?? '') == 'inactive' ? 'selected' : '' }}>
                                        Chưa kích hoạt
                                    </option>
                                    <option value="active"
                                        {{ old('status', $user->status ?? '') == 'active' ? 'selected' : '' }}>
                                        Kích hoạt
                                    </option>
                                    <option value="banned"
                                        {{ old('status', $user->status ?? '') == 'banned' ? 'selected' : '' }}>
                                        Khoá tài khoản
                                    </option>
                                </select>
                                @error('status')
                                    <small class="text-red-500 text-left">{{ $message }}</small>
                                @enderror
                            </label>
                            
                            <label class="form-control w-[95%]">
                                <div class="label">
                                    <span class="text-sm font-medium text-gray-700">Mô tả</span>
                                </div>
                                <textarea name="description" id="description" class="textarea textarea-bordered">{{ old('user', $user->description) }}</textarea>
                                @error('description')
                                    <small class="text-red-500 text-left">{{ $message }}</small>
                                @enderror
                            </label>

                            <div class="bg-base-100 shadow-xl form-control p-2 rounded-lg mt-3">
                                {{-- hình ảnh --}}
                                <input type="hidden" id="existingImages"
                                    value="{{ json_encode(
                                        $user->images->map(function ($image) {
                                            return [
                                                'id' => $image->id,
                                                'name' => $image->file_name,
                                                'size' => Storage::disk('public')->exists($image->file_path)
                                                    ? Storage::disk('public')->size($image->file_path)
                                                    : 'Không tìm thấy tệp',
                                                'path' => Storage::url($image->file_path),
                                                'file_path' => $image->file_path,
                                                'isExisting' => Storage::disk('public')->exists($image->file_path),
                                            ];
                                        }),
                                    ) }}" />
                                {{-- Input cho ảnh sẽ giữ lại (cả cũ và mới) --}}
                                <input type="hidden" name="retained_images" id="retainedImages" />
                                {{-- Input cho ảnh mới upload --}}
                                <input type="hidden" name="new_images" id="newImages" />
                                <label class="form-control">
                                    <div class="label">
                                        <span class="text-sm font-medium text-gray-700">Hình ảnh (tối đa 10MB)</span>
                                    </div>
                                    <input type="file" id="image_link" name="image_link[]" multiple
                                        accept="image/*" class="filepond" />
                                    @error('image_link')
                                        <small class="text-red-500 text-left">{{ $message }}</small>
                                    @enderror
                                </label>
                                <style>
                                    .filepond--credits {
                                        display: none !important;
                                    }
                                </style>
                            </div>
                        </div>
                    </div>
                    <div class="flex gap-4 justify-center p-3">
                        <a href="{{ route('admin.users.index') }}"
                            class="btn btn-outline btn-error !min-h-9 h-9 w-fit mt-2 mx-4">Huỷ</a>
                        <button type="submit"
                            class="btn btn-outline btn-accent !min-h-9 h-9 w-fit mt-2 mx-4">Lưu</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    @pushonce('bottom_scripts')
        {{-- Lấy xã theo huyện --}}
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src='{{ asset('adminpage/get_communes.js') }}'></script>
        <script>
            var getCommunesUrl = "{{ route('admin.getCommunes', '') }}";
            var isEditMode = $('input[name="_method"]').length > 0; // Check if it's edit mode

            $(document).ready(function() {
                // Show or hide the commune label based on the mode
                if (!isEditMode) {
                    $('#district_id').change(function() {
                        var selectedDistrict = $(this).val();

                        if (selectedDistrict) {
                            $('#commune-label').removeClass('hidden'); // Show commune label
                        } else {
                            $('#commune-label').addClass('hidden'); // Hide commune label
                        }
                    });
                } else {
                    // Ensure commune label is always shown in edit mode
                    $('#commune-label').removeClass('hidden');
                }
            });
        </script>

        {{-- Sử dụng filepond --}}
        @include('components.filepond-edit-only-image')

        <script>
            document.getElementById('change-password-toggle').addEventListener('click', function() {
                var passwordFields = document.getElementById('password-fields');
                if (passwordFields.style.display === 'none') {
                    passwordFields.style.display = 'block';
                } else {
                    passwordFields.style.display = 'none';
                }
            });
        </script>
    @endpushonce


</x-admin-layout>
