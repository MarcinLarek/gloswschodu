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
    <form id="search" action="{{route('admin.post.store')}}" enctype="multipart/form-data" method="post">
        @csrf
        <fieldset>

            <div class="row pt-2">
                <div class="col-12">
                    <label for="title" class="control-label">Tyutuł</label>
                    <input name="title" id="title" class="form-control" placeholder="Tytuł" value="{{ old('title') }}" />
                    @error('title')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="row pt-2">
                <div class="col-12">
                    <label for="seo" class="control-label">Tytuł dla SEO (Uproszczony, krótki tytuł wyświetlający się w pasku wyszukiwania. Max 100 znaków)</label>
                    <input name="seo" id="seo" class="form-control" placeholder="Seo" value="{{ old('seo') }}" />
                    @error('seo')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="row pt-2">
                <div class="col-12">
                    <label for="summary" class="control-label">Zajawka. Kilka kluczowych zdań wyświetlających się pomiędzy zdjęciem artykułu a tytułem. (Opcjonalnie)</label>
                    <textarea name="summary" id="summary" placeholder="Zajawka" class="form-control">{{ old('summary') }}</textarea>
                    @error('summary')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="row pt-4">
                <div class="col-12">
                    <label for="author" class="control-label">Autor:</label>
                    <input name="author" id="author" class="form-control" placeholder="Autor" value="{{ old('author') }}" />
                    @error('author')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="row pt-4">
                <div class="col-12">
                    <label for="source" class="control-label">Źródło:</label>
                    <input name="source" id="source" class="form-control" placeholder="Źródło" value="{{ old('source') }}" />
                    @error('source')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="row pt-4">
                <div class="col-12">
                    <label for="postcontent" class="control-label">Zawartość posta:</label>
                    <textarea name="postcontent" id="postcontent" value="{{ old('postcontent') }}" class="form-control"></textarea>
                    @error('postcontent')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <script>

                  class MyUploadAdapter {
                      // ...
                      constructor( loader ) {
                              // The file loader instance to use during the upload. It sounds scary but do not
                              // worry — the loader will be passed into the adapter later on in this guide.
                              this.loader = loader;
                          }
                      // Starts the upload process.
                      upload() {
                          return this.loader.file
                              .then( file => new Promise( ( resolve, reject ) => {
                                  this._initRequest();
                                  this._initListeners( resolve, reject, file );
                                  this._sendRequest( file );
                              } ) );
                      }

                      // Aborts the upload process.
                      abort() {
                          if ( this.xhr ) {
                              this.xhr.abort();
                          }
                      }

                      _initRequest() {
                              const xhr = this.xhr = new XMLHttpRequest();

                              // Note that your request may look different. It is up to you and your editor
                              // integration to choose the right communication channel. This example uses
                              // a POST request with JSON as a data structure but your configuration
                              // could be different.
                              xhr.open( 'POST', '{{route('images.store')}}', true );
                              xhr.setRequestHeader('x-csrf-token', '{{ csrf_token() }}');
                              xhr.responseType = 'json';
                          }

                          _initListeners( resolve, reject, file ) {
                                  const xhr = this.xhr;
                                  const loader = this.loader;
                                  const genericErrorText = `Couldn't upload file: ${ file.name }.`;

                                  xhr.addEventListener( 'error', () => reject( genericErrorText ) );
                                  xhr.addEventListener( 'abort', () => reject() );
                                  xhr.addEventListener( 'load', () => {
                                      const response = xhr.response;

                                      // This example assumes the XHR server's "response" object will come with
                                      // an "error" which has its own "message" that can be passed to reject()
                                      // in the upload promise.
                                      //
                                      // Your integration may handle upload errors in a different way so make sure
                                      // it is done properly. The reject() function must be called when the upload fails.
                                      if ( !response || response.error ) {
                                          return reject( response && response.error ? response.error.message : genericErrorText );
                                      }

                                      // If the upload is successful, resolve the upload promise with an object containing
                                      // at least the "default" URL, pointing to the image on the server.
                                      // This URL will be used to display the image in the content. Learn more in the
                                      // UploadAdapter#upload documentation.
                                      resolve( {
                                          default: response.url
                                      } );
                                  } );

                                  // Upload progress when it is supported. The file loader has the #uploadTotal and #uploaded
                                  // properties which are used e.g. to display the upload progress bar in the editor
                                  // user interface.
                                  if ( xhr.upload ) {
                                      xhr.upload.addEventListener( 'progress', evt => {
                                          if ( evt.lengthComputable ) {
                                              loader.uploadTotal = evt.total;
                                              loader.uploaded = evt.loaded;
                                          }
                                      } );
                                  }
                              }

                              _sendRequest( file ) {
                                      // Prepare the form data.
                                      const data = new FormData();

                                      data.append( 'upload', file );

                                      // Important note: This is the right place to implement security mechanisms
                                      // like authentication and CSRF protection. For instance, you can use
                                      // XMLHttpRequest.setRequestHeader() to set the request headers containing
                                      // the CSRF token generated earlier by your application.

                                      // Send the request.
                                      this.xhr.send( data );
                                  }

                      // ...
                  }

                  function SimpleUploadAdapterPlugin( editor ) {
                      editor.plugins.get( 'FileRepository' ).createUploadAdapter = ( loader ) => {
                          // Configure the URL to the upload script in your back-end here!
                          return new MyUploadAdapter( loader );
                      };
                  }

                  ClassicEditor
                  .create( document.querySelector( '#postcontent' ), {
    extraPlugins: [ SimpleUploadAdapterPlugin ],

} )
                  .catch( error => {
                    console.error( error );
                  } );
                  </script>

                </div>
            </div>



            <div class="row pt-4">
                <div class="col-4">
                    <label for="category" class="control-label">Zaznacz kategorie</label>
                    <select size="24" class="form-select col-12" multiple="multiple" name="category[]" id="category">
                      @foreach($category as $cat)
                          <option value="{{$cat->id}}">
                            {{$cat->category }}
                            @if($cat->getparentcategory() != null)
                             --- (podkategoria kategorii {{$cat->getparentcategory()->category}})
                            @endif
                          </option>
                      @endforeach
                    </select>
                    @error('category')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-4">
                  <label for="country" class="control-label">Zaznacz państwo</label>
                  <select size="24" class="form-select col-12" name="country" id="country">
                    @foreach($countries as $count)
                        <option value="{{$count->id}}">
                          {{$count->country }}
                        </option>
                    @endforeach
                  </select>
                  @error('category')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="col-4">
                    <div class="row">
                        <label for="image" class="col-md-4 col-form-label">Zdjęcie</label>
                        <input type="file" class="form-control-file" id="image" name="image">
                        @error('image')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <input type="hidden" name="section" value="{{$section}}">
            </div>
            <div class="row justify-content-center text-center">
                <div class="form-group col mt-md-4 pb-5 mb-5">
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
