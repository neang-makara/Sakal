@extends('backend.master')

@section('title', 'Subject Detail')

@section('content')
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Name</b>
                            <span class="float-right">
                                {{ $subject->name }}
                            </span>
                        </li>
                        <li class="list-group-item">
                            <b>Department</b>
                            <a class="float-right" href="{{ route('department-detail', $subject->department) }}">
                                {{ $subject->department->school->name . ' / ' . $subject->department->name }}
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
@endsection

@section('action')
    <a href="{{ route('subject-list') }}" class="btn btn-warning btn-sm">BACK</a>
@endsection

@section('script')
<script>
    $(document).ready(function(){
        $("#sidebar-menu").removeClass('active open');
            $("#sidebar-menu li ul li").removeClass('active');
            $("#menu_sub").addClass('active new_color');
        // $("#menu_web_skill").css({ "background-color", "black" });
        });
</script>
@endsection
