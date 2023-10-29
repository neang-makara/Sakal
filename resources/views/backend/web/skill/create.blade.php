@extends('backend.master')

@section('title', 'Create Skill')

@section('content')

    @include('backend.message.message')

    <form action="{{ route('web_skill.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="skill_name"
                        placeholder="Enter Skill Name" name="skill_name" value="{{ old('skill_name') }}" required>
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
    $(document).ready(function(){
        $("#sidebar-menu").removeClass('active open');
            $("#sidebar-menu li ul li").removeClass('active');
            $("#menu_web_skill").addClass('active new_color');
           // $("#menu_web_skill").css({ "background-color", "black" });
        });
</script>
@endsection
