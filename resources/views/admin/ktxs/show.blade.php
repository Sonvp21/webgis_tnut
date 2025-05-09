<x-admin-layout>
    <link href="{{ asset('adminpage/datatable/dataTables.bootstrap5.css') }}" rel="stylesheet">
    <div class="flex-grow w-full md:p-5 p-1">
        <div class="mb-5">
            <h1 class="text-2xl font-semibold text-gray-800">Danh sách KTX</h1>
            <nav class="mt-2">
                <ol class="breadcrumb flex text-sm text-gray-600 space-x-2">
                    <li class="breadcrumb-ktx">
                        <a>KTX</a>
                    </li>
                    <li class="breadcrumb-ktx text-gray-500">
                        <span>/</span>
                    </li>
                    <li class="breadcrumb-ktx active text-gray-800 font-medium">
                        Danh sách KTX
                    </li>
                </ol>
            </nav>
        </div>

        <!-- End Page Title -->
        <div class="card p-2 bg-white shadow">
            <div class="card-body p-0">

                <!-- Tiêu đề -->
                <h1 class="text-4xl font-bold text-red-600 mb-4 border-b pb-2">
                    {{ $ktx->name }}
                </h1>

                <!-- Nội dung chi tiết -->
                <div class="prose prose-lg max-w-none text-gray-800 leading-relaxed">
                    {!! $ktx->content !!}
                </div>

                <!-- Quay lại -->
                <div class="mt-8">
                    <a href="{{ route('admin.ktxs.index') }}"
                        class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                        ← Quay lại danh sách
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>