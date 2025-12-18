<script>
    function moduleCrud() {
        return {
            isModalOpen: false,
            isEdit: false,
            modalTitle: '',
            formAction: '',
            form: {
                title: '',
                sub_title: '',
            },


            openCreateModal() {
                this.isEdit = false;
                this.modalTitle = 'Add Module';
                this.formAction = '{{ route('modules.store', $courseId) }}';
                this.form.title = '';
                this.form.sub_title = '';
                this.isModalOpen = true;
            },


            openEditModal(module) {
                this.isEdit = true;
                this.modalTitle = 'Edit Module';
                let url = "{{ route('modules.update', ':id') }}";
                this.formAction = url.replace(':id', module.id);
                this.form.title = module.title;
                this.form.sub_title = module.sub_title;
                this.isModalOpen = true;
            },


            closeModal() {
                this.isModalOpen = false;
            }
        }
    }
</script>
