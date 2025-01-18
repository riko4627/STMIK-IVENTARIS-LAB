<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('Image/stmikadhigunaicon.svg') }}" type="logo"/>
    <title>STMIK INVENTARIS LAB</title>
    @include('Layouts.style')
    <link rel="stylesheet" href="{{ asset('css/auth/login.css') }}">
</head>
<body>
    <div class="d-flex">
        <div class="container justify-content-center align-items-center">
        <div class="card login-card">
            <img src="{{ asset('Image/stmikadhigunaicon.svg') }}" alt="Logo" class="logo-header img-fluid" >
            <h3 class="text-center fw-bold  text-header">STMIK Adhi Guna</h3>
            <form id="formAuthentication" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email"><i class="fas fa-envelope pr-2"></i>Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
                    <small id="email-error" class="text-danger"></small>
                </div>
                <div class="form-group">
                    <label for="password"><i class="fas fa-lock pr-2"></i>Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                    <small id="password-error" class="text-danger"></small>
                </div>
                <div class="pt-2 form-group">
                    <button type="submit" class="btn btn-primary btn-block"><span class="fs-3 fw-semibold">Login</span></button>
                </div>
            </form>
            <div class="social-icons text-center mt-4">
                <a href="https://stmikadhiguna.ac.id"><img src="{{ asset('Image/stmikadhigunaicon.svg') }}" alt="Logo" class="img-fluid img-logo" ></a>
                <a href="https://pena.letdeploy.my.id"><img src="{{ asset('Image/pena.png') }}" alt="Logo" class="img-fluid img-logo" ></a>
            </div>
            <div class="login-footer d-flex justify-content-center align-items-center pt-3">
                <p>&copy;2025 Aplikasi Inventaris Barang Lab STMIK Adhi Guna</p>
            </div>
        </div>
    </div>
    </div>
    @include('Layouts.script')
    <script type="module" src="{{ asset('js/auth/auth.controller.js') }}"></script>
    <!-- <script>
        const apiUrl = 'v1/login';
        function successAlert(message) {
            Swal.fire({
                title: 'Berhasil!',
                text: message,
                icon: 'success',
                showConfirmButton: false,
                timer: 1000,
            })
        }

        // alert error message
        function errorAlert() {
            Swal.fire({
                title: 'Error',
                text: 'Terjadi kesalahan!',
                icon: 'error',
                showConfirmButton: false,
                timer: 1000,
            });
        }


        // funtion reload
        function reloadBrowsers() {
            setTimeout(function() {
                location.reload();
            }, 1500);
        }

        function loadingAllert(){
            Swal.fire({
                title: 'Loading...',
                text: 'Please wait',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });
        }

        $(document).ready(function () {
            let formInput = $('#formAuthentication');

            formInput.on('submit', function (e) {
                e.preventDefault();

                $('.text-danger').text('');

                let formData = new FormData(this);
                loadingAllert();

                $.ajax({
                    type: 'POST',
                    url: {{ url('${apiUrl}') }},
                    data: formData,
                    dataType: 'JSON',
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        Swal.close();
                        if (response.code === 422) {
                            let errors = response.errors;
                            $.each(errors, function(key, value) {
                                $('#' + key + '-error').text(value[0]);
                            });
                        } else {
                            successAlert();
                            if (response.user && response.user.role) {
                                switch (response.user.role.toLowerCase()) {
                                    case 'admin':
                                        window.location.href = '/';
                                        break;
                                    case 'staf':
                                        window.location.href = '/assesment';
                                        break;
                                    case 'penduduk':
                                        window.location.href = '/home';
                                        break;
                                    default:
                                        window.location.href = '/';
                                        break;
                                }
                            } else {
                                console.error('User role not found in response.');
                                window.location.href = '/';
                            }
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        Swal.close();
                        if (xhr.status === 401) {
                            errorAlert();
                        }
                    }
                });
            });
        });
    </script> -->
</body>
</html>