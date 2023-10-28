@extends('backend.master')

@section('title', 'User Detail')

@section('content')
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="{{ url('images/default-user-image.png') }}"
                            alt="User profile picture">
                    </div>

                    <h3 class="profile-username text-center">{{ $user->name }}</h3>

                    <p class="text-muted text-center">{{ $user->username }}</p>

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Admin Role</b> <a class="float-right">
                                <i class="fas fa-{{ $user->is_admin ? 'check' : 'times' }}"></i>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <b>Is Block</b> <a class="float-right">
                                <i class="fas fa-{{ $user->disabled ? 'check' : 'times' }}"></i>
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
    <a href="{{ route('user-list') }}" class="btn btn-warning btn-sm">BACK</a>
@endsection

@section('script')
<script>
    $(document).ready(function(){
        $("#sidebar-menu").removeClass('active open');
            $("#sidebar-menu li ul li").removeClass('active');
            $("#menu_users").addClass('active new_color');
        // $("#menu_web_skill").css({ "background-color", "black" });
        });
</script>
@endsection