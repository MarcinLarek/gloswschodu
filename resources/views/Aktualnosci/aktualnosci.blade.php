@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row pt-3 pb-2">
    <h2>Aktualności</h2><br/>

  </div>
  @if(Auth::check())
            <a href="{{ url('/Aktualnosci/AddAktualnosci') }}">
            <button type="button" class="btn btn-dark mb-5">Dodaj Nowy post</button>
            </a>
  @endif

  <div class="row">
    @foreach($aktualnoscis->reverse()  as $aktualnosc)
    <div class="pr-5 col-5" style="margin-right:50px; width:500px;word-break:break-all;">
      <div class="row pb-3">
        <h5><b><a href="/Aktualnosci/{{ $aktualnosc->id }}" style="color:#e6c400;">
          <img src="/storage/{{ $aktualnosc->image }}" style="float:left;width:130px;height:90px;" class="pr-3" alt="">
          {{ $aktualnosc->title }}</a></b>
      </div>
      <div class="row">
        <?php $short = substr($aktualnosc->description, 0, 200);
          $short2 = strip_tags($short);
         ?>
        <h5 style="text-align: justify">{{ $short2 }}...</h5>
      </div>
      <div class="row pb-5">
        <a href="/Aktualnosci/{{ $aktualnosc->id }}"><button type="button" class="btn btn-success">Czytaj dalej</button></a>
      </div>
    </div>
    @endforeach
    .
  </div>

</div>
@endsection
