<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
        <img src="{{ asset('assets/img/logo.png') }}" alt="logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Klinik dr. Herman</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('assets/adminLTE/dist/img/avatar5.png') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info" sy>
                <a href="{{ url('/') }}" class="d-block">{{auth()->user()->name}}</a>
            </div>
        </div> --}}

        <!-- SidebarSearch Form -->
        <div class="form-inline mt-3">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ url('/') }}" class="nav-link {{ Route::is('home.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Dashboard
                            {{-- <span class="right badge badge-danger">New</span> --}}
                        </p>
                    </a>
                </li>

                <li class="nav-item {{ Route::is('pasien_visitation.*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{-- {{ Route::is('pasien*') ? 'active' : '' }} --}}">
                        <i class="nav-icon fas fa-pen"></i>
                        <p>Kunjungan Pasien
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('pasien_visitation/create') }}"
                                class="nav-link {{ Route::is('pasien_visitation.create') ? 'active' : '' }}">
                                <i class="fa fa-chevron-right nav-icon"></i>
                                <p>Tambah Kunjungan Pasien</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('pasien_visitation/') }}"
                                class="nav-link {{ Route::is('pasien_visitation.index') ? 'active' : '' }}">
                                <i class="fa fa-chevron-right nav-icon"></i>
                                <p>Daftar Kunjungan Pasien</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item {{ Route::is('pasien.*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{-- {{ Route::is('pasien*') ? 'active' : '' }} --}}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Pasien
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('pasien/create') }}"
                                class="nav-link {{ Route::is('pasien.create') ? 'active' : '' }}">
                                <i class="fa fa-chevron-right nav-icon"></i>
                                <p>Tambah Pasien</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('pasien/') }}"
                                class="nav-link {{ Route::is('pasien.index') ? 'active' : '' }}">
                                <i class="fa fa-chevron-right nav-icon"></i>
                                <p>Daftar Pasien</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/') }}" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Pelayanan Pasien</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/logout') }}" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
