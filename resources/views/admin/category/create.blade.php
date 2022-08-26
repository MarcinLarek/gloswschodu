@extends('layouts.app')
@section('content')
@if(auth()->user()->global_privileges==1 || auth()->user()->ifmenages($permissioncheck->id))
<div class="container">
    @if(session()->has('successalert'))
    <div class="alert alert-success">
        <h1>Pomyślnie zapisano dane</h1>
    </div>
    @endif
    <div class="pt-4 ">
      <a class="text-primary" href="{{ route('admin.adminlogout') }}"> <b>Wyloguj się</b> </a> <a href="{{route('admin.index')}}" class="text-primary"> <u>Powrót</u> </a>
    </div>
    <form id="search" action="{{route('admin.category.store')}}" enctype="multipart/form-data" method="post">
        @csrf
        <fieldset>
            <div class="row pt-2">
                <div class="col-12">
                    <label for="category" class="control-label">Nazwa kategorii</label>
                    <input name="category" id="category" class="form-control" placeholder="Nazwa" value="{{ old('category') }}" />
                    @error('title')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="row pt-2">
              <div class="col-sm-4">
                  <label for="parent_category_id" class="control-label">Zaznacz nadrzędną kategorie. Jeśli nie posiada zaznacz brak.</label>
                  <select size="24" class="form-select col-12" name="parent_category_id" id="parent_category_id">
                    <option value="">Brak</option>
                    @foreach($category as $cat)
                      @if($cat->getparentcategory() == null)
                        <option value="{{$cat->id}}">
                          {{$cat->category }}
                        </option>
                      @endif
                    @endforeach
                  </select>
                  @error('category')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
              </div>
            </div>
            <input name="section_id" id="section_id" type="hidden" value="{{$section->id}}" class="form-control"/>
            <div class="row justify-content-center text-center">
                <div class="form-group col mt-md-4 mb-5">
                    <input type="submit" value="Zapisz" class="btn btn-lg btn-primary" />
                </div>
            </div>
        </fieldset>
    </form>
</div>
@else
<div class="alert alert-danger" role="alert">
  Brak uprawnień do przeglądania strony
</div>
@endif
@endsection
