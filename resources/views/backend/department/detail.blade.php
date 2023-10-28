@extends('backend.master')

@section('title', 'Department Detail')

@section('content')
    <div class="row">
        <div class="col-4">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>School</b>
                            <a class="float-right" href="{{ route('school-detail', $department->school) }}">
                                {{ $department->school->name }}
                            </a>
                        </li>
                        <li class="list-group-item">
                            <b>Department</b>
                            <span class="float-right">
                                {{ $department->name }}
                            </span>
                        </li>
                    </ul>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Subjects</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table m-0">
                            <thead>
                                <tr>
                                    <th>N0</th>
                                    <th>Name</th>
                                    <th>Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($department->subjects as $subject)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $subject->name }}</td>
                                        <td>
                                            <a href="{{ route('subject-detail', $subject) }}" class="btn btn-warning btn-xs" title="Detail">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('action')
    <a href="{{ route('department-list') }}" class="btn btn-warning btn-sm">BACK</a>
@endsection
@section('script')
<script>
    $(document).ready(function(){
    $("#sidebar-menu").removeClass('active open');
        $("#sidebar-menu li ul li").removeClass('active');
        $("#menu_department_one").addClass('active new_color');
    // $("#menu_web_skill").css({ "background-color", "black" });
    });
</script>
    @endsection