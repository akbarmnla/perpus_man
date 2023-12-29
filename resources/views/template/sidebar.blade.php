<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: rgb(195, 214, 195)">
    <!-- Brand Logo -->
    <a href="/welcome" class="brand-link">
        <img src="{{ asset('assets/img/logo.png') }}" alt=" " class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span style="color:rgb(0, 0, 0)"><strong>SMAN 1 Kota Bogor</strong></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar"style="background-color:#000851">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="javascript:;" class="d-block">
                    <p x-html="localStorage.getItem('name')">
                        <i class="right fas fa-angle-down" style="margin-left: 5px"></i>
                    </p>

                </a>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="/dashboard" class="nav-link {{ $active == 'dashboard' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>

                </li>
                <li class="nav-item" x-bind:class="role == 'admin' ? '' : 'd-none'">
                    <a href="/data-administrator" class="nav-link {{ $active == 'data-administrator' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Admin
                        </p>
                    </a>
                </li>
                <li class="nav-item" x-bind:class="role == 'admin' ? '' : 'd-none'">
                    <a href="/data-anggota" class="nav-link {{ $active == 'data-anggota' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Member
                        </p>
                    </a>
                </li>
                <li class="nav-item" x-bind:class="role == 'admin' ? '' : 'd-none'">
                    <a href="/data-buku" class="nav-link {{ $active == 'data-buku' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Data Buku
                        </p>
                    </a>
                </li>
                <li class="nav-item" x-bind:class="role == 'admin' ? '' : 'd-none'">
                    <a href="/peminjaman" class="nav-link {{ $active == 'peminjaman' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-book-reader"></i>
                        <p>
                            Transaksi
                        </p>
                    </a>
                </li>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
