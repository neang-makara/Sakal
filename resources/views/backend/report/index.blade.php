@extends('backend.master')

@section('title', 'List Test Talents')

@section('content')

   @include('backend.message.message')
    <table id="tbl-subjects" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Username</th>
                <th>Gender</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $list )
            @php
                $data_obj = json_decode($list['data_obj'], true);
            @endphp
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data_obj['name'] }}</td>
                <td>{{ $data_obj['gender'] }}</td>
                <td>
                    {{ $data_obj['name'] }} <br>
                    <small>
                    <i>{{ !empty($list->created_at)? date("d-M-Y | h:i A", strtotime($list->created_at)) : "N/A" }}</i>
                    </small>
                </td>
                <td>
                    <a href="{{ route('report.download', $list->id) }}" class="btn btn-info btn-xs" title="download"><i class="fa fa-download"></i></a>
                    @if($list->is_active === 1)
                        <a href="{{ route('report.inactive',$list->id) }}" class="btn btn-xs btn-oval btn-success" title="Inactive Now"><i class="fa fa-unlock"></i></a>
                    @else
                        <a href="{{ route('report.active',$list->id) }}" class="btn btn-xs btn-oval btn-danger" title="Active Now"><i class="fa fa-lock"></i></a>
                    @endif
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
    <a href="{{ route('report.download') }}" class="btn btn-primary btn-sm"><i class="fa fa-download fa-fw"></i>Export</a>
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
