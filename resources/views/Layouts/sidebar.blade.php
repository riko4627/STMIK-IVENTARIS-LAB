<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-lg d-flex justify-content-center align-items-center">
                    <img src="../assets/img/lab.jpeg" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">

                    </a>
                    <div class="clearfix"></div>
                </div>
            </div>
            <ul class="nav nav-primary">
                <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
                    <a href="{{ url('/') }}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->is('year*') ? 'active' : '' }}">
                    <a href="{{ url('/year') }}">
                        <i class="fas fa-hashtag"></i>
                        <p>Tahun</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->is('lab*') ? 'active' : '' }}">
                    <a href="{{ url('/lab') }}">
                        <i class="fas fa-door-open"></i>
                        <p>Ruang Lab</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->is('category*') ? 'active' : '' }}">
                    <a href="{{ url('/category') }}">
                        <i class="fas fa-hashtag"></i>
                        <p>Kategori Barang</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->is('inventory*') ? 'active' : '' }}">
                    <a href="{{ url('/inventory') }}">
                        <i class="fas fa-hashtag"></i>
                        <p>Inventaris Barang</p>
                    </a>
                </li>
                @if (auth()->user()->role == 'super admin')
                <li class="nav-item {{ request()->is('users*') ? 'active' : '' }}">
                    <a href="{{ url('/users') }}">
                        <i class="fas fa-user"></i>
                        <p>Pengguna</p>
                    </a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</div>
