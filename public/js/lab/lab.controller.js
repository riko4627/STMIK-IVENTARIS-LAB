import labService from './lab.service.js';

$(document).ready(function () {
    const labservice = new labService()
    labservice.getAllData();

    function validation() {
        $('#formTambah').validate({
            rules: {
                rules: {
                    name: {
                        required: true,
                        minlength: 1,
                        maxlength: 15
                    },
                    location: {
                        required: true,
                        minlength: 1,
                        maxlength: 15
                    },

                },
                messages: {
                    name: {
                        required: "Nama tidak boleh kosong",
                        minlength: "Nama harus minimal 1 karakter",
                        maxlength: "Nama tidak boleh lebih dari 15 karakter"
                    },
                    location: {
                        required: "Lokasi tidak boleh kosong",
                        minlength: "Lokasi harus minimal 1 karakter",
                        maxlength: "Lokasi tidak boleh lebih dari 15 karakter"
                    },

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
                error.addClass('text-sm');
                error.insertAfter(element);
            }
        });
    }


    validation();

    $('#name, #location').on('input', function () {
        $(this).valid();
    });

    function checkingEdit() {
        return $('#id').val() ? true : false;
    }

    $('#formTambah').submit(function (e) {
        e.preventDefault();
        labservice.upsertData(e, checkingEdit);
    });

    $(document).on('click', '.edit-modal', function () {
        const id = $(this).data('id');
        labservice.getDataById(id, checkingEdit);
    });

    $(document).on('click', '.delete-confirm', function () {
        const id = $(this).data('id');
        labservice.deleteData(id);
    });

    $('#formLabModal').on('hidden.bs.modal', function () {
        $('#id').val('');
        $('#name').val('');
        $('#location').val('');
        $('.form-control').removeClass('is-invalid').removeClass('is-valid');
        $('.error').remove();
    });
    $('#formLabModal').on('show.bs.modal', function () {
        $('#modal-title').html(`
            <i class="fas fa-box ms-2"></i>
            Form Data
        `);
    });

});
