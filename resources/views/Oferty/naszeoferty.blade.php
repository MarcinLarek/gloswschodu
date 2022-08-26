@extends('layouts.app')
@section('content')
<div class="container">
  <div id="carouselExampleSlidesOnly" class="carousel slide" style="padding-top:100px;" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active h-100" data-interval="6000">
          <img src="/storage/6.png" class="d-block" alt="...">
          <div class="carousel-caption h-100 w-100" style="margin-left:-180px;">
            <div class="row" style="background-color:rgba(0, 0, 0, 0.5); color:#ffeb91; vertical-align: top; padding:20px;">
              <h1>Wynajmiemy grunty klasy IV, V, VI z pobliskim sąsiedztwem linii średniego napięcia na terenie całego kraju</h1>
              <div class="row" style="padding-top:40px">
                <div class="col-6">
                    <h1>ZADZWOŃ DO NAS!</h1>
                </div>
                <div class="col">
                  <h1><b style="color:orange">579 555 222</b></h1>
                </div>
                <div class="col">
                  <h1><b style="color:orange">579 555 111</b></h1>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>

<div class="row pt-3 pl-3">
  @if(Auth::check())
            <a href="{{ url('/Oferty/AddOferta') }}">
            <button type="button" class="btn btn-dark">Dodaj Nową Oferte</button>
            </a>
  @endif
</div>
@foreach($oferties->reverse()  as $oferty)

<h1 style="color:#1a1554; padding-top:70px;">{{ $oferty->title }}</h1>
<div class="row">
  <div class="col-6">
    <div class="row pt-5  ">
      <h4>{!! $oferty->description !!}</h4>
    </div>
    <div class="row">
      <div class="col-7">
        <hr style="border-color:#d69106; margin-left:-13px; padding-top:5px; padding-bottom:5px; border-width: 2px">
      </div>
    </div>
    <div class="row">
      <h5>Adres e-mail: <b style="color:#1a1554">kontakt@goldsolar.pl</b> </h5>
      <h5>Numer kontaktowy: <b style="color:#1a1554">579 555 222 lub 579 555 111</b> </h5>
    </div>
  </div>
  <div class="col-4">
    <img src="/storage/{{ $oferty->image }}" style="width:540px;height:360px" alt="">
  </div>
</div>

@endforeach




<h1 style="color:#1a1554; padding-top:70px;">Kupimy gotowe projekty farm fotowoltaicznych</h1>
<div class="row">
  <div class="col">
    <div class="row pt-5  ">
      <h4>Kupimy gotowe projekty farm fotowoltaicznych z pozwoleniem na budowę na terenie całego kraju.</h4>
    </div>
    <div class="row">
      <div class="col-7">
        <hr style="border-color:#d69106; margin-left:-13px; padding-top:5px; padding-bottom:5px; border-width: 2px">
      </div>
    </div>
    <div class="row">
      <h5>Adres e-mail: <b style="color:#1a1554">kontakt@goldsolar.pl</b> </h5>
      <h5>Numer kontaktowy: <b style="color:#1a1554">579 555 222 lub 579 555 111</b> </h5>
    </div>
  </div>
  <div class="col">
    <img src="https://goldsolar.pl/wp-content/uploads/2021/06/img-1.png" class="w-100" alt="">
  </div>
</div>




<h1 style="color:#1a1554; padding-top:100px;">Kompleksowy montaż instalacji fotowaltaicznej</h1>
<div class="row">
  <div class="col">
    <img src="https://goldsolar.pl/wp-content/uploads/2021/06/img-2.png" class="w-100" alt="">
  </div>
  <div class="col">
    <div class="row pt-5  ">
      <h4>Chcesz zaoszczędzić na energii elektrycznej Pożegnaj wysokie rachunki z prąd! Jest to możliwe dzięki fotowoltaice. Nasza firma przygotuje ofertę specjalne dla Ciebie. Przekonaj się ile możesz zaoszczędzić.</h4>
    </div>
    <div class="row">
      <div class="col-7">
        <hr style="border-color:#d69106; margin-left:-13px; padding-top:5px; padding-bottom:5px; border-width: 2px">
      </div>
    </div>
    <div class="row">
      <h5>Adres e-mail: <b style="color:#1a1554">kontakt@goldsolar.pl</b> </h5>
      <h5>Numer kontaktowy: <b style="color:#1a1554">579 555 222 lub 579 555 111</b> </h5>
    </div>
  </div>
</div>




