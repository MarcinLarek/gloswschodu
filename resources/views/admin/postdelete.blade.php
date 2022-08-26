@extends('layouts.app')
@section('content')
@if(auth()->user()->global_privileges==1 || auth()->user()->ifmenages($permissioncheck->id))
<hr />
<div class="container">
<a class="text-primary" href="{{ route('admin.adminlogout') }}"> <b>Wyloguj się</b> </a>
</div>
<div class="row">
  <div class="col-md-8 offset-md-2">
    <div class="card  border-0">
      <div class="card-body">
        <h1 class="card-title text-center">Czy napewno chcesz usunąć ten post?</h1>
        <form id="delete" action="{{ route('admin.post.deletepost', ['post' => $post->id]) }}" method="post">
          @csrf
          <div class="row ">
            <div class="col-3">

            </div>
            <div class="col-2">
              <h3>ID: </h3>
              <h3>Tytuł: </h3>
              <h3>Autor: </h3>
            </div>
            <div class="col-4">
              <h3>{{$post->id}}</h3>
              <h3>{{$post->title}}</h3>
              <h3>{{$post->author}}</h3>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-12 text-center mt-md-4">
              <input type="submit" value="Usuń" class="btn btn-danger" />
              <a href="{{ route('admin.index') }}"><button type="button" class="btn btn-secondary">Wróć</button></a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@else
<div class="alert alert-danger" role="alert">
  Brak uprawnień do przeglądania strony
</div>
@endif
@endsection
