<x-app-layout>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    <h1>Danh sách conference</h1>
    <a href="{{ route('conference.create') }}" class="btn btn-primary mb-3">+ Thêm mới</a>

    <table id="conference-table" class="display">
        <thead>
            <tr>
                <th>Tên conference</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
                <tr>
                    <td><strong>{{ $item->name }}</strong></td>
                    <td>
                        <a href="{{ route('conference.show', $item->id) }}">Xem chi tiết</a> | <!-- Liên kết đến trang chi tiết -->
                        <a href="{{ route('conference.edit', $item->id) }}">Sửa</a> |
                        <form action="{{ route('conference.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Xóa?')">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#conference-table').DataTable();
        });
    </script>
</x-app-layout>