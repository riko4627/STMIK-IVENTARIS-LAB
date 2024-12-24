import yearService from './year.service.js';

$(document).ready(function () {
    const yearservice = new yearService()
    yearservice.getAllData();

    function validation() {
        $('#formTambah').validate({
            rules: {
                year: {
                    required: true,
                    digits: true,
                    minlength: 4,
                    maxlength: 4,
                    range: [1900, new Date().getFullYear()]
                },
            },
            messages: {
                year: {
                    required: "Form tidak boleh kosong",
                    digits: "Tahun harus berupa angka",
                    minlength: "Tahun harus terdiri dari 4 digit",
                    maxlength: "Tahun harus terdiri dari 4 digit",
                    range: "Tahun harus antara 1900 hingga tahun saat ini",
                },
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

    $('#year').on('input', function () {
        $(this).valid();
    });

    function checkingEdit() {
        return $('#id').val() ? true : false;
    }

    $('#formTambah').submit(function (e) {
        e.preventDefault();
        yearservice.upsertData(e, checkingEdit);
    });

    $(document).on('click', '.edit-modal', function () {
        const id = $(this).data('id');
        yearservice.getDataById(id, checkingEdit);
    });

    $(document).on('click', '.delete-confirm', function () {
        const id = $(this).data('id');
        yearservice.deleteData(id);
    });

    $('#formYearModal').on('hidden.bs.modal', function () {
        $('#id').val('');
        $('#year').val('');
        $('.form-control').removeClass('is-invalid').removeClass('is-valid');
        $('.error').remove();
    });
    $('#formYearModal').on('show.bs.modal', function () {
        $('#modal-title').html(`
            <i class="fas fa-box ms-2"></i>
            Form Data
        `);
    });


});
