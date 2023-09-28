@extends('backend.master')

@section('title', 'Create Talent')

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
        </div>
    </div>
    <form action="{{ route('talent.update') }}" method="POST">
        @csrf

        <input type="hidden" name="id" value="{{ $talent->id }}">
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name"
                        placeholder="Enter name" name="name" value="{{ @$talent->name }}">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <a href="{{ route('talent.index') }}" class="btn btn-danger">Cancel</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>
@endsection

@section('script')

@endsection
