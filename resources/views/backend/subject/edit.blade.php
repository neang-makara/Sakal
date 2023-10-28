@extends('backend.master')

@section('title', 'Edit Subject')

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
    <form action="{{ route('subject-update', $subject) }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name"
                        placeholder="Enter name" name="name" value="{{ old('name') != null ? old('name') : $subject->name }}">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="type">Department</label>
                    <select class="form-control" id="department" name="department_id">
                        @foreach ($departments as $department)
                            @if (old('department_id') != null)
                                <option value="{{ $department->id }}" {{ old('department_id') == $department->id ? 'selected' : '' }}>
                                    {{ $department->school->name . ' / ' . $department->name }}
                                </option>
                            @else
                            <option value="{{ $department->id }}" {{ $subject->department->id == $department->id ? 'selected' : '' }}>
                                {{ $department->school->name . ' / ' . $department->name }}
                            </option>

                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="note">Description</label>
                    <textarea cols='60' rows='8' class="form-control" name="description" id="description" rows="1">{{ old('description') != null ? old('description') : $subject->description }}</textarea>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <a href="{{ route('department-list') }}" class="btn btn-danger">Cancel</a>
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
            $("#menu_sub").addClass('active new_color');
        // $("#menu_web_skill").css({ "background-color", "black" });
        });
</script>
@endsection
