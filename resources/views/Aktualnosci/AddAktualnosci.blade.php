@extends('layouts.app')
@section('content')
<div class="container">
    <form action="/Aktualnosci/aktualnoscistore" enctype="multipart/form-data" method="post">
    @csrf

    <div class="row pt-5">
        <div class="col-8 offset-2">

            <div class="row">
                <h1>Dodaj nowy post do aktualnosci</h1>
            </div>

             <div class="form-group row">
                  <label for="caption" class="col-md-4 col-form-label">Tytuł</label>


                      <input id="title"
                            name="title"
                            type="text"
                            class="form-control @error('caption') is-invalid @enderror"
                            value="{{ old('caption') }}"
                            required autocomplete="caption"
                            autofocus>

                      @error('caption')
                           <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                      @enderror

             </div>

             <div class="form-group row">
                  <label for="description" class="col-md-4 col-form-label">Opis</label>


                      <textarea id="description"
                            name="description"
                            type="text"
                            style=""
                            autofocus></textarea>

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
                      .create( document.querySelector( '#description' ), {
        extraPlugins: [ SimpleUploadAdapterPlugin ],

    } )
                      .catch( error => {
                        console.error( error );
                      } );
                      </script>
             </div>

             <div class="row">
                <label for="image" class="col-md-4 col-form-label">Dodaj Zdjęcie</label>
                <input type="file" class="form-control-file" id="image" name="image">

                 @error('image')

                                           <strong>{{ $message }}</strong>

                      @enderror
             </div>

             <div class="row pt-4 pb-5">
                <button id="submit" class="btn btn-dark">Dodoaj nowy post</button>
             </div>

        </div>
   </div>

    </form>
</div>
@endsection
