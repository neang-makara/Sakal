@extends('backend.master')

@section('title', 'List Subject')

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

    <table id="tbl-subjects" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Department</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($subjects as $subject)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        {{ $subject->name }}
                    </td>
                    <td>{{ $subject->department->school->name . ' / ' . $subject->department->name }}</td>
                    <td>
                        <a href="{{ route('subject-detail', $subject) }}" class="btn btn-warning btn-xs" title="Detail"><i class="fa fa-eye"></i></a>
                        <a href="{{ route('subject-update-form', $subject) }}" class="btn btn-warning btn-xs" title="Edit"><i class="fa fa-pen"></i></a>
                        <a href="javascript:void(0);" class="btn btn-warning btn-xs btn-delete" title="Delete" id="{{ $subject->id }}"
                            data-toggle="modal" data-target="#modal-delete">
                            <i class="fa fa-trash" id="{{ $subject->id }}"></i>
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
                <form action="{{ route('subject-delete') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="subjectId" id="subjectId" value="0">
                    <div class="modal-header">
                        <h5 class="modal-title">Confirmation</h5>
                    </div>
                    <div class="modal-body">
                        <h6>Do you want to delete this subject?</h6>
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
    <a href="{{ route('subject-create-form') }}" class="btn btn-primary btn-sm">CREATE</a>
@endsection

@section('script')

    <script>
        $("#tbl-subjects").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false
        });

        $('.btn-delete').click((event) => {
            var subjectId = event.target.id;
            $('#subjectId').attr('value', subjectId);
        });
    </script>
@endsection
