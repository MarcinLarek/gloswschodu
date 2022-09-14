@extends('layouts.navbar.plportal')
@section('styles')
<link href="{{ asset('css/appplportal.css') }}" rel="stylesheet">
@endsection
@section('mainpage')

<div class="row mb-3">
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
            <div class="col-xl-5 col-l-5 col-md-5 col-sm-5 col-5">
                <a href="{{ route('post.show', ['post' => $post, 'section' => $post->getsection()]) }}"><img src="/storage/{{ $post->image }}" class="w-100 mainpagerightlist"></a>
            </div>
            <div class="col-xl-7 col-l-7 col-md-7 col-sm-7 col-7 rightlisttext">
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




<div class="row pt-3">
<div class="col-xl-5 col-l-5 col-md-12 col-sm-12">
  <h4>Fakty / Wydarzenia</h4>
  <div class="row mb-3">
    <ul class="nav nav-tabs" id="TUTUFakty" role="tablist">
      @foreach($sections->take(3) as $sub)
      @if($loop->iteration == 1)
      <li class="nav-item" role="presentation">
        <button class="text-dark text-uppercase nav-link active" id="home-tab{{preg_replace('/\s+/', '', $sub->sectionseo)}}" data-bs-toggle="tab" data-bs-target="#home{{preg_replace('/\s+/', '', $sub->sectionseo)}}" type="button" role="tab" aria-controls="home" aria-selected="true">{{$sub->section}}</button>
      </li>
      @else
      <li class="nav-item" role="presentation">
        <button class="text-dark text-uppercase nav-link" id="home-tab{{preg_replace('/\s+/', '', $sub->sectionseo)}}" data-bs-toggle="tab" data-bs-target="#home{{preg_replace('/\s+/', '', $sub->sectionseo)}}" type="button" role="tab" aria-controls="home" aria-selected="false">{{$sub->section}}</button>
      </li>
      @endif
      @endforeach
    </ul>

  <div class="tab-content" id="TUTUFaktyContent">
    @foreach($sections->take(3) as $sub)
    @if($loop->iteration == 1)
      <div class="tab-pane fade show active" id="home{{preg_replace('/\s+/', '', $sub->sectionseo)}}" role="tabpanel" aria-labelledby="home-tab{{preg_replace('/\s+/', '', $sub->sectionseo)}}">
        @else
      <div class="tab-pane fade" id="home{{preg_replace('/\s+/', '', $sub->sectionseo)}}" role="tabpanel" aria-labelledby="home-tab{{preg_replace('/\s+/', '', $sub->sectionseo)}}">
        @endif
        <?php $innerposts = $sub->getposts()->take(8); ?>
        <div class="row">
          @foreach($innerposts as $post)
            @if($loop->iteration < 3)
            <div class="row pt-1">
                <div class="col-xl-4 col-l-4 col-md-4 col-sm-4 col-4">
                    <a href="{{ route('post.show', ['post' => $post, 'section' => $post->getsection()]) }}"><img src="/storage/{{ $post->image }}" class="w-100 mainpagerightlist"></a>
                </div>
                <div class="col-xl-8 col-l-8 col-md-8 col-sm-8 col-8 rightlisttext">
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
  </div>
  </div>



</div>


<div class="col-xl-7 col-l-7 col-md-12 col-sm-12">

  <h4>Polityczna Kuchnia</h4>
  <div class="row mb-3">
    <ul class="nav nav-tabs" id="TUTUPolKuch" role="tablist">
      @foreach($sections->take(4) as $sub)
        @if($sub->id == 2 || $sub->id == 4)
        @if($sub->id == 2)
        <li class="nav-item" role="presentation">
          <button class="text-dark text-uppercase nav-link active" id="home-tabPolKuch{{preg_replace('/\s+/', '', $sub->sectionseo)}}" data-bs-toggle="tab" data-bs-target="#homePolKuch{{preg_replace('/\s+/', '', $sub->sectionseo)}}" type="button" role="tab" aria-controls="home" aria-selected="true">{{$sub->section}}</button>
        </li>
        @else
        <li class="nav-item" role="presentation">
          <button class="text-dark text-uppercase nav-link" id="home-tabPolKuch{{preg_replace('/\s+/', '', $sub->sectionseo)}}" data-bs-toggle="tab" data-bs-target="#homePolKuch{{preg_replace('/\s+/', '', $sub->sectionseo)}}" type="button" role="tab" aria-controls="home" aria-selected="false">{{$sub->section}}</button>
        </li>
        @endif
        @endif
      @endforeach
    </ul>

  <div class="tab-content" id="TUTUPolKuchContent">
    @foreach($sections->take(4) as $sub)
    @if($sub->id == 2 || $sub->id == 4)
    @if($sub->id == 2)
      <div class="tab-pane fade show active" id="homePolKuch{{preg_replace('/\s+/', '', $sub->sectionseo)}}" role="tabpanel" aria-labelledby="home-tabPolKuch{{preg_replace('/\s+/', '', $sub->sectionseo)}}">
        @else
      <div class="tab-pane fade" id="homePolKuch{{preg_replace('/\s+/', '', $sub->sectionseo)}}" role="tabpanel" aria-labelledby="home-tabPolKuch{{preg_replace('/\s+/', '', $sub->sectionseo)}}">
        @endif
        <?php $innerposts = $sub->getposts()->take(6); ?>
        <div class="row">
          @foreach($innerposts as $inpost)
          <div class="col-xl-4 col-l-4 col-md-12 col-sm-12">
            <a href="{{ route('post.show', ['post' => $inpost, 'section' => $inpost->getsection()]) }}">
              <div class="mb-2 col-3 w-100 section-bottomtabeimage d-flex" style="background-image: url('/storage/{{$inpost->image}}')">
                <div class="pt-1 pb-1 ps-2 pe-2" style="background-color:rgba(0, 0, 0, 0.5);">
                  <h5> <b>{{$inpost->title}}</b> </h5>
                </div>
              </div>
            </a>
          </div>
          @endforeach
        </div>
      </div>
      @endif
    @endforeach
  </div>
  </div>
</div>
</div>