<h1 style="color:#1a1554; padding-top:100px;">Montaż instalacji fotowoltaicznej</h1>
<div class="row">
  <div class="col">
    <div class="row pt-5  ">
      <h4>Jesteś właścicielem działki, z której nie korzystasz? Ma ona więcej niż 2ha, jest nieosłonięta przezbudynki lub drzewa oraz jest IV-V-VI klasy z pobliskim sąsiedztwem linii średniego napięcia? Nie trać czasu, napisz do nas, wynajmiemy ją od Ciebie. Dzięki panelom fotowoltaicznym nie tylko zarobisz, ale przyczynisz się również do ochrony środowiska.</h4>
    </div>
    <div class="row">
      <div class="col-7">
        <hr style="border-color:#d69106; margin-left:-13px; padding-top:5px; padding-bottom:5px; border-width: 2px">
      </div>
    </div>
    <div class="row">
      <h5>Adres e-mail: <b style="color:#1a1554">kontakt@goldsolar.pl</b> </h5>
      <h5>Numer kontaktowy: <b style="color:#1a1554">579 555 222 lub 579 555 111</b> </h5>
    </div>
  </div>
  <div class="col">
    <img src="https://goldsolar.pl/wp-content/uploads/2021/06/img-3.png" class="w-100" alt="">
  </div>
</div>




<h1 style="color:#1a1554; padding-top:100px;">Montaż paneli fotowoltaicznych. Dowiedz się ile możesz zyskać i gdzie je postawić.</h1>
<div class="row">
  <div class="col">
    <img src="https://goldsolar.pl/wp-content/uploads/2021/06/img-5.png" class="w-100" alt="">
  </div>
  <div class="col">
    <div class="row pt-5  ">
      <h4>Masz nieużytkowaną działkę i chcesz na niej zarobić? A może masz dom ichcesz zainstalować panele fotowoltaiczne? Jeśli twoja działka jest większa niż 2 ha, nieosłonięta przez budynki, drzewa i ma przynajmniej IV klasę gruntów z pobliskim sąsiedztwem linii średniego napięcia, napisz do nas. Przygotujemy ofertę specjalnie dla Ciebie. Przekonaj się ile możesz zaoszczędzić dzięki fotowoltaice.</h4>
    </div>
    <div class="row">
      <div class="col-7">
        <hr style="border-color:#d69106; margin-left:-13px; padding-top:5px; padding-bottom:5px; border-width: 2px">
      </div>
    </div>
    <div class="row">
      <h5>Adres e-mail: <b style="color:#1a1554">kontakt@goldsolar.pl</b> </h5>
      <h5>Numer kontaktowy: <b style="color:#1a1554">579 555 222 lub 579 555 111</b> </h5>
    </div>
  </div>

</div>




<h1 style="color:#1a1554; padding-top:100px;">Panele fotowoltaiczne dla rolników - ile można zyskać?<br>
Gdzie postawić panele fotowoltaiczne?</h1>
<div class="row">
  <div class="col">
    <div class="row pt-5  ">
      <h4>Jesteś rolnikiem i chciałbyś zaoszczędzić na energii elektrycznej, której ceny nieustannie rosną? Nie wiesz gdzie szukać dotacji. Zastanawiasz się czy można to odpisać od podatku rolnego? Pomożemy Ci napisać wniosek o dofinansowanie na fotowoltaikę oraz przygotujemy specjalnie dla Ciebie ofertę. Przekonaj się ile możesz zyskać. Zadzwoń i umów się na darmowy audyt.</h4>
    </div>
    <div class="row">
      <div class="col-7">
        <hr style="border-color:#d69106; margin-left:-13px; padding-top:5px; padding-bottom:5px; border-width: 2px">
      </div>
    </div>
    <div class="row">
      <h5>Adres e-mail: <b style="color:#1a1554">kontakt@goldsolar.pl</b> </h5>
      <h5>Numer kontaktowy: <b style="color:#1a1554">579 555 222 lub 579 555 111</b> </h5>
    </div>
  </div>
  <div class="col">
    <img src="https://goldsolar.pl/wp-content/uploads/2021/06/img-6.png" class="w-100" alt="">
  </div>
</div>




<h1 style="color:#1a1554; padding-top:100px;">Instalacje fotowoltaiczne dla firm - darmowa wycena.<br>
Sprawdź szczegóły</h1>
<div class="row">
  <div class="col">
    <img src="https://goldsolar.pl/wp-content/uploads/2021/06/img-7.png" class="w-100" alt="">
  </div>
  <div class="col">
    <div class="row pt-5  ">
      <h4>Umów się na darmowy audyt, wypełnij formularz lub zadzwoń. Przekonaj się ile możesz zyskać. Fotowalka dla firmy to niskie rachunki, większy prestiż i szybki zwrot inwestycji! </h4>
    </div>
    <div class="row">
      <div class="col-7">
        <hr style="border-color:#d69106; margin-left:-13px; padding-top:5px; padding-bottom:5px; border-width: 2px">
      </div>
    </div>
    <div class="row">
      <h5>Adres e-mail: <b style="color:#1a1554">kontakt@goldsolar.pl</b> </h5>
      <h5>Numer kontaktowy: <b style="color:#1a1554">579 555 222 lub 579 555 111</b> </h5>
    </div>
  </div>

