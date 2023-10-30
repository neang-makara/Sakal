@extends('frontend.master')

@section('title', 'អំពីយើង')

@section('content')

    {{-- <section class="team" >
        <div class="container">
            <h1>OUR TEAM</h1>
            <div class="row">
                <div class="col-md-3">
                    <div class="img-box">
                        <img src="/images/Profile/1.Makara.jpg" alt="img-responsive">
                        <ul>
                            <a href="#"><li><i class="fa fa-facebook"></i></li></a>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </section> --}}

{{-- Start Card Item សាកលវិទ្យាល័យ --}}
  <center>
    <div style="text-align:center; margin-top:70px; background: #2d86ea; width:150px; height:40px; color:aliceblue; padding-top:7px; font-family: 'Koulen';  ">
        <h5>ក្រុមរបស់យើង</h5>
      </div>
  </center>

 <div style=" padding-bottom: 15px; background-color:white; border-top:10px solid #2d86ea; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" >
  <center >
    <div class="row" style="margin-top: 30px; margin-bottom: 30px;">
        <div class="col-md-4 mt-100 ">
            <div class="card" style="width: 18rem; ">
                <img src="{{ url('/images/Profile/1.Makara_Use.jpg')}}" class="card-img-top" style="height:300px;" alt="...">
                <div class="card-body">
                    <h4 class="card-text">នាង មករា</h4>

                    <p class="card-text">អ្នកអភិវឌ្ឍកម្មវិធី</p>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card" style="width: 18rem; ">
                <img src="{{ url('/images/Profile/2.Ramo.jpg')}}" class="card-img-top" style="height:300px;" alt="...">
                <div class="card-body">
                    <h4 class="card-text">ស្រេង រ៉ាម៉ូ</h4>

                  <p class="card-text">អ្នកអភិវឌ្ឍកម្មវិធី</p>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card" style="width: 18rem;">
                <img src="{{ url('/images/Profile/3.Net.jpg')}}" class="card-img-top" style="height:300px;" alt="...">
                <div class="card-body">
                    <h4 class="card-text">ចន្នី នាត</h4>

                  <p class="card-text">អ្នកអភិវឌ្ឍកម្មវិធី</p>
                </div>
            </div>
        </div>

    </div>
 </center>
 </div>
  {{-- End Card Item សាកលវិទ្យាល័យ--}}

{{-- Start Contact Message --}}
       <center>
        <div style="text-align:center; margin-top:70px; background: #2d86ea; width:150px; height:40px; color:aliceblue; padding-top:7px; font-family: 'Koulen';  ">
            <h5>ទំនាក់ទំនង</h5>
        </div>
      </center>
    
     <div style=" padding-bottom: 15px; background-color:white; border-top:10px solid #2d86ea; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" >
      <center >
        <br>
        @include('frontend.message.message')

        <div class="row" style="margin-top: 30px; margin-bottom: 30px;">
            <form action="{{ route('frontend.submit.store') }}" method="POST">
                @csrf
        
                <div class="col-md-5">  
                        <div class="form-group">
                        <label class="info-title float-left" for="exampleInputName">ឈ្មោះរបស់អ្នក <span>*</span></label>
                        <input type="text" class="form-control unicase-form-control text-input" id="name"  name="name" required="" placeholder="">
                    </div>
                    
                </div>
                <div class="col-md-5">
                        <div class="form-group ">
                        <label class="info-title float-left" for="exampleInputEmail1">អ៊ីម៉ែល <span>*</span></label>
                        <input type="email" class="form-control unicase-form-control text-input" id="email"  name="email" required="" placeholder="">
                    </div>
                    
                </div>
                <div class="col-md-5">
                        <div class="form-group">
                        <label class="info-title float-left" for="exampleInputTitle">លេខទូរស័ព្ទ <span>*</span></label>
                        <input type="text" class="form-control unicase-form-control text-input" id="phone"  name="phone" required="" placeholder="">
                    </div>
                    
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                    <label class="info-title float-left" for="exampleInputTitle">ប្រធានបទ <span>*</span></label>
                    <input type="text" class="form-control unicase-form-control text-input" id="subject"  name="subject" required="" placeholder="">
                </div>
                </div>
                <div class="col-md-5">
                        <div class="form-group">
                        <label class="info-title float-left" for="exampleInputComments">លំអិត <span>*</span></label>
                        <textarea class="form-control unicase-form-control" id="message"  name="message" required=""></textarea>
                    </div>
                    
                </div>
                <div class="col-md-5 outer-bottom-small m-t-20">
                    <div class="card-footer">
                        <button type="submit" class="btn btn-sm btn-primary">ស្នើរសុំ</button>
                      </div>
                </div>
            </form>
          
    
        </div>
     </center>
     </div>
{{-- End Contact Message--}}


@endsection
