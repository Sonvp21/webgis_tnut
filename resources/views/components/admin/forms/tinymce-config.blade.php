<div>
    <script src="{{ asset('/vendor/tinymce/tinymce.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Khởi tạo TinyMCE cho trường textarea với id tương ứng
            tinymce.init({
                language: '{{ app()->getLocale() === 'vi' ? 'vi_VN' : 'en_US' }}',
                selector: 'textarea#{{ $id }}',
                setup: function(editor) {
                    // Đăng ký plugin tùy chỉnh cho file upload
                    editor.ui.registry.addButton('attachment', {
                        tooltip: 'Attach/upload a File',
                        icon: 'upload',
                        onAction: function() {
                            const input = document.createElement('input');
                            input.type = 'file';
                            input.accept = '*/*';
                            input.onchange = function(event) {
                                const file = event.target.files[0];
                                if (file) {
                                    const formData = new FormData();
                                    formData.append('attachment', file);
                                    formData.append('model', '{{ $model }}');

                                    axios.post(
                                            '{{ route('admin.tinymce.attachment') }}',
                                            formData)
                                        .then(response => {
                                            const data = response.data;
                                            editor.insertContent(
                                                `<a class="text-blue-700 hover:underline" href="${data.attachment_url}" download="${file.name}">${file.name}</a>`
                                                );
                                        })
                                        .catch(error => {
                                            console.error('Error uploading file:',
                                                error);
                                        });
                                }
                            };

                            input.click();
                        }
                    });
                },
                images_file_types: 'jpg,svg,webp',
                file_picker_types: 'file image media',
                plugins: 'image code table lists link media fullscreen emoticons',
                toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright alignjustify | indent outdent | bullist numlist | code | table | link image attachment',
                image_title: true,
                automatic_uploads: true,
                image_advtab: true,
                image_caption: true,
                content_css: [],
                image_dimensions: false,
                image_class_list: [{
                    title: 'Responsive',
                    value: 'md:w-2/3 m-auto w-full'
                }],
                file_picker_callback: (cb, value, meta) => {
                    const input = document.createElement('input');
                    input.setAttribute('type', 'file');
                    input.setAttribute('accept', 'image/*');

                    input.addEventListener('change', (e) => {
                        const file = e.target.files[0];

                        const reader = new FileReader();
                        reader.addEventListener('load', () => {
                            const id = 'blobid' + (new Date()).getTime();
                            const blobCache = tinymce.activeEditor.editorUpload
                                .blobCache;
                            const base64 = reader.result.split(',')[1];
                            const blobInfo = blobCache.create(id, file, base64);
                            blobCache.add(blobInfo);

                            cb(blobInfo.blobUri(), {
                                title: file.name
                            });
                        });
                        reader.readAsDataURL(file);
                    });

                    input.click();
                },
            });
        });
    </script>
</div>
