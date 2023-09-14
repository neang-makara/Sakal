@extends('frontend.master')

@section('title', $type->name)

@section('content')


  <div style="text-align:center; margin-top:70px; background: #2d86ea; width:150px; height:40px; color:aliceblue; padding-top:7px; font-family:'Koulen'; ">
    <h5>{{ $type->name }}</h5>
  </div>
  <div
        style=" padding:30px 0px; margin-bottom: 10px; background-color:white; border-top:10px solid #2d86ea; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
        <center>

            <div class="row pt-30">

                @foreach ($type->schools as $school)

                    <div class="col-4 mt-100">
                        <a href="{{ url('school-detail/' . $school->id) }}", style="text-decoration: none;">
                            <div class="card" style="width: 18rem;">
                                <img src="{{ url('storage/' . $school->logo) }}" class="card-img-top" alt="{{ $school->name }}">
                                <div class="card-body">
                                    <p class="card-text"
                                        style="text-decoration: none; color:black; font-size:20px; font-weight:bolder;">
                                        {{ $school->name }}
                                    </p>
                                    <p class="card-text" style="text-decoration: none; color:black;">
                                        មានមហាវិទ្យាល័យចំនួន {{ $school->departments->count() }}
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>

                @endforeach

            </div>

        </center>

    </div>

@endsection
