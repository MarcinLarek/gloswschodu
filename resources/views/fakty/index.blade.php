@extends('layouts.navbar.'.$section)
@section('mainpage')

<div class="row">
    <div class="col-xl-7 col-l-7 col-md-12 col-sm-12 ">
      <div class="row mb-3 d-flex text-section" style="">
      <div class="col-6">
      <h5>NAJNOWSZE</h5>
      </div>
      <div class="col-6 mt-auto" style="text-align:right;">
        <form id="search" action="{{ route('post.serach',['section' => $serachsection] ) }}" method="post">
          @csrf
          <input type="hidden" name="serach" value="">

          <input type="submit" class="btn-sectiontext" value="ZOBACZ WSZYSTKO">
        </form>

      </div>
      <hr class="section-hr">
      </div>
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($posts as $post)
                @break($loop->iteration == 5)
                  @if($loop->iteration == 1)
                  <div class="carousel-item active">
                  @else
                  <div class="carousel-item">
                  @endif
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
              @foreach ($posts as $post)
              @break($loop->iteration == 5)
                @if($loop->iteration == 1)
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1">
                @else
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{$loop->iteration-1}}" aria-label="Slide {{$loop->iteration}}">
                @endif
                <img src="/storage/{{$post->image}}" class="d-block w-100 img-fluid" alt="">
              </button>
              @endforeach
            </div>
        </div>
    </div>
    <div class="col-xl-5 col-l-5 col-md-12 col-sm-12 col-12">

          <div class="row">
            <div class="d-flex text-section">
              <div class="col-8">
                <h5 class="text-section text-uppercase">Wydarzenia dnia</h5>
              </div>
            </div>
          <hr class="section-hr" style="margin-left:10px">






          <div class="row">
            <ul class="nav nav-tabs" id="TUTU" role="tablist">
              @foreach($categories as $sub)
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

          <div class="tab-content" id="TUTUContent">
            @foreach($categories as $sub)
            @if($loop->iteration == 1)
              <div class="tab-pane fade show active" id="home{{preg_replace('/\s+/', '', $sub->category)}}" role="tabpanel" aria-labelledby="home-tab{{preg_replace('/\s+/', '', $sub->category)}}">
                @else
              <div class="tab-pane fade" id="home{{preg_replace('/\s+/', '', $sub->category)}}" role="tabpanel" aria-labelledby="home-tab{{preg_replace('/\s+/', '', $sub->category)}}">
                @endif
                <?php $innerposts = $sub->getposts()->take(4); ?>
                @foreach($innerposts as $post)
                <div class="row pt-2">
                    <div class="col-xl-5 col-l-5 col-md-5 col-sm-5 col-5 col-12">
                        <a href="{{ route('post.show', ['post' => $post, 'section' => $post->getsection()]) }}"><img src="/storage/{{ $post->image }}" class="w-100 section-rightlist"></a>
                    </div>
                    <div class="col-xl-7 col-l-7 col-md-7 col-sm-7 col-7 col-12 rightlisttext">
                        <a href="{{ route('post.show', ['post' => $post, 'section' => $post->getsection()]) }}"><b class="text-section">{{$post->title}}</b></a>
                    </div>
                </div>
                @endforeach
              </div>
            @endforeach
          </div>
          </div>

          </div>
    </div>
</div>


<div class="row mt-2">
  @foreach($posts as $post)
  @continue($loop->iteration < 5)
  @break($loop->iteration == 9)
  <div class="col section-imagebox bg-section">
    <a href="{{ route('post.show', ['post' => $post, 'section' => $post->getsection()]) }}">
    <div class="col-3 w-100 section-threepostsection d-flex" style="background-image: url('/storage/{{ $post->image }}')">
    </div>
    </a>
    <div class="row" style="padding-left:10px;">
      <a href="{{ route('post.show', ['post' => $post, 'section' => $post->getsection()]) }}">
      <b>{{$post->title}}</b>
      </a>
    </div>
  </div>
  @endforeach
</div>


<div class="row mt-2">
  @foreach($posts as $post)
  @continue($loop->iteration < 9)
  @break($loop->iteration == 13)
  <div class="col section-imagebox bg-section">
    <a href="{{ route('post.show', ['post' => $post, 'section' => $post->getsection()]) }}">
    <div class="col-3 w-100 section-threepostsection d-flex" style="background-image: url('/storage/{{ $post->image }}')">
    </div>
    </a>
    <div class="row" style="padding-left:10px;">
      <a href="{{ route('post.show', ['post' => $post, 'section' => $post->getsection()]) }}">
      <b>{{$post->title}}</b>
      </a>
    </div>
  </div>
  @endforeach
</div>


<div class="row mt-2">
<div class="col-3">
  <div class="row">
    @foreach($posts as $post)
    @continue($loop->iteration < 9)
    @break($loop->iteration == 12)
    <div class="row mb-2">
      <div class="col section-imagebox bg-section">
        <a href="{{ route('post.show', ['post' => $post, 'section' => $post->getsection()]) }}">
        <div class="col-3 w-100 section-threepostsection d-flex" style="background-image: url('/storage/{{ $post->image }}')">
        </div>
        </a>
        <div class="row" style="padding-left:10px;">
          <a href="{{ route('post.show', ['post' => $post, 'section' => $post->getsection()]) }}">
          <b>{{$post->title}}</b>
          </a>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
