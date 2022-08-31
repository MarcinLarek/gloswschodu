@extends('layouts.app')
@section('content')
<div class="container">
    @if(session()->has('successalert'))
    <div class="alert alert-success">
        <h1>Pomyślnie zapisano dane</h1>
    </div>
    @endif
    <a class="text-primary" href="{{ route('admin.adminlogout') }}"> <b>Wyloguj się</b> </a>
    <div class="row text-center">
      <div class="col-12">
        <hr>
      </div>
      <h1>Dodawanie artykułów</h1>
      <div class="col-12">
        <hr>
      </div>
    </div>
    <div class="row pb-3">
        @foreach($sections as $section)
          @if(auth()->user()->global_privileges==1 || auth()->user()->ifmenages($section->id))
          <div class="col-md-3 pb-3">
              <div href="#" class="card text-center shadow" style="height:200px;">
                  <div class="card-body mt-5 mb-5">
                      <a class="stretched-link" href="{{ route('admin.post.list', ['section' => $section->section]) }}">
                          <h2>{{ $section->section }}</h2>
                      </a>
                  </div>
              </div>
          </div>
          @endif
        @endforeach
    </div>
    @if(auth()->user()->global_privileges==1)
    <div class="row text-center">
      <div class="col-12">
        <hr>
      </div>
      <h1>Strefa Super Admina</h1>
      <div class="col-12">
        <hr>
      </div>
    </div>
    <div class="row pb-3">
      <div class="col-md-3">
          <div href="#" class="card text-center shadow">
              <div class="card-body mt-5 mb-5">
                  <a class="stretched-link" href="{{ route('admin.admins') }}">
                      <h2>Administratorzy</h2>
                  </a>
              </div>
          </div>
      </div>
      <div class="col-md-3">
          <div href="#" class="card text-center shadow">
              <div class="card-body mt-5 mb-5">
                  <a class="stretched-link" href="{{ route('admin.category.selectsection') }}">
                      <h2>Kategorie</h2>
                  </a>
              </div>
          </div>
      </div>

      <div class="col-md-3">
          <div href="#" class="card text-center bg-danger shadow">
              <div class="card-body mt-5 mb-5">
                  <a class="stretched-link" href="{{ route('admin.temppostmaker') }}">
                      <h2>Stwórz testowe posty</h2> (Tylko dla lokalnych testów. Nie klikać na pressglobal.pl)
                  </a>
              </div>
          </div>
      </div>
    </div>
    @endif
</div>

@endsection
