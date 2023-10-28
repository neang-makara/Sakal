@extends('backend.master')

@section('title', 'Edit School')

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
    <form action="{{ route('school-update', $school) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name"
                        placeholder="Enter name" name="name" value="{{ old('name') != null ? old('name') : $school->name }}">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="type">Type</label>
                    <select class="form-control" id="type" name="type_id">
                        @foreach ($types as $type)
                            @if (old('type_id') != null)
                                <option value="{{ $type->id }}" {{ old('type_id') == $type->id ? 'selected' : '' }}>
                                    {{ $type->name }}
                                </option>
                            @else
                            <option value="{{ $type->id }}" {{ $school->type->id == $type->id ? 'selected' : '' }}>
                                {{ $type->name }}
                            </option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="latitude">Latitude</label>
                    <input type="text" class="form-control" id="latitude"
                        placeholder="Enter latitude" name="latitude" value="{{ old('latitude') != null ? old('latitude') : $school->latitude }}">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="longitude">Longitude</label>
                    <input type="text" class="form-control" id="longitude"
                        placeholder="Enter longitude" name="longitude" value="{{ old('longitude') != null ? old('longitude') : $school->longitude }}">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="logo">Upload logo</label>
                    <input type="file" class="form-control-file" id="logo" name="logo">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="note">Note</label>
                    <textarea class="form-control" name="note" id="note" rows="1">{{ old('note') != null ? old('note') : $school->note }}</textarea>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <a href="{{ route('school-list') }}" class="btn btn-danger">Cancel</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection

@section('script')
<script>
      $(document).ready(function(){
        $("#sidebar-menu").removeClass('active open');
            $("#sidebar-menu li ul li").removeClass('active');
            $("#menu_school").addClass('active new_color');
        // $("#menu_web_skill").css({ "background-color", "black" });
        });
</script>
@endsection
