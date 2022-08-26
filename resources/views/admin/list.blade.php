@extends('layouts.app')
@section('content')
@if(auth()->user()->global_privileges==1 || auth()->user()->ifmenages($permissioncheck->id))
<div class="container">
  <h4>{{$section}}</h4>
  <hr />
  @if(session()->has('successalert'))
  <div class="alert alert-success">
    <h1>Zmiany zostały zapisane</h1>
  </div>
  @endif
    <a class="text-primary" href="{{ route('admin.adminlogout') }}"> <b>Wyloguj się</b> </a> <a href="{{route('admin.index')}}" class="text-primary"> <u>Powrót</u> </a> <a href="{{ route('admin.post.create', ['section' => $permissioncheck->section]) }}" class="text-primary" >Dodaj post</a>
  <div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Id</th>
          <th>Tytuł</th>
          <th>Autor</th>
          <th>Data utworzenia</th>
          <th>Data modyfikacji</th>
          <th>Usuń</th>
          <th>Edytuj</th>
        </tr>
      </thead>
      @if($posts->isNotEmpty())
      <tbody>
        <?php $i = 1; ?>
        @foreach($posts as $post)
        <tr>
          <td>{{ $post->id }}</td>
          <td>{{ $post->title }}</td>
          <td>{{ $post->author }}</td>
          <td>{{ $post->created_at}}</td>
          <td>{{ $post->updated_at }}</td>
          <td>
            <a href="{{ route('admin.post.delete', ['post' => $post->id]) }}" class="text-primary">
              Usuń
            </a>
          </td>
          <td>
            <a href="{{ route('admin.post.edit', ['post' => $post->id]) }}" class="text-primary">
              Edytuj
            </a>
          </td>
        </tr>
        @endforeach
      </tbody>
      @else
      <tr>
        <td colspan="7">Brak danych do wyświetlenia</td>
      </tr>
      @endif
    </table>
  </div>
</div>
@else
<div class="alert alert-danger" role="alert">
  Brak uprawnień do przeglądania strony
</div>
@endif
@endsection
