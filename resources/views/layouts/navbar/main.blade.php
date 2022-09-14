<nav class="navbar-expand-xxl sticky-top bg-section">
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"><img class="image-fluid" src="/storage/hamburrger.png" alt=""></span>
  </button> <b class="navbar-toggler"> <a href="{{route('index')}}">GłosWschodu.org</a> </b>
    <div class="collapse navbar-collapse" id="navbarToggleExternalContent">
        <ul class="navbar-nav navbar-main-nav navbar-section mx-auto">
          @foreach($sections as $section)
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle navbaritem-section" href="" role="button" data-bs-toggle="dropdown">
                    {{$section->section}}
                </a>
                <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                  @foreach($section->category as $category)
                  @if($category->parent_category_id == null)
                  <a class="dropdown-item" href="{{ route('post.category', ['category' => $category, 'section' => $category->getsection()]) }}">
                      {{$category->category}}
                  </a>
                  @endif
                  @endforeach
                </div>
            </li>
          @endforeach
        </ul>
    </div>
</nav>

<div class="row">

</div>

@if(isset($check))
<div class="container">

  <div class="row mt-2 d-none d-sm-block d-md-block">
    <div class="col-12 headerimage w-100" style="background-image:  url('/storage/naglowek.jpg');">
      <a href="{{route('index')}}" class="w-50 h-100"></a>
      <div class="row">
        <div class="col-6">

        </div>
        <div class="col-6 d-flex  align-middle align-items-center" style="height: 150px;">
          <div class="bg-danger d-inline-flex align-items-center text-light">
            <a class="p-1" style="padding-right: 10px; padding-left: 10px" href="{{route('index')}}" >STRONA GŁÓWNA</a> |
            <a class="p-1" style="padding-right: 10px; padding-left: 10px" href="#">O PROJEKCIE</a> |
            <a class="p-1" style="padding-right: 10px; padding-left: 10px" href="#">KARIERA</a> |
            <a class="p-1" style="padding-right: 10px; padding-left: 10px" href="#">O NAS</a>
          </div>
        </div>
      </div>
  </div>
</div>

  <nav class="navbar-expand-sm bg-section mt-2 mb-3">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent2" aria-controls="navbarToggleExternalContent2" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"><img class="image-fluid" src="/storage/hamburrger.png" alt=""></span>
      </button> <b class="navbar-toggler"> Państwa </b>

    <div class="collapse navbar-collapse" id="navbarToggleExternalContent2">
        <ul class="navbar-nav navbar-section mx-auto">
          @foreach($countries as $country)

          <li class="nav-item ">
            <a class="nav-link navbaritem-section" href="{{ route('post.country', ['country' => $country]) }}" role="button">
                {{$country->country}}
            </a>
          </li>

          @endforeach
        </ul>
    </div>
  </nav>
</div>
@else

<div class="container">

  <div class="row mt-2">
    <div class="col-12 d-flex  justify-content-between headerimage w-100" style="background-image:  url('/storage/naglowek.jpg');">
      <a href="{{route('index')}}" class="w-100 h-100"></a>
  </div>
</div>

  <nav class="navbar-expand-sm bg-section mt-2 mb-3">
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav navbar-section mx-auto">
          @foreach($countries as $country)

          <li class="nav-item ">
            <a class="nav-link navbaritem-section" href="{{ route('post.section.country', ['country' => $country, 'section' => $serachsection]) }}" role="button">
                {{$country->country}}
            </a>
          </li>

          @endforeach
        </ul>
    </div>
  </nav>
</div>

@endif
