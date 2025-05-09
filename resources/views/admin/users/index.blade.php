<x-admin-layout>
    <link href="{{ asset('adminpage/datatable/dataTables.bootstrap5.css') }}" rel="stylesheet">
    <div class="flex-grow w-full md:p-5 p-1">
        <div class="mb-5">
            <h1 class="text-2xl font-semibold text-gray-800">Danh sách tài khoản</h1>
            <nav class="mt-2">
                <ol class="breadcrumb flex text-sm text-gray-600 space-x-2">
                    <li class="breadcrumb-item">
                        <a>Tài khoản</a>
                    </li>
                    <li class="breadcrumb-item text-gray-500">
                        <span>/</span>
                    </li>
                    <li class="breadcrumb-item active text-gray-800 font-medium">
                        Danh sách tài khoản
                    </li>
                </ol>
            </nav>
        </div>

        <!-- End Page Title -->
        <div class="card p-2 bg-white shadow">
            <div class="card-body p-0">
                <div class="text-gray-800 text-3xl font-semibold leading-tight flex pb-1">
                    <div class="flex ml-auto">
                        <a class="btn btn-outline btn-accent !min-h-10 h-10 w-fit"
                            href="{{ route('admin.users.create') }}">
                            <i class="fad fa-plus-circle mt-[1px]"></i>
                            <span class="mb-[2px]">Thêm mới</span>
                        </a>
                    </div>
                </div>

                <div class="rounded-lg text-sm">
                    <div class="lg:mt-0 rounded shadow p-2 overflow-x-auto">
                        <table id="example" class="table min-w-full border border-gray-300 mt-3">
                            <thead>
                                <tr class="border-b border-black bg-gray-100">
                                    <th class="text-center">STT</th>
                                    <th>Tên tài khoản</th>
                                    <th>Email</th>
                                    <th>Số điện thoại</th>
                                    <th>Địa chỉ</th>
                                    <th class="text-center">Trạng thái</th>
                                    <th class="text-center">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $index => $user)
                                <tr>
                                    <td class="text-center">{{ $index + 1 }}</td>
                                    <td class="text-left font-semibold">{{ $user->name }}
                                    </td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->address }}</td>
                                    <td class="text-center">
                                        {!! $user->status_label !!}
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.users.edit', $user) }}" type="button"
                                            style="margin-right: 12px"><i class="fa fa-edit text-yellow-400 hover:text-yellow-500"></i></a>
                                        <!-- Nút mở modal -->
                                        <button class="p-0"
                                            onclick="document.getElementById('confirm-modal-{{ $user->id }}').showModal()">
                                            <i class="fad fa-trash-alt text-red-400 hover:text-red-500 cursor-pointer"></i>
                                        </button>
                                        <!-- Modal xác nhận xóa -->
                                        <dialog id="confirm-modal-{{ $user->id }}" class="modal">
                                            <style>
                                                .modal-box {
                                                    max-width: 25rem;
                                                    position: relative;
                                                    transform: translateY(-80%) !important;
                                                }
                                            </style>
                                            <div class="modal-box">
                                                <h3 class="font-bold text-red-600 text-center" style="font-size: 4rem"><i
                                                        class="fad fa-exclamation-triangle"></i></h3>
                                                <p class="py-4 text-base text-center">Bạn có chắc muốn xoá tài khoản <strong>"{{ $user->name }}"</strong>?</p>

                                                <div class="modal-action justify-center">
                                                    <!-- Nút hủy -->
                                                    <button class="btn bg-gray-500 text-white px-6"
                                                        onclick="document.getElementById('confirm-modal-{{ $user->id }}').close()">Hủy</button>

                                                    <!-- Nút xác nhận, gọi form xóa -->
                                                    <button class="btn btn-error text-white px-6"
                                                        onclick="document.getElementById('delete-form-{{ $user->id }}').submit()">Xoá</button>
                                                </div>
                                            </div>
                                        </dialog>
                                        <!-- Form xóa ẩn -->
                                        <form id="delete-form-{{ $user->id }}"
                                            action="{{ route('admin.users.destroy', $user) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>

    @pushOnce('bottom_scripts')
        <!-- jQuery -->
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.js"></script>
        <script type="text/javascript" src="{{ asset('adminpage/datatable/dataTables.js') }}"></script>
        <script type="text/javascript" src="{{ asset('adminpage/datatable/dataTables.bootstrap5.js') }}"></script>

        <script>
            $(document).ready(function() {

                var table = $('#example').DataTable({
                        responsive: true
                    })
                    .columns.adjust();
            });
        </script>
    @endPushOnce
</x-admin-layout>
