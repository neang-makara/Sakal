@extends('backend.master')

@section('title', 'List Talent')

@section('content')

   @include('backend.message.message')

    <table id="tbl-subjects" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Created By</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1; @endphp

            @foreach (@$talents as $talent )
            <tr>
                <td>{{ @$i++ }}</td>
                <td>{{ @$talent->name }}</td>
                <td>
                    {{ @$talent->createdBy->name }} <br>
                    <small>
                    <i>{{ !empty(@$talent->created_at)? date("d-M-Y | h:i A", strtotime(@$talent->created_at)) : "N/A" }}</i>
                    </small>
                </td>
                <td>
                    @if($talent->status == 1)
                        <span class="badge badge-pill badge-success">Active</span>
                    @else
                        <span class="badge badge-pill badge-danger">Inactive</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('talent.edit', $talent->id) }}" class="btn btn-info btn-xs" title="Edit"><i class="fa fa-pen"></i></a>
                    @if($talent->status == 1)
                        <a href="{{ route('talent.inactive',$talent->id) }}" class="btn btn-xs btn-oval btn-success" title="Inactive Now"><i class="fa fa-unlock"></i></a>
                    @else
                        <a href="{{ route('talent.active',$talent->id) }}" class="btn btn-xs btn-oval btn-danger" title="Active Now"><i class="fa fa-lock"></i></a>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection

@section('action')
    <a href="{{ route('talent.create') }}" class="btn btn-primary btn-sm">CREATE</a>
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
