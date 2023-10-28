@extends('backend.master')

@section('title', 'List News Youth')

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

    <table id="tbl-newsyouth" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($newsyouth as $newsyouths)
                <tr>
                    <td>{{ @$loop->iteration }}</td>
                    <td>
                        {{ @$newsyouths->title }}
                    </td>
                    <td>{{ @$newsyouths->description }}</td>
                    <td>
                        <a href="#" class="btn btn-warning btn-xs" title="Detail"><i class="fa fa-eye"></i></a>
                        {{-- <a href="{{ route('newsyouths-update-form', $newsyouths->newsyouth_id) }}" class="btn btn-warning btn-xs" title="Edit"><i class="fa fa-pen"></i></a> --}}
                        {{-- <a href="javascript:void(0);" class="btn btn-warning btn-xs btn-delete" title="Delete" id="{{ $newsyouths->newsyouth_id }}"
                            data-toggle="modal" data-target="#modal-delete">
                            <i class="fa fa-trash" id="{{ @$department->newsyouth_id }}"></i>
                        </a> --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Modal Delete -->
    <div class="modal fade" id="modal-delete" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('subject-delete') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="newsyouthsId" id="newsyouthsId" value="0">
                    <div class="modal-header">
                        <h5 class="modal-title">Confirmation</h5>
                    </div>
                    <div class="modal-body">
                        <h6>Do you want to delete this department?</h6>
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
    <a href="{{ route('newsyouth.create') }}" class="btn btn-primary btn-sm">CREATE</a>
@endsection

@section('script')

    <script>
        $("#tbl-departments").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false
        });

        $('.btn-delete').click((event) => {
            var departmentId = event.target.id;
            $('#departmentId').attr('value', departmentId);
        });
        $(document).ready(function(){
        $("#sidebar-menu").removeClass('active open');
            $("#sidebar-menu li ul li").removeClass('active');
            $("#menu_new_youth").addClass('active new_color');
        // $("#menu_web_skill").css({ "background-color", "black" });
        });
    </script>
@endsection