<div class="col-9">
  @foreach($posts as $post)
  @continue($loop->iteration < 12)
  @break($loop->iteration == 13)
  <div class="row ">
    <div class="col section-imagebox bg-section">
      <a href="{{ route('post.show', ['post' => $post, 'section' => $post->getsection()]) }}">
      <div class="col-3 w-100 section-bigpost d-flex" style="background-image: url('/storage/{{ $post->image }}')">
      </div>
      </a>
      <div class="row" style="padding-left:10px;">
        <a href="{{ route('post.show', ['post' => $post, 'section' => $post->getsection()]) }}">
        <h4><b>{{$post->title}}</b></h4>
        </a>
      </div>
    </div>
  </div>
  @endforeach
</div>
</div>


<div class="row mt-2">
  @foreach($posts as $post)
  @continue($loop->iteration < 13)
  @break($loop->iteration == 17)
  <div class="col section-imagebox bg-section">
    <a href="{{ route('post.show', ['post' => $post, 'section' => $post->getsection()]) }}">
    <div class="col-3 w-100 section-threepostsection d-flex" style="background-image: url('/storage/{{ $post->image }}')">
    </div>
    </a>
    <div class="row" style="padding-left:10px;">
      <a href="{{ route('post.show', ['post' => $post, 'section' => $post->getsection()]) }}">
      <b>{{$post->title}}</b>
      </a>
    </div>
  </div>
  @endforeach
</div>


<div class="row mt-2">
  @foreach($posts as $post)
  @continue($loop->iteration < 17)
  @break($loop->iteration == 21)
  <div class="col section-imagebox bg-section">
    <a href="{{ route('post.show', ['post' => $post, 'section' => $post->getsection()]) }}">
    <div class="col-3 w-100 section-threepostsection d-flex" style="background-image: url('/storage/{{ $post->image }}')">
    </div>
    </a>
    <div class="row" style="padding-left:10px;">
      <a href="{{ route('post.show', ['post' => $post, 'section' => $post->getsection()]) }}">
      <b>{{$post->title}}</b>
      </a>
    </div>
  </div>
  @endforeach
</div>

<div class="row mt-2">
  <div class="col-9">
    @foreach($posts as $post)
    @continue($loop->iteration < 24)
    @break($loop->iteration == 25)
    <div class="row ">
      <div class="col section-imagebox bg-section">
        <a href="{{ route('post.show', ['post' => $post, 'section' => $post->getsection()]) }}">
        <div class="col-3 w-100 section-bigpost d-flex" style="background-image: url('/storage/{{ $post->image }}')">
        </div>
        </a>
        <div class="row" style="padding-left:10px;">
          <a href="{{ route('post.show', ['post' => $post, 'section' => $post->getsection()]) }}">
          <h4><b>{{$post->title}}</b></h4>
          </a>
        </div>
      </div>
    </div>
    @endforeach
  </div>
<div class="col-3">
  <div class="row">
    @foreach($posts as $post)
    @continue($loop->iteration < 21)
    @break($loop->iteration == 24)
    <div class="row mb-2">
      <div class="col section-imagebox bg-section">
        <a href="{{ route('post.show', ['post' => $post, 'section' => $post->getsection()]) }}">
        <div class="col-3 w-100 section-threepostsection d-flex" style="background-image: url('/storage/{{ $post->image }}')">
        </div>
        </a>
        <div class="row" style="padding-left:10px;">
          <a href="{{ route('post.show', ['post' => $post, 'section' => $post->getsection()]) }}">
          <b>{{$post->title}}</b>
          </a>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
</div>


<div class="row mt-2">
  @foreach($posts as $post)
  @continue($loop->iteration < 24)
  @break($loop->iteration == 28)
  <div class="col section-imagebox bg-section">
    <a href="{{ route('post.show', ['post' => $post, 'section' => $post->getsection()]) }}">
    <div class="col-3 w-100 section-threepostsection d-flex" style="background-image: url('/storage/{{ $post->image }}')">
    </div>
    </a>
    <div class="row" style="padding-left:10px;">
      <a href="{{ route('post.show', ['post' => $post, 'section' => $post->getsection()]) }}">
      <b>{{$post->title}}</b>
      </a>
    </div>
  </div>
  @endforeach
</div>


<div class="row mt-2">
  @foreach($posts as $post)
  @continue($loop->iteration < 28)
  @break($loop->iteration == 33)
  <div class="col section-imagebox bg-section">
    <a href="{{ route('post.show', ['post' => $post, 'section' => $post->getsection()]) }}">
    <div class="col-3 w-100 section-threepostsection d-flex" style="background-image: url('/storage/{{ $post->image }}')">
    </div>
    </a>
    <div class="row" style="padding-left:10px;">
      <a href="{{ route('post.show', ['post' => $post, 'section' => $post->getsection()]) }}">
      <b>{{$post->title}}</b>
      </a>
    </div>
  </div>
  @endforeach
</div>


@endsection
