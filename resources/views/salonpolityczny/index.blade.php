@extends('layouts.navbar.'.$section)
@section('mainpage')



@foreach($categories as $category)


  @if($loop->iteration == 1 )


  <div class="row mt-4">
    <div class="d-flex text-section">
      <div class="col-10">
        <h5 class="text-section text-uppercase">{{$category->category}} </h5>
      </div>
      <div class="col-2 mt-auto" style="text-align:right;">
        <a href="{{ route('post.category', ['category' => $category, 'section' => $category->getsection()]) }}">
          ZOBACZ WSZYSTKO
        </a>
      </div>
    </div>
  <hr class="section-hr">
<?php  $catposts = $category->getposts()->take(17)?>
  <div class="row">
      <div class="col-xl-7 col-l-7 col-md-12 col-sm-12 ">
          <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-inner">
                  @foreach ($catposts as $post)
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
                @foreach ($catposts as $post)
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
          @foreach ($catposts as $post)
          @continue($loop->iteration < 5) @break($loop->iteration == 8)
          <div class="row pt-1">
              <div class="col-xl-5 col-l-5 col-md-5 col-sm-5 col-5 col-12">
                  <a href="{{ route('post.show', ['post' => $post, 'section' => $post->getsection()]) }}"><img src="/storage/{{ $post->image }}" class="w-100 section-rightlist"></a>
              </div>
              <div class="col-xl-7 col-l-7 col-md-7 col-sm-7 col-7 col-12 rightlisttext">
                  <a href="{{ route('post.show', ['post' => $post, 'section' => $post->getsection()]) }}"><b class="text-section">{{$post->title}}</b></a>
                  <p>{{strip_tags(substr($post->postcontent, 0, 100))}}...</p>
              </div>
          </div>
          @endforeach
      </div>
  </div>

  <div class="row mt-2">
    @foreach($posts as $post)
    @continue($loop->iteration < 8)
    @break($loop->iteration == 12)
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
    @continue($loop->iteration < 12)
    @break($loop->iteration == 16)
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
</div>



  @elseif($loop->iteration == 2 )



  <div class="row mt-4">
    <div class="d-flex text-section">
      <div class="col-10">
        <h5 class="text-section text-uppercase">{{$category->category}} </h5>
      </div>
      <div class="col-2 mt-auto" style="text-align:right;">
        <a href="{{ route('post.category', ['category' => $category, 'section' => $category->getsection()]) }}">
          ZOBACZ WSZYSTKO
        </a>
      </div>
    </div>
  <hr class="section-hr">

  <div class="row">
    <ul class="nav nav-tabs" id="TUTU{{preg_replace('/\s+/', '', $category->category)}}" role="tablist">
      @foreach($category->getsubcategories() as $sub)
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

  <div class="tab-content" id="TUTU{{preg_replace('/\s+/', '', $category->category)}}Content">
    @foreach($category->getsubcategories() as $sub)
    @if($loop->iteration == 1)
      <div class="tab-pane fade show active" id="home{{preg_replace('/\s+/', '', $sub->category)}}" role="tabpanel" aria-labelledby="home-tab{{preg_replace('/\s+/', '', $sub->category)}}">
        @else
      <div class="tab-pane fade" id="home{{preg_replace('/\s+/', '', $sub->category)}}" role="tabpanel" aria-labelledby="home-tab{{preg_replace('/\s+/', '', $sub->category)}}">
        @endif
        <?php $innerposts = $sub->getposts()->take(13); ?>
        <div class="row">
          <div class="col-7 ">
            <div class="row">
              <div class="col-8">
                <div class="section-imagebox titletest bg-section">
                  @if(isset($innerposts[0]))
                  <a href="{{ route('post.show', ['post' => $innerposts[0], 'section' => $innerposts[0]->getsection()]) }}">
                  <div class="section-secondtableimage" style="background-image: url('/storage/{{ $innerposts[0]->image }}')">
                  </div>
                  </a>
                  <a href="{{ route('post.show', ['post' => $innerposts[0], 'section' => $innerposts[0]->getsection()]) }}"><h4 style="padding:5px;">{{$innerposts[0]->title}}</h4></a>
                  @endif
                </div>
              </div>
              <div class="col-4">
                @foreach($innerposts as $inpost)
                @continue($loop->iteration < 6)
                @break($loop->iteration == 8)
                <div class="mb-2 section-imagebox bg-section">
                  <a href="{{ route('post.show', ['post' => $inpost, 'section' => $inpost->getsection()]) }}">
                  <div class="col-3 w-100 section-righttableimage d-flex" style="background-image: url('/storage/{{ $post->image }}')">
                  </div>
                  </a>
                  <div class="row titletest" style="padding-left:10px;">
                    <a href="{{ route('post.show', ['post' => $inpost, 'section' => $inpost->getsection()]) }}">
                    {{$post->title}}
                    </a>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
            <div class="row mb-2">
              @foreach($innerposts as $inpost)
              @continue($loop->iteration < 8)
              @break($loop->iteration == 11)
              <div class="col section-imagebox bg-section">
                <a href="{{ route('post.show', ['post' => $inpost, 'section' => $inpost->getsection()]) }}">
                <div class="col-3 w-100 section-righttableimage d-flex" style="background-image: url('/storage/{{ $post->image }}')">
                </div>
                </a>
                <div class="row titletest" style="padding-left:10px;">
                  <a href="{{ route('post.show', ['post' => $inpost, 'section' => $inpost->getsection()]) }}">
                  {{$post->title}}
                  </a>
                </div>
              </div>
              @endforeach
            </div>
            <div class="row mb-2">
              @foreach($innerposts as $inpost)
              @continue($loop->iteration < 11)
              @break($loop->iteration == 14)
              <div class="col section-imagebox bg-section">
                <a href="{{ route('post.show', ['post' => $inpost, 'section' => $inpost->getsection()]) }}">
                <div class="col-3 w-100 section-righttableimage d-flex" style="background-image: url('/storage/{{ $post->image }}')">
                </div>
                </a>
                <div class="row titletest" style="padding-left:10px;">
                  <a href="{{ route('post.show', ['post' => $inpost, 'section' => $inpost->getsection()]) }}">
                  {{$post->title}}
                  </a>
                </div>
              </div>
              @endforeach
            </div>
          </div>
          <div class="col-5">
            @foreach($innerposts as $inpost)
            @continue($loop->iteration < 2)
            @break($loop->iteration == 6)
            <div class="row mb-3">
              <div class="col-5">
                <a href="{{ route('post.show', ['post' => $inpost, 'section' => $inpost->getsection()]) }}">
                <div class="section-righttableimagemorergiht" style="background-image: url('/storage/{{ $inpost->image }}')">
                </div>
                </a>
              </div>
              <div class="col-7">
                <span><a class="text-section" href="{{ route('post.show', ['post' => $inpost, 'section' => $inpost->getsection()]) }}">{{$inpost->title}}</a></span>
                <p class="text-dark" style="font-weight: lighter;">{{strip_tags(substr($inpost->postcontent, 0, 100))}}</p>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    @endforeach
  </div>
  </div>
