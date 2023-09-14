@extends('frontend.master')

@section('title', $school->name)

@section('content')

    <div class="row ">
        <div class="col-4 ">
            {{-- logo --}}
            <p class="text-center mt-4">
                <img src="{{ url('storage/' . $school->logo) }}" alt="{{ $school->name }}"
                    style="width: 180px; height: 180px; border-radius: 50%;">
            </p>
            {{-- school name --}}
            <h4 class="text-center">
                {{ $school->name }}
            </h4>
            {{-- department list --}}
            <div class="list-group list-group-flush">
                @foreach ($school->departments as $department)
                    <a href="{{ url('school-detail/' . $school->id . '?department=' . $department->id) }}"
                        class="list-group-item list-group-item-action">
                        {{ $loop->iteration . ' - ' . $department->name }}
                    </a>
                @endforeach
            </div>
        </div>
        <div class="col-8">
            <h4 class="mt-4">មុខវិជ្ជា</h4>
            @if ($school->departments()->find($selectedDepartmentId) != null)
                <ul class="list-group list-group-flush">
                    @foreach ($school->departments()->find($selectedDepartmentId)->subjects as $subject)
                        <li class="list-group-item">{{ $subject->name }}</li>
                    @endforeach
                </ul>
                @if ($school->departments()->find($selectedDepartmentId)->subjects->count() == 0)
                    <p class="text-center text-muted text-xs mt-4"><i>
                            {{-- <div style="max-width:100%;list-style:none; transition: none;overflow:hidden;width:500px;height:500px;"><div id="my-map-canvas" style="height:100%; width:100%;max-width:100%;"><iframe style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q=RUPP+IT+Building+B,+Street+608,+PP,+Cambodia&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"></iframe></div><a class="the-googlemap-enabler" rel="nofollow" href="https://www.bootstrapskins.com/themes" id="auth-map-data">premium bootstrap themes</a><style>#my-map-canvas img{max-width:none!important;background:none!important;font-size: inherit;font-weight:inherit;}</style></div></i></p> --}}

                            {{-- Start slide show --}}
                            <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-interval="1800"
                                data-bs-ride="carousel" style="margin-top: 40px;">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0"
                                        class="active" aria-current="true" aria-label="Slide 1"></button>
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
                                        <img src="{{ url('/images/University/1.RUPP_Slide.png') }}" class="d-block w-100"
                                            alt="Rupp">

                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{ url('/images/University/2.RUA_Slide.png') }}" class="d-block w-100"
                                            alt="...">

                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{ url('/images/University/3.NIM.png') }}" class="d-block w-100"
                                            alt="...">

                                    </div>

                                    <div class="carousel-item">
                                        <img src="{{ url('/images/University/4.Doctor_Slide.png') }}" class="d-block w-100"
                                            alt="...">

                                    </div>

                                    <div class="carousel-item">
                                        <img src="{{ url('/images/University/5.RULE.png') }}" class="d-block w-100"
                                            alt="...">

                                    </div>

                                    <div class="carousel-item">
                                        <img src="{{ url('/images/University/6.RUFA_Slide.png') }}" class="d-block w-100"
                                            alt="...">

                                    </div>

                                    <div class="carousel-item">
                                        <img src="{{ url('/images/University/7.NU_Slide.png') }}" class="d-block w-100"
                                            alt="...">

                                    </div>

                                    <div class="carousel-item">
                                        <img src="{{ url('/images/University/8.PUC_Slide.png') }}" class="d-block w-100"
                                            alt="...">

                                    </div>

                                    <div class="carousel-item">
                                        <img src="{{ url('/images/University/9.BB_Slide.png') }}" class="d-block w-100"
                                            alt="...">

                                    </div>

                                    <div class="carousel-item">
                                        <img src="{{ url('/images/University/10.AEU_Slide.png') }}" class="d-block w-100"
                                            alt="...">

                                    </div>

                                </div>

                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselExampleDark" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>


                            <div style=" padding-top: 10px;">

                                <div class="card mb-4" style="width:840px;">
                                    <div class="row g-0">
                                        <div
                                            style="text-align:center; padding-top: 10px;  background: #2d86ea; width:840px; height:40px; color:aliceblue; font-family: 'Koulen'; ">
                                            ព័ត៌មានពាក់ព័ន្ធនឹងការសិក្សាតាមមុខជំនាញ </div>

                                        <div class="card-body">
                                            <p
                                                style="font-family: 'khmer os battambong'; color:black; text-align: left; margin-top: 10px;">
                                                ព័ត៌មានពាក់ព័ន្ធនឹងការសិក្សាតាមមុខជំនាញព័ត៌មានពាក់ព័ន្ធនឹងការសិក្សាតាមមុខជំនាញព័ត៌មានពាក់ព័ន្ធនឹងការសិក្សាតាមមុខជំនាញព័ត៌មានពាក់ព័ន្ធនឹងការសិក្សាតាមមុខជំនាញព័ត៌មានពាក់ព័ន្ធនឹងការសិក្សាតាមមុខជំនាញ
                                            </p>
                                            <p
                                                style="font-family: 'khmer os battambong'; color:black; text-align: left; margin-top: 20px;">
                                                ព័ត៌មានពាក់ព័ន្ធនឹងការសិក្សាតាមមុខជំនាញព័ត៌មានពាក់ព័ន្ធនឹងការសិក្សាតាមមុខជំនាញព័ត៌មានពាក់ព័ន្ធនឹងការសិក្សាតាមមុខជំនាញព័ត៌មានពាក់ព័ន្ធនឹងការសិក្សាតាមមុខជំនាញព័ត៌មានពាក់ព័ន្ធនឹងការសិក្សាតាមមុខជំនាញ
                                            </p>
                                            <p
                                                style="font-family: 'khmer os battambong'; color:black; text-align: left; margin-top: 20px;">
                                                ព័ត៌មានពាក់ព័ន្ធនឹងការសិក្សាតាមមុខជំនាញព័ត៌មានពាក់ព័ន្ធនឹងការសិក្សាតាមមុខជំនាញព័ត៌មានពាក់ព័ន្ធនឹងការសិក្សាតាមមុខជំនាញព័ត៌មានពាក់ព័ន្ធនឹងការសិក្សាតាមមុខជំនាញព័ត៌មានពាក់ព័ន្ធនឹងការសិក្សាតាមមុខជំនាញ
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>

                                <div class="card mb-4" style="width:840px;" style="padding-top: 20px; ">
                                    <div class="row g-0">
                                        <div
                                            style="text-align:center;  margin-bottom:10px;padding-top: 10px;  background: #2d86ea; width:840px; height:40px; color:aliceblue; font-family: 'Koulen'; ">
                                            ព័ត៌មានអំពីសាកលវិទ្យាល័យ </div>
                                        <div class="col-md-8">
                                            <div class="card-body" style="margin-left:50px;">
                                                <p> <i class=" fas fa-circle" style="margin-right: 20px;"></i>
                                                    ទីតាំងរបស់សាកលវិទ្យាល័យ</p>
                                                <p> <i class=" fas fa-circle" style="margin-right: 20px;"></i>
                                                    លេខទូរស័ព្ទទំនាក់ទំនង៖ 010 55 3333 11</p>
                                                <p> <i class=" fas fa-circle" style="margin-right: 20px;"></i>
                                                    តំណភ្ជាប់សាកលវិទ្យាល័យ</p>
                                                <p> <i class=" fas fa-circle" style="margin-right: 20px;"></i> Link
                                                    Location</p>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <img src="../images/News/nyd.jpg" style="width: 160px; height: 160px;"
                                                class="img-fluid rounded-start" alt="...">
                                        </div>
                                    </div>
                                </div>

                            </div>

        </div>
        {{-- End slide show --}}
        @endif
        @endif
    </div>


    <div class="card" style="width: 1250px; height: 100%; margin: auto;">
        <div
            style="text-align:left;  margin-bottom:10px;padding-top: 10px;  background: #2d86ea; width:100%; height:40px; color:aliceblue; font-family: 'Koulen'; ">
            <p style="margin-left: 20px;">ព័ត៌មានទាក់ទងថ្មីៗ</p> </div>

        <div class="row row-cols-1 row-cols-md-5">
            <div class="col" style="padding: 20px 30px; ">
                <div class="card h-50">
                    <img src="../images/News/nyd.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">សាកលវិទ្យាល័យ</h5>
                        <p class="card-text">សាកលវិទ្យាល័យ ន័រតុន</p>
                    </div>
                </div>
            </div>
            <div class="col" style="padding: 20px 30px;">
                <div class="card h-50">
                    <img src="../images/News/nyd.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">សាកលវិទ្យាល័យ</h5>
                        <p class="card-text">សាកលវិទ្យាល័យ ន័រតុន</p>
                    </div>
                </div>
            </div>
            <div class="col" style="padding: 20px 30px;">
                <div class="card h-50">
                    <img src="../images/News/nyd.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">សាកលវិទ្យាល័យ</h5>
                        <p class="card-text">សាកលវិទ្យាល័យ ន័រតុន</p>
                    </div>
                </div>
            </div>
            <div class="col" style="padding: 20px 30px;">
                <div class="card h-50">
                    <img src="../images/News/nyd.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">សាកលវិទ្យាល័យ</h5>
                        <p class="card-text">សាកលវិទ្យាល័យ ន័រតុន</p>
                    </div>
                </div>
            </div>
            <div class="col" style="padding: 20px 30px;">
                <div class="card h-50">
                    <img src="../images/News/nyd.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">សាកលវិទ្យាល័យ</h5>
                        <p class="card-text">សាកលវិទ្យាល័យ ន័រតុន</p>
                    </div>
                </div>
            </div>
            <div class="col" style="padding: 20px 30px;">
                <div class="card h-50">
                    <img src="../images/News/nyd.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">សាកលវិទ្យាល័យ</h5>
                        <p class="card-text">សាកលវិទ្យាល័យ ន័រតុន</p>
                    </div>
                </div>
            </div>

            <div class="col" style="padding: 20px 30px;">
                <div class="card h-50">
                    <img src="../images/News/nyd.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">សាកលវិទ្យាល័យ</h5>
                        <p class="card-text">សាកលវិទ្យាល័យ ន័រតុន</p>
                    </div>
                </div>
            </div>

            <div class="col" style="padding: 20px 30px;">
                <div class="card h-50">
                    <img src="../images/News/nyd.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">សាកលវិទ្យាល័យ</h5>
                        <p class="card-text">សាកលវិទ្យាល័យ ន័រតុន</p>
                    </div>
                </div>
            </div>

            <div class="col" style="padding: 20px 30px;">
                <div class="card h-50">
                    <img src="../images/News/nyd.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">សាកលវិទ្យាល័យ</h5>
                        <p class="card-text">សាកលវិទ្យាល័យ ន័រតុន</p>
                    </div>
                </div>
            </div>

            <div class="col" style="padding: 20px 30px;">
                <div class="card h-50">
                    <img src="../images/News/nyd.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">សាកលវិទ្យាល័យ</h5>
                        <p class="card-text">សាកលវិទ្យាល័យ ន័រតុន</p>
                    </div>
                </div>
            </div>
        </div>
    </div>







@endsection
