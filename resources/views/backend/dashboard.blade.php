@extends('backend.master')

@section('title', 'DASHBOARD')

@section('content')

@php
    $sliders = @\App\Models\Slider::where('status',1)->count();
    $types = @\App\Models\Type::count();
    $schools = @\App\Models\School::count();
    $departments = @\App\Models\Department::count();
    $subjects = @\App\Models\Subject::count();
    $newsYouths = @\App\Models\NewsYouth::count();
    $webDepartments = @\App\Models\WebDepartments::where('status',1)->count();
    $webSkills = @\App\Models\WebSkills::where('status',1)->count();
    $webStudentsSubmit = @\App\Models\WebStudentsSubmit::count();
    $messsages = @\App\Models\Contacts::count();
    $users = @\App\Models\User::count();



@endphp
    <body>
        <div >

            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Sakkal Dashboard</h1>
                        </div>
                    </div>
                </div>
            </div>

            <section class="content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-3 p-2">
                            <div class="info-box">
                                <span class="info-box-icon bg-info elevation-1"><i class="nav-icon fas fa-sliders-h"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Sliders</span>
                                        <span class="info-box-number"> {{@$sliders}}</span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-md-3 p-2">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-plus-square"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Main Content</span>
                                    <span class="info-box-number">{{@$types}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-md-3 p-2">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-school"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Schools</span>
                                    <span class="info-box-number">{{@$schools}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-md-3 p-2">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-chalkboard"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Departments</span>
                                    <span class="info-box-number">{{@$departments}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-md-3 p-2">
                            <div class="info-box">
                                <span class="info-box-icon bg-info elevation-1"><i class="nav-icon fas fa-sitemap"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Subjects</span>
                                    <span class="info-box-number">{{@$subjects}}</span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-md-3 p-2">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-id-card"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">News Youth</span>
                                    <span class="info-box-number">{{$newsYouths}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-md-3 p-2">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-building"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">ឈ្មោះមុខជំនាញ</span>
                                    <span class="info-box-number">{{@$webDepartments}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-md-3 p-2">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-lightbulb"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Skills</span>
                                    <span class="info-box-number">{{@$webSkills}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-md-3 p-2">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-envelope"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Contacts</span>
                                    <span class="info-box-number">{{@$messages}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-md-3 p-2">
                            <div class="info-box">
                                <span class="info-box-icon bg-danger elevation-1"><i class="nav-icon fas fa-paste"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Reports</span>
                                    <span class="info-box-number">{{@$webStudentsSubmit}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-md-3 p-2">
                            <div class="info-box">
                                <span class="info-box-icon bg-success elevation-1"><i class="nav-icon fas fa-users"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Users</span>
                                    <span class="info-box-number">{{@$users}}</span>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>
            </section>

        </div>
    </body>


@endsection

@section('script')

<script>
$(document).ready(function(){
    $("#sidebar-menu").removeClass('active open');
        $("#sidebar-menu li ul li").removeClass('active');
        $("#menu_dashborad").addClass('active new_color');
       // $("#menu_web_skill").css({ "background-color", "black" });
    });
</script>
@endsection