</div>



@elseif ($loop->iteration == 3)


<div class="row mb-3 d-flex text-section" style="">
<div class="col-6">
<h5>Z ŻYCIA SEJMU</h5>
</div>
<hr class="section-hr">
<div class="row mt-3">
  <div class="col-3 text-center text-dark">
    <a href="https://www.sejm.gov.pl/Sejm8.nsf/kluby.xsp"><img class="imagesejm" src="/storage/salonikony/1.png" alt=""></a>
    <h4>KOŁA PARLAMENTARLNE</h4>
  </div>
  <div class="col-3 text-center text-dark">
    <a href="https://www.sejm.gov.pl/Sejm8.nsf/poslowie.xsp?type=A"><img class="imagesejm" src="/storage/salonikony/2.svg" alt=""></a>
    <h4>SKŁAD RZĄDU</h4>
  </div>
  <div class="col-3 text-center text-dark">
    <a href="https://www.sejm.gov.pl/Sejm8.nsf/agent.xsp?symbol=KOMISJE_STALE&Nrkadencji=8"><img class="imagesejm" src="/storage/salonikony/3.png" alt=""></a>
    <h4>KOMISJE SEJMOWE</h4>
  </div>
  <div class="col-3 text-center text-dark">
    <a href="https://www.sejm.gov.pl/sejm8.nsf/PorzadekObrad.xsp?documentId=EA6939B18D11F9C4C1258441003DB935"><img class="imagesejm" src="/storage/salonikony/4.png" alt=""></a>
    <h4>Z ŻYCIA SEJMU</h4>
  </div>
