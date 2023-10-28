@extends('backend.master')

@section('title', 'List School')

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

    <table id="tbl-schools" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Type</th>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($schools as $school)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <img src="{{ url('storage/' . $school->logo) }}" class="img-circle elevation-2" width="30" height="30" alt="User Image">
                        {{ $school->name }}
                    </td>
                    <td>{{ $school->type->name}}</td>
                    <td>{{ $school->latitude }}</td>
                    <td>{{ $school->longitude }}</td>
                    <td>
                        <a href="{{ route('school-detail', $school) }}" class="btn btn-warning btn-xs" title="Detail"><i class="fa fa-eye"></i></a>
                        <a href="{{ route('school-update-form', $school) }}" class="btn btn-warning btn-xs" title="Edit"><i class="fa fa-pen"></i></a>
                        <a href="javascript:void(0);" class="btn btn-warning btn-xs btn-delete" title="Delete" id="{{ $school->id }}"
                            data-toggle="modal" data-target="#modal-delete">
                            <i class="fa fa-trash" id="{{ $school->id }}"></i>
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
                <form action="{{ route('school-delete') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="schoolId" id="schoolId" value="0">
                    <div class="modal-header">
                        <h5 class="modal-title">Confirmation</h5>
                    </div>
                    <div class="modal-body">
                        <h6>Do you want to delete this school?</h6>
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
    <a href="{{ route('school-create-form') }}" class="btn btn-primary btn-sm">CREATE</a>
@endsection

@section('script')

    <script>
        $("#tbl-schools").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false
        });

        $('.btn-delete').click((event) => {
            var schoolId = event.target.id;
            $('#schoolId').attr('value', schoolId);
        });

        $(document).ready(function(){
        $("#sidebar-menu").removeClass('active open');
            $("#sidebar-menu li ul li").removeClass('active');
            $("#menu_school").addClass('active new_color');
        // $("#menu_web_skill").css({ "background-color", "black" });
        });
    </script>
@endsection
