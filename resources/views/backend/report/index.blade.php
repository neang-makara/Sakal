@extends('backend.master')

@section('title', 'Report Student Submit')

@section('content')

   @include('backend.message.message')

    <table id="tbl-subjects" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th width="5%">#</th>
                <th width="15%">Name</th>
                <th width="5%">Gender</th>
                <th width="15%">Phone</th>
                <th width="15%">Skill</th>
                <th width="15%">Department</th>
                <th width="15%">Created At</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1; @endphp

            @foreach (@$reports as $item )
            @php  
                $value         = json_decode($item->data_obj);
                $relative         = json_decode($item->skill_text);
                $strSelectedSkill = implode(",<br>", $relative);
                $strSelectDepartment = array_keys(json_decode($item->result, true));
                $selecedDepartment = implode(",<br>", $strSelectDepartment);
            @endphp
            <tr>
                <td>{{ @$i++ }}</td>
                <td>{{ @$value->name }}</td>
                <td>{{ @$value->gender }}</td>
                <td>{{ @$value->phone }}</td>
                <td>
                 
                    {!! @$strSelectedSkill !!}
                
                </td>
                <td>{!! @$selecedDepartment !!}</td>
                <td>                   
                    <i>{{ !empty(@$item->created_at)? date("d-M-Y | h:i A", strtotime(@$item->created_at)) : "N/A" }}</i>
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
            $("#menu_report").addClass('active new_color');
        // $("#menu_web_skill").css({ "background-color", "black" });
        });
    </script>
@endsection
