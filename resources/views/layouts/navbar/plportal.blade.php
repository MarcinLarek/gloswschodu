@extends('layouts.app')
@section('content')

<div class="container">

  <div class="row">
   <h5 class="text-primary">

     @if(isset($check) && isset($country))
     Strona Główna >>
     @elseif(isset($check))
     Strona Główna
     @endif


     @if(isset($country))
     {{$country->country}}
     @endif


     @if(isset($topsection) && isset($country))
      >> {{$topsection->section}}
     @elseif(isset($topsection))
       {{$topsection->section}}
     @endif


     @if(isset($topcategory) && isset($topsection))
      >> {{$topcategory}}
     @elseif(isset($topcategory))
       {{$topcategory}}
     @endif


     @if(isset($post) && isset($admin))
     >> {{$post->title}}
     @endif

   </h5>
   <hr class="section-hr">
  </div>

@yield('mainpage')
</div>

@endsection
