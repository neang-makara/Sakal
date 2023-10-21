@extends('backend.master')

@section('title', 'Create Subject')

@section('content')
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
            
            @include('backend.message.message')

        </div>
    </div>
    {{-- start first form  --}}
    <form action="{{ route('skill.update') }}" method="POST">
        @csrf

        <input type="hidden" name="id" value="{{ $skill->id }}">
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name"
                        placeholder="Enter name" name="name" value="{{ @$skill->name }}">
                </div>
            </div>
           
        </div>

        <div class="row">
            <div class="col-12">
                <a href="{{ route('skill.index') }}" class="btn btn-danger">Cancel</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>
    {{-- End first form  --}}
   
@endsection

@section('content_talent')
 {{-- Start Secound form  --}}
 <form action="{{ route('skill.assign') }}" method="POST">
    @csrf
    <input type="hidden" name="skill_assign_id" value="{{ @$skill->id }}">
 <div class="card">
    <div class="card-header">
        <h3 class="card-title">Create Talent</h3>
    </div>
    <div class="card-body">
        <div class="row">
            @foreach(@$talents as $talent)

            <div class="col-4">
                <div class="icheck-primary">
                    <label>
                        <input type="checkbox" name="talent_id[]" value="{{ @$talent->id }}"
                        
                        @foreach (@$relative_talents as $relative)
                            @if(@$relative->id == @$talent->id)
                                 checked
                            @endif
                        @endforeach
                        
                        > {{ @$talent->name }}</label>
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
