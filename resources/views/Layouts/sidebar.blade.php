<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/cms/dashboard" class="brand-link">
        <img src="{{ asset('custom/asset/STMIK.png') }}" alt="AdminLTE Logo" class="img-fluid" style="opacity: .8">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="{{ url('/dashboard') }}"
                        class="nav-link {{ request()->is('/dashboard') ? 'active-custom' : '' }}">
                        <i class="nav-icon fa-solid fa-house"></i>
                        <p>Dashboard</p>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="{{ url('/user') }}" class="nav-link {{ request()->is('/user') ? 'active-custom' : '' }}">
                        <i class="nav-icon fa-solid fa-user"></i>
                        <p>Pengguna</p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
</aside>
