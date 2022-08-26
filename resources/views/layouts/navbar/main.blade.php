<nav class="navbar-expand-xxl bg-section">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav navbar-main-nav navbar-section mx-auto">
          @foreach($sections as $section)
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle navbaritem-section" href="" role="button" data-bs-toggle="dropdown">
                    {{$section->section}}
                </a>
                <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route( 'post.index', ['section' => $section] ) }}">
                      Strona główna
                  </a>
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
