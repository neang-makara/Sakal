@extends('backend.master')

@section('title', 'Create Mian Content')

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
    <form action="{{ route('type-create') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name"
                        placeholder="Enter name" name="name" value="{{ old('name') }}">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <a href="{{ route('type-list') }}" class="btn btn-danger">Cancel</a>
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
            $("#menu_type").addClass('active new_color');
        // $("#menu_web_skill").css({ "background-color", "black" });
        });
</script>
@endsection
