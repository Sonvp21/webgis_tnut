<x-website-layout>

    <div class="col-span-12 md:col-span-12 lg:col-span-12" style="background-color: #f8f9fe;">
        <div class="w-full px-6 py-6 mx-auto drop-zone loopple-min-height-78vh">
            <div class="relative flex flex-col flex-auto min-w-0 p-4 overflow-hidden break-words border-0 shadow-blur rounded-2xl bg-white/80 bg-clip-border mb-4 draggable"
                draggable="true">
                <div class="flex flex-wrap -mx-3">
                    <div class="flex-none w-auto max-w-full px-3">
                        <div
                            class="text-base ease-soft-in-out h-18.5 w-18.5 relative inline-flex items-center justify-center rounded-xl text-white transition-all duration-200">
                            <img src="https://demos.creative-tim.com/soft-ui-dashboard-tailwind/assets/img/bruce-mars.jpg"
                                alt="profile_image" class="w-24 shadow-soft-sm rounded-xl">
                        </div>
                    </div>
                    <div class="flex-none w-auto max-w-full px-3 my-auto">
                        <div class="h-full p-2">
                            <h5 class="mb-1">{{ $user->name }}</h5>
                            <p class="mb-0 font-semibold leading-normal text-sm">{{ $user->email }}</p>
                        </div>
                    </div>
                    <div class="w-full max-w-full px-3 mx-auto mt-4 sm:my-auto sm:mr-0 md:w-1/2 md:flex-none lg:w-4/12">
                    </div>
                </div>
            </div>

            <div class="w-full pb-6 mx-auto removable">
                <div class="flex flex-wrap -mx-3 drop-zone">
                    <div class="w-full max-w-full px-3 lg-max:mt-6 xl:w-4/12 mb-4 draggable" draggable="true">
                        <div
                            class="relative flex flex-col h-full min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
                            <div class="p-4 pb-0 mb-0 bg-white border-b-0 rounded-t-2xl">
                                <div class="flex flex-wrap -mx-3">
                                    <div
                                        class="flex items-center w-full max-w-full px-3 shrink-0 md:w-8/12 md:flex-none">
                                        <h6 class="mb-0 font-bold text-xl">Thông tin cá nhân</h6>
                                    </div>
                                    <div class="w-full max-w-full px-3 text-right shrink-0 md:w-4/12 md:flex-none">
                                        <a href="{{ route('web.users.edit', $user) }}" data-target="tooltip_trigger" data-placement="top">
                                            <i class="leading-normal fas fa-user-edit text-sm text-slate-400"
                                                aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="flex-auto p-4">
                                <p class="leading-normal text-sm">{!! $user->description !!}</p>
                                <hr
                                    class="h-px my-6 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent">
                                <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                                    <li
                                        class="relative block px-4 py-2 pt-0 pl-0 leading-normal bg-white border-0 rounded-t-lg text-sm text-inherit">
                                        <strong class="text-slate-700">Họ & tên:</strong> &nbsp; {{ $user->full_name }}
                                    </li>
                                    <li
                                        class="relative block px-4 py-2 pl-0 leading-normal bg-white border-0 border-t-0 text-sm text-inherit">
                                        <strong class="text-slate-700">Ngày sinh:</strong> &nbsp; {{ $user->birthdayAtVi}}
                                    </li>
                                    <li
                                        class="relative block px-4 py-2 pl-0 leading-normal bg-white border-0 border-t-0 text-sm text-inherit">
                                        <strong class="text-slate-700">Số điện thoại:</strong> &nbsp;
                                        {{ $user->phone }}
                                    </li>
                                    <li
                                        class="relative block px-4 py-2 pl-0 leading-normal bg-white border-0 border-t-0 text-sm text-inherit">
                                        <strong class="text-slate-700">Email:</strong> &nbsp; {{ $user->email }}
                                    </li>
                                    <li
                                        class="relative block px-4 py-2 pl-0 leading-normal bg-white border-0 border-t-0 text-sm text-inherit">
                                        <strong class="text-slate-700">Địa chỉ:</strong> &nbsp; {{ $user->address }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="w-full max-w-full px-3 lg-max:mt-6 xl:w-4/12 mb-4 draggable" draggable="true">
                        <div
                            class="relative flex flex-col h-full min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
                            <div class="p-4 pb-0 mb-0 bg-white border-b-0 rounded-t-2xl">
                                <h6 class="mb-0 font-bold text-xl">Hồ sơ hội thi sáng tạo kỹ thuật</h6>
                                <hr
                                    class="h-px bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent">
                            </div>
                            <div class="flex-auto p-4">
                                <!-- The button to open modal -->
                                <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                                    @foreach ($dossierList as $dossierList)
                                        <li
                                            class="relative flex items-center px-0 py-2 mb-2 bg-white border-0 rounded-t-lg text-inherit ">
                                            <div class="flex-col items-start justify-center contents">
                                                <i class="fas fa-file-invoice mr-3"></i>
                                                <h6 class="mb-0 leading-normal text-sm">{{ $dossierList->name }}</h6>
                                            </div>
                                            <a class="inline-block py-3 pl-0 pr-4 mb-0 ml-auto font-bold text-center uppercase align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer leading-pro text-xs ease-soft-in hover:scale-102 hover:active:scale-102 active:opacity-85 text-fuchsia-500 hover:text-fuchsia-800 hover:shadow-none active:scale-100"
                                                href="{{ route('web.dossier.kythuat.edit', $dossierList) }}">Cập nhật</a>
                                        </li>
                                        <hr
                                            class="h-px bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent">
                                    @endforeach
                                </ul>
                            </div>

                            <div class="p-4 pb-0 mb-0 bg-white border-b-0 rounded-t-2xl">
                                <h6 class="mb-0 font-bold text-xl">Sáng kiến</h6>
                                <hr
                                    class="h-px bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent">
                            </div>
                            <div class="flex-auto p-4">
                                <!-- The button to open modal -->
                                <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                                    @foreach ($sangKienList as $item)
                                        <li
                                            class="relative flex items-center px-0 py-2 mb-2 bg-white border-0 rounded-t-lg text-inherit ">
                                            <div class="flex-col items-start justify-center contents">
                                                <i class="fas fa-file-invoice mr-3"></i>
                                                <h6 class="mb-0 leading-normal text-sm">{{ $item->name }}</h6>
                                            </div>
                                            <a class="inline-block py-3 pl-0 pr-4 mb-0 ml-auto font-bold text-center uppercase align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer leading-pro text-xs ease-soft-in hover:scale-102 hover:active:scale-102 active:opacity-85 text-fuchsia-500 hover:text-fuchsia-800 hover:shadow-none active:scale-100"
                                                href="{{ route('web.dossier.sangkien.edit', $item->id) }}">Cập
                                                nhật</a>
                                        </li>
                                        <hr
                                            class="h-px bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent">
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="w-full max-w-full px-3 lg-max:mt-6 xl:w-4/12 mb-4 draggable" draggable="true">
                        <div>
                            <div class="grid grid-cols-1 gap-1" style="width: -webkit-fill-available;">
                                <h3 class="text-lg font-bold text-center">Cập nhật hồ sơ</h3>
                                <form action="{{ route('web.dossier.kythuat.update', $dossier) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <!-- Tên hồ sơ -->
                                    <label class="form-control">
                                        <div class="label">
                                            <span class="text-sm font-medium text-gray-700">Tên hồ
                                                sơ</span>
                                        </div>
                                        <input type="text" name="name" placeholder="" id="name"
                                            value="{{ old('name', $dossier->name) }}"
                                            class="input input-bordered w-full ">
                                    </label>

                                    <!-- Tên đơn vị -->
                                    <label class="form-control">
                                        <div class="label">
                                            <span class="text-sm font-medium text-gray-700">Tên đơn
                                                vị</span>
                                        </div>
                                        <input type="text" name="unit_name" placeholder="" id="unit_name"
                                            value="{{ old('name', $dossier->unit_name) }}"
                                            class="input input-bordered w-full ">
                                    </label>

                                    <!-- Lĩnh vực -->
                                    <label class="form-control">
                                        <div class="label">
                                            <span class="text-sm font-medium text-gray-700">Lĩnh
                                                vực</span>
                                        </div>
                                        <input type="text" name="field" placeholder="" id="field"
                                            value="{{ old('name', $dossier->field) }}"
                                            class="input input-bordered w-full ">
                                    </label>

                                    {{-- tệp đính kèm --}}
                                    <input type="hidden" id="documentData"
                                        value="{{ json_encode(
                                            $dossier->documents->map(function ($doc) {
                                                return [
                                                    'id' => $doc->id,
                                                    'name' => $doc->file_name,
                                                    'size' => Storage::disk('public')->size($doc->file_path),
                                                    'path' => Storage::url($doc->file_path),
                                                    'isExisting' => true,
                                                ];
                                            }),
                                        ) }}" />

                                    <input type="hidden" name="document_paths" id="documentPath" />

                                    <label class="form-control ">
                                        <div class="label">
                                            <span class="text-sm font-medium text-gray-700">Tệp đính kèm (tối đa
                                                10MB)</span>
                                        </div>
                                        <input type="file" class="filepond" multiple data-allow-reorder="true"
                                            name="document_link[]" id="document_link" />
                                        @error('document_link[]')
                                            <small class="text-red-500 text-left">{{ $message }}</small>
                                        @enderror
                                    </label>
                                    <style>
                                        .filepond--credits {
                                            display: none !important;
                                        }
                                    </style>
                                    <button type="submit" class="btn btn-primary w-full mt-3">Cập
                                        nhật hồ sơ</button>
                                </form>
                            </div>

                            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                            @include('components.filepond-edit')

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-website-layout>
