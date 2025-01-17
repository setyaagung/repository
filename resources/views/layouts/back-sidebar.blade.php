<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{ asset('img/logo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><b>STIE CENDEKIAKU</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('assets/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('dashboard')}}" class="nav-link {{ (request()->segment(1) == 'dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('author.index')}}" class="nav-link {{ (request()->segment(1) == 'author') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-chalkboard-teacher"></i>
                        <p>Author</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('edisi.index')}}" class="nav-link {{ (request()->segment(1) == 'edisi') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-file-archive"></i>
                        <p>Edisi</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('jurnal.index')}}" class="nav-link {{ (request()->segment(1) == 'jurnal') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>Jurnal</p>
                    </a>
                </li>
                @if (Auth::user()->id == 1)
                    <li class="nav-item">
                        <a href="{{ route('user.index')}}" class="nav-link {{ (request()->segment(1) == 'user') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-user"></i>
                            <p>Kelola Pengguna</p>
                        </a>
                    </li>
                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
