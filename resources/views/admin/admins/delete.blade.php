@extends('layouts.app')
@section('content')
@if(auth()->user()->global_privileges==1)
<hr />
<div class="container">
<a class="text-primary" href="{{ route('admin.adminlogout') }}"> <b>Wyloguj się</b> </a>
</div>
<div class="row">
  <div class="col-md-8 offset-md-2">
    <div class="card  border-0">
      <div class="card-body">
        <h1 class="card-title text-center">Czy napewno chcesz usunąć tego Administratora?</h1>
        <form id="delete" action="{{ route('admin.admins.deleteadmin', ['id' => $admin->id]) }}" method="post">
          @csrf
          <div class="row ">
            <div class="col-3">

            </div>
            <div class="col-2">
              <h3>ID: </h3>
              <h3>Login: </h3>
              <h3>Email: </h3>
              <h3>Imię i Nazwisko: </h3>
            </div>
            <div class="col-4">
              <h3>{{$admin->id}}</h3>
              <h3>{{$admin->login}}</h3>
              <h3>{{$admin->email}}</h3>
              <h3>{{ $admin->name }} {{ $admin->surname }}</h3>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-12 text-center mt-md-4">
              <input type="submit" value="Usuń" class="btn btn-danger" />
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
