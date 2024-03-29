@extends('layouts.navbar.plportal')
@section('styles')
<link href="{{ asset('css/appplportal.css') }}" rel="stylesheet">
@endsection
@section('mainpage')

<div class="row">
    <div class="col-xl-9 col-l-9 col-md-12 col-sm-12 ">
      <div class="row">
        {{$post->created_at}} {{$admin->name}} {{substr($admin->surname, 0, 1)}}
      </div>
        <div class="d-flex justify-content-center">
            <h1> <b>{{$post->title}}</b> </h1>
        </div>
        @if($post->summary != null)
        <div class="row pt-3 pb-2">
            <h5>{{$post->summary}}</h5>
        </div>
        @else
        <div class="row pt-3 pb-2">
            <h5>{{strip_tags(substr($post->postcontent, 0, 230))}}...</h5>
        </div>
        @endif
        <div class="row">
          <img src="/storage/{{$post->image}}" alt=""><br/>
          {!!$post->postcontent!!}
        </div>
        <div class="row">
          <p> <b>Autor:</b> <br/>
           {{$post->author}} </p>
          <p> <b>Żródło:</b> <br/>
            {{$post->source}} </p>
        </div>
        <div class="row">
          <p><b> Dział: </b>
          @foreach ($post->getcategories() as $tag)
          <a href="{{ route('post.category', ['category' => $tag, 'section' => $post->getsection()]) }}">{{$tag->category}} </a>
          @endforeach</p>
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
