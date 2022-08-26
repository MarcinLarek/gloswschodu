@extends('layouts.navbar.plportal')
@section('styles')
<link href="{{ asset('css/appplportal.css') }}" rel="stylesheet">
@endsection
@section('mainpage')

<div class="row">
    <div class="col-xl-8 col-l-8 col-md-12 col-sm-12 ">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">

                <div class="carousel-item active">
                  @if(isset($firstpost))
                    <img src="/storage/{{ $firstpost->image }}" class="carouselphoto" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                      <a href="{{ route('post.show', ['post' => $firstpost, 'section' => $firstpost->getsection()]) }}"><h5>{{$firstpost->title}}</h5></a>
                    </div>
                    @endif
                </div>

                @foreach ($posts as $post)
                @break($loop->iteration == 5)
                <div class="carousel-item">
                    <img src="/storage/{{ $post->image }}" class="carouselphoto" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                      <a href="{{ route('post.show', ['post' => $post, 'section' => $post->getsection()]) }}"><h5>{{$post->title}}</h5></a>
                    </div>
                </div>
                @endforeach

            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>

            <div class="carousel-indicators">
                @if(isset($firstpost))
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1">
                  <img src="/storage/{{$firstpost->image}}" class="d-block w-100 img-fluid" alt="">
                </button>
                @endif
                @if(isset($posts[0]))
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2">
                  <img src="/storage/{{$posts[0]->image}}" class="d-block w-100 img-fluid" alt="">
                </button>
                @endif
                @if(isset($posts[1]))
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3">
                  <img src="/storage/{{$posts[1]->image}}" class="d-block w-100 img-fluid" alt="">
                </button>
                @endif
                @if(isset($posts[2]))
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4">
                  <img src="/storage/{{$posts[2]->image}}" class="d-block w-100 img-fluid" alt="">
                </button>
                @endif
                @if(isset($posts[3]))
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4" aria-label="Slide 5">
                  <img src="/storage/{{$posts[3]->image}}" class="d-block w-100 img-fluid" alt="">
                </button>
                @endif
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-l-4 col-md-12 col-sm-12 col-12">
        @foreach ($posts as $post)
        @continue($loop->iteration < 16) @break($loop->iteration == 23)
        @if($loop->iteration < 18)
        <div class="row pt-1">
            <div class="col-xl-5 col-l-5 col-md-5 col-sm-5 col-5 col-12">
                <a href="{{ route('post.show', ['post' => $post, 'section' => $post->getsection()]) }}"><img src="/storage/{{ $post->image }}" class="w-100 mainpagerightlist"></a>
            </div>
            <div class="col-xl-7 col-l-7 col-md-7 col-sm-7 col-7 col-12 rightlisttext">
                <a href="{{ route('post.show', ['post' => $post, 'section' => $post->getsection()]) }}"><b>{{$post->title}}</b></a>
            </div>
        </div>
        @else
        <div class="row pt-2">
          <a href="{{ route('post.show', ['post' => $post, 'section' => $post->getsection()]) }}">• {{$post->title}}</a>
        </div>
        @endif
        @endforeach
    </div>
</div>

<div class="row pt-2">
<h3 class="text-section">Najnowsze</h3>
<hr class="section-hr">
</div>
<div class="row pb-2">
  @foreach($posts as $post)
  @continue($loop->iteration < 13)
  <div class="col-3">
    <a href="{{ route('post.show', ['post' => $post, 'section' => $post->getsection()]) }}">
    <div class="mb-2 col-3 w-100 squarecolumns d-flex" style="background-image: url('/storage/{{$post->image}}')">
      <div class="pt-1 pb-1 ps-2 pe-2" style="background-color:rgba(0, 0, 0, 0.5);">
      <h5> <b>{{$post->title}}</b> </h5>
      </div>
    </div>
    </a>
  </div>
  @endforeach
</div>

@foreach($sections as $section)
<div class="row">
<h3 class="text-section">{{ $section->section }}</h3>
<hr class="section-hr">
</div>
<div class="row">

  <div class="col-xl-8 col-l-8 col-md-12 col-sm-12 col-12">
    <div class="row">
      @foreach ($section->getposts()->take(9) as $post)
        <div class="col-4 mb-3">
          <a href="{{ route('post.show', ['post' => $post, 'section' => $section]) }}">
          <div class="mb-2 col-3 w-100 squarecolumns d-flex" style="background-image: url('/storage/{{$post->image}}')">
            <div class="pt-1 pb-1 ps-2 pe-2" style="background-color:rgba(0, 0, 0, 0.5);">
            <h5> <b>{{$post->title}}</b> </h5>
            </div>
          </div>
          </a>
        </div>
      @endforeach
    </div>
  </div>

  <div class="col-xl-4 col-l-4 col-md-12 col-sm-12 col-12">
      @foreach ($section->getposts()->take(19) as $post)
      @continue($loop->iteration < 10)
      @if($loop->iteration == 10)
      <div class="row pt-1">
          <div class="col-xl-5 col-l-5 col-md-5 col-sm-5 col-5 col-12">
              <a href="{{ route('post.show', ['post' => $post, 'section' => $post->getsection()]) }}"><img src="/storage/{{ $post->image }}" class="w-100 mainpagerightlist"></a>
          </div>
          <div class="col-xl-7 col-l-7 col-md-7 col-sm-7 col-7 col-12 rightlisttext">
              <a href="{{ route('post.show', ['post' => $post, 'section' => $post->getsection()]) }}"><b>{{$post->title}}</b></a>
          </div>
      </div>
      @else
      <div class="row pt-2">
        <a href="{{ route('post.show', ['post' => $post, 'section' => $post->getsection()]) }}">• {{$post->title}}</a>
      </div>
      @endif
      @endforeach
  </div>


</div>
@endforeach


@endsection
