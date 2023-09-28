@extends('backend.master')

@section('title', 'List Skill')

@section('content')

   @include('backend.message.message')

    <table id="tbl-subjects" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Created By</th>
                <th>Assign Talents</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1; @endphp

            @foreach (@$skills as $skill )
            @php  
                $relative         = json_decode($skill->talents);
                $strTalents = implode(",<br>", $relative);
// dd($strTalents);

            @endphp
            <tr>
                <td>{{ @$i++ }}</td>
                <td>{{ @$skill->name }}</td>
                <td> {!! @$strTalents ? : 'N/A' !!}</td>
                <td>
                    {!! @$skill->createdBy->name !!} <br>
                    <small>
                    <i>{{ !empty(@$skill->created_at)? date("d-M-Y | h:i A", strtotime(@$skill->created_at)) : "N/A" }}</i>
                    </small>
                </td>
                <td>
                    @if($skill->status == 1)
                        <span class="badge badge-pill badge-success">Active</span>
                    @else
                        <span class="badge badge-pill badge-danger">Inactive</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('skill.edit', $skill->id) }}" class="btn btn-info btn-xs" title="Edit"><i class="fa fa-pen"></i></a>
                    @if($skill->status == 1)
                        <a href="{{ route('skill.inactive',$skill->id) }}" class="btn btn-xs btn-oval btn-success" title="Inactive Now"><i class="fa fa-unlock"></i></a>
                    @else
                        <a href="{{ route('skill.active',$skill->id) }}" class="btn btn-xs btn-oval btn-danger" title="Active Now"><i class="fa fa-lock"></i></a>
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
    <a href="{{ route('skill.create') }}" class="btn btn-primary btn-sm">CREATE</a>
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