@foreach($sections->skip(4)->take(1) as $section)
<div class="row mb-3">
  <ul class="nav nav-tabs" id="TUTU{{preg_replace('/\s+/', '', $section->section)}}" role="tablist">
    @foreach($section->getcategories() as $sub)
    @if($loop->iteration == 1)
    <li class="nav-item" role="presentation">
      <button class="text-dark text-uppercase nav-link active" id="home-tab{{preg_replace('/\s+/', '', $sub->category)}}" data-bs-toggle="tab" data-bs-target="#home{{preg_replace('/\s+/', '', $sub->category)}}" type="button" role="tab" aria-controls="home" aria-selected="true">{{$sub->category}}</button>
    </li>
    @else
    <li class="nav-item" role="presentation">
      <button class="text-dark text-uppercase nav-link" id="home-tab{{preg_replace('/\s+/', '', $sub->category)}}" data-bs-toggle="tab" data-bs-target="#home{{preg_replace('/\s+/', '', $sub->category)}}" type="button" role="tab" aria-controls="home" aria-selected="false">{{$sub->category}}</button>
    </li>
    @endif
    @endforeach
  </ul>

<div class="tab-content" id="TUTU{{preg_replace('/\s+/', '', $section->section)}}Content">
  @foreach($section->getcategories() as $sub)
  @if($loop->iteration == 1)
    <div class="tab-pane fade show active" id="home{{preg_replace('/\s+/', '', $sub->category)}}" role="tabpanel" aria-labelledby="home-tab{{preg_replace('/\s+/', '', $sub->category)}}">
      @else
    <div class="tab-pane fade" id="home{{preg_replace('/\s+/', '', $sub->category)}}" role="tabpanel" aria-labelledby="home-tab{{preg_replace('/\s+/', '', $sub->category)}}">
      @endif
      <?php $innerposts = $sub->getposts()->take(5); ?>
      <div class="row">
        @foreach($innerposts as $inpost)
          <div class="col section-imagebox bg-section">
            <a href="{{ route('post.show', ['post' => $inpost, 'section' => $inpost->getsection()]) }}">
              <div class="mb-2 col-3 w-100 section-bottomtabeimage d-flex" style="background-image: url('/storage/{{$inpost->image}}')">
                <div class="pt-1 pb-1 ps-2 pe-2" style="background-color:rgba(0, 0, 0, 0.5);">
                  <h5> <b>{{$inpost->title}}</b> </h5>
                </div>
              </div>
            </a>
          </div>
        @endforeach
      </div>
    </div>
  @endforeach
</div>
</div>
@endforeach





@foreach($sections->skip(5)->take(1) as $section)
<div class="row">
<div class="col-6">
  <h4>Kultura / Art</h4>
</div>
</div>
<div class="row mb-3">
  <ul class="nav nav-tabs" id="TUTU{{preg_replace('/\s+/', '', $section->section)}}" role="tablist">
    @foreach($section->getcategories() as $sub)
    @if($loop->iteration == 1)
    <li class="nav-item" role="presentation">
      <button class="text-dark text-uppercase nav-link active" id="home-tab{{preg_replace('/\s+/', '', $sub->category)}}" data-bs-toggle="tab" data-bs-target="#home{{preg_replace('/\s+/', '', $sub->category)}}" type="button" role="tab" aria-controls="home" aria-selected="true">{{$sub->category}}</button>
    </li>
    @else
    <li class="nav-item" role="presentation">
      <button class="text-dark text-uppercase nav-link" id="home-tab{{preg_replace('/\s+/', '', $sub->category)}}" data-bs-toggle="tab" data-bs-target="#home{{preg_replace('/\s+/', '', $sub->category)}}" type="button" role="tab" aria-controls="home" aria-selected="false">{{$sub->category}}</button>
    </li>
    @endif
    @endforeach
  </ul>

<div class="tab-content" id="TUTU{{preg_replace('/\s+/', '', $section->section)}}Content">
  @foreach($section->getcategories() as $sub)
  @if($loop->iteration == 1)
    <div class="tab-pane fade show active" id="home{{preg_replace('/\s+/', '', $sub->category)}}" role="tabpanel" aria-labelledby="home-tab{{preg_replace('/\s+/', '', $sub->category)}}">
      @else
    <div class="tab-pane fade" id="home{{preg_replace('/\s+/', '', $sub->category)}}" role="tabpanel" aria-labelledby="home-tab{{preg_replace('/\s+/', '', $sub->category)}}">
      @endif
      <?php $innerposts = $sub->getposts()->take(12); ?>
      <div class="row mt-2">
        <div class="col-xl-5 col-l-5 col-md-12 col-sm-12">
          @foreach($innerposts as $inpost)
          @break($loop->iteration == 3)
          <div class="row">
            <div class="col-4">
              <a href="{{ route('post.show', ['post' => $inpost, 'section' => $inpost->getsection()]) }}">
              <div class="section-righttableimage" style="background-image: url('/storage/{{ $inpost->image }}')">
              </div>
              </a>
            </div>
            <div class="col-8">
              <span><a class="text-section" href="{{ route('post.show', ['post' => $inpost, 'section' => $inpost->getsection()]) }}">{{$inpost->title}}</a></span>
              <p class="text-dark" style="font-weight: lighter;">{{strip_tags(substr($inpost->postcontent, 0, 100))}}</p>
            </div>
          </div>
          @endforeach
          @foreach($innerposts as $inpost)
          @continue($loop->iteration < 3)
          @break($loop->iteration == 8)
          <div class="row pt-2">
            <a href="{{ route('post.show', ['post' => $post, 'section' => $post->getsection()]) }}">• {{$post->title}}</a>
          </div>
          @endforeach
        </div>
        <div class="col-xl-7 col-l-7 col-md-12 col-sm-12 ">
          <div class="row">
            @foreach($innerposts as $inpost)
            @continue($loop->iteration < 9)
            @break($loop->iteration == 11)
            <div class="col">
              <a href="{{ route('post.show', ['post' => $inpost, 'section' => $inpost->getsection()]) }}">
                <div class="mb-2 col-3 w-100 squarecolumns d-flex" style="background-image: url('/storage/{{$inpost->image}}')">
                  <div class="pt-1 pb-1 ps-2 pe-2" style="background-color:rgba(0, 0, 0, 0.5);">
                    <h5> <b>{{$inpost->title}}</b> </h5>
                  </div>
                </div>
              </a>
            </div>
            @endforeach
          </div>
          <div class="row">
            @foreach($innerposts as $inpost)
            @continue($loop->iteration < 11)
            <div class="col">
              <a href="{{ route('post.show', ['post' => $inpost, 'section' => $inpost->getsection()]) }}">
                <div class="mb-2 col-3 w-100 squarecolumns d-flex" style="background-image: url('/storage/{{$inpost->image}}')">
                  <div class="pt-1 pb-1 ps-2 pe-2" style="background-color:rgba(0, 0, 0, 0.5);">
                    <h5> <b>{{$inpost->title}}</b> </h5>
                  </div>
                </div>
              </a>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  @endforeach
</div>
</div>
@endforeach





