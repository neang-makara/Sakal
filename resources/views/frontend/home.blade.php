@extends('frontend.master')

@section('title', 'ទំព័រដើម')

@section('content')

 {{-- Start slide show --}}
 <div class="col-md-12">
    <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-interval="1800" data-bs-ride="carousel"
        style="margin-top: 40px;">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="3"
                aria-label="Slide 4"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="4"
                aria-label="Slide 5"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="5"
                aria-label="Slide 6"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="6"
                aria-label="Slide 7"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="7"
                aria-label="Slide 8"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="8"
                aria-label="Slide 9"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="9"
                aria-label="Slide 10"></button>

        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ url('/images/University/1.RUPP_Slide.png') }}" class="d-block w-100" alt="Rupp">

            </div>
            <div class="carousel-item">
                <img src="{{ url('/images/University/2.RUA_Slide.png') }}" class="d-block w-100" alt="...">

            </div>
            <div class="carousel-item">
                <img src="{{ url('/images/University/3.NIM.png') }}" class="d-block w-100" alt="...">

            </div>

            <div class="carousel-item">
                <img src="{{ url('/images/University/4.Doctor_Slide.png') }}" class="d-block w-100" alt="...">

            </div>

            <div class="carousel-item">
                <img src="{{ url('/images/University/5.RULE.png') }}" class="d-block w-100" alt="...">

            </div>

            <div class="carousel-item">
                <img src="{{ url('/images/University/6.RUFA_Slide.png') }}" class="d-block w-100" alt="...">

            </div>

            <div class="carousel-item">
                <img src="{{ url('/images/University/7.NU_Slide.png') }}" class="d-block w-100" alt="...">

            </div>

            <div class="carousel-item">
                <img src="{{ url('/images/University/8.PUC_Slide.png') }}" class="d-block w-100" alt="...">

            </div>

            <div class="carousel-item">
                <img src="{{ url('/images/University/9.BB_Slide.png') }}" class="d-block w-100" alt="...">

            </div>

            <div class="carousel-item">
                <img src="{{ url('/images/University/10.AEU_Slide.png') }}" class="d-block w-100" alt="...">

            </div>

        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
{{-- End slide show --}}

{{-- Start Text run --}}
<div style="padding: 20px 0px 0px 0px;">
    <marquee scrollamount="6" behavior="scroll" direction="left"
        style="width: 100%; background-color: #2d86ea; padding: 5px 0; color: white; font-size: 20px;  "
        direction="scroll"> សាកល គឺជាគេហៈទំព័រសម្រាប់ប្រើប្រាស់ដើម្បីជួយសម្រួលទៅដល់យុវជន យុវនារី និងជាពិសេសសិស្ស
        និស្សិត ដែលកំពុងសិក្សា។
    </marquee>
</div>
{{-- End Text run --}}

