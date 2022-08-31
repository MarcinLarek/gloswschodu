@extends('layouts.navbar.plportal')
@section('styles')
<link href="{{ asset('css/appplportal.css') }}" rel="stylesheet">
@endsection
@section('mainpage')

<div class="row">
 <h5 class="text-section">
   @if(isset($topsection))
   {{$topsection->section}} >>
   @endif
   @if(isset($country))
   {{$country->country}}
   @endif
   @if(isset($topcategory))
   {{$topcategory}}
   @endif
 </h5>
 <hr class="section-hr">
</div>
<div class="row">
    <div class="col-xl-9 col-l-9 col-md-12 col-sm-12">
    <div class="row">
      <div class="col-6">
        @foreach($main as $post)
        @if($loop->iteration %2 == 0)
        <div class="row">
          <div class="col-4">
              <a href="{{ route('post.show', ['post' => $post, 'section' => $post->getsection()]) }}">
                <div class=" mb-2 fiveobjectlist" style="width: 150px;background-image: url('/storage/{{ $post->image }}')">

                </div>
              </a>
          </div>
          <div class="col-8">
            <div class="text-secondary">
              {{$post->created_at}}
              {{$post->author}}
            </div>
            <a href="{{ route('post.show', ['post' => $post, 'section' => $post->getsection()]) }}">
              <h6><b>{{$post->title}}</b></h6>
            </a>
            {{strip_tags(substr($post->postcontent, 0, 100))}}...
          </div>
        </div>
        @endif
        @endforeach
      </div>
      <div class="col-6">
        @foreach($main as $post)
        @if($loop->iteration %2 == 1)
        <div class="row">
          <div class="col-4">
              <a href="{{ route('post.show', ['post' => $post, 'section' => $post->getsection()]) }}">
                <div class=" mb-2 fiveobjectlist" style="width: 150px;background-image: url('/storage/{{ $post->image }}')">

                </div>
              </a>
          </div>
          <div class="col-8">
            <div class="text-secondary">
              {{$post->created_at}}
              {{$post->author}}
            </div>
            <a href="{{ route('post.show', ['post' => $post, 'section' => $post->getsection()]) }}">
              <h6><b>{{$post->title}}</b></h6>
            </a>
            {{strip_tags(substr($post->postcontent, 0, 100))}}...
          </div>
        </div>
        @endif
        @endforeach
      </div>
    </div>
    <div class="row">
        <div class="col-12 d-flex justify-content-center">
          {{ $main->links() }}
        </div>
    </div>
    </div>
    <div class="col-xl-3 col-l-3 col-md-12 col-sm-12 ">
      <div class="row text-section text-center">
        <h4>INNE WIADOMOŚĆI</h4>
        <hr class="section-hr">
      </div>
        @foreach($posts as $list)
        <div class="row">
          <a href="{{ route('post.show', ['post' => $list, 'section' => $list->getsection()]) }}">
              <b class="text-section">• {{$list->title}}</b>
          </a>
        </div>
        @endforeach
        <div class="row mt-3 text-section text-center">
          <h4>NAJCZĘŚCIEJ CZYTANE</h4>
          <hr class="section-hr">
        </div>
        @foreach($topposts as $list)
        <div class="col-12">
            <a href="{{ route('post.show', ['post' => $list, 'section' => $list->getsection()]) }}">
                <b class="text-section">• {{$list->title}}</b>
            </a>
        </div>
        @endforeach

</div>
</div>



@endsection
