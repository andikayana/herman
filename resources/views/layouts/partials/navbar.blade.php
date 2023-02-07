<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="{{ asset('assets/adminLTE/dist/img/avatar5.png') }}" class="user-image img-circle"
                    alt="User Image">
                <span class="hidden-xs">{{ auth()->user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                    <img src="{{ asset('assets/adminLTE/dist/img/avatar5.png') }}" class="img-circle elevation-2"
                        alt="User Image" width="50px" height="50px">
                    <p>{{ auth()->user()->name }}</p>
                </li>

                <li class="user-footer">
                    <div class="pull-right">
                        <a href="{{ url('/logout') }}" class="btn btn-danger" style="width: 100%">Logout</a>
                    </div>
                </li>
            </ul>
        </li>
    </ul>
</nav>
<!-- /.navbar -->
