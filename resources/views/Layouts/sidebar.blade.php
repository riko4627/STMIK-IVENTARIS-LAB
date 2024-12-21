<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="../assets/img/profile2.jpg" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            @auth
                                {{ auth()->user()->name }}
                            @endauth
                            @auth
                                <span class="user-level">{{ auth()->user()->agency }}</span>
                            @endauth

                        </span>
                    </a>
                    <div class="clearfix"></div>
                </div>
            </div>
            <ul class="nav nav-primary">
                <li class="nav-item {{ request()->is('/dashboard*') ? 'active' : '' }}">
                    <a href="{{ url('/dashboard') }}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item {{ request()->is('/user*') ? 'active' : '' }}">
                    <a href="{{ url('/user') }}">
                        <i class="fas fa-user"></i>
                        <p>Pengguna</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
