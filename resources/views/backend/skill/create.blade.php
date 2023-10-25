@extends('backend.master')
@section('content')
@if(is_null($skill->id))
@section('title', 'Create Skill')
@else
@section('title', 'Update Skill')
@endif
    <div class="row">
        <div class="col-12">
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible">
                    <h6>
                        <i class="icon fas fa-ban"></i> Validation exist!
                    </h6>
                    @foreach ($errors->all() as $error)
                        <p class="mb-0">
                            <i class="icon fas fa-info"></i>{{ $error }}
                        </p>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
    <form action="{{ route('skill.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input required type="text" class="form-control" id="name"
                        placeholder="Enter name" name="name" value="{{ $skill->name }}">
                    <input type="hidden" id="id" value="{{ $skill->id }}" name="id">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="talent">Talent</label>
                    <select required name="talent_ids[]" id="talent" multiple="multiple" class="form-control">
                        @foreach($talents as $talent)
                            <option @if(in_array($talent->id, $talent_skills->toArray())) selected @endif value="{{ $talent->id }}">{{ $talent->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                  <label for="">Description</label>
                  <textarea class="form-control" name="description" rows="3">{{ $skill->description }}</textarea>
                </div>
            </div>
            <div class="col-1" style="margin-top: 20px">
                <div class="form-group">
                    <label style="margin-left: 25px;" for="is_active">Active</label>
                    <input class="form-control" type="checkbox" name="is_active" {{ $skill->is_active === 1 || empty($skill->id) ? 'checked' : ''}}>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <a href="{{ route('skill.index') }}" class="btn btn-danger">Cancel</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection

@section('script')
<script>
    $(document).ready(function () {
        $('#talent').select2({
            placeholder: 'Select Talent',
            multiple: true,
        });
        $("#talent").select2({
            width: '100%',
        }).on("select2:unselecting", function (e) {
            var talent_id = e.params.args.data.id;
            var skill_id = $('#id').val();
            $.ajax({
                type: "GET",
                url: "{{ route('ajax.talent.remove','') }}/"+talent_id,
                data:{skill_id:skill_id},
                dataType: "JSON",
                success: function (response) {
                    if(response == 2){
                        alert('item was removed');
                    }
                    
                }
            });
            
        });

    });
</script>

@endsection
