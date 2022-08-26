@extends('layouts.app')
@section('content')
@if(auth()->user()->global_privileges==1)
<script>
            function toggePassword() {
                var upass = document.getElementById('upass');
                var toggleBtn = document.getElementById('toggleBtn');
                if (upass.type == "password") {
                    upass.type = "text";
                    toggleBtn.value = "Ukryj Hasło";
                } else {
                    upass.type = "Password";
                    toggleBtn.value = "Pokaż Hasło";
                }
            }

        </script>
<div class="container">
  <h1 class="mt-md-4">Wprowadź dane administratora</h1>
  <hr />
  <div class="pb-1">
    <a class="text-primary" href="{{ route('admin.adminlogout') }}"> <b>Wyloguj się</b> </a><a href="{{route('admin.admins')}}" class="text-primary"> <u>Powrót</u> </a>
  </div>
  <div class="row">
    <div class="col-md-8 offset-md-2">
      <div class="card  border-0">
        <div class="card-body">
          <h4 class="card-title">Dodaj administratora</h4>
          <form action="{{ route('admin.admins.store') }}" method="post">
            @csrf
            <fieldset>
              <div class="row">
                <div class="form-group col-md-12">
                  <label for="login" class="control-label">Login</label>
                  <input name="login" id="login" class="form-control" value="{{ old('login') }}" placeholder="Login" />
                  @error('login')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-12">
                  <label for="name" class="control-label">Imie</label>
                  <input name="name" id="name" class="form-control" value="{{ old('name') }}" placeholder="Imie" />
                  @error('name')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-12">
                  <label for="surname" class="control-label">Nazwisko</label>
                  <input name="surname" id="surname" class="form-control" value="{{ old('surname')}}" placeholder="Nazwisko" />
                  @error('surname')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-12">
                  <label for="global_privileges" class="control-label">Super Admin? (Admin ze wszystkimi przywilejami)</label>
                  <select name="global_privileges" id="global_privileges" class="custom-select">
                    <option value="1">Tak</option>
                    <option value="0">Nie</option>
                  </select>
                  @error('global_privileges')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="password" class="control-label">Hasło</label>
                  <input name="password" id="upass" type="password" class="form-control" placeholder="Hasło" value="{{ old('password') }}" />
                  @error('password')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group col-md-6">
                  <label for="compare-password" class="control-label">Potwierdź hasło</label>
                  <input name="compare-password" id="compare-password" type="password" class="form-control" placeholder="Potwierdź hasło" value="{{ old('compare-password') }}" />
                  @error('compare-password')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <input type ="button"id="toggleBtn"value="Pokaż hasło"class="mt-2 w-25 btn btn-outline-secondary btn-sm"onclick="toggePassword()">
              </div>
              <div class="row">
                <div class="form-group col-md-12">
                  <label for="email" class="control-label">Email</label>
                  <input name="email" id="email" value="{{ old('email') }}" class="form-control" placeholder="Email" />
                  @error('email')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>
            </fieldset>
            <div class="row">
              <div class="form-group col-md-12 text-center mt-md-4">
                <input type="submit" value="Zapisz zmiany" class="btn btn-primary" />
              </div>
            </div>
          </form>
        </div>
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
