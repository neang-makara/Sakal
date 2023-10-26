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
                // dd(array_values[$item->skill_text]));
                //$new = explode(",", $item->skill_text);
                //$newLangsHyphen =  implode(", ", array_keys($item->skill_text));
                //$users = DB::table('web_skills')->whereIn("id", $item->skill_text)->get();
              

                // $tmp = \App\Product::find($id);
                //$skill=  DB::table('web_skills')->whereIn('id', array(@$item->skill_text))->get();
               // $skill = App\Models\WebSkills::whereIn('id',$item->skill_text)->get();
                //dd($item->skill_text);
                //$new_result         = json_decode($item->result);

            @endphp
            <tr>
                <td>{{ @$i++ }}</td>
                <td>{{ @$value->name }}</td>
                <td>{{ @$value->gender }}</td>
                <td>{{ @$value->phone }}</td>
                <td>
                 
                    {!! @$strSelectedSkill !!}
                
                </td>
                <td>{{ @$item->result }}</td>
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
    </script>
@endsection
