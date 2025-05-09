<x-admin-layout>
    <h1>Thêm gate</h1>

    <form action="{{ route('gate.store') }}" method="POST">
        @csrf

        <label for="name">Tên:</label>
        <input type="text" name="name" required>

        <label for="content">Nội dung:</label>
        <textarea id="content" name="content"></textarea>

        <button type="submit">Lưu</button>
    </form>

    <script src="https://cdn.tiny.cloud/1/22djxth7gmtdbeajfjo4ob3dgoy1datqiqgo2ql6ngy7trf1/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
        tinymce.init({
            selector: '#content',
            plugins: 'image code',
            toolbar: 'undo redo | bold italic | alignleft aligncenter alignright | code | image',
            images_upload_url: '{{ route("tinymce.upload") }}',
            automatic_uploads: true,
            file_picker_types: 'image',
            file_picker_callback: function (cb, value, meta) {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');
                
                input.onchange = function () {
                    var file = this.files[0];
                    var formData = new FormData();
                    formData.append('file', file);
                    formData.append('_token', '{{ csrf_token() }}');
        
                    fetch('{{ route("tinymce.upload") }}', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        cb(data.location, { title: file.name });
                    })
                    .catch(() => alert('Tải ảnh thất bại!'));
                };
        
                input.click();
            }
        });
        </script>

</x-admin-layout>