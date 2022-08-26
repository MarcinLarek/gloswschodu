@extends('layouts.app')
@section('content')
<div class="container">
<center> <h1 class="pt-5 pb-5">Skontaktuj się z nami już dziś!</h1> </center>
<div class="row pb-5">
  <div class="col">
    <center> <h3>DANE FIRMY</h3> </center>
  </div>
  <div class="col">

  </div>
</div>

<div class="row">
<div class="col-2">
  <p class="pb-2"> <h5>Nazwa:</h5> </p>
  <p class="pb-2"> <h5>Adres:</h5> </p>
  <p class="pb-2"> <h5>Numer kontaktowy:</h5> </p>
  <p class="pb-2"> <h5>REGON:</h5> </p>
  <p class="pb-2"> <h5>Numer KRS:</h5> </p>
  <p class="pb-2"> <h5>NIP:</h5> </p>
  <p class="pb-2"> <h5>E-MAIL:</h5> </p>
</div>
<div class="col-4">
  <p class="pb-2"> <h5>Gold Solar – PL SP. Z.O.O.</h5> </p>
  <p class="pt-4"> Poznań, 60-692, Adama Tomaszewskiego 11 </p>
  <p class="pb-2"> <h5>579 555 111, 579 555 222</h5> </p>
  <p class="pb-2"> <h5>38652732000000</h5> </p>
  <p class="pb-2"> <h5>0000849970</h5> </p>
  <p class="pb-2"> <h5>7773362743</h5> </p>
  <p class="pb-2"> <h5>kontakt@goldsolar.pl</h5> </p>
</div>
<div class="col-4">
  <h5><b style="color:#fcb500">Dane kontaktowe:</b><b style="color:#fc0000">*</b></h5> <br>
  <p>
    <input type="text" class="w-25" value="Imie">
    <input type="text" class="w-25" value="Nazwisko"><br>
  </p>
  <p>
    <input type="text" class="w-100" value="E-Mail">
  </p>
  <p>
    <textarea class="textarea w-100 " value="tresc"></textarea>
  </p>
  <p>
      <button type="submit" name="button"> - </button>
  </p>
</div>
</div>

<div class="row pb-5">
  <div class="col">
    <center> <h3>ODDZIAŁ FIRMY</h3> </center>
  </div>
  <div class="col">

  </div>
</div>


<div class="row pb-5">
<div class="col-1">
  <p class="pb-2"> <h5>Adres:</h5> </p>
</div>
<div class="col-2">
  <p class="pt-2"> <h5>Koło, 62-600</h5> </p>
  <p class=""> <h5>Poległych 1</h5> </p>

</div>
<div class="col-3">
<img src="https://goldsolar.pl/wp-content/uploads/2021/05/oddzial_goldsolar-1024x576.jpg" class="w-100" alt="">
</div>
<div class="col-4">
  <script type="text/javascript">
  function initMap() {
    // The location of Uluru
    const uluru = { lat: -25.344, lng: 131.036 };
    // The map, centered at Uluru
    const map = new google.maps.Map(document.getElementById("map"), {
      zoom: 4,
      center: uluru,
    });
    // The marker, positioned at Uluru
    const marker = new google.maps.Marker({
      position: uluru,
      map: map,
    });
  }
  </script>


  <div id="map" style="height: 400px; width: 600px;"></div>
  <script
      src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap&libraries=&v=weekly"
      async
    ></script>
</div>
</div>




</div>
@endsection