@foreach($sections->skip(6)->take(1) as $section)
<div class="row mb-3">
  <ul class="nav nav-tabs" id="TUTU{{preg_replace('/\s+/', '', $section->section)}}" role="tablist">
    @foreach($section->getcategories() as $sub)
    @if($loop->iteration == 1)
    <li class="nav-item" role="presentation">
      <button class="text-dark text-uppercase nav-link active" id="home-tab{{preg_replace('/\s+/', '', $sub->category)}}" data-bs-toggle="tab" data-bs-target="#home{{preg_replace('/\s+/', '', $sub->category)}}" type="button" role="tab" aria-controls="home" aria-selected="true">{{$sub->category}}</button>
    </li>
    @else
    <li class="nav-item" role="presentation">
      <button class="text-dark text-uppercase nav-link" id="home-tab{{preg_replace('/\s+/', '', $sub->category)}}" data-bs-toggle="tab" data-bs-target="#home{{preg_replace('/\s+/', '', $sub->category)}}" type="button" role="tab" aria-controls="home" aria-selected="false">{{$sub->category}}</button>
    </li>
    @endif
    @endforeach
  </ul>

<div class="tab-content" id="TUTU{{preg_replace('/\s+/', '', $section->section)}}Content">
  @foreach($section->getcategories() as $sub)
  @if($loop->iteration == 1)
    <div class="tab-pane fade show active" id="home{{preg_replace('/\s+/', '', $sub->category)}}" role="tabpanel" aria-labelledby="home-tab{{preg_replace('/\s+/', '', $sub->category)}}">
      @else
    <div class="tab-pane fade" id="home{{preg_replace('/\s+/', '', $sub->category)}}" role="tabpanel" aria-labelledby="home-tab{{preg_replace('/\s+/', '', $sub->category)}}">
      @endif
      <?php $innerposts = $sub->getposts()->take(5); ?>
      <div class="row">
        @foreach($innerposts as $inpost)
          <div class="col section-imagebox bg-section">
            <a href="{{ route('post.show', ['post' => $inpost, 'section' => $inpost->getsection()]) }}">
              <div class="mb-2 col-3 w-100 section-bottomtabeimage d-flex" style="background-image: url('/storage/{{$inpost->image}}')">
                <div class="pt-1 pb-1 ps-2 pe-2" style="background-color:rgba(0, 0, 0, 0.5);">
                  <h5> <b>{{$inpost->title}}</b> </h5>
                </div>
              </div>
            </a>
          </div>
        @endforeach
      </div>
    </div>
  @endforeach
</div>
</div>
@endforeach





@foreach($sections->skip(8)->take(1) as $section)
<div class="row">
<div class="col-6">
  <h4>Informacje praktyczne dla podróżnych</h4>
</div>
</div>
<div class="row mb-3">
  <ul class="nav nav-tabs" id="TUTU{{preg_replace('/\s+/', '', $section->section)}}" role="tablist">
    @foreach($section->getcategories() as $sub)
    @if($loop->iteration == 1)
    <li class="nav-item" role="presentation">
      <button class="text-dark text-uppercase nav-link active" id="home-tab{{preg_replace('/\s+/', '', $sub->category)}}" data-bs-toggle="tab" data-bs-target="#home{{preg_replace('/\s+/', '', $sub->category)}}" type="button" role="tab" aria-controls="home" aria-selected="true">{{$sub->category}}</button>
    </li>
    @else
    <li class="nav-item" role="presentation">
      <button class="text-dark text-uppercase nav-link" id="home-tab{{preg_replace('/\s+/', '', $sub->category)}}" data-bs-toggle="tab" data-bs-target="#home{{preg_replace('/\s+/', '', $sub->category)}}" type="button" role="tab" aria-controls="home" aria-selected="false">{{$sub->category}}</button>
    </li>
    @endif
    @endforeach
  </ul>

<div class="tab-content" id="TUTU{{preg_replace('/\s+/', '', $section->section)}}Content">
  @foreach($section->getcategories() as $sub)
  @if($loop->iteration == 1)
    <div class="tab-pane fade show active" id="home{{preg_replace('/\s+/', '', $sub->category)}}" role="tabpanel" aria-labelledby="home-tab{{preg_replace('/\s+/', '', $sub->category)}}">
      @else
    <div class="tab-pane fade" id="home{{preg_replace('/\s+/', '', $sub->category)}}" role="tabpanel" aria-labelledby="home-tab{{preg_replace('/\s+/', '', $sub->category)}}">
      @endif
      <?php $innerposts = $sub->getposts()->take(13); ?>
      <div class="row mt-2">
        <div class="col-xl-5 col-l-5 col-md-12 col-sm-12">
          @foreach($innerposts as $inpost)
          @break($loop->iteration == 3)
          <div class="row">
            <div class="col-4">
              <a href="{{ route('post.show', ['post' => $inpost, 'section' => $inpost->getsection()]) }}">
              <div class="section-righttableimage" style="background-image: url('/storage/{{ $inpost->image }}')">
              </div>
              </a>
            </div>
            <div class="col-8">
              <span><a class="text-section" href="{{ route('post.show', ['post' => $inpost, 'section' => $inpost->getsection()]) }}">{{$inpost->title}}</a></span>
              <p class="text-dark" style="font-weight: lighter;">{{strip_tags(substr($inpost->postcontent, 0, 100))}}</p>
            </div>
          </div>
          @endforeach
          @foreach($innerposts as $inpost)
          @continue($loop->iteration < 3)
          @break($loop->iteration == 8)
          <div class="row pt-2">
            <a href="{{ route('post.show', ['post' => $post, 'section' => $post->getsection()]) }}">• {{$post->title}}</a>
          </div>
          @endforeach
        </div>
        <div class="col-xl-7 col-l-7 col-md-12 col-sm-12">
          <div class="row">
            @foreach($innerposts as $inpost)
            @continue($loop->iteration < 8)
            <div class="col-xl-4 col-l-4 col-md-12 col-sm-12">
              <a href="{{ route('post.show', ['post' => $inpost, 'section' => $inpost->getsection()]) }}">
                <div class="mb-2 col-3 w-100 section-bottomtabeimage d-flex" style="background-image: url('/storage/{{$inpost->image}}')">
                  <div class="pt-1 pb-1 ps-2 pe-2" style="background-color:rgba(0, 0, 0, 0.5);">
                    <h5> <b>{{$inpost->title}}</b> </h5>
                  </div>
                </div>
              </a>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  @endforeach
</div>
</div>
@endforeach





