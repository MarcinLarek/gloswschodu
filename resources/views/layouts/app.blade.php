<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>GoldSolar</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="owlcarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="owlcarousel/owl.theme.default.min.css">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="jquery.min.js"></script>
    <script src="owlcarousel/owl.carousel.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/classic/ckeditor.js"></script>

    <!-- Fonts -->

    <!--header -->
    <div class="container" style="height:130px">
      <div class="row">
        <div class="col-7">
          <a class="navbar-brand" href="{{ url('/') }}">
            <img src="https://goldsolar.pl/wp-content/uploads/2020/10/LOGO-removebg-preview-1-1-e1604145920615.png">
          </a>
        </div>

        <div class="col">

          <h5
          style="color:darkblue"
          class="pt-3 ">
          Numer Kontaktowy: 579 555 111 · 579 555 222
        </h5>

        </div>
      </div>
    </div>



        <nav class="navbar sticky-top navbar-expand navbar-light" style="background-color: #21201e; border-top-color:#e6b800; border-top-width:5px;">
            <div class="container">
              <div class ="collapse navbar-collapse">
              <ul class="navbar-nav">
                 <li class="nav-item">
                   <a class="nav-link active" href="{{ url('/') }}" style="color: white;">STRONA GŁÓWNA</a>
                 </li>
                 <li class="nav-item">
                   <a class="nav-link active" href="{{ url('/Aktualnosci/aktualnosci') }}" style="color: white;">AKTUALNOCI</a>
                 </li>
                 <li class="nav-item">
                  <a class="nav-link active" href="{{ url('/BazaWiedzy/bazawiedzy') }}" style="color: white;">BAZA WIEDZY</a>
                </li>


                <li class="nav-item dropdown">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{ url('/instalacje') }}" role="button" data-toggle="dropdown"  style="color: white;">INSTALACJE</a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="{{ url('/fotowoltaikadladomu') }}">
                      <img src="https://goldsolar.pl/wp-content/uploads/2020/07/dla-domu-bez-etykiety-1024x792.jpg" style="width:170px; height:130px;" alt=""><br>
                      Fotowoltaika dla domu</a></li>
                    <li><a class="dropdown-item" href="{{ url('/fotowoltaikadlafirmy') }}">
                      <img src="https://goldsolar.pl/wp-content/uploads/2020/07/dla-firmy-bez-etykiety.jpg" style="width:170px; height:130px;" alt=""><br>
                      Fotowoltaika dla firm</a></li>
                    <li><a class="dropdown-item" href="{{ url('/fotowoltaikadlarolnika') }}">
                      <img src="https://goldsolar.pl/wp-content/uploads/2020/07/crop-0-0-696-640-0-dla-rolnika-e1604104283275.jpg" style="width:170px; height:130px;" alt=""><br>
                      Fotowoltaika dla rolnika</a></li>
                  </ul>

                </li>


                <li class="nav-item">
                  <a class="nav-link active" href="{{ url('/Oferty/naszeoferty') }}" style="color: white;">NASZE OFERTY</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" href="{{ url('/onas') }}" style="color: white;">O NAS</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" href="{{ url('/kalkulator') }}" style="color: white;">KALKULATOR</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" href="{{ url('/naszerealizacje') }}" style="color: white;">NASZE REALIZACJE</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" href="{{ url('/kontakt') }}" style="color: white;">KONTAKT</a>
                </li>
                @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}" style="color: white;">{{ __('LOGIN') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}" style="color: white;">{{ __('REGISTER') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" style="color: white;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                  @endguest
              </ul>
            </div>
            </div>
        </nav>


</head>

<body>



      @yield('content')






<footer>
<div class="container-fluid" style="background-color: #292a33; color: white; height:270px;" >
  <div class="row pt-4">

    <div class="col-4" style="padding-left: 400px">
      <h4 class="pt-1 pb-1 mt-4 mb-3" style="background-color:#e6b800; text-indent: 10px;">Zamówienia</h4>
    </div>

    <div class="col-5" style="padding-left: 559px">
      <h4 class="pt-1 pb-1 mt-4 mb-3" style="background-color:#e6b800; text-indent: 10px;">Informacje</h4>
    </div>

  </div>


  <div class="row">

    <div class="col-5" style="padding-left: 400px">
      <hr style="border-color:#e6b800; margin-top: -16px;">
       <h6> <a href="{{ url('/Regulamin') }}" style="color:white; text-decoration:none"> Regulamin </a> </h6>
       <hr style="border-color:#474747; margin: 0px; margin-bottom: 5px;">
       <h6> <a href="{{ url('/kosztyisposobydostawy') }}" style="color:white; text-decoration:none"> Koszty i sposoby dostawy </a> </h6>
       <hr style="border-color:#474747; margin: 0px; margin-bottom: 5px;">
       <h6> <a href="{{ url('/sposobyplatnosci') }}" style="color:white; text-decoration:none"> Sposoby płatności </a> </h6>
       <hr style="border-color:#474747; margin: 0px; margin-bottom: 5px;">
       <h6> <a href="{{ url('/prawoodstapieniaodumowy') }}" style="color:white; text-decoration:none"> Prawo odstąpienia od umowy </a> </h6>
       <hr style="border-color:#474747; margin: 0px; margin-bottom: 5px;">
    </div>

    <div class="col-5" style="padding-left: 400px">
      <hr style="border-color:#e6b800; margin-top: -16px;">
       <h6> <a href="{{ url('/onas') }}" style="color:white; text-decoration:none"> O firmie </a> </h6>
       <hr style="border-color:#474747; margin: 0px;">
       <h6> <a href="{{ url('/kontakt') }}" style="color:white; text-decoration:none"> Kontakt </a> </h6>
       <hr style="border-color:#474747; margin: 0px;">
       <h6> <a href="{{ url('/politykaprywatnosci') }}" style="color:white; text-decoration:none"> Polityka prywatności </a> </h6>
       <hr style="border-color:#474747; margin: 0px;">
    </div>

  </div>
</div>

</footer>
</body>
</html>