{{-- Start Item --}}
<div class="container">
    <div class="row ">
        <div class="col-md-9">
            <div class="row ">
                @foreach ($types as $type)
                    @if ($type->schools->count() > 0)
                        <div
                            style="text-align:center; margin-top:20px; background: #2d86ea; width:200px; height:40px; color:aliceblue; padding-top:7px; font-family: 'Koulen'; ">
                            <h5>{{ $type->name }}</h5>
                        </div>
                        <div
                            style=" padding:10px 0px; margin-bottom: 10px; background-color:white; border-top:10px solid #2d86ea; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                            <center>

                                <div class="row ">
                                    @foreach ($type->schools()->take(6)->get() as $school)
                                        {{-- @foreach ($type->schools()->get() as $school) --}}

                                        <div class="col-3 "
                                            style=" margin-left: 20px; margin-top: 30px; margin-right: 60px;">
                                            <a href="{{ url('school-detail/' . $school->id) }}",
                                                style="text-decoration: none;">
                                                <div class="card " style="width: 18rem; ">
                                                    <img src="{{ url('storage/' . $school->logo) }}"
                                                        class="card-img-top" alt="{{ $school->name }}">
                                                    <div class="card-body">
                                                        <p class="card-text"
                                                            style="text-decoration: none; color:black; font-size:20px; font-weight:bolder;">
                                                            {{ $school->name }}
                                                        </p>
                                                        <p class="card-text"
                                                            style="text-decoration: none; color:black;">
                                                            មានមហាវិទ្យាល័យចំនួន {{ $school->departments->count() }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>

                                {{-- <div class="arrow-right-awesome">
                                    <i class="fa fa-chevron-circle-right fa-2x" aria-hidden="true"></i>
                                  </div>
                                  <div class="arrow-left-awesome">
                                    <i class="fa fa-chevron-circle-left fa-2x"  aria-hidden="true"></i>
                                  </div> --}}

                                <div>
                                    <a href="/type/{{ $type->id }}"
                                        style="a:hover{color: red}; font-size: 20px; text-decoration:none; color:black; background: #2d86ea; width:200px; height:40px;font-family: 'Koulen';">
                                        <p style="">មើលបន្ថែមទៀត</p>
                                    </a>
                                </div>


                            </center>


                        </div>
                    @endif
                @endforeach
            </div>
        </div>

        <div class="col-md-3 " style="text-align: center; padding-top: 20px;">

            <div
                style="text-align:center; margin-top:0px; margin-left:50px; background: #2d86ea; width:200px; height:40px; color:aliceblue; padding-top:7px; font-family: 'Koulen'; ">
                <h5>ព័ត៌មានយុវជន</h5>
            </div>

            <div
                style=" padding: 40px 10px 10px 10px; margin-bottom: 10px; background-color:white; border-top:10px solid #2d86ea; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">

                <a href="https://web.facebook.com/NationalYouthDebate" target="_blank">
                    <div class="card mb-4" style="max-width: 600px;" style="padding-top: 20px; margin-bottom: 30px;">
                        <div class="row g-0">

                            <div class="col-md-4" style="padding: 10px 0px 10px 10px; ">
                                <img src="../images/News/nyd.jpg" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h6 class="card-title">កម្មវិធី ជជែកដេញដោលយុវជនថ្នាក់ជាតិ ២០២៣</h6>
                                    {{-- <p class="card-text">Thumnail for title</p> --}}
                                    <p class="card-text"><small class="text-muted">១២ សីហា ២០២៣</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>


                <a href="https://web.facebook.com/SummerYouthCamp" target="_blank">
                    <div class="card mb-4" style="max-width: 600px;"
                        style="padding-top: 20px; margin-bottom: 30px; ">
                        <div class="row g-0">
                            <div class="col-md-4" style="padding: 10px 0px 10px 10px; ">
                                <img src="../images/News/syc.jpg" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h6 class="card-title">កម្មវិធី ជំរំយុវជនជាសាកលលើកទី៩</h6>
                                    {{-- <p class="card-text">Thumnail for title</p> --}}
                                    <p class="card-text"><small class="text-muted">១១-១៦ ធ្នូ ២០២៣</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>


                <a href="https://web.facebook.com/VMC2019" target="_blank">
                    <div class="card mb-3" style="max-width: 600px;" style="padding-top: 20px; margin-bottom: 30px;">
                        <div class="row g-0">
                            <div class="col-md-4" style="padding: 10px 0px 10px 10px; ">
                                <img src="../images/News/VMC.jpg" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h6 class="card-title">កម្មវិធី កម្មវិធីស័គ្រចិត្ត</h6>
                                    {{-- <p class="card-text">Thumnail for title</p> --}}
                                    <p class="card-text"><small class="text-muted">១៥ ធ្នូ ២០២៣</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>

                <a href="https://web.facebook.com/sseaypcambodia" target="_blank">
                    <div class="card mb-3" style="max-width: 600px;" style="padding-top: 20px; margin-bottom: 30px;">
                        <div class="row g-0">
                            <div class="col-md-4" style="padding: 10px 0px 10px 10px; ">
                                <img src="../images/News/sseayp.jpg" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h6 class="card-title">កម្មវិធី នាវាយុវជនអាស៊ីអាគ្នេយ៍</h6>
                                    {{-- <p class="card-text">Thumnail for title</p> --}}
                                    <p class="card-text"><small class="text-muted">១៥ ធ្នូ ២០២៣</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>

                <a href="https://web.facebook.com/Youth21Cambodia" target="_blank">
                    <div class="card mb-3" style="max-width: 600px;" style="padding-top: 20px; margin-bottom: 30px;">
                        <div class="row g-0">
                            <div class="col-md-4" style="padding: 10px 0px 10px 10px; ">
                                <img src="../images/News/youth21.jpg" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h6 class="card-title">កម្មវិធី យុវជន២១</h6>
                                    {{-- <p class="card-text">Thumnail for title</p> --}}
                                    <p class="card-text"><small class="text-muted">១៥ ធ្នូ ២០២៣</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>

                <a href="https://web.facebook.com/VMC2019" target="_blank">
                    <div class="card mb-3" style="max-width: 600px;" style="padding-top: 20px; margin-bottom: 30px;">
                        <div class="row g-0">
                            <div class="col-md-4" style="padding: 10px 0px 10px 10px; ">
                                <img src="../images/News/VMC.jpg" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h6 class="card-title">កម្មវិធី ការស្ម័គ្រចិត្តដើម្បីសហគមន៍ខ្ញុំ</h6>
                                    {{-- <p class="card-text">Thumnail for title</p> --}}
                                    <p class="card-text"><small class="text-muted">១៥ ធ្នូ ២០២៣</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>

                <a href="https://web.facebook.com/ourbusiness.moeys" target="_blank">
                    <div class="card mb-3" style="max-width: 600px;" style="padding-top: 20px; margin-bottom: 30px;">
                        <div class="row g-0">
                            <div class="col-md-4" style="padding: 10px 0px 10px 10px; ">
                                <img src="../images/News/BPC.jpg" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h6 class="card-title">កម្មវិធី អាជីវកម្មខ្ញុំ</h6>
                                    {{-- <p class="card-text">Thumnail for title</p> --}}
                                    <p class="card-text"><small class="text-muted">១៥ ធ្នូ ២០២៣</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>

            </div>

            <div
                style="text-align:center; margin-top:63px; margin-left:50px; background: #2d86ea; width:200px; height:40px; color:aliceblue; padding-top:7px; font-family: 'Koulen'; ">
                <h5>សៀវភៅថ្មីៗ</h5>
            </div>

            <div
                style=" padding: 40px 10px 10px 10px; margin-bottom: 10px; background-color:white; border-top:10px solid #2d86ea; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">


                <a href="https://www.norton-u.com/publication/6" target="_blank">
                    <div class="card mb-4" style="max-width: 600px;" style="padding-top: 20px; margin-bottom: 30px;">
                        <div class="row g-0">

                            <div class="col-md-4" style="padding: 10px 0px 10px 10px; ">
                                <img src="../images/Book/1. Book_Tech.jpg" class="img-fluid rounded-start"
                                    alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h6 class="card-title">សៀវភៅ បច្ចេកវិទ្យាសម័យទំនើប</h6>
                                    {{-- <p class="card-text">Thumnail for title</p> --}}
                                    <p class="card-text"><small class="text-muted">១២ សីហា ២០២៣</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>

                <a href="https://www.norton-u.com/publication/2" target="_blank">
                    <div class="card mb-4" style="max-width: 600px;"
                        style="padding-top: 20px; margin-bottom: 30px; ">
                        <div class="row g-0">
                            <div class="col-md-4" style="padding: 10px 0px 10px 10px; ">
                                <img src="../images/Book/2. Book_ITC.jpg" class="img-fluid rounded-start"
                                    alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h6 class="card-title">សៀវភៅ បច្ចេកវិទ្យា Microsoft</h6>
                                    {{-- <p class="card-text">Thumnail for title</p> --}}
                                    <p class="card-text"><small class="text-muted">១១-១៦ ធ្នូ ២០២៣</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>


                <a href="https://www.norton-u.com/publication/5" target="_blank">
                    <div class="card mb-3" style="max-width: 600px;" style="padding-top: 20px; margin-bottom: 30px;">
                        <div class="row g-0">
                            <div class="col-md-4" style="padding: 10px 0px 10px 10px; ">
                                <img src="../images/Book/3. Book_News.jpg" class="img-fluid rounded-start"
                                    alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h6 class="card-title">សៀវភៅ ព្រឹត្តិប័ត្រអំពីសាកលវិទ្យាល័យ</h6>
                                    {{-- <p class="card-text">Thumnail for title</p> --}}
                                    <p class="card-text"><small class="text-muted">១៥ ធ្នូ ២០២៣</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>

                <a href="https://www.interior.gov.kh/request/doc/url?path=2023/08/24/1692880609.pdf" target="_blank">
                    <div class="card mb-3" style="max-width: 600px;" style="padding-top: 20px; margin-bottom: 30px;">
                        <div class="row g-0">
                            <div class="col-md-4" style="padding: 10px 0px 10px 10px; ">
                                <img src="../images/Book/4.YS_5.jpg" class="img-fluid rounded-start"
                                    alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h6 class="card-title">សៀវភៅ យុទ្ធសាស្ត្រចតុកោណ ដំណាក់កាលទី១</h6>
                                    {{-- <p class="card-text">Thumnail for title</p> --}}
                                    <p class="card-text"><small class="text-muted">១៥ ធ្នូ ២០២៣</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>

                <a href="https://www.norton-u.com/publication/5" target="_blank">
                    <div class="card mb-3" style="max-width: 600px;" style="padding-top: 20px; margin-bottom: 30px;">
                        <div class="row g-0">
                            <div class="col-md-4" style="padding: 10px 0px 10px 10px; ">
                                <img src="../images/Book/3. Book_News.jpg" class="img-fluid rounded-start"
                                    alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h6 class="card-title">សៀវភៅ ព្រឹត្តិប័ត្រអំពីសាកលវិទ្យាល័យ</h6>
                                    {{-- <p class="card-text">Thumnail for title</p> --}}
                                    <p class="card-text"><small class="text-muted">១៥ ធ្នូ ២០២៣</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>




            </div>
        </div>






    </div>
</div>
 {{-- End Item --}}







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
@endsection
