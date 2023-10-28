@extends('backend.master')

@section('title', 'Slider')

@section('content')

<div class="col-lg-12">
    <div class="card card-default">
        .card-header <div class="card-header-boder-bottom">
            <h2>Create Slider</h2>
        </div>

        <div class="card-body">
            <form action="{{route('store.slider')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="exampleFormControlInput1">Slider Title</label>
                    <input type="text" class="form-control" name="title" id="exampleFormControlInput1" placeholder="Slider Title">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Slider Description</label>
                    <textarea name="description" class="form-control" id="exampleFormControlTextarea1" cols="30" rows="10"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Slider Image</label>
                    <input type="file" class="form-control-file" name="image" id="exampleFormControlFile1" placeholder="File Input">
                </div>

                <div class="form-footer pt-4 pt-5 mt-4 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>






@endsection

@section('script')
<script>
      $(document).ready(function(){
        $("#sidebar-menu").removeClass('active open');
            $("#sidebar-menu li ul li").removeClass('active');
            $("#menu_slider").addClass('active new_color');
        // $("#menu_web_skill").css({ "background-color", "black" });
        });
</script>
@endsection
