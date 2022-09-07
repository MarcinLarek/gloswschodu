@extends('layouts.app')
@section('content')

<div class="container">

  <div class="row">
   <h5 class="text-primary">
     <a href="{{route('index')}}">Strona Główna</a>


     @if(isset($country))
     <b class="text-dark"> >> </b> <a href="{{ route('post.country', ['country' => $country]) }}">{{$country->country}}</a>
     @endif


     @if(isset($topsection) && isset($country))
      <b class="text-dark"> >> </b> <a href="{{ route('post.sectionposts', ['section' => $topsection]) }}">{{$topsection->section}}</a>
     @elseif(isset($topsection))
      <b class="text-dark"> >> </b> <a href="{{ route('post.sectionposts', ['section' => $topsection]) }}">{{$topsection->section}}</a>
     @endif


     @if(isset($topcategory) && isset($topsection))
      <b class="text-dark"> >> </b> <a href="{{ route('post.category', ['category' => $topcategory, 'section' => $topcategory->getsection()]) }}">{{$topcategory->category}}</a>
     @elseif(isset($topcategory))
      <b class="text-dark"> >> </b> <a href="{{ route('post.category', ['category' => $topcategory, 'section' => $topcategory->getsection()]) }}">{{$topcategory->category}}</a>
     @endif


     @if(isset($post) && isset($admin))
     <b class="text-dark"> >> </b> {{$post->title}}
     @endif

   </h5>
   <hr class="section-hr">
  </div>

@yield('mainpage')
</div>

@endsection
