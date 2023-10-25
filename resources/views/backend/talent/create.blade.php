@extends('backend.master')
@if(is_null($talent->id))
@section('title', 'Create Talent')
@else
@section('title','Update Talent')
@endif
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
    <form action="{{ route('talent.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name"
                        placeholder="Enter name" name="name" value="{{ $talent->name }}" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                  <label for="">Description</label>
                  <textarea placeholder="Description" class="form-control" name="description" rows="3">{{ $talent->description }}</textarea>
                </div>
            </div>
            <div class="col-1" style="margin-top: 20px">
                <div class="form-group">
                    <label style="margin-left: 25px;" for="is_active">Active</label>
                    <input class="form-control" type="checkbox" name="is_active" {{ $talent->is_active === 1 || empty($talent->id) ? 'checked' : ''}}>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <a href="{{ route('talent.index') }}" class="btn btn-danger">Cancel</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection

@section('script')
@endsection