</div>
<div class="row mt-5">
  <div class="col-3 text-center text-dark">
    <a href="https://www.sejm.gov.pl/Sejm8.nsf/proces.xsp"><img class="imagesejm" src="/storage/salonikony/5.png" alt=""></a>
    <h4>PROCES LEGISLACYJNY</h4>
  </div>
  <div class="col-3 text-center text-dark">
    <a href="https://www.sejm.gov.pl/Sejm8.nsf/agent.xsp?symbol=PROJNOWEUST&NrKadencji=8&Kol=D&Typ=UST"><img class="imagesejm" src="/storage/salonikony/6.svg" alt=""></a>
    <h4>PROJEKTY USTAW</h4>
  </div>
  <div class="col-3 text-center text-dark">
    <a href="https://ec.europa.eu/info/index_pl"><img class="imagesejm" src="/storage/salonikony/7.jpg" alt=""></a>
    <h4>KOMISJA EUROPEJSKA</h4>
  </div>
  <div class="col-3 text-center text-dark">
    <a href="https://www.europarl.europa.eu/portal/pl"><img class="imagesejm" src="/storage/salonikony/8.png" alt=""></a>
    <h4>PARLAMENT EUROPEJSKI</h4>
  </div>
</div>
</div>

<?php $innerposts = $category->getposts()->take(7); ?>
  <div class="row mt-5">
    <div class="d-flex text-section">
      <div class="col-10">
        <h5 class="text-section text-uppercase">{{$category->category}} </h5>
      </div>
      <div class="col-2 mt-auto" style="text-align:right;">
        <a href="{{ route('post.category', ['category' => $category, 'section' => $category->getsection()]) }}">
          ZOBACZ WSZYSTKO
        </a>
      </div>
    </div>
  <hr class="section-hr">
    <div class="row">
      <div class="col-7 ">
        <div class="section-imagebox bg-section">
          @if(isset($innerposts[0]))
          <a href="{{ route('post.show', ['post' => $innerposts[0], 'section' => $innerposts[0]->getsection()]) }}">
          <div class="section-fisttableimage" style="background-image: url('/storage/{{ $innerposts[0]->image }}')">
          </div>
          </a>
          <a href="{{ route('post.show', ['post' => $innerposts[0], 'section' => $innerposts[0]->getsection()]) }}"><h4 style="padding:5px;">{{$innerposts[0]->title}}</h4></a>
          @endif
        </div>
      </div>
      <div class="col-5">
        @foreach($innerposts as $inpost)
        @continue($loop->iteration < 2)
        @break($loop->iteration == 5)
        <div class="row mb-3">
          <div class="col-5">
            <a href="{{ route('post.show', ['post' => $inpost, 'section' => $inpost->getsection()]) }}">
            <div class="section-righttableimage" style="background-image: url('/storage/{{ $inpost->image }}')">
            </div>
            </a>
          </div>
          <div class="col-7">
            <span><a class="text-section" href="{{ route('post.show', ['post' => $inpost, 'section' => $inpost->getsection()]) }}">{{$inpost->title}}</a></span>
            <p class="text-dark" style="font-weight: lighter;">{{strip_tags(substr($inpost->postcontent, 0, 100))}}</p>
          </div>
        </div>
        @endforeach
      </div>
    </div>
    <div class="row">
      @foreach($innerposts as $inpost)
        @continue($loop->iteration < 5)
          @if(isset($inpost))
          <div class="col mt-4 section-imagebox bg-section">
            <a href="{{ route('post.show', ['post' => $inpost, 'section' => $inpost->getsection()]) }}">
              <div class="section-bottomtabeimage" style="background-image: url('/storage/{{ $inpost->image }}')">
              </div>
            </a>
            <a href="{{ route('post.show', ['post' => $inpost, 'section' => $inpost->getsection()]) }}" style="padding:5px;">{{$inpost->title}}</a>
          </div>
          @endif
      @endforeach
    </div>
    </div>



@elseif( $category->getsubcategories()->isempty() )



<div class="row pt-5 mt-5">
  <div class="d-flex text-section">
    <div class="col-10">
      <h5 class="text-section text-uppercase">{{$category->category}} </h5>
    </div>
    <div class="col-2 mt-auto" style="text-align:right;">
      <a href="{{ route('post.category', ['category' => $category, 'section' => $category->getsection()]) }}">
        ZOBACZ WSZYSTKO
      </a>
    </div>
  </div>