@foreach($sections->skip(7)->take(1) as $section)
<div class="row mb-3">
  <ul class="nav nav-tabs" id="TUTU{{preg_replace('/\s+/', '', $section->section)}}" role="tablist">
    @foreach($section->getcategories() as $sub)
    @if($loop->iteration == 1)
    <li class="nav-item" role="presentation">
      <button class="text-dark text-uppercase nav-link active" id="home-tab{{preg_replace('/\s+/', '', $sub->category)}}" data-bs-toggle="tab" data-bs-target="#home{{preg_replace('/\s+/', '', $sub->category)}}" type="button" role="tab" aria-controls="home" aria-selected="true">{{$sub->category}}</button>
    </li>
    @else
    <li class="nav-item" role="presentation">
      <button class="text-dark text-uppercase nav-link" id="home-tab{{preg_replace('/\s+/', '', $sub->category)}}" data-bs-toggle="tab" data-bs-target="#home{{preg_replace('/\s+/', '', $sub->category)}}" type="button" role="tab" aria-controls="home" aria-selected="false">{{$sub->category}}</button>
    </li>
    @endif
    @endforeach
  </ul>

<div class="tab-content" id="TUTU{{preg_replace('/\s+/', '', $section->section)}}Content">
  @foreach($section->getcategories() as $sub)
  @if($loop->iteration == 1)
    <div class="tab-pane fade show active" id="home{{preg_replace('/\s+/', '', $sub->category)}}" role="tabpanel" aria-labelledby="home-tab{{preg_replace('/\s+/', '', $sub->category)}}">
      @else
    <div class="tab-pane fade" id="home{{preg_replace('/\s+/', '', $sub->category)}}" role="tabpanel" aria-labelledby="home-tab{{preg_replace('/\s+/', '', $sub->category)}}">
      @endif
      <?php $innerposts = $sub->getposts()->take(5); ?>
      <div class="row">
        @foreach($innerposts as $inpost)
          <div class="col section-imagebox bg-section">
            <a href="{{ route('post.show', ['post' => $inpost, 'section' => $inpost->getsection()]) }}">
              <div class="mb-2 col-3 w-100 section-bottomtabeimage d-flex" style="background-image: url('/storage/{{$inpost->image}}')">
                <div class="pt-1 pb-1 ps-2 pe-2" style="background-color:rgba(0, 0, 0, 0.5);">
                  <h5> <b>{{$inpost->title}}</b> </h5>
                </div>
              </div>
            </a>
          </div>
        @endforeach
      </div>
    </div>
  @endforeach
</div>
</div>
@endforeach





<!--Kulutra/Sztuka-->
@foreach($sections->skip(5)->take(1) as $section)
<div class="row">
<div class="col-xl-4 col-l-4 col-md-12 col-sm-12">
  <?php $innerposts = $section->getposts()->take(1); ?>
  <div class="row">
    @foreach($innerposts as $inpost)
    <div class="col-12">
      <a href="{{ route('post.show', ['post' => $inpost, 'section' => $inpost->getsection()]) }}">
        <div class="mb-2 col-xl-3 col-l-3 col-md-12 col-sm-12 w-100 section-bigpost d-flex" style="background-image: url('/storage/{{$inpost->image}}')">
          <div class="pt-1 pb-1 ps-2 pe-2" style="background-color:rgba(0, 0, 0, 0.5);">
            <h5> <b>{{$inpost->title}}</b> </h5>
          </div>
        </div>
      </a>
    </div>
    @endforeach
  </div>
</div>
<div class="col-xl-4 col-l-4 col-md-12 col-sm-12">
  <?php $innerposts = $section->getposts()->skip(1)->take(4); ?>
  <div class="row">
    @foreach($innerposts as $inpost)
    <div class="col-xl-6 col-l-6 col-md-12 col-sm-12>
      <a href="{{ route('post.show', ['post' => $inpost, 'section' => $inpost->getsection()]) }}">
        <div class="mb-2 col-3 w-100 section-bottomtabeimage d-flex" style="background-image: url('/storage/{{$inpost->image}}')">
          <div class="pt-1 pb-1 ps-2 pe-2" style="background-color:rgba(0, 0, 0, 0.5);">
            <h5> <b>{{$inpost->title}}</b> </h5>
          </div>
        </div>
      </a>
    </div>
    @endforeach
  </div>
</div>
<div class="col-xl-4 col-l-4 col-md-12 col-sm-12">
  <?php $innerposts = $section->getposts()->skip(5)->take(4); ?>
  <div class="row">
    @foreach($innerposts as $inpost)
    <div class="col-xl-6 col-l-6 col-md-12 col-sm-12">
      <a href="{{ route('post.show', ['post' => $inpost, 'section' => $inpost->getsection()]) }}">
        <div class="mb-2 col-3 w-100 section-bottomtabeimage d-flex" style="background-image: url('/storage/{{$inpost->image}}')">
          <div class="pt-1 pb-1 ps-2 pe-2" style="background-color:rgba(0, 0, 0, 0.5);">
            <h5> <b>{{$inpost->title}}</b> </h5>
          </div>
        </div>
      </a>
    </div>
    @endforeach
  </div>
</div>
</div>
@endforeach




@foreach($sections->skip(9)->take(1) as $section)
<div class="row">
<div class="col-6">
  <h4>Praca i Kariera</h4>
</div>
</div>
<div class="row mb-3">
  <ul class="nav nav-tabs" id="TUTU{{preg_replace('/\s+/', '', $section->section)}}" role="tablist">
    @foreach($section->getcategories() as $sub)
    @if($loop->iteration == 1)
    <li class="nav-item" role="presentation">
      <button class="text-dark text-uppercase nav-link active" id="home-tab{{preg_replace('/\s+/', '', $sub->category)}}" data-bs-toggle="tab" data-bs-target="#home{{preg_replace('/\s+/', '', $sub->category)}}" type="button" role="tab" aria-controls="home" aria-selected="true">{{$sub->category}}</button>
    </li>
    @else
    <li class="nav-item" role="presentation">
      <button class="text-dark text-uppercase nav-link" id="home-tab{{preg_replace('/\s+/', '', $sub->category)}}" data-bs-toggle="tab" data-bs-target="#home{{preg_replace('/\s+/', '', $sub->category)}}" type="button" role="tab" aria-controls="home" aria-selected="false">{{$sub->category}}</button>
    </li>
    @endif
    @endforeach
  </ul>

