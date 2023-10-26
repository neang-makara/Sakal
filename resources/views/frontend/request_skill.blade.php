<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="/public/resources/css/app.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Koulen&display=swap" rel="stylesheet">

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ url('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/main.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
        crossorigin="anonymous" <title>
    @yield('title')
    </title>



    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <!-- header -->
    @include('frontend.header', ['types' => \App\Models\Type::all()])
    <!-- end header -->

    <div class="container">
        <form action="{{ route('frontend.student.submit') }}" method="POST">
            @csrf
        <div class="row" style="margin-top: 30px;">
            {{-- @include('frontend.message.message') --}}
            @if(@$result != null)
           <div class="col-md-12">
            <div class="alert alert-info">
                <strong class="font-modul">មុខជំនាញដែលសាកសមនឹងអ្នករួមមាន៖</strong>
                <ul>  @php
                    $kh = json_decode($result);
                   dd($kh);
                @endphp
                @foreach ($kh as $item)
                    <li>{{$item}}</li>
                @endforeach
                </ul>
               
            </div>
           </div>
           @endif
          

            {{-- form 1 --}}
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title header_title">១. សូមបំពេញពត៌មានផ្ទាល់ខ្លួន</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="name">ឈ្មោះ<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="name"  name="name" placeholder="Enter Name" required>
                                      </div>
                                </div>
                            <div class="col-2">

                                <div class="form-group">
                                    <label for="exampleInputPassword1">ភេទ<span class="text-danger">*</span></label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="female" name="gender" value="Female">
                                        <label class="form-check-label" for="female">ស្រី</label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input class="form-check-input" type="radio" id="male" name="gender" value="Male" checked>
                                        <label class="form-check-label" for="male">ប្រុស</label>
                                      </div>
                                  </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="exampleInputFile">លេខទូរស័ទ្ទ</label>
                                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Name" required>
                                  </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </div>
            {{-- End form 1 --}}
             {{-- form 2 --}}
             <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-info">
                  <div class="card-header">
                    <h3 class="card-title">២. តើអ្នកមានទេពកោសល្យ និងចំណង់ចំណូលចិត្តអ្វីខ្លះ?</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                    <form role="form">
                        <div class="card-body">
                            <div class="row">
                                @foreach (@$web_skills as $item)
                                <div class="col-sm-4">
                                    <!-- checkbox -->
                                    <div class="form-group">
                                      <div class="form-check">
                                        <input class="form-check-input" id="{{@$item->id}}" name="skills[]" value="{{ @$item->id }}" type="checkbox">
                                        <label class="form-check-label" for="{{@$item->id}}">{{ @$item->skill_name }}</label>
                                      </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    <div class="card-body">
                     
                    
                    
                    </div>
                    <!-- /.card-body -->
    
                    <div class="card-footer">
                      <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                    </div>
                  </form>
                </div>
                <!-- /.card -->
            </div>
            {{-- End form 2 --}}
        </div>
        </form>


    </div>


    <!-- footer -->
    @include('frontend.footer')
    <!-- end footer -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    <!-- jQuery -->
    <script src="{{ url('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ url('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ url('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ url('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ url('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ url('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    @yield('script')
    <!-- AdminLTE App -->
    <script src="{{ url('dist/js/adminlte.min.js') }}"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"></script> --}}


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous"></script>
    <!-- Owl Carousel -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>


    <script type="text/javascript">
        $(document).ready(function() {
            $(".owl-carousel").owlCarousel();
            var owl = $('.owl-carousel');
            owl.owlCarousel();
            // Go to the next item
            $('.arrow-right,.arrow-right-awesome').click(function() {
                owl.trigger('next.owl.carousel');
            })
            // Go to the previous item
            $('.arrow-left,.arrow-left-awesome').click(function() {
                owl.trigger('prev.owl.carousel', [300]);
            })
        });

        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 0,
            nav: false,
            autoplay: true,
            autoplayTimeout: 3000,


            responsive: {
                0: {
                    items: 3
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 3
                }
            }
        })
    </script>


</body>

</html>
