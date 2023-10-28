@extends('backend.master')

@section('title', 'List Types')

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

    <table id="tbl-types" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($types as $type)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $type->name }}</td>
                    <td>
                        <a href="{{ route('type-detail', $type) }}" class="btn btn-warning btn-xs" title="Detail"><i class="fa fa-eye"></i></a>
                        <a href="{{ route('type-update-form', $type) }}" class="btn btn-warning btn-xs" title="Edit"><i class="fa fa-pen"></i></a>
                        <a href="javascript:void(0);" class="btn btn-warning btn-xs btn-delete" title="Delete" id="{{ $type->id }}"
                            data-toggle="modal" data-target="#modal-delete">
                            <i class="fa fa-trash" id="{{ $type->id }}"></i>
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
                <form action="{{ route('type-delete') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="typeId" id="typeId" value="0">
                    <div class="modal-header">
                        <h5 class="modal-title">Confirmation</h5>
                    </div>
                    <div class="modal-body">
                        <h6>Do you want to delete this type?</h6>
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
    <a href="{{ route('type-create-form') }}" class="btn btn-primary btn-sm">CREATE</a>
@endsection

@section('script')

    <script>
        $("#tbl-types").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false
        });

        $('.btn-delete').click((event) => {
            var typeId = event.target.id;
            $('#typeId').attr('value', typeId);
        });

        $(document).ready(function(){
        $("#sidebar-menu").removeClass('active open');
            $("#sidebar-menu li ul li").removeClass('active');
            $("#menu_type").addClass('active new_color');
        // $("#menu_web_skill").css({ "background-color", "black" });
        });

    </script>
@endsection
