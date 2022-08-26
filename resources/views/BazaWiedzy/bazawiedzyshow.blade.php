@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">


  <div class="col-8">
    <div class="row pt-5 w-100">
      <h1 style="word-break:break-all">{{ $baza->title }}</h1>
      <figure class="figure w-100" style="">
        <center><img src="/storage/{{ $baza->image }}" class="pb-4 w-75"  alt=""></center>
      </figure>
    </div>

    <div class="row w-100" style="text-align:justify;word-break:break-all;overflow:hidden">
      {!! $baza->description !!}
    </div>

</div>

  <div class="col">
      <div class="row pt-5">
        <h4 style="background-color:#f2ba00; color:white; padding:5px">Ostatnie wpisy</h2>
      </div>
      <hr style="border-color:#f2ba00; border-width:2px; margin-top:-10px; padding-left:40px;">
      @foreach($list as $lists)
      <p> <a style="color:black" href="/BazaWiedzy/{{ $lists->id }}"> {{ $lists->title }} </a></p>
      @endforeach
      </div>
</div>
</div>
@endsection