<div class="tab-content" id="TUTU{{preg_replace('/\s+/', '', $section->section)}}Content">
  @foreach($section->getcategories() as $sub)
  @if($loop->iteration == 1)
    <div class="tab-pane fade show active" id="home{{preg_replace('/\s+/', '', $sub->category)}}" role="tabpanel" aria-labelledby="home-tab{{preg_replace('/\s+/', '', $sub->category)}}">
      @else
    <div class="tab-pane fade" id="home{{preg_replace('/\s+/', '', $sub->category)}}" role="tabpanel" aria-labelledby="home-tab{{preg_replace('/\s+/', '', $sub->category)}}">
      @endif
      <?php $innerposts = $sub->getposts()->take(13); ?>
      <div class="row mt-2">
        <div class="col-xl-5 col-l-5 col-md-12 col-sm-12">
          @foreach($innerposts as $inpost)
          @break($loop->iteration == 3)
          <div class="row">
            <div class="col-4">
              <a href="{{ route('post.show', ['post' => $inpost, 'section' => $inpost->getsection()]) }}">
              <div class="section-righttableimage" style="background-image: url('/storage/{{ $inpost->image }}')">
              </div>
              </a>
            </div>
            <div class="col-8">
              <span><a class="text-section" href="{{ route('post.show', ['post' => $inpost, 'section' => $inpost->getsection()]) }}">{{$inpost->title}}</a></span>
              <p class="text-dark" style="font-weight: lighter;">{{strip_tags(substr($inpost->postcontent, 0, 100))}}</p>
            </div>
          </div>
          @endforeach
          @foreach($innerposts as $inpost)
          @continue($loop->iteration < 3)
          @break($loop->iteration == 8)
          <div class="row pt-2">
            <a href="{{ route('post.show', ['post' => $post, 'section' => $post->getsection()]) }}">• {{$post->title}}</a>
          </div>
          @endforeach
        </div>
        <div class="col-xl-7 col-l-7 col-md-12 col-sm-12 ">
          <div class="row">
            @foreach($innerposts as $inpost)
            @continue($loop->iteration < 8)
            <div class="col-xl-4 col-l-4 col-md-12 col-sm-12">
              <a href="{{ route('post.show', ['post' => $inpost, 'section' => $inpost->getsection()]) }}">
                <div class="mb-2 col-3 w-100 section-bottomtabeimage d-flex" style="background-image: url('/storage/{{$inpost->image}}')">
                  <div class="pt-1 pb-1 ps-2 pe-2" style="background-color:rgba(0, 0, 0, 0.5);">
                    <h5> <b>{{$inpost->title}}</b> </h5>
                  </div>
                </div>
              </a>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  @endforeach
</div>
</div>
@endforeach






@foreach($sections->skip(11)->take(1) as $section)
<div class="row">
<div class="col-6">
  <h4>Reakreacja</h4>
</div>
</div>
<div class="row mb-3">
  <ul class="nav nav-tabs" id="TUTU{{preg_replace('/\s+/', '', $section->section)}}" role="tablist">
    @foreach($section->getcategories() as $sub)
    @if($loop->iteration == 1)
    <li class="nav-item" role="presentation">
      <button class="text-dark text-uppercase nav-link active" id="home-tab{{preg_replace('/\s+/', '', $sub->category)}}" data-bs-toggle="tab" data-bs-target="#home{{preg_replace('/\s+/', '', $sub->category)}}" type="button" role="tab" aria-controls="home" aria-selected="true">{{$sub->category}}</button>
    </li>
    @else
    <li class="nav-item" role="presentation">
      <button class="text-dark text-uppercase nav-link" id="home-tab{{preg_replace('/\s+/', '', $sub->category)}}" data-bs-toggle="tab" data-bs-target="#home{{preg_replace('/\s+/', '', $sub->category)}}" type="button" role="tab" aria-controls="home" aria-selected="false">{{$sub->category}}</button>
    </li>
    @endif
    @endforeach
  </ul>

<div class="tab-content" id="TUTU{{preg_replace('/\s+/', '', $section->section)}}Content">
  @foreach($section->getcategories() as $sub)
  @if($loop->iteration == 1)
    <div class="tab-pane fade show active" id="home{{preg_replace('/\s+/', '', $sub->category)}}" role="tabpanel" aria-labelledby="home-tab{{preg_replace('/\s+/', '', $sub->category)}}">
      @else
    <div class="tab-pane fade" id="home{{preg_replace('/\s+/', '', $sub->category)}}" role="tabpanel" aria-labelledby="home-tab{{preg_replace('/\s+/', '', $sub->category)}}">
      @endif
      <?php $innerposts = $sub->getposts()->take(12); ?>
      <div class="row mt-2">
        <div class="col-xl-5 col-l-5 col-md-12 col-sm-12">
          @foreach($innerposts as $inpost)
          @break($loop->iteration == 3)
          <div class="row">
            <div class="col-4">
              <a href="{{ route('post.show', ['post' => $inpost, 'section' => $inpost->getsection()]) }}">
              <div class="section-righttableimage" style="background-image: url('/storage/{{ $inpost->image }}')">
              </div>
              </a>
            </div>
            <div class="col-8">
              <span><a class="text-section" href="{{ route('post.show', ['post' => $inpost, 'section' => $inpost->getsection()]) }}">{{$inpost->title}}</a></span>
              <p class="text-dark" style="font-weight: lighter;">{{strip_tags(substr($inpost->postcontent, 0, 100))}}</p>
            </div>
          </div>
          @endforeach
          @foreach($innerposts as $inpost)
          @continue($loop->iteration < 3)
          @break($loop->iteration == 8)
          <div class="row pt-2">
            <a href="{{ route('post.show', ['post' => $post, 'section' => $post->getsection()]) }}">• {{$post->title}}</a>
          </div>
          @endforeach
        </div>
        <div class="col-xl-7 col-l-7 col-md-12 col-sm-12">
          <div class="row">
            @foreach($innerposts as $inpost)
            @continue($loop->iteration < 9)
            @break($loop->iteration == 11)
            <div class="col">
              <a href="{{ route('post.show', ['post' => $inpost, 'section' => $inpost->getsection()]) }}">
                <div class="mb-2 col-3 w-100 squarecolumns d-flex" style="background-image: url('/storage/{{$inpost->image}}')">
                  <div class="pt-1 pb-1 ps-2 pe-2" style="background-color:rgba(0, 0, 0, 0.5);">
                    <h5> <b>{{$inpost->title}}</b> </h5>
                  </div>
                </div>
              </a>
            </div>
            @endforeach
          </div>
          <div class="row">
            @foreach($innerposts as $inpost)
            @continue($loop->iteration < 11)
            <div class="col">
              <a href="{{ route('post.show', ['post' => $inpost, 'section' => $inpost->getsection()]) }}">
                <div class="mb-2 col-3 w-100 squarecolumns d-flex" style="background-image: url('/storage/{{$inpost->image}}')">
                  <div class="pt-1 pb-1 ps-2 pe-2" style="background-color:rgba(0, 0, 0, 0.5);">
                    <h5> <b>{{$inpost->title}}</b> </h5>
                  </div>
                </div>
              </a>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  @endforeach
