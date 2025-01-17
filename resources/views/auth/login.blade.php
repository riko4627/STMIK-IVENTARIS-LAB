<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('Image/SIPS.png') }}" type="image/png"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- API Url -->
    <script>
        let appUrl = '{{ env('APP_URL') }}';
    </script>
        <style>
        .login-card {
            max-width: 500px;
            margin: auto;
            margin-top: 50px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 20px;
        }
        .social-icons a {
            margin: 0 10px;
            color: #333;
        }
        .img-logo{
            width: 50px;
            height: 50px;
        }
        .logo-header{
            width: 400px;
            height: 200px;
            margin: auto;
        }
        .text-header{
            font: bold;
            font-size: 50px;
        }
    </style>
    @include('Layouts.style')
</head>
<body>
    <div class="d-flex">
        <div class="container justify-content-center align-items-center">
        <div class="card login-card">
            <img src="{{ asset('../assets/img/lab.jpeg') }}" alt="Logo" class="logo-header img-fluid" >
            <h3 class="text-center fw-bold  text-header">Login</h3>
            <form id="loginForm" method="POST">
                @csrf
                <div class="form-group">
                    <label for="username"><i class="fas fa-user pr-2"></i>Username</label>
                    <input type="text" class="form-control" name="username" id="username" placeholder="Enter username" autocomplete="off">
                    <div class="input-group-append">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password"><i class="fas fa-lock pr-2"></i>Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" autocomplete="off">
                    <div class="input-group-append">
                    </div>
                </div>
                <div class="pt-2">
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                </div>
            </form>
            <div class="social-icons text-center mt-4">
                <a href="#"><img src="{{ asset('Image/stmikadhigunaicon.svg') }}" alt="Logo" class="img-fluid img-logo" ></a>
                <a href="#"><img src="{{ asset('Image/pena.png') }}" alt="Logo" class="img-fluid img-logo" ></a>
            </div>
            <div class="login-footer d-flex justify-content-center align-items-center pt-3">
                <p>&copy; 2024 Sistem Iventaris Lab STIMIK Adhi Guna</p>
            </div>
        </div>
    </div>
    </div>

    <script type="module" src="{{ asset('js/auth/auth.controller.js') }}"></script>
    @include('Layouts.script')

</body>
</html>
