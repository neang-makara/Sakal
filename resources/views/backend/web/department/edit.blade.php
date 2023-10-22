@extends('backend.master')

@section('title', 'Create Department')

@section('content')
    
    @include('backend.message.message')
   
    {{-- start first form  --}}
    <form action="{{ route('web_department.update') }}" method="POST">
        @csrf

        <input type="hidden" name="id" value="{{ $department->id }}">
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="department_name"
                        placeholder="Enter Department Name" name="department_name" value="{{ @$department->department_name }}">
                </div>
            </div>
           
        </div>

        <div class="row">
            <div class="col-12">
                <a href="{{ route('web_department.index') }}" class="btn btn-danger">Cancel</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>
    {{-- End first form  --}}
   
@endsection

@section('content_talent')
 {{-- Start Secound form  --}}
 <form action="{{ route('web_department.assign') }}" method="POST">
    @csrf
    <input type="hidden" name="department_assign_id" value="{{ @$department->id }}">
 <div class="card">
    <div class="card-header">
        <h3 class="card-title">Add Assign Skill</h3>
    </div>
    <div class="card-body">
        <div class="row">
            @foreach(@$skills as $skill)

            <div class="col-4">
                <div class="icheck-primary">
                    <label>
                        <input type="checkbox" name="skill_id[]" value="{{ @$skill->id }}_{{ @$skill->skill_name }}" data-name="{{ @$skill->skill_name }}" 
                        relative_departments

                        @foreach (@$relative_departments as $relative)
                            @if(@$relative->skill_id == @$skill->id)
                                 checked
                            @endif
                        @endforeach
                       
                        
                        > {{ @$skill->skill_name }}</label>
                </div>
            </div>
            @endforeach
        </div>
        
    </div>
    <div class="card-footer">
        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Assign</button>
            </div>
        </div>
    </div>
</div>
</form>

{{-- End Secound form  --}}
@endsection
@section('script')

@endsection
