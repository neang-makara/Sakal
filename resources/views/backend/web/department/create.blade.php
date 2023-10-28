@extends('backend.master')

@section('title', 'Create Department')

@section('content')

@include('backend.message.message')

    <form action="{{ route('web_department.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="department_name"
                        placeholder="Enter Department Name" name="department_name" value="{{ old('department_name') }}" required>
                </div>
            </div>
           
        </div>

        <div class="row">
            <div class="col-12">
                <a href="{{ route('web_department.index') }}" class="btn btn-danger">Cancel</a>
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
            $("#menu_department_two").addClass('active new_color');
        // $("#menu_web_skill").css({ "background-color", "black" });
        });
</script>
@endsection
