@extends('backend.master')

@section('title', 'List Users')

@section('content')

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('warning'))
        <div class="alert alert-warning">
            {{ session('warning') }}
        </div>
    @endif

    <table id="tbl-users" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Username</th>
                <th>Active</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->username }}</td>
                    <td>
                        <i class="fas fa-{{ $user->disabled ? 'times' : 'check' }}"></i>
                        {{-- @if ($user->disabled)
                        <i class="fas fa-times"></i>
                    @else
                        <i class="fas fa-check"></i>
                    @endif --}}
                    </td>
                    <td>
                        <a href="{{ route('user-detail', $user) }}" class="btn btn-warning btn-xs" title="Detail"><i class="fa fa-eye"></i></a>
                        <a href="{{ route('user-update-form', $user) }}" class="btn btn-warning btn-xs" title="Edit"><i class="fa fa-pen"></i></a>
                        @if ($user->disabled)
                            <a href="{{ route('user-unblock', $user) }}" class="btn btn-warning btn-xs" title="Unblock"><i
                                    class="fa fa-lock-open"></i></a>
                        @else
                            <a href="{{ route('user-block', $user) }}" class="btn btn-warning btn-xs" title="Block"><i
                                    class="fa fa-lock"></i></a>
                        @endif
                        <a href="javascript:void(0);" class="btn btn-warning btn-xs btn-delete" title="Delete" id="{{ $user->id }}"
                            data-toggle="modal" data-target="#modal-delete">
                            <i class="fa fa-trash" id="{{ $user->id }}"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Modal Delete -->
    <div class="modal fade" id="modal-delete" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('user-delete') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="userId" id="userId" value="0">
                    <div class="modal-header">
                        <h5 class="modal-title">Confirmation</h5>
                    </div>
                    <div class="modal-body">
                        <h6>Do you want to delete this user?</h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-warning">Yes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('action')
    <a href="{{ route('user-create-form') }}" class="btn btn-primary btn-sm">CREATE</a>
@endsection

@section('script')

    <script>
        $("#tbl-users").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false
        });

        $('.btn-delete').click((event) => {
            var userId = event.target.id;
            $('#userId').attr('value', userId);
        });

        $(document).ready(function(){
        $("#sidebar-menu").removeClass('active open');
            $("#sidebar-menu li ul li").removeClass('active');
            $("#menu_users").addClass('active new_color');
        // $("#menu_web_skill").css({ "background-color", "black" });
        });

    </script>
@endsection
