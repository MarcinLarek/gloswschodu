@extends('layouts.app')
@section('styles')
<link href="{{ asset('css/appkfd.css') }}" rel="stylesheet">
@endsection
@section('content')

<div class="container mt-3">
  <div class="row">
    <div class="col-12 d-flex  justify-content-between headerimage w-100" style="background-image:  url('/storage/kfdnav.png');">
      <a href="{{route('index')}}" class="w-50 h-100"></a>
  </div>
</div>
<div class="text-end mt-1 w-100">
  <form id="search" action="{{ route('post.serach',['section' => $serachsection] ) }}" method="post">
    @csrf
    <input type="text" name="serach" value="">
    <input type="submit" class="bg-section" value="Szukaj">
  </form>
</div>

<nav class="navbar-expand-sm bg-section mt-1 mb-3">
  <div class="collapse navbar-collapse">
      <ul class="navbar-nav navbar-section mx-auto">
        <li class="nav-item">
          <a class="nav-link navbaritem-section" href="{{ route( 'post.index', ['section' => $serachsection] ) }}"> <b>Strona Główna</b> </a>
        </li>

        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link navbaritem-section dropdown-toggle" role="button" data-bs-toggle="dropdown">
              Wiadomości
          </a>
          <div class="dropdown-menu " aria-labelledby="navbarDropdown">
            <a class="dropdown-item border-solid" href="{{ route('post.category', ['category' => $categories->where('id', 38)->first(), 'section' => $categories->where('id', 38)->first()->getsection()]) }}">
                {{$categories->where('id', 38)->first()->category}}
            </a>
            <a class="dropdown-item border-solid" href="{{ route('post.category', ['category' => $categories->where('id', 39)->first(), 'section' => $categories->where('id', 39)->first()->getsection()]) }}">
                {{$categories->where('id', 39)->first()->category}}
            </a>
            <a class="dropdown-item border-solid" href="{{ route('post.category', ['category' => $categories->where('id', 40)->first(), 'section' => $categories->where('id', 40)->first()->getsection()]) }}">
                {{$categories->where('id', 40)->first()->category}}
            </a>
          </div>
        </li>

        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link navbaritem-section dropdown-toggle" href="{{ route('post.index',['section' => $sections->where('id', 6)->first()->section]) }}" role="button" data-bs-toggle="dropdown">
              {{$sections->where('id', 6)->first()->section}}
          </a>
          <div class="dropdown-menu " aria-labelledby="navbarDropdown">
            <a class="dropdown-item border-solid" href="{{ route('post.index',['section' => $sections->where('id', 6)->first()->section]) }}">
                {{$sections->where('id', 6)->first()->section}}
            </a>
            @foreach($sections->where('id', 6)->first()->getcategories() as $sub)
            @if($sub->parent_category_id == null)
            <a class="dropdown-item border-solid" href="{{ route('post.category', ['category' => $sub, 'section' => $sub->getsection()]) }}">
                {{$sub->category}}
            </a>
            @endif
            @endforeach
        </li>

        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link navbaritem-section dropdown-toggle" href="{{ route('post.index', ['category' => $categories->where('id', 41)->first(), 'section' => $categories->where('id', 41)->first()->getsection()]) }}" role="button" data-bs-toggle="dropdown">
              {{$categories->where('id', 41)->first()->category}}
          </a>
          <div class="dropdown-menu " aria-labelledby="navbarDropdown">
            <a class="dropdown-item border-solid" href="{{ route('post.category', ['category' => $categories->where('id', 41)->first(), 'section' => $categories->where('id', 41)->first()->getsection()]) }}">
                {{$categories->where('id', 41)->first()->category}}
            </a>
            @foreach($categories->where('id', 41)->first()->getsubcategories() as $sub)
            <a class="dropdown-item border-solid" href="{{ route('post.category', ['category' => $sub, 'section' => $sub->getsection()]) }}">
                {{$sub->category}}
            </a>
            @endforeach
          </div>
        </li>

        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link navbaritem-section dropdown-toggle" href="{{ route('post.category', ['category' => $categories->where('id', 42)->first(), 'section' => $categories->where('id', 42)->first()->getsection()]) }}" role="button" data-bs-toggle="dropdown">
              {{$categories->where('id', 42)->first()->category}}
          </a>
          <div class="dropdown-menu " aria-labelledby="navbarDropdown">
            <a class="dropdown-item border-solid" href="{{ route('post.category', ['category' => $categories->where('id', 42)->first(), 'section' => $categories->where('id', 42)->first()->getsection()]) }}">
                {{$categories->where('id', 42)->first()->category}}
            </a>
            @foreach($categories->where('id', 42)->first()->getsubcategories() as $sub)
            <a class="dropdown-item border-solid" href="{{ route('post.category', ['category' => $sub, 'section' => $sub->getsection()]) }}">
                {{$sub->category}}
            </a>
            @endforeach
          </div>
        </li>

        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link navbaritem-section dropdown-toggle" href="{{ route('post.category', ['category' => $categories->where('id', 43)->first(), 'section' => $categories->where('id', 43)->first()->getsection()]) }}" role="button" data-bs-toggle="dropdown">
              {{$categories->where('id', 43)->first()->category}}
          </a>
          <div class="dropdown-menu " aria-labelledby="navbarDropdown">
            <a class="dropdown-item border-solid" href="{{ route('post.category', ['category' => $categories->where('id', 43)->first(), 'section' => $categories->where('id', 43)->first()->getsection()]) }}">
                {{$categories->where('id', 43)->first()->category}}
            </a>
            @foreach($categories->where('id', 43)->first()->getsubcategories() as $sub)
            <a class="dropdown-item border-solid" href="{{ route('post.category', ['category' => $sub, 'section' => $sub->getsection()]) }}">
                {{$sub->category}}
            </a>
            @endforeach
          </div>
        </li>


        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link navbaritem-section dropdown-toggle" href="{{ route('post.category', ['category' => $categories->where('id', 44)->first(), 'section' => $categories->where('id', 44)->first()->getsection()]) }}" role="button" data-bs-toggle="dropdown">
              {{$categories->where('id', 44)->first()->category}}
          </a>
          <div class="dropdown-menu " aria-labelledby="navbarDropdown">
            <a class="dropdown-item border-solid" href="{{ route('post.category', ['category' => $categories->where('id', 44)->first(), 'section' => $categories->where('id', 44)->first()->getsection()]) }}">
                {{$categories->where('id', 44)->first()->category}}
            </a>
            @foreach($categories->where('id', 44)->first()->getsubcategories() as $sub)
            <a class="dropdown-item border-solid" href="{{ route('post.category', ['category' => $sub, 'section' => $sub->getsection()]) }}">
                {{$sub->category}}
            </a>
            @endforeach
          </div>
        </li>



      </ul>
  </div>
</nav>

@yield('mainpage')
</div>

@endsection
