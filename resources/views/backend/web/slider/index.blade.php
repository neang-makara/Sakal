@extends('backend.master')

@section('title', 'List Slider')

@section('content')

   @include('backend.message.message')

    <table id="tbl-subjects" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Images</th>
                <th>Title</th>
                <th>Detail</th>
                <th>Created By</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @php $i=1; @endphp
        @foreach (@$sliders as $item )
            @php  
            @endphp
            <tr>
                <td>{{ @$i++ }}</td>
                <td>
                    <img src="{{ asset(@$item->image) }}" style="width: 160px; height:70px">
                </td>
                <td>{{ @$item->title }}</td>
                <td>{!! Str::limit($item->description,20) !!}</td>
                <td>
                    {!! @$item->createdBy->name !!} <br>
                    <small>
                    <i>{{ !empty(@$item->created_at)? date("d-M-Y | h:i A", strtotime(@$item->created_at)) : "N/A" }}</i>
                    </small>
                </td>
                <td>
                    @if($item->status == 1)
                        <span class="badge badge-pill badge-success">Active</span>
                    @else
                        <span class="badge badge-pill badge-danger">Inactive</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('slider.edit', $item->id) }}" class="btn btn-info btn-xs" title="Edit"><i class="fa fa-pen"></i></a>
                    @if($item->status == 1)
                        <a href="{{ route('slider.inactive',$item->id) }}" class="btn btn-xs btn-oval btn-success" title="Inactive Now"><i class="fa fa-unlock"></i></a>
                    @else
                        <a href="{{ route('slider.active',$item->id) }}" class="btn btn-xs btn-oval btn-danger" title="Active Now"><i class="fa fa-lock"></i></a>
                    @endif
                    <a href="{{ route('slider.delete',$item->id) }}" class="btn btn-xs btn-oval btn-danger" title="Delete Data" id="delete"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
        @endforeach
          
        </tbody>
    </table>

@endsection

@section('action')
    <a href="{{ route('slider.create') }}" class="btn btn-primary btn-sm">CREATE</a>
@endsection

@section('script')

    <script>
        $("#tbl-subjects").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false
        });

        $(document).ready(function(){
            $("#sidebar-menu").removeClass('active open');
                $("#sidebar-menu li ul li").removeClass('active');
                $("#menu_slider").addClass('active new_color');
               // $("#menu_web_skill").css({ "background-color", "black" });
            });
    </script>
@endsection
