@extends('backend.master')

@section('title', 'View Messages')

@section('content')

   @include('backend.message.message')

   <div class="card card-gray">
    <div class="boxtool"> </div>
   <div class="card-block">
           <div class="container">
               <div class="row">
                   <div class="col-md-6 details">
                       <p>
                           <h5>Contact Message </h5>
                           
                           <small>
                               <strong for="">Name: </strong>
                               <cite>{{ @$message->name }}</cite>
                           </small>
                       </p>
                       <p>
                           <small>
                               <strong for="">Phone: </strong>
                               <cite>{{ @$message->phone }}</cite>
                           </small>
                       </p>
                       <p>
                           <small>
                               <strong for="">Email: </strong>
                               <cite>{{ @$message->email }}</cite>
                           </small>
                       </p>
                        <p>
                           <small>
                               <strong for="">Subject: </strong>
                               <cite>{{ @$message->subject }}</cite>
                           </small>
                       </p>
                       <p>
                           <small>
                               <strong for="">Message Text: </strong>
                               <cite>{{ @$message->message }}</cite>
                           </small>
                       </p>
                   </div>
               </div>
           </div><hr>
   </div>
</div>

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
