@extends('backend.master')

@section('title', 'Edit Slider')

@section('content')

    @include('backend.message.message')

    <form action="{{ route('slider.update') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ $slider->id }}">

        <div class="row">

            <div class="col-md-12">
                <p>
                    <label class="control-label"> Title: <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="title" value="{{ @$slider->title }}" required="" placeholder="Enter Title">
                    @error('blog_title_en')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </p>
            </div>

        </div>
        <div class="row">
            <div class="col-md-6">
                <p>
                    <label class="control-label">New Image Blog: <span class="text-danger">*</span></label>
                    <input type="file" class="form-control" name="image" 
                    onchange="mainThamUrl(this)">
                    @error('image')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <img src="" id="mainThamb">
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    <label class="control-label">Old Image Blog: <span class="text-danger">*</span></label>
                    <img src="{{ URL::to($slider->image) }}" hieght="120px;" width="120px;">
                    <input type="hidden" name="old_image" value="{{ $slider->image }}">
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <p>
                    <label class="control-label">Description: <span class="text-danger">*</span></label>
                    <textarea cols="80" id="editor1" name="description" rows="10" required="">{{ @$slider->description }} </textarea>
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </p>
            </div>
          
            <button type="submit" class="btn btn-sm btn-primary btn-oval"><i class="fa fa-save"></i> Update</button>
        </div>
    </form>

    <script type="text/javascript">
        // get Main Thamb
        function mainThamUrl(input){
            if(input.files && input.files[0]){
                var reader = new FileReader();
                reader.onload = function(e){
                    $("#mainThamb").attr('src',e.target.result).width(140).height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
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