@extends('layouts.app')
@section('content')
<div class="container">
  <div class="pt-4 pb-3">
    @if(Auth::check())
              <a href="{{ url('/BazaWiedzy/AddBazaWiedzy') }}">
              <button type="button" class="btn btn-dark mb-5">Dodaj Nową Bazę Wiedzy</button>
              </a>
    @endif
<div class="row">
    @foreach($bazas->reverse()  as $baza)
      <div class="pb-5" style="margin-right:50px; width:500px;word-break: break-all">
        <h5><b><a href="/BazaWiedzy/{{ $baza->id }}" style="color:#e6c400;">
          <img src="/storage/{{ $baza->image }}" style="float:left;width:150px;height:150px;" class="pr-3" alt="">
          {{ $baza->title }}</a></b>
          <div class="col-3" style="margin-left: 150px">
            <hr>
          </div>
          <a href="/BazaWiedzy/{{ $baza->id }}"><button type="button" class="btn btn-success">Czytaj dalej</button></a>
        </h5>

      </div>
    @endforeach
</div>


</div>
</div>
@endsection