</div>
</div>
@endforeach





@foreach($sections->skip(12)->take(1) as $section)
<div class="row">
<div class="col-6">
  <h4>Sport</h4>
</div>
</div>
<div class="row mb-3">
  <ul class="nav nav-tabs" id="TUTU{{preg_replace('/\s+/', '', $section->section)}}" role="tablist">
    @foreach($section->getcategories() as $sub)
    @if($loop->iteration == 1)
    <li class="nav-item" role="presentation">
      <button class="text-dark text-uppercase nav-link active" id="home-tab{{preg_replace('/\s+/', '', $sub->category)}}" data-bs-toggle="tab" data-bs-target="#home{{preg_replace('/\s+/', '', $sub->category)}}" type="button" role="tab" aria-controls="home" aria-selected="true">{{$sub->category}}</button>
    </li>
    @else
    <li class="nav-item" role="presentation">
      <button class="text-dark text-uppercase nav-link" id="home-tab{{preg_replace('/\s+/', '', $sub->category)}}" data-bs-toggle="tab" data-bs-target="#home{{preg_replace('/\s+/', '', $sub->category)}}" type="button" role="tab" aria-controls="home" aria-selected="false">{{$sub->category}}</button>
    </li>
    @endif
    @endforeach
  </ul>

<div class="tab-content" id="TUTU{{preg_replace('/\s+/', '', $section->section)}}Content">
  @foreach($section->getcategories() as $sub)
  @if($loop->iteration == 1)
    <div class="tab-pane fade show active" id="home{{preg_replace('/\s+/', '', $sub->category)}}" role="tabpanel" aria-labelledby="home-tab{{preg_replace('/\s+/', '', $sub->category)}}">
      @else
    <div class="tab-pane fade" id="home{{preg_replace('/\s+/', '', $sub->category)}}" role="tabpanel" aria-labelledby="home-tab{{preg_replace('/\s+/', '', $sub->category)}}">
      @endif
      <?php $innerposts = $sub->getposts()->take(13); ?>
      <div class="row mt-2">
        <div class="col-xl-5 col-l-5 col-md-12 col-sm-12">
          @foreach($innerposts as $inpost)
          @break($loop->iteration == 3)
          <div class="row">
            <div class="col-4">
              <a href="{{ route('post.show', ['post' => $inpost, 'section' => $inpost->getsection()]) }}">
              <div class="section-righttableimage" style="background-image: url('/storage/{{ $inpost->image }}')">
              </div>
              </a>
            </div>
            <div class="col-8">
              <span><a class="text-section" href="{{ route('post.show', ['post' => $inpost, 'section' => $inpost->getsection()]) }}">{{$inpost->title}}</a></span>
              <p class="text-dark" style="font-weight: lighter;">{{strip_tags(substr($inpost->postcontent, 0, 100))}}</p>
            </div>
          </div>
          @endforeach
          @foreach($innerposts as $inpost)
          @continue($loop->iteration < 3)
          @break($loop->iteration == 8)
          <div class="row pt-2">
            <a href="{{ route('post.show', ['post' => $post, 'section' => $post->getsection()]) }}">• {{$post->title}}</a>
          </div>
          @endforeach
        </div>
        <div class="col-xl-7 col-l-7 col-md-12 col-sm-12">
          <div class="row">
            @foreach($innerposts as $inpost)
            @continue($loop->iteration < 8)
            <div class="col-xl-4 col-l-4 col-md-12 col-sm-12">
              <a href="{{ route('post.show', ['post' => $inpost, 'section' => $inpost->getsection()]) }}">
                <div class="mb-2 col-3 w-100 section-bottomtabeimage d-flex" style="background-image: url('/storage/{{$inpost->image}}')">
                  <div class="pt-1 pb-1 ps-2 pe-2" style="background-color:rgba(0, 0, 0, 0.5);">
                    <h5> <b>{{$inpost->title}}</b> </h5>
                  </div>
                </div>
              </a>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  @endforeach
</div>
</div>
@endforeach





@foreach($sections->skip(10)->take(1) as $section)
<div class="row">
<div class="col-6">
  <h4>Edukacja</h4>
</div>
</div>
<div class="row mb-3">
  <ul class="nav nav-tabs" id="TUTU{{preg_replace('/\s+/', '', $section->section)}}" role="tablist">
    @foreach($section->getcategories() as $sub)
    @if($loop->iteration == 1)
    <li class="nav-item" role="presentation">
      <button class="text-dark text-uppercase nav-link active" id="home-tab{{preg_replace('/\s+/', '', $sub->category)}}" data-bs-toggle="tab" data-bs-target="#home{{preg_replace('/\s+/', '', $sub->category)}}" type="button" role="tab" aria-controls="home" aria-selected="true">{{$sub->category}}</button>
    </li>
    @else
    <li class="nav-item" role="presentation">
      <button class="text-dark text-uppercase nav-link" id="home-tab{{preg_replace('/\s+/', '', $sub->category)}}" data-bs-toggle="tab" data-bs-target="#home{{preg_replace('/\s+/', '', $sub->category)}}" type="button" role="tab" aria-controls="home" aria-selected="false">{{$sub->category}}</button>
    </li>
    @endif
    @endforeach
  </ul>

