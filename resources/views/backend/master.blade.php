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
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
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
            <div class="sidebar p-0">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-2 pb-2 mb-2 d-flex">
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
                    <ul class="nav nav-pills nav-sidebar flex-column sidebar-menu" data-widget="treeview" role="menu"
                        data-accordion="false" id="sidebar-menu">

                        <li class="nav-item" id="menu_dashborad">
                            <a href="{{ route('dashboard') }}" class="nav-link">
                                &nbsp;<i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    &nbsp; Dashboard
                                </p>
                            </a>
                        </li>

                        <li class="nav-item"  id="menu_slider">
                            <a href="{{ route('slider.index') }}" class="nav-link">
                                &nbsp;<i class="nav-icon fas fa-sliders-h"></i>
                                <p>
                                    &nbsp; Sliders
                                </p>
                            </a>
                        </li>
                        <li class="nav-item" id="menu_type">
                            <a href="{{ route('type-list') }}" class="nav-link">
                                &nbsp;<i class="nav-icon far fa-plus-square"></i>
                                <p>
                                    &nbsp; Types
                                </p>
                            </a>
                        </li>

                        <li class="nav-item" id="menu_school">
                            <a href="{{ route('school-list') }}" class="nav-link">
                                &nbsp;<i class="nav-icon fas fa-school"></i>
                                <p>
                                    &nbsp; Schools
                                </p>
                            </a>
                        </li>

                        <li class="nav-item" id="menu_department_one">
                            <a href="{{ route('department-list') }}" class="nav-link">
                                &nbsp;<i class="nav-icon fas fa-chalkboard"></i>
                                <p>
                                    &nbsp; Departments A
                                </p>
                            </a>
                        </li>

                        <li class="nav-item" id="menu_sub">
                            <a href="{{ route('subject-list') }}" class="nav-link">
                                &nbsp;<i class="nav-icon fas fa-sitemap"></i>
                                <p>
                                    &nbsp; Subjects
                                </p>
                            </a>
                        </li>

                        <li class="nav-item" id="menu_new_youth">
                            <a href="{{ route('newsyouth-list') }}" class="nav-link">
                                &nbsp;<i class="nav-icon fas fa-id-card"></i>
                                <p>
                                    &nbsp; News Youths
                                </p>
                            </a>
                        </li>

                        <li class="nav-item" id="menu_department_two">
                            <a href="{{ route('web_department.index') }}" class="nav-link" title="Web Department">
                                &nbsp;<i class="nav-icon fas fa-building"></i>
                                <p>
                                    &nbsp; Departments B
                                </p>
                            </a>
                        </li>
                        <li class="nav-item" id="menu_web_skill">
                            <a href="{{ route('web_skill.index') }}" class="nav-link">
                                &nbsp;<i class="nav-icon fas fa-lightbulb"></i>  
                                &nbsp; Skills
                                </a>
                        </li>
                        <li class="nav-item" id="menu_report">
                            <a href="{{ route('backend.report.index') }}" class="nav-link">
                                &nbsp;<i class="nav-icon fas fa-paste"></i>
                                <p>
                                &nbsp; Reports
                                </p>
                            </a>
                        </li>

                        @if (Auth::user()->is_admin == 1)
                            <li class="nav-item" id="menu_users">
                                <a href="{{ route('user-list') }}" class="nav-link">
                                    &nbsp;<i class="nav-icon fas fa-users"></i>
                                    <p>
                                        &nbsp; Users
                                    </p>
                                </a>
                            </li>
                        @endif
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
                                &nbsp;<i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>
                                    &nbsp; Logout
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
    <!-- link CKeditor -->
    <script src="https://cdn.ckeditor.com/4.16.1/full/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('editor1', {
            height: 400,
            baseFloatZIndex: 10005
        });
    </script>
    <!-- End link CKeditor -->
     <!-- sweetalert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
             $(document).on("click", "#delete", function(e){
                 e.preventDefault();
                 var link = $(this).attr("href");
                 Swal.fire({
                     title: 'Are you sure?',
                     text: "Delete this Data?!",
                     icon: 'warning',
                     showCancelButton: true,
                     confirmButtonColor: '#3085d6',
                     cancelButtonColor: '#d33',
                     confirmButtonText: 'Yes, delete it!'
                     }).then((result) => {
                     if (result.isConfirmed) {
                         window.location.href = link
                         Swal.fire(
                         'Deleted!',
                         'Your file has been deleted.',
                         'success'
                         )
                     }
                 })
             }); 
     </script>
     <!-- end sweetalert -->
</body>

</html>
