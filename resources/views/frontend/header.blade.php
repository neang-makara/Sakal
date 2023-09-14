

<nav class="navbar navbar-expand-lg bg-primary " style="font-family:'Koulen'; ">
  <div class="container ">

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarSupportedContent">
      <ul class="navbar-nav mx-auto " style="padding-left: 50px;">
        <a class="navbar-brand  " href="{{ url('/') }}">
          <img src="{{ url('/images/white_Sakkal.png')}}" alt="Cover Image" width="50px" height="50px">
          </a>
        <li class="nav-item" style="padding-left: 50px; ">
          <a class="fs-4 text-light nav-link {{ request()->is('home') ? 'active' : '' }}" href="{{ url('/home') }} ">ទំព័រដើម</a>
        </li>
        @foreach ($types as $type)
            <li class="nav-item" style="padding-left: 50px;">
                <a class="fs-4 text-light nav-link" href="{{ url('type/' . $type->id) }}">{{ $type->name }}</a>
            </li>
        @endforeach
        <li class="nav-item" style="padding-left: 50px;">
          <a class="fs-4 text-light nav-link {{ request()->is('about') ? 'active' : '' }}" href="{{ url('/about') }}">អំពីយើង</a>
        </li>
      </ul>
      {{-- <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form> --}}
    </div>
  </div>
</nav>