<hr class="section-hr">
  @foreach($category->getposts()->take(4) as $listpost)
    <div class="col section-imagebox bg-section">
      <a href="{{ route('post.show', ['post' => $listpost, 'section' => $listpost->getsection()]) }}">
      <div class="col-3 w-100 section-threepostsection d-flex" style="background-image: url('/storage/{{ $listpost->image }}')">
      </div>
      </a>
      <div class="row" style="padding-left:10px;">
        <a href="{{ route('post.show', ['post' => $listpost, 'section' => $listpost->getsection()]) }}">
        <b>{{$listpost->title}}</b>
        </a>
        <p>{{strip_tags(substr($listpost->postcontent, 0, 100))}}...</p>
      </div>
    </div>
  @endforeach
</div>




@else
<div class="row mt-4">
  <div class="d-flex text-section">
    <div class="col-10">
      <h5 class="text-section text-uppercase">{{$category->category}} </h5>
    </div>
    <div class="col-2 mt-auto" style="text-align:right;">
      <a href="{{ route('post.category', ['category' => $category, 'section' => $category->getsection()]) }}">
        ZOBACZ WSZYSTKO
      </a>
    </div>
  </div>
<hr class="section-hr">

<div class="row">
  <ul class="nav nav-tabs" id="TUTU{{preg_replace('/\s+/', '', $category->category)}}" role="tablist">
    @foreach($category->getsubcategories() as $sub)
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

<div class="tab-content" id="TUTU{{preg_replace('/\s+/', '', $category->category)}}Content">
  @foreach($category->getsubcategories() as $sub)
  @if($loop->iteration == 1)
    <div class="tab-pane fade show active" id="home{{preg_replace('/\s+/', '', $sub->category)}}" role="tabpanel" aria-labelledby="home-tab{{preg_replace('/\s+/', '', $sub->category)}}">
      @else
    <div class="tab-pane fade" id="home{{preg_replace('/\s+/', '', $sub->category)}}" role="tabpanel" aria-labelledby="home-tab{{preg_replace('/\s+/', '', $sub->category)}}">
      @endif
      <?php $innerposts = $sub->getposts()->take(7); ?>
      <div class="row">
        <div class="col-7 ">
          <div class="section-imagebox bg-section">
            @if(isset($innerposts[0]))
            <a href="{{ route('post.show', ['post' => $innerposts[0], 'section' => $innerposts[0]->getsection()]) }}">
            <div class="section-fisttableimage" style="background-image: url('/storage/{{ $innerposts[0]->image }}')">
            </div>
            </a>
            <a href="{{ route('post.show', ['post' => $innerposts[0], 'section' => $innerposts[0]->getsection()]) }}"><h4 style="padding:5px;">{{$innerposts[0]->title}}</h4></a>
            @endif
          </div>
        </div>
        <div class="col-5">
          @foreach($innerposts as $inpost)
          @continue($loop->iteration < 2)
          @break($loop->iteration == 5)
          <div class="row mb-3">
            <div class="col-5">
              <a href="{{ route('post.show', ['post' => $inpost, 'section' => $inpost->getsection()]) }}">
              <div class="section-righttableimage" style="background-image: url('/storage/{{ $inpost->image }}')">
              </div>
              </a>
            </div>
            <div class="col-7">
              <span><a class="text-section" href="{{ route('post.show', ['post' => $inpost, 'section' => $inpost->getsection()]) }}">{{$inpost->title}}</a></span>
              <p class="text-dark" style="font-weight: lighter;">{{strip_tags(substr($inpost->postcontent, 0, 100))}}</p>
            </div>
          </div>
          @endforeach
        </div>
      </div>
      <div class="row">
        @foreach($innerposts as $inpost)
          @continue($loop->iteration < 5)
            @if(isset($inpost))
            <div class="col mt-4 section-imagebox bg-section">
              <a href="{{ route('post.show', ['post' => $inpost, 'section' => $inpost->getsection()]) }}">
                <div class="section-bottomtabeimage" style="background-image: url('/storage/{{ $inpost->image }}')">
                </div>
              </a>
              <a href="{{ route('post.show', ['post' => $inpost, 'section' => $inpost->getsection()]) }}" style="padding:5px;">{{$inpost->title}}</a>
            </div>
            @endif
        @endforeach
      </div>
    </div>
  @endforeach
</div>
</div>



@endif
@endforeach


@endsection
