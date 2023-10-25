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
    <link rel="stylesheet" href="{{ url('css/card/card.css') }}">

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
    @php
        $data = json_decode($user_history['data_obj'], true);
    @endphp
    <div class="container">
        <div class="card" data-state="#about">
            <div class="card-header">
            <div class="card-cover" style="background-image: url('https://images.unsplash.com/photo-1549068106-b024baf5062d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=934&q=80')"></div>
            <img class="card-avatar" src="{{ url('images/avatar.png') }}" alt="avatar" />
            <h1 class="card-fullname">{{ $data['name'] }}</h1>
            <h2 class="card-jobtitle"></h2>
            </div>
            <div class="card-main">
            <div class="card-section is-active" id="about">
                <div class="card-content">
                <div class="card-subtitle">ABOUT</div>
                <div class="card-subtitle" style="margin-top: 10px"><i class="fas fa-phone-alt fa-fw"></i> Phone</div>
                <p class="card-desc">
                    {{ $data['phone'] }}
                </p>
                <div style="margin-top: 5px" class="card-subtitle"><i class="fas fa-venus-mars fa-fw"></i>Gender</div>
                <p class="card-desc">
                    {{ $data['gender'] }}
                </p>
                <div style="margin-top: 5px" class="card-subtitle"><i class="fas fa-heart fa-fw"></i> Talents</div>
                <p class="card-desc">
                    <ul style="display: flex">
                        @foreach($talents->whereIn('id',$data['talent']) as $talent)
                            <li class="list-talent">{{ $talent->name }}</li>
                        @endforeach
                    </ul>
                </p>
                </div>
                <div class="card-social">
    
                </div>
            </div>
            <div class="card-section" id="experience">
                <div class="card-content">
                <div class="card-subtitle">ជំនាញដែលសាកសម្យនឹងអ្នកគឺ៖</div>
                <div class="card-timeline">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>&numero;</th>
                                <th>ជំនាញ</th>
                                <th>លម្អិត</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($skills->whereIn('id',$data['skill'])->take(5) as $skill)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $skill->name }}</td>
                                    <td>{{ $skill->description }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
            <div class="card-section" id="contact">
                <div class="card-content">
                <div class="card-subtitle">ទាញយកគំរូជំនាញដែលរបស់អ្នក៖</div>
                <div class="card-contact-wrapper">
                    <button class="contact-me"><i class=" fas fa-download fa-fw"></i>ទាញយក</button>
                </div>
                </div>
            </div>
            <div class="card-buttons">
                <button data-section="#about" class="is-active">ABOUT</button>
                <button data-section="#experience">SKILLS</button>
                <button data-section="#contact">DOWNLOAD</button>
            </div>
            </div>
        </div>
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
    <script src="{{ url('js/card/card.js') }}"></script>
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
