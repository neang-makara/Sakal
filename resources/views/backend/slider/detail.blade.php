@extends('backend.master')

@section('title', 'School Detail')

@section('content')
    <div class="row">
        <div class="col-4">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">

                    <p class="text-center">
                        <img src="{{ url('storage/' . $school->logo) }}" class="img-circle elevation-2" width="100" height="100"
                            alt="User Image">
                    </p>

                    <ul class="list-group list-group-unbordered mb-3">
                        {{-- @foreach ($type->schools as $school)
                            <li class="list-group-item">
                                <b>{{ $school->name }}</b>
                                <a class="float-right" target="_blank" href="{{ 'https://www.google.com/maps/@' . $school->latitude . ',' . $school->longitude . ',15z' }}">
                                    Location
                                </a>
                            </li>
                        @endforeach --}}
                        <li class="list-group-item">
                            <b>Name</b>
                            <span class="float-right">
                                {{ $school->name }}
                            </span>
                        </li>
                        <li class="list-group-item">
                            <b>Type</b>
                            <a class="float-right" href="{{ route('type-detail', $school->type) }}">
                                {{ $school->type->name }}
                            </a>
                        </li>
                        <li class="list-group-item">
                            <b>Latitude</b>
                            <span class="float-right">
                                {{ $school->latitude }}
                            </span>
                        </li>
                        <li class="list-group-item">
                            <b>Longitude</b>
                            <span class="float-right">
                                {{ $school->longitude }}
                            </span>
                        </li>
                        <li class="list-group-item">
                            <b>Total Department</b>
                            <span class="float-right">
                                {{ $school->departments->count() }}
                            </span>
                        </li>
                    </ul>
                    <p class="text-center">{!! $school->note !!}</p>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Departments</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table m-0">
                            <thead>
                                <tr>
                                    <th>N0</th>
                                    <th>Name</th>
                                    <th>Total Subjects</th>
                                    <th>Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($school->departments as $department)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $department->name }}</td>
                                        <td>
                                            <span class="badge badge-success">{{ $department->subjects->count() }}</span>
                                        </td>
                                        <td>
                                            <a href="{{ route('department-detail', $department) }}" class="btn btn-warning btn-xs" title="Detail">
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
    <a href="{{ route('school-list') }}" class="btn btn-warning btn-sm">BACK</a>
@endsection

@section('script')
<script>
      $(document).ready(function(){
        $("#sidebar-menu").removeClass('active open');
            $("#sidebar-menu li ul li").removeClass('active');
            $("#menu_slider").addClass('active new_color');
        // $("#menu_web_skill").css({ "background-color", "black" });
        });
</script>
@endsection