<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SAKKAL ADMIN</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ url('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('dist/css/adminlte.min.css') }}">
</head>

<body class="text-dark hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar  sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            {{-- <a href="{{ route('dashboard') }}" class="brand-link">
                <img src="{{ url('images/white_Sakkal.png')}}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-dark">SAKKAL</span>
            </a> --}}

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    {{-- <div class="image">
                        <img src="{{ url('images/white_Sakkal.png')}}" class="img-circle elevation-2" alt="User Image">
                    </div> --}}
                    <div class="info">
                        <a href="{{ route('dashboard') }}" class="brand-link">
                            <img src="{{ url('images/white_Sakkal.png')}}" alt="AdminLTE Logo"
                                class="brand-image img-circle elevation-3" style="opacity: .8">
                            <span class="brand-text font-dark">SAKKAL</span>
                        </a>
                        {{-- <a href="#" class="d-block">{{ Auth::user()->name }}</a> --}}
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">

                        <li class="nav-item">
                            <a href="{{ route('dashboard') }}" class="nav-link">
                                <i class="nav-icon fas fa-circle"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>

                        @if (Auth::user()->is_admin)
                            <li class="nav-item">
                                <a href="{{ route('user-list') }}" class="nav-link">
                                    <i class="nav-icon fas fa-circle"></i>
                                    <p>
                                        Users
                                    </p>
                                </a>
                            </li>
                        @endif

                        <li class="nav-item">
                            <a href="{{ route('type-list') }}" class="nav-link">
                                <i class="nav-icon fas fa-circle"></i>
                                <p>
                                    Types
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('school-list') }}" class="nav-link">
                                <i class="nav-icon fas fa-circle"></i>
                                <p>
                                    Schools
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('department-list') }}" class="nav-link">
                                <i class="nav-icon fas fa-circle"></i>
                                <p>
                                    Departments
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('subject-list') }}" class="nav-link">
                                <i class="nav-icon fas fa-circle"></i>
                                <p>
                                    Subjects
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('newsyouth-list') }}" class="nav-link">
                                <i class="nav-icon fas fa-circle"></i>
                                <p>
                                    News Youth
                                </p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="{{ route('skill.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-circle"></i>
                                <p>
                                    Skill
                                </p>
                            </a>
                        </li>

                        {{-- <li class="nav-item">
                            <a href="{{ route('book-list') }}" class="nav-link">
                                <i class="nav-icon fas fa-circle"></i>
                                <p>
                                    Book
                                </p>
                            </a>
                        </li> --}}

                         <li class="nav-item">
                        <li class="nav-item">
                            <a href="{{ route('talent.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-circle"></i>
                                <p>
                                    Talent
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('home.slider') }}" class="nav-link">

                                <i class="nav-icon fas fa-circle"></i>
                                <p>
                                    Slider
                                </p>
                            </a>
                        </li>

                        {{-- <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-circle"></i>
                                <p>
                                    General
                                </p>
                            </a>
                        </li> --}}

                        <li class="nav-item">
                            <a href="{{ route('logout') }}" class="nav-link">
                                <i class="nav-icon fas fa-circle"></i>
                                <p>
                                    Logout
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper pt-4">

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">@yield('title', 'Hello')</h3>
                    </div>
                    <div class="card-body">
                        @yield('content')
                    </div>
                    <div class="card-footer">
                        @yield('action')
                    </div>
                </div>

                <!-- Default box -->
                @yield('content_talent')

                <!-- /.card -->

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 1.0
            </div>
            <strong>Copyright &copy; 2022 <a href="{{ url('/') }}">sakkal.com</a>.</strong> All rights reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ url('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ url('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ url('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{ url('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{ url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{ url('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{ url('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    @yield('script')
    <!-- AdminLTE App -->
    <script src="{{ url('dist/js/adminlte.min.js') }}"></script>
</body>

</html>
