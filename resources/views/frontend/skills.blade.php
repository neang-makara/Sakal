{{-- @extends('frontend.pop_up_form')

@section('title', 'ទំព័រដើម')

@section('content') --}}

    {{-- Start Serve --}}

    <a class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle" role="button">តើទេពកោសល្យ និងចំណង់ចំណូលចិត្តរបស់អ្នក ត្រូវនឹងជំនាញអ្វីនៅសាកលវិទ្យាល័យ?</a>
    <div style="padding-top: 50px; " class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalToggleLabel">តើទេពកោសល្យរបស់អ្នក</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div style="font-family: khmer os battambong; font-size: 20px;" class="form-group">


                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="music" name="hobbies[]" value="music">
                    <label class="form-check-label" for="music">
                        គណិតវិទ្យា
                    </label>
                </div>

                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="music" name="hobbies[]" value="music">
                    <label class="form-check-label" for="music">
                        ភាសាខ្មែរ
                    </label>
                </div>

                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="music" name="hobbies[]" value="music">
                    <label class="form-check-label" for="music">
                        គីមីវិទ្យា
                    </label>
                </div>

                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="music" name="hobbies[]" value="music">
                    <label class="form-check-label" for="music">
                        រូបវិទ្យា
                    </label>
                </div>

                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="music" name="hobbies[]" value="music">
                    <label class="form-check-label" for="music">
                        ពលរដ្ឋ និងសីលធម៌
                    </label>
                </div>

                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="music" name="hobbies[]" value="music">
                    <label class="form-check-label" for="music">
                        មូលដ្ឋានគ្រឹះភាសាអង់គ្លេស
                    </label>
                </div>

                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="music" name="hobbies[]" value="music">
                    <label class="form-check-label" for="music">
                        មូលដ្ឋានគ្រឹះភាសាជប៉ុន
                    </label>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">ចាកចេញ</button>
          {{-- <a href="{{route('frontend.show')}}" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal" >ជំនាញរបស់អ្នក</a> --}}
          <button  class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">
            ជំនាញរបស់អ្នក
        </button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalToggleLabel2">ជំនាញដែលអ្នកគួរសិក្សានៅសាកលវិទ្យាល័យ</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <p>1. អក្សរសាស្ត្រខ្មែរ Khmer Literature</p>
            <p>2. ភាសាអង់គ្លេស English</p>
            <p>3. ភាសាបារាំង French</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">ចាកចេញ</button>
          {{-- <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal" data-bs-dismiss="modal">Back to first</button> --}}
        </div>
      </div>
    </div>
  </div>
  {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}


  {{-- End Serve --}}



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>


    {{-- @endsection --}}