<div class="tab-content" id="TUTU{{preg_replace('/\s+/', '', $section->section)}}Content">
  @foreach($section->getcategories() as $sub)
  @if($loop->iteration == 1)
    <div class="tab-pane fade show active" id="home{{preg_replace('/\s+/', '', $sub->category)}}" role="tabpanel" aria-labelledby="home-tab{{preg_replace('/\s+/', '', $sub->category)}}">
      @else
    <div class="tab-pane fade" id="home{{preg_replace('/\s+/', '', $sub->category)}}" role="tabpanel" aria-labelledby="home-tab{{preg_replace('/\s+/', '', $sub->category)}}">
      @endif
      <?php $innerposts = $sub->getposts()->take(12); ?>
      <div class="row mt-2">
        <div class="col-xl-5 col-l-5 col-md-12 col-sm-12">
          @foreach($innerposts as $inpost)
          @break($loop->iteration == 3)
          <div class="row">
            <div class="col-4">
              <a href="{{ route('post.show', ['post' => $inpost, 'section' => $inpost->getsection()]) }}">
              <div class="section-righttableimage" style="background-image: url('/storage/{{ $inpost->image }}')">
              </div>
              </a>
            </div>
            <div class="col-8">
              <span><a class="text-section" href="{{ route('post.show', ['post' => $inpost, 'section' => $inpost->getsection()]) }}">{{$inpost->title}}</a></span>
              <p class="text-dark" style="font-weight: lighter;">{{strip_tags(substr($inpost->postcontent, 0, 100))}}</p>
            </div>
          </div>
          @endforeach
          @foreach($innerposts as $inpost)
          @continue($loop->iteration < 3)
          @break($loop->iteration == 8)
          <div class="row pt-2">
            <a href="{{ route('post.show', ['post' => $post, 'section' => $post->getsection()]) }}">• {{$post->title}}</a>
          </div>
          @endforeach
        </div>
        <div class="col-xl-7 col-l-7 col-md-12 col-sm-12">
          <div class="row">
            @foreach($innerposts as $inpost)
            @continue($loop->iteration < 9)
            @break($loop->iteration == 11)
            <div class="col">
              <a href="{{ route('post.show', ['post' => $inpost, 'section' => $inpost->getsection()]) }}">
                <div class="mb-2 col-3 w-100 squarecolumns d-flex" style="background-image: url('/storage/{{$inpost->image}}')">
                  <div class="pt-1 pb-1 ps-2 pe-2" style="background-color:rgba(0, 0, 0, 0.5);">
                    <h5> <b>{{$inpost->title}}</b> </h5>
                  </div>
                </div>
              </a>
            </div>
            @endforeach
          </div>
          <div class="row">
            @foreach($innerposts as $inpost)
            @continue($loop->iteration < 11)
            <div class="col">
              <a href="{{ route('post.show', ['post' => $inpost, 'section' => $inpost->getsection()]) }}">
                <div class="mb-2 col-3 w-100 squarecolumns d-flex" style="background-image: url('/storage/{{$inpost->image}}')">
                  <div class="pt-1 pb-1 ps-2 pe-2" style="background-color:rgba(0, 0, 0, 0.5);">
                    <h5> <b>{{$inpost->title}}</b> </h5>
                  </div>
                </div>
              </a>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  @endforeach
</div>
</div>
@endforeach





@foreach($sections->skip(13)->take(1) as $section)
<div class="row">
<div class="col-6">
  <h4>Nauka i Technologie</h4>
</div>
</div>
<div class="row mb-3">
  <ul class="nav nav-tabs" id="TUTU{{preg_replace('/\s+/', '', $section->section)}}" role="tablist">
    @foreach($section->getcategories() as $sub)
    @if($loop->iteration == 1)
    <li class="nav-item" role="presentation">
      <button class="text-dark text-uppercase nav-link active" id="home-tab{{preg_replace('/\s+/', '', $sub->category)}}" data-bs-toggle="tab" data-bs-target="#home{{preg_replace('/\s+/', '', $sub->category)}}" type="button" role="tab" aria-controls="home" aria-selected="true">{{$sub->category}}</button>
    </li>
    @else
    <li class="nav-item" role="presentation">
      <button class="text-dark text-uppercase nav-link" id="home-tab{{preg_replace('/\s+/', '', $sub->category)}}" data-bs-toggle="tab" data-bs-target="#home{{preg_replace('/\s+/', '', $sub->category)}}" type="button" role="tab" aria-controls="home" aria-selected="false">{{$sub->category}}</button>
    </li>
    @endif
    @endforeach
  </ul>

<div class="tab-content" id="TUTU{{preg_replace('/\s+/', '', $section->section)}}Content">
  @foreach($section->getcategories() as $sub)
  @if($loop->iteration == 1)
    <div class="tab-pane fade show active" id="home{{preg_replace('/\s+/', '', $sub->category)}}" role="tabpanel" aria-labelledby="home-tab{{preg_replace('/\s+/', '', $sub->category)}}">
      @else
    <div class="tab-pane fade" id="home{{preg_replace('/\s+/', '', $sub->category)}}" role="tabpanel" aria-labelledby="home-tab{{preg_replace('/\s+/', '', $sub->category)}}">
      @endif
      <?php $innerposts = $sub->getposts()->take(12); ?>
      <div class="row mt-2">
        <div class="col-xl-5 col-l-5 col-md-12 col-sm-12">
          @foreach($innerposts as $inpost)
          @break($loop->iteration == 3)
          <div class="row">
            <div class="col-4">
              <a href="{{ route('post.show', ['post' => $inpost, 'section' => $inpost->getsection()]) }}">
              <div class="section-righttableimage" style="background-image: url('/storage/{{ $inpost->image }}')">
              </div>
              </a>
            </div>
            <div class="col-8">
              <span><a class="text-section" href="{{ route('post.show', ['post' => $inpost, 'section' => $inpost->getsection()]) }}">{{$inpost->title}}</a></span>
              <p class="text-dark" style="font-weight: lighter;">{{strip_tags(substr($inpost->postcontent, 0, 100))}}</p>
            </div>
          </div>
          @endforeach
          @foreach($innerposts as $inpost)
          @continue($loop->iteration < 3)
          @break($loop->iteration == 8)
          <div class="row pt-2">
            <a href="{{ route('post.show', ['post' => $post, 'section' => $post->getsection()]) }}">• {{$post->title}}</a>
          </div>
          @endforeach
        </div>
        <div class="col-xl-7 col-l-7 col-md-12 col-sm-12">
          <div class="row">
            @foreach($innerposts as $inpost)
            @continue($loop->iteration < 9)
            @break($loop->iteration == 11)
            <div class="col">
              <a href="{{ route('post.show', ['post' => $inpost, 'section' => $inpost->getsection()]) }}">
                <div class="mb-2 col-3 w-100 squarecolumns d-flex" style="background-image: url('/storage/{{$inpost->image}}')">
                  <div class="pt-1 pb-1 ps-2 pe-2" style="background-color:rgba(0, 0, 0, 0.5);">
                    <h5> <b>{{$inpost->title}}</b> </h5>
                  </div>
                </div>
              </a>
            </div>
            @endforeach
          </div>
          <div class="row">
            @foreach($innerposts as $inpost)
            @continue($loop->iteration < 11)
            <div class="col">
              <a href="{{ route('post.show', ['post' => $inpost, 'section' => $inpost->getsection()]) }}">
                <div class="mb-2 col-3 w-100 squarecolumns d-flex" style="background-image: url('/storage/{{$inpost->image}}')">
                  <div class="pt-1 pb-1 ps-2 pe-2" style="background-color:rgba(0, 0, 0, 0.5);">
                    <h5> <b>{{$inpost->title}}</b> </h5>
                  </div>
                </div>
              </a>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  @endforeach
