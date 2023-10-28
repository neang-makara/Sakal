@extends('backend.master')

@section('title', 'Slider')

@section('content')

    <div class="container mt-5">
        <div class="row">

            <a href="{{route('add.slider')}}" ><button class="btn btn-info">Add Slider</button></a>

            <div class="col-md-12">

                @if (session('status'))
                    <div class="alert alert-success alert-dimissible fade show" role="alert">
                        <strong>{{ session('sucess') }}</strong>
                        <button type="button" class="close" data-dimiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="card-header">All Slider</div>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" width="5%">SL </th>
                            <th scope="col" width="25%">Slider Title </th>
                            <th scope="col" width="15%">Description </th>
                            <th scope="col" width="15%">Image </th>
                            <th scope="col" width="15%">Action </th>
                        </tr>
                    </thead>
                </table>
                <tbody>

                    @php($i = 1)
                    @foreach ($sliders as $slider)
                        <tr>
                            <th scope="row">{{ $i++ }}</th>
                            <td>{{ $slider->title }}</td>
                            <td>{{ $slider->description }}</td>
                            <td><img src="{{ asset($slider->image) }}" style="height:40px; width:70px;" alt=""></td>

                            <td>
                                <a href="{{ url('slider/edit/' . $slider->id) }}" class="btn btn-info">Edit</a>
                                <a href="{{ url('slider/delete/' . $slider->id) }}"
                                    onclick="return confirm('Are you sure to delete?')" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>



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
