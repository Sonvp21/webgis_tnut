<link href="{{ asset('vendor/filepond/filepond.css') }}" rel="stylesheet" />
<link href="{{ asset('vendor/filepond/filepond-plugin-image-preview.css') }}" rel="stylesheet" />
<script src="{{ asset('vendor/filepond/filepond.js') }}"></script>
<script src="{{ asset('vendor/filepond/filepond-plugin-image-preview.js') }}"></script>
<script src="{{ asset('vendor/filepond/filepond-plugin-file-validate-type.js') }}"></script>
<script src="{{ asset('vendor/filepond/filepond-plugin-file-validate-size.js') }}"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        FilePond.registerPlugin(
            FilePondPluginImagePreview,
            FilePondPluginFileValidateType,
            FilePondPluginFileValidateSize
        );

        const imageInputElement = document.querySelector('#image_link');
        const existingImages = JSON.parse(document.getElementById('existingImages').value);
        const retainedImagesElement = document.getElementById('retainedImages');
        const newImagesElement = document.getElementById('newImages');

        // Create FilePond instance
        const pond = FilePond.create(imageInputElement, {
            labelIdle: 'Kéo và thả hình ảnh hoặc <span class="filepond--label-action">Chọn hình ảnh</span>',
            allowMultiple: true,
            acceptedFileTypes: ['image/*'],
            maxFiles: 10,
            maxFileSize: '10MB',
            server: {
                process: (fieldName, file, metadata, load, error, progress, abort) => {
                    const formData = new FormData();
                    formData.append(fieldName, file, file.name);

                    const request = new XMLHttpRequest();
                    request.open('POST', '/upload');
                    request.setRequestHeader('X-CSRF-TOKEN', document.querySelector(
                        'meta[name="csrf-token"]').getAttribute('content'));

                    request.upload.onprogress = (e) => {
                        progress(e.lengthComputable, e.loaded, e.total);
                    };

                    request.onload = function() {
                        if (request.status >= 200 && request.status < 300) {
                            const response = JSON.parse(request.responseText);
                            load(response.path);

                            // Thêm ảnh mới vào danh sách
                            const newImages = newImagesElement.value ? JSON.parse(
                                newImagesElement.value) : [];
                            newImages.push(response.path);
                            newImagesElement.value = JSON.stringify(newImages);

                            updateRetainedImages();
                        } else {
                            error('Upload failed');
                        }
                    };

                    request.send(formData);
                    return {
                        abort: () => {
                            request.abort();
                            abort();
                        }
                    };
                },
                revert: null,
                load: '/load/',
            }
        });

        // Khởi tạo với ảnh có sẵn
        const files = existingImages.map(file => ({
            source: file.file_path,
            options: {
                type: 'local',
                metadata: {
                    isExisting: true
                }
            }
        }));

        pond.files = files;

        // Cập nhật danh sách ảnh được giữ lại
        function updateRetainedImages() {
            const retainedFiles = pond.getFiles().map(file => {
                if (file.getMetadata('isExisting')) {
                    return file.source; // Trả về đường dẫn gốc cho ảnh cũ
                }
                return file.serverId; // Trả về path mới cho ảnh vừa upload
            });
            retainedImagesElement.value = JSON.stringify(retainedFiles);
        }

        // Theo dõi sự thay đổi của FilePond
        pond.on('removefile', (error, file) => {
            updateRetainedImages();
        });

        pond.on('processfile', (error, file) => {
            updateRetainedImages();
        });
    });
</script>