</div>




<h1 style="color:#1a1554; padding-top:100px;">Instalacje fotowoltaiczne dla firm</h1>
<div class="row">
  <div class="col">
    <div class="row pt-5  ">
      <h4>Chcesz zaoszczędzić na energii elektrycznej? Pożegnaj wysokie rachunki za prąd! Jest to możliwe dzięki fotowoltaice. Nasza firma przygotuje ofertę specjalnie dla Ciebie. Przekonaj się ile możesz zaoszczędzić.</h4>
    </div>
    <div class="row">
      <div class="col-7">
        <hr style="border-color:#d69106; margin-left:-13px; padding-top:5px; padding-bottom:5px; border-width: 2px">
      </div>
    </div>
    <div class="row">
      <h5>Adres e-mail: <b style="color:#1a1554">kontakt@goldsolar.pl</b> </h5>
      <h5>Numer kontaktowy: <b style="color:#1a1554">579 555 222 lub 579 555 111</b> </h5>
    </div>
  </div>
  <div class="col">
    <img src="https://goldsolar.pl/wp-content/uploads/2021/06/img-10.png" class="w-100" alt="">
  </div>
</div>





<h1 style="color:#1a1554; padding-top:100px;">Najtańsza i najlepsza fotowoltaika - montaż i obsługa</h1>
<div class="row">
  <div class="col">
    <img src="https://goldsolar.pl/wp-content/uploads/2021/06/img-11.png" class="w-100" alt="">
  </div>
  <div class="col">
    <div class="row pt-5  ">
      <h4>Kompleksowa obsługa, doświadczony i pomocny zespół, panele wysokiej jakości. Umów się na konsultację już dziś! Rachunki za prąd zredukowane do minimum? To możliwe dzięki fotowoltaice.<br>
Zadzwoń do nas!</h4>
    </div>
    <div class="row">
      <div class="col-7">
        <hr style="border-color:#d69106; margin-left:-13px; padding-top:5px; padding-bottom:5px; border-width: 2px">
      </div>
    </div>
    <div class="row">
      <h5>Adres e-mail: <b style="color:#1a1554">kontakt@goldsolar.pl</b> </h5>
      <h5>Numer kontaktowy: <b style="color:#1a1554">579 555 222 lub 579 555 111</b> </h5>
    </div>
  </div>
</div>




<h1 style="color:#1a1554; padding-top:100px;">Wynajmiemy grunty klas IV-V-VI z pobliskim sąsiedztwem linii średniego napięcia</h1>
<div class="row">
  <div class="col">
    <div class="row pt-5  ">
      <h4>Wynajmiemy grunty klas IV-V-VI z pobliskim sąsiedztwem linii średniego napięcia na terenie całego kraju. Zapewnij sobie pewny zysk na lata, dzięki umowie dzierżawy na 25 lat lub dłużej.</h4>
    </div>
    <div class="row">
      <div class="col-7">
        <hr style="border-color:#d69106; margin-left:-13px; padding-top:5px; padding-bottom:5px; border-width: 2px">
      </div>
    </div>
    <div class="row">
      <h5>Adres e-mail: <b style="color:#1a1554">kontakt@goldsolar.pl</b> </h5>
      <h5>Numer kontaktowy: <b style="color:#1a1554">579 555 222 lub 579 555 111</b> </h5>
    </div>
  </div>
  <div class="col">
    <img src="https://goldsolar.pl/wp-content/uploads/2021/06/img-12.png" class="w-100" alt="">
  </div>
</div>




<h1 style="color:#1a1554; padding-top:100px;">Dzierżawa gruntu pod farmy PV - Wynajmij grunt lub działkę</h1>
<div class="row pb-5">
  <div class="col">
    <img src="https://goldsolar.pl/wp-content/uploads/2021/06/img-13.png" class="w-100" alt="">
  </div>
  <div class="col">
    <div class="row pt-5  ">
      <h4>Wynajmiemy grunty klas IV, V, VI z pobliskim sąsiedztwem linii średniego napięcia na terenie całego kraju. Zapewniamy długoterminowe umowy z bardzo dobrym wynagrodzeniem.</h4>
    </div>
    <div class="row">
      <div class="col-7">
        <hr style="border-color:#d69106; margin-left:-13px; padding-top:5px; padding-bottom:5px; border-width: 2px">
      </div>
    </div>
    <div class="row">
      <h5>Adres e-mail: <b style="color:#1a1554">kontakt@goldsolar.pl</b> </h5>
      <h5>Numer kontaktowy: <b style="color:#1a1554">579 555 222 lub 579 555 111</b> </h5>
    </div>
  </div>

</div>

</div>
@endsection
