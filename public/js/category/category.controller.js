import categoryService from './category.service.js';

$(document).ready(function () {
    const categoryservice = new categoryService()
    categoryservice.getAllData();

    function validation() {
        $('#formTambah').validate({
            rules: {
                name: {
                    required: true,
                }
            },
            messages: {
                name: {
                    required: "Kategori tidak boleh kosong",
                }
            },
            highlight: function (element) {
                $(element).closest('.form-control').removeClass('is-valid').addClass('is-invalid');
            },
            success: function (label, element) {
                $(label).closest('.form-control').removeClass('is-invalid').addClass('is-valid');
                $(element).removeClass('is-invalid').addClass('is-valid');
            },
            errorPlacement: function (error, element) {
                error.addClass('text-danger');
                error.addClass('text-sm')
                error.insertAfter(element);
            }
        });
    }

    validation();

    $('#name').on('input', function () {
        $(this).valid()
    });

    function checkingEdit() {
        return $('#id').val() ? true : false;
    }

    $('#formTambah').submit(function (e) {
        e.preventDefault();
        categoryservice.createData(e, checkingEdit)
    });

    $(document).on('click', '.edit-modal', function () {
        const id = $(this).data('id')
        categoryservice.getDataById(id, checkingEdit)
    });

    $(document).on('click', '.delete-confirm', function () {
        const id = $(this).data('id')
        categoryservice.deleteData(id)
    });

    $('#formCategoryModal').on('hidden.bs.modal', function () {
        $('#id').val('')
        $('#name').val('')
        $('#modal-title').text('Tambah Data');
        $('.form-control').removeClass('is-invalid').removeClass('is-valid')
        $('.error').remove();
        $('#preview').remove()
    });

    $('#formCategoryModal').on('show.bs.modal', function () {
        $('#modal-title').html(
            `<i class="fas fa-box ms-2"></i>
            Form Data`
        );
    });
});
