<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="/panel" class="brand-link">
                {{-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8"> --}}
                <span class="brand-text font-weight-light">Portofolio CMS</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        @auth
                            <li class="nav-item">
                                <a href="/panel/profile" class="nav-link">
                                    <i class="fas fa-user"></i>
                                    <p>Profile Edit</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/panel/socmed" class="nav-link">
                                    <i class="fas fa-photo-video"></i>
                                    <p>Socmed Edit</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/panel/projects" class="nav-link">
                                    <i class="fas fa-file-chart-pie"></i>
                                    <p>Projects Edit</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/panel/skills" class="nav-link">
                                    <i class="fal fa-users"></i>
                                    <p>Skills Edit</p>
                                </a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a href="/panel/login" class="nav-link">
                                    <i class="nav-icon fas fa-sign-in-alt"></i>
                                    <p>
                                        Login
                                    </p>
                                </a>
                            </li>
                        @endauth
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
