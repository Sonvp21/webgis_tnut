<x-app-layout>
   
    <h1>Sửa conference</h1>

    <form action="{{ route('conference.update', $conference->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Tên:</label>
        <input type="text" name="name" value="{{ $conference->name }}" required>

        <label for="content">Nội dung:</label>
        <textarea id="content" name="content">{{ $conference->content }}</textarea>

        <button type="submit">Cập nhật</button>
    </form>

    <script src="{{ asset('tinymce/tinymce.min.js') }}"></script>
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
        
</x-app-layout>
   
