<link href="{{ asset('vendor/filepond/filepond.css') }}" rel="stylesheet" />
<link href="{{ asset('vendor/filepond/filepond-plugin-image-preview.css') }}" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('vendor/choices/choices.min.css') }}" />
<script src="{{ asset('vendor/choices/choices.min.js') }}"></script>
<script src="{{ asset('vendor/filepond/filepond.js') }}"></script>
<script src="{{ asset('vendor/filepond/filepond-plugin-image-preview.js') }}"></script>
<script src="{{ asset('vendor/filepond/filepond-plugin-file-validate-type.js') }}"></script>
<script src="{{ asset('vendor/filepond/filepond-plugin-file-validate-size.js') }}"></script>
<script>
    FilePond.registerPlugin(
        FilePondPluginImagePreview,
        FilePondPluginFileValidateType,
        FilePondPluginFileValidateSize,
    );

    // Tạo FilePond instance cho tệp đính kèm
    const documentInputElement = document.querySelector('input[name="document_link[]"]');
    const documentPathsElement = document.getElementById('documentPath');

    const documentPond = FilePond.create(documentInputElement, {
        labelIdle: 'Kéo và thả tệp hoặc <span class="filepond--label-action">Chọn tệp</span>',
        allowMultiple: true,
        acceptedFileTypes: ['application/pdf', 'application/msword',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
        ],
        maxFiles: 10,
        maxFileSize: '10MB',
        server: {
            process: (fieldName, file, metadata, load, error, progress, abort) => {
                const formData = new FormData();
                formData.append(fieldName, file, file.name);

                const request = new XMLHttpRequest();
                request.open('POST', '/upload');
                request.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]')
                    .getAttribute('content'));

                request.upload.onprogress = (e) => {
                    progress(e.lengthComputable, e.loaded, e.total);
                };

                request.onload = function() {
                    if (request.status >= 200 && request.status < 300) {
                        const response = JSON.parse(request.responseText);
                        load(response.path);
                        const paths = documentPathsElement.value ? JSON.parse(documentPathsElement
                            .value) : [];
                        paths.push(response.path);
                        documentPathsElement.value = JSON.stringify(paths);
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
            revert: (uniqueFileId, load, error) => {
                const request = new XMLHttpRequest();
                request.open('DELETE', '/revert');
                request.setRequestHeader('Content-Type', 'application/json');
                request.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]')
                    .getAttribute('content'));

                request.onload = function() {
                    if (request.status >= 200 && request.status < 300) {
                        load();
                        const paths = JSON.parse(documentPathsElement.value);
                        const updatedPaths = paths.filter(path => path !== uniqueFileId);
                        documentPathsElement.value = JSON.stringify(updatedPaths);
                    } else {
                        error('Revert failed');
                    }
                };

                request.send(JSON.stringify({
                    path: uniqueFileId
                }));
            }
        }
    });

    // Tạo FilePond instance cho ảnh
    const imageInputElement = document.querySelector('input[name="image_link[]"]');
    const imagePathsElement = document.getElementById('imagePath');

    const imagePond = FilePond.create(imageInputElement, {
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
                request.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]')
                    .getAttribute('content'));

                request.upload.onprogress = (e) => {
                    progress(e.lengthComputable, e.loaded, e.total);
                };

                request.onload = function() {
                    if (request.status >= 200 && request.status < 300) {
                        const response = JSON.parse(request.responseText);
                        load(response.path);
                        const paths = imagePathsElement.value ? JSON.parse(imagePathsElement.value) :
                    [];
                        paths.push(response.path);
                        imagePathsElement.value = JSON.stringify(paths);
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
            revert: (uniqueFileId, load, error) => {
                const request = new XMLHttpRequest();
                request.open('DELETE', '/revert');
                request.setRequestHeader('Content-Type', 'application/json');
                request.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]')
                    .getAttribute('content'));

                request.onload = function() {
                    if (request.status >= 200 && request.status < 300) {
                        load();
                        const paths = JSON.parse(imagePathsElement.value);
                        const updatedPaths = paths.filter(path => path !== uniqueFileId);
                        imagePathsElement.value = JSON.stringify(updatedPaths);
                    } else {
                        error('Revert failed');
                    }
                };

                request.send(JSON.stringify({
                    path: uniqueFileId
                }));
            }
        }
    });
</script>