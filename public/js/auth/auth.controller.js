import authService from "./auth.service.js";

$(document).ready(function () {
    const authservice = new authService()
    
    function validation() {
        $('#formAuthentication').validate({
            rules: {
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                }
            },
            message: {
                email: {
                    required: "Email tidak boleh kosong",
                    email: "Format email tidak valid"
                },
                password: {
                    required: "Password tidak boleh kosong"
                }
            },
            highlight: function (element) {
                $(element).closest('.form-group').find('.form-control').removeClass('is-valid').addClass('is-invalid');
                $(element).closest('.form-group').removeClass('mb-4');
            },
            success: function (label, element) {
                $(element).closest('.form-group').find('.form-control').removeClass('is-invalid').addClass('is-valid');
                $(element).closest('.form-group').removeClass('mb-4');
            },
            erroPlacement: function (error, element) {
                error.addClass('text-danger text-sm');

                if (element.parent('.form-group').lenght) {
                    error.insertAfter(element.parent());
                } else {
                    error.insertAfter(element);
                }
            }
        });
    }

    validation();

    $('#email, #password').on('input', function () {
        $(this).valid()
    })

    $('#formAuthentication').submit(function (e) {
        e.preventDefault();
        authservice.login(e)
    })
});