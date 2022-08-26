@extends('layouts.app')
@section('content')
@if(auth()->user()->global_privileges==1)
<div class="container">
    @if(session()->has('successalert'))
    <div class="alert alert-success">
        <h1>Pomyślnie zapisano dane</h1>
    </div>
    @endif
    <div class="pt-4 ">
      <a class="text-primary" href="{{ route('admin.adminlogout') }}"> <b>Wyloguj się</b> </a> <a href="{{route('admin.index')}}" class="text-primary"> <u>Powrót</u> </a>
    </div>

    <div class="row pt-5 pb-5 text-center">
      <h1>Wybierz sekcje do której chcesz dodać kategorie</h1>
      @foreach($sections as $section)
      <div class="text-center pb-1 pt-1">
        <a href="{{ route('admin.category.create', ['section' => $section]) }}">
          <h4>{{$section->section}}</h4>
        </a>
      </div>
      @endforeach
    </div>


</div>
@else
<div class="alert alert-danger" role="alert">
  Brak uprawnień do przeglądania strony
</div>
@endif
@endsection
