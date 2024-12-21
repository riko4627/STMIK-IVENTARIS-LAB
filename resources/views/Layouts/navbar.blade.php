<div class="main-header">
    <!-- Logo Header -->
    <div class="logo-header" data-background-color="blue">
        <a href="/" class="logo">
            <img src="{{ asset('Image/sps.png') }}" alt="navbar brand" class="navbar-brand logo-img">
        </a>
        <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse"
            data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">
                <i class="icon-menu"></i>
            </span>
        </button>
        <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
        <div class="nav-toggle">
            <button class="btn btn-toggle toggle-sidebar">
                <i class="icon-menu"></i>
            </button>
        </div>
    </div>
    <!-- End Logo Header -->

    <!-- Navbar Header -->
    <nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">
        <div class="container-fluid">
            <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                <li class="nav-item dropdown hidden-caret">
                    <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                        <div class="my-auto">
                            <i class="fas fa-sign-out-alt fa-2x text-light" id="iconLogout"></i>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- End Navbar -->
</div>

<style>
    /* Styling untuk menyesuaikan ukuran logo */
    .logo-header .logo .logo-img {
        height: 50px;
        /* Sesuaikan tinggi logo dengan navbar */
        max-height: 100%;
        /* Pastikan logo tidak melebihi tinggi navbar */
        width: auto;
        /* Menjaga proporsi logo */
    }

    /* Styling tambahan untuk memperbaiki tampilan navbar */
    .logo-header {
        display: flex;
        align-items: center;
        padding: 0 15px;
    }

    .navbar-header {
        padding: 0 15px;
    }

    .navbar-toggler {
        border: none;
        background: transparent;
    }

    .navbar-toggler-icon {
        font-size: 1.5rem;
        color: white;
    }

    .topbar-toggler {
        border: none;
        background: transparent;
    }

    .topbar-nav .nav-item .profile-pic {
        display: flex;
        align-items: center;
    }

    .topbar-nav .nav-item .profile-pic i {
        font-size: 1.5rem;
        color: white;
    }
</style>
