import usersService from './users.service.js';

$(document).ready(function () {
    const usersservice = new usersService()
    usersservice.getAllData();

    function validation(isUpdate = false) {
        $('#formTambah').validate({
            rules: {
                name: {
                    required: true,
                    minlength: 3,
                    maxlength: 50
                },
                username: {
                    required: true,
                    minlength: 3,
                    maxlength: 30
                },
                role: {
                    required: true
                },
                email: {
                    required: true,
                    email: true,
                    maxlength: 50
                },
                password: {
                    required: !isUpdate,
                    minlength: 8,
                    maxlength: 20
                },
                password_confirmation: {
                    required: !isUpdate,
                    equalTo: "#password"
                }
            },
            messages: {
                name: {
                    required: "Nama tidak boleh kosong",
                    minlength: "Nama minimal 3 karakter",
                    maxlength: "Nama maksimal 50 karakter"
                },
                username: {
                    required: "Username tidak boleh kosong",
                    minlength: "Username minimal 3 karakter",
                    maxlength: "Username maksimal 30 karakter"
                },
                role: {
                    required: "Silahkan pilih role pengguna"
                },
                email: {
                    required: "Email tidak boleh kosong",
                    email: "Masukkan format email yang valid",
                    maxlength: "Email maksimal 50 karakter"
                },
                password: {
                    required: "Password tidak boleh kosong",
                    minlength: "Password minimal 8 karakter",
                    maxlength: "Password maksimal 20 karakter"
                },
                password_confirmation: {
                    required: "Konfirmasi password tidak boleh kosong",
                    equalTo: "Konfirmasi password harus sama dengan password"
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

    validation(true);


    $('#name, #username, #email, #password, #password_confirmation').on('input', function () {
        $(this).valid();
    });

    function checkingEdit() {
        return $('#id').val() ? true : false;
    }

    $('#formTambah').submit(function (e) {
        e.preventDefault();
        usersservice.upsertData(e, checkingEdit);
    });

    $(document).on('click', '.edit-modal', function () {
        const id = $(this).data('id');
        usersservice.getDataById(id, checkingEdit);
    });

    $(document).on('click', '.delete-confirm', function () {
        const id = $(this).data('id');
        usersservice.deleteData(id);
    });

    $('#formUsersModal').on('hidden.bs.modal', function () {
        $('#formTambah').validate().resetForm();
        $('#id').val('');
        $('#name').val('');
        $('#username').val('');
        $('#email').val('');
        $('#password').val('');
        $('#password_confirmation').val('');
        $('.form-control').removeClass('is-invalid is-valid');
    });

    $('#formUsersModal').on('show.bs.modal', function () {
        const isEdit = checkingEdit();
        validation(isEdit);
        $('#modal-title').html(`
        <i class="fas fa-box ms-2"></i>
        ${isEdit ? 'Edit Data' : 'Tambah Data'}
    `);
    });


});