</div>
</div>
@endforeach





@foreach($sections->skip(15)->take(1) as $section)
<div class="row mb-3">
  <ul class="nav nav-tabs" id="TUTU{{preg_replace('/\s+/', '', $section->section)}}" role="tablist">
    @foreach($section->getcategories() as $sub)
    @if($loop->iteration == 1)
    <li class="nav-item" role="presentation">
      <button class="text-dark text-uppercase nav-link active" id="home-tab{{preg_replace('/\s+/', '', $sub->category)}}" data-bs-toggle="tab" data-bs-target="#home{{preg_replace('/\s+/', '', $sub->category)}}" type="button" role="tab" aria-controls="home" aria-selected="true">{{$sub->category}}</button>
    </li>
    @else
    <li class="nav-item" role="presentation">
      <button class="text-dark text-uppercase nav-link" id="home-tab{{preg_replace('/\s+/', '', $sub->category)}}" data-bs-toggle="tab" data-bs-target="#home{{preg_replace('/\s+/', '', $sub->category)}}" type="button" role="tab" aria-controls="home" aria-selected="false">{{$sub->category}}</button>
    </li>
    @endif
    @endforeach
  </ul>

<div class="tab-content" id="TUTU{{preg_replace('/\s+/', '', $section->section)}}Content">
  @foreach($section->getcategories() as $sub)
  @if($loop->iteration == 1)
    <div class="tab-pane fade show active" id="home{{preg_replace('/\s+/', '', $sub->category)}}" role="tabpanel" aria-labelledby="home-tab{{preg_replace('/\s+/', '', $sub->category)}}">
      @else
    <div class="tab-pane fade" id="home{{preg_replace('/\s+/', '', $sub->category)}}" role="tabpanel" aria-labelledby="home-tab{{preg_replace('/\s+/', '', $sub->category)}}">
      @endif
      <?php $innerposts = $sub->getposts()->take(5); ?>
      <div class="row">
        @foreach($innerposts as $inpost)
          <div class="col section-imagebox bg-section">
            <a href="{{ route('post.show', ['post' => $inpost, 'section' => $inpost->getsection()]) }}">
              <div class="mb-2 col-3 w-100 section-bottomtabeimage d-flex" style="background-image: url('/storage/{{$inpost->image}}')">
                <div class="pt-1 pb-1 ps-2 pe-2" style="background-color:rgba(0, 0, 0, 0.5);">
                  <h5> <b>{{$inpost->title}}</b> </h5>
                </div>
              </div>
            </a>
          </div>
        @endforeach
      </div>
    </div>
  @endforeach
</div>
</div>
@endforeach





@foreach($sections->skip(14)->take(1) as $section)
<div class="row">
<div class="col-6">
  <h4>Warto Wiedzieć</h4>
</div>
</div>
<div class="row mb-3">
  <ul class="nav nav-tabs" id="TUTU{{preg_replace('/\s+/', '', $section->section)}}" role="tablist">
    @foreach($section->getcategories() as $sub)
    @if($loop->iteration == 1)
    <li class="nav-item" role="presentation">
      <button class="text-dark text-uppercase nav-link active" id="home-tab{{preg_replace('/\s+/', '', $sub->category)}}" data-bs-toggle="tab" data-bs-target="#home{{preg_replace('/\s+/', '', $sub->category)}}" type="button" role="tab" aria-controls="home" aria-selected="true">{{$sub->category}}</button>
    </li>
    @else
    <li class="nav-item" role="presentation">
      <button class="text-dark text-uppercase nav-link" id="home-tab{{preg_replace('/\s+/', '', $sub->category)}}" data-bs-toggle="tab" data-bs-target="#home{{preg_replace('/\s+/', '', $sub->category)}}" type="button" role="tab" aria-controls="home" aria-selected="false">{{$sub->category}}</button>
    </li>
    @endif
    @endforeach
  </ul>

<div class="tab-content" id="TUTU{{preg_replace('/\s+/', '', $section->section)}}Content">
  @foreach($section->getcategories() as $sub)
  @if($loop->iteration == 1)
    <div class="tab-pane fade show active" id="home{{preg_replace('/\s+/', '', $sub->category)}}" role="tabpanel" aria-labelledby="home-tab{{preg_replace('/\s+/', '', $sub->category)}}">
      @else
    <div class="tab-pane fade" id="home{{preg_replace('/\s+/', '', $sub->category)}}" role="tabpanel" aria-labelledby="home-tab{{preg_replace('/\s+/', '', $sub->category)}}">
      @endif
      <?php $innerposts = $sub->getposts()->take(13); ?>
      <div class="row mt-2">
        <div class="col-xl-5 col-l-5 col-md-12 col-sm-12">
          @foreach($innerposts as $inpost)
          @break($loop->iteration == 3)
          <div class="row">
            <div class="col-4">
              <a href="{{ route('post.show', ['post' => $inpost, 'section' => $inpost->getsection()]) }}">
              <div class="section-righttableimage" style="background-image: url('/storage/{{ $inpost->image }}')">
              </div>
              </a>
            </div>
            <div class="col-8">
              <span><a class="text-section" href="{{ route('post.show', ['post' => $inpost, 'section' => $inpost->getsection()]) }}">{{$inpost->title}}</a></span>
              <p class="text-dark" style="font-weight: lighter;">{{strip_tags(substr($inpost->postcontent, 0, 100))}}</p>
            </div>
          </div>
          @endforeach
          @foreach($innerposts as $inpost)
          @continue($loop->iteration < 3)
          @break($loop->iteration == 8)
          <div class="row pt-2">
            <a href="{{ route('post.show', ['post' => $post, 'section' => $post->getsection()]) }}">• {{$post->title}}</a>
          </div>
          @endforeach
        </div>
        <div class="col-xl-7 col-l-7 col-md-12 col-sm-12">
          <div class="row">
            @foreach($innerposts as $inpost)
            @continue($loop->iteration < 8)
            <div class="col-xl-4 col-l-4 col-md-12 col-sm-12">
              <a href="{{ route('post.show', ['post' => $inpost, 'section' => $inpost->getsection()]) }}">
                <div class="mb-2 col-3 w-100 section-bottomtabeimage d-flex" style="background-image: url('/storage/{{$inpost->image}}')">
                  <div class="pt-1 pb-1 ps-2 pe-2" style="background-color:rgba(0, 0, 0, 0.5);">
                    <h5> <b>{{$inpost->title}}</b> </h5>
                  </div>
                </div>
              </a>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  @endforeach
</div>
</div>
@endforeach





@endsection
