

@extends('backend.master')

@section('title', 'Create News Youth')

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
    <form action="{{ route('newsyouth-create') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="title">TItle</label>
                    <input type="text" class="form-control" id="title"
                        placeholder="Enter title" name="title" value="{{ old('title') }}">
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" id="description"
                        placeholder="Enter description" name="description" value="{{ old('description') }}">
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label for="link">Link</label>
                    <input type="text" class="form-control" id="link"
                        placeholder="Enter link" name="link" value="{{ old('link') }}">
                </div>
            </div>


            <div class="col-6">
                <div class="form-group">
                    <label for="logo">Upload image</label>
                    <input type="file" class="form-control-file" id="image" name="image">
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-12">
                <a href="{{ route('newsyouth-list') }}" class="btn btn-danger">Cancel</a>
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

