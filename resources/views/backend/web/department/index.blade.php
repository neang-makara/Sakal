@extends('backend.master')

@section('title', 'List Department')

@section('content')

   @include('backend.message.message')

    <table id="tbl-subjects" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Department Name</th>
                <th>Skill Name</th>
                <th>Created By</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1; @endphp

            @foreach (@$departments as $dep )
            @php  
                // $relative         = json_decode($dep->skill_text);
                // $test = explode(",", @$dep->skill_text);
                //$var = implode(',', @$relative);
                // $text_skill=explode(",",@$dep->skill_text);
                // $skill_id= $text_skill[1];
                //$relative         = json_decode($dep->skill_text);
                //$strTalents = implode(",<br>", (str)($relative);

                $relative         = json_decode($dep->skill_text);
                $strTalents = implode(",<br>", $relative);

            @endphp
            <tr>
                <td>{{ @$i++ }}</td>
                <td>{{ @$dep->department_name }}</td>
                <td> {!! @$strTalents ? : 'N/A' !!}</td>
                <td>
                    {!! @$dep->createdBy->name !!} <br>
                    <small>
                    <i>{{ !empty(@$dep->created_at)? date("d-M-Y | h:i A", strtotime(@$dep->created_at)) : "N/A" }}</i>
                    </small>
                </td>
                <td>
                    @if($dep->status == 1)
                        <span class="badge badge-pill badge-success">Active</span>
                    @else
                        <span class="badge badge-pill badge-danger">Inactive</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('web_department.edit', $dep->id) }}" class="btn btn-info btn-xs" title="Edit"><i class="fa fa-pen"></i></a>
                    @if($dep->status == 1)
                        <a href="{{ route('web_department.inactive',$dep->id) }}" class="btn btn-xs btn-oval btn-success" title="Inactive Now"><i class="fa fa-unlock"></i></a>
                    @else
                        <a href="{{ route('web_department.active',$dep->id) }}" class="btn btn-xs btn-oval btn-danger" title="Active Now"><i class="fa fa-lock"></i></a>
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
    <a href="{{ route('web_department.create') }}" class="btn btn-primary btn-sm">CREATE</a>
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
        $(document).ready(function(){
        $("#sidebar-menu").removeClass('active open');
            $("#sidebar-menu li ul li").removeClass('active');
            $("#menu_department_two").addClass('active new_color');
        // $("#menu_web_skill").css({ "background-color", "black" });
        });
    </script>
@endsection
