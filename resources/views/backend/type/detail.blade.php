@extends('backend.master')

@section('title', 'Type Detail')

@section('content')
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <h3 class="profile-username text-center">{{ $type->name }}</h3>

                    <ul class="list-group list-group-unbordered mb-3">
                        @foreach ($type->schools as $school)
                            <li class="list-group-item">
                                <b>{{ $school->name }}</b>
                                <a class="float-right" target="_blank" href="{{ 'https://www.google.com/maps/@' . $school->latitude . ',' . $school->longitude . ',15z' }}">
                                    Location
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
@endsection

@section('action')
    <a href="{{ route('type-list') }}" class="btn btn-warning btn-sm">BACK</a>
@endsection

@section('script')
<script>
       $(document).ready(function(){
        $("#sidebar-menu").removeClass('active open');
            $("#sidebar-menu li ul li").removeClass('active');
            $("#menu_type").addClass('active new_color');
        // $("#menu_web_skill").css({ "background-color", "black" });
        });
</script>
@endsection
