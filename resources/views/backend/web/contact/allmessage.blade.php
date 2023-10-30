@extends('backend.master')

@section('title', 'List Message')

@section('content')

   @include('backend.message.message')

    <table id="tbl-subjects" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Phone</th>
                <th>Message</th>
                <th>Create At</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @php $i=1; @endphp
        @foreach (@$messages as $item )
            @php  
            @endphp
            <tr>
                <td>{{ @$i++ }}</td>
                <td>{{ @$item->name }}</td>
                <td>{{ @$item->email }}</td>
                <td>{{ @$item->subject }}</td>
                <td>{{ @$item->phone }}</td>
                <td>{!! Str::limit($item->message,20) !!}</td>
                <td>
                    <small>
                    <i>{{ !empty(@$item->created_at)? date("d-M-Y | h:i A", strtotime(@$item->created_at)) : "N/A" }}</i>
                    </small>
                </td>
                <td>
                    @if($item->status == 1)
                        <span class="badge badge-pill badge-success">Not Read</span>
                    @else
                        <span class="badge badge-pill badge-danger">Read</span>
                    @endif
                </td>
                <td>
                    {{-- <a href="{{ route('contact_message.edit', $item->id) }}" class="btn btn-info btn-xs" title="Edit"><i class="fa fa-pen"></i></a> --}}
                    @if($item->status == 1)
                        <a href="{{ route('contact_message.read', $item->id) }}" class="btn btn-primary btn-xs" title="View"><i class="fa fa-eye"></i></a>
                    @else
                        <a href="{{ route('contact_message.view',$item->id) }}" class="btn btn-xs btn-oval btn-info" title="View"><i class="fa fa-eye"></i></a>
                    @endif
                    <a href="{{ route('contact_message.delete',$item->id) }}" class="btn btn-xs btn-oval btn-danger" title="Delete Data" id="delete"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
        @endforeach
          
        </tbody>
    </table>

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
                $("#menu_contact_message").addClass('active new_color');
               // $("#menu_web_skill").css({ "background-color", "black" });
            });
    </script>
@endsection
