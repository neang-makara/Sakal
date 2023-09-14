
@if ($errors-> any())

<ul>
    @foreach ($errors->all() as $error)
    <li>{{$error}}</li>

    @endforeach


</ul>

@endif


<form method="POST">


    @csrf
    <input type="text" name="name" placeholder="Enter Name">
    <br><br>

    Khmer <input type="checkbox" name="hobby[]" value="Khmer" >
    Basic English <input type="checkbox" name="hobby[]" value="Basic English" >
    Culture <input type="checkbox" name="hobby[]" value="Culture" >
    Story <input type="checkbox" name="hobby[]" value="Story" >
    Basic France <input type="checkbox" name="hobby[]" value="Basic France" >
    Basic Japanese <input type="checkbox" name="hobby[]" value="Basic Japanese" >

    <br><br>

    <input type="submit">

</form>
