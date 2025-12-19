<script>
    function subModuleCrud() {
        return {
            isModalOpen: false,
            isEdit: false,
            modalTitle: '',
            formAction: '',
            form: {
                title: '',
                sub_title: '',
                content: '',
            },

            openCreateModal() {
                this.isEdit = false;
                this.modalTitle = 'Tambah Materi Baru';
                this.formAction = '{{ route('sub-modules.store', $module->id) }}';
                this.form.title = '';
                this.form.sub_title = '';
                this.form.content = '';
                this.isModalOpen = true;
                this.$nextTick(() => {
                    this.initSummernote('');
                });
            },

            openEditModal(subModule) {
                this.isEdit = true;
                this.modalTitle = 'Edit Materi';
                let url = "{{ route('sub-modules.update', ':id') }}";
                this.formAction = url.replace(':id', subModule.id);
                this.form.title = subModule.title;
                this.form.sub_title = subModule.sub_title;
                this.form.content = subModule.content;
                this.isModalOpen = true;
                this.$nextTick(() => {
                    this.initSummernote(subModule.content || '');
                });
            },

            closeModal() {
                this.isModalOpen = false;
                this.destroySummernote();
            },

            initSummernote(content) {
                if (typeof $ !== 'undefined' && $.fn.summernote) {
                    $('#summernote-editor').summernote({
                        placeholder: 'Tulis konten materi di sini...',
                        tabsize: 2,
                        height: 300,
                        toolbar: [
                            ['style', ['style']],
                            ['font', ['bold', 'italic', 'underline', 'strikethrough', 'clear']],
                            ['fontname', ['fontname']],
                            ['fontsize', ['fontsize']],
                            ['color', ['color']],
                            ['para', ['ul', 'ol', 'paragraph']],
                            ['table', ['table']],
                            ['insert', ['link', 'picture', 'video']],
                            ['view', ['fullscreen', 'codeview', 'help']]
                        ],
                        fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New', 'Helvetica',
                            'Impact', 'Tahoma', 'Times New Roman', 'Verdana'
                        ],
                        fontNamesIgnoreCheck: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New',
                            'Helvetica', 'Impact', 'Tahoma', 'Times New Roman', 'Verdana'
                        ],
                    });
                    $('#summernote-editor').summernote('code', content);
                }
            },

            destroySummernote() {
                if (typeof $ !== 'undefined' && $.fn.summernote) {
                    if ($('#summernote-editor').hasClass('summernote')) {
                        $('#summernote-editor').summernote('destroy');
                    }
                }
            },

            syncContent() {
                if (typeof $ !== 'undefined' && $.fn.summernote) {
                    this.form.content = $('#summernote-editor').summernote('code');
                    $('#summernote-editor').val(this.form.content);
                }
            }
        }
    }
</script>
