<header class="mob">
  <div class="header-after admin" >
    <a class="logo-link" href="{{ url('/') }}">
      <img src="{{URL::to('/images')}}/IKDIENA_LOGO.svg" alt="IKDIENA_LOGO">
    </a>
    <div class="flex-container-header-desktop">
      <div class="after-header-mobile-element">
        <div class="name_day">
          <?php echo  $tags  ?>
        </div>
        <form action="/search" method="POST" role="search">
          {{ csrf_field() }}
          <div class="search">
            <div class="input-group">
              <input type="text" class="form-control" name="q" placeholder="Meklēt"> 
              <span class="input-group-btn">
                <button type="submit" class="btn btn-default">
                  <span class="glyphicon glyphicon-search">
                  </span>
                </button>
              </span>
            </div>
          </div>
        </form>
        <ul class="auth-user">
          <!-- Authentication Links -->
          @guest
          <li>
            <a href="{{ route('login') }}">Ienākt
            </a>
          </li>
          <li>
            <a href="{{ route('register') }}">Reģistrēties
            </a>
          </li>
          @else
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
              {{ Auth::user()->name }} 
              <span class="caret">
              </span>
            </a>
            <ul class="dropdown-menu" role="menu">
              <li>
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                  Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
                </form>
              </li>
            </ul>
          </li>
          @endguest
        </ul>
      </div>
      <ul class="auth-user mobile">
        <!-- Authentication Links -->
        @guest
        <li>
          <a href="{{ route('login') }}">Ienākt
          </a>
        </li>
        <li>
          <a href="{{ route('register') }}">Reģistrēties
          </a>
        </li>
        @else
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
            {{ Auth::user()->name }} 
            <span class="caret">
            </span>
          </a>
          <ul class="dropdown-menu loginsystem" role="menu">
            <li>
              <a href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                Logout
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
              </form>
            </li>
          </ul>
        </li>
        @endguest
      </ul>
    </div> 
  </div>
  <div id="menu-wrap" class="menu-wrap-overlay">
    <div class="menu-responsive">
      <div id='menu-icon'>
      </div>
      <div class="logo-header">
        <a class="logo-link" href="{{ url('/') }}">
          <img src="{{URL::to('/images')}}/IKDIENA_LOGO.svg" alt="IKDIENA_LOGO">
        </a>
      </div>
    </div>
    <ul class="menu">
      @guest
      <div class="auth-block-inMenu">
        <a href="{{ route('login') }}">Ienākt
        </a>
        </li>
      <a href="{{ route('register') }}">Reģistrēties
      </a>
      </div>
    @else
    <ul  >
      <li class="loginsystem">
        <div  class="user-name">{{ Auth::user()->name }}
        </div>
        <div class="link-logout">
          <a href="{{ route('logout') }}"
             onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
            Iziet 
          </a>
        </div>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          {{ csrf_field() }}
        </form>
      </li>
    </ul>
    @endguest
    <div class="menu-element-mobile">
      <div class="responsive-element-mobile">
        <form action="/search" method="POST" role="search">
          {{ csrf_field() }}
          <div class="search">
            <div class="input-group">
              <input type="text" class="form-control" name="q" placeholder="Meklēt"> 
              <span class="input-group-btn">
                <button type="submit" class="btn btn-default">
                  <span class="glyphicon glyphicon-search">
                  </span>
                </button>
              </span>
            </div>
          </div>
        </form>
      </div>
    </div>
    <li>
      <a href="{{route('admin.index')}}">Stavokļa panēlis
      </a>
    </li>
    <li>
      <a href="{{route('admin.category.index')}}">Kategorijas
      </a>
    </li>
    <li>
      <a href="{{route('admin.article.index')}}">Raksti
      </a>
    </li>
    <li>
      <a href="{{route('admin.user_managment.user.index')}}">Lietotāji
      </a>
    </li>
    </ul>
  </div>
</header>
<div class="container p-0  header-desktop-fixed">
  <header class="deskt">
    <div class="header-after">
      <a class="logo-link" href="{{ url('/') }}">
        <img src="{{URL::to('/images')}}/IKDIENA_LOGO.svg" alt="IKDIENA_LOGO">
      </a>
      <div class="flex-container-header-desktop">
        <div class="after-header-mobile-element">
          <form action="/search" method="POST" role="search">
            {{ csrf_field() }}
            <div class="search">
              <div class="input-group">
                <input type="text" class="form-control" name="q" placeholder="Meklēt"> 
                <span class="input-group-btn">
                  <button type="submit" class="btn btn-default">
                    <span class="glyphicon glyphicon-search">
                    </span>
                  </button>
                </span>
              </div>
            </div>
          </form>
          <ul class="auth-user">
            <!-- Authentication Links -->
            @guest
            <li>
              <a href="{{ route('login') }}">Ienākt
              </a>
            </li>
            <li>
              <a href="{{ route('register') }}">Reģistrēties
              </a>
            </li>
            @else
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                {{ Auth::user()->name }} 
                <span class="caret">
                </span>
              </a>
              <ul class="dropdown-menu" role="menu">
                <li>
                  <a href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                    Logout
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                  </form>
                </li>
              </ul>
            </li>
            @endguest
          </ul>
        </div>
        <ul class="auth-user mobile">
          <!-- Authentication Links -->
          @guest
          <li>
            <a href="{{ route('login') }}">Ienākt
            </a>
          </li>
          <li>
            <a href="{{ route('register') }}">Reģistrēties
            </a>
          </li>
          @else
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
              {{ Auth::user()->name }} 
              <span class="caret">
              </span>
            </a>
            <ul class="dropdown-menu" role="menu">
              <li>
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                  Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
                </form>
              </li>
            </ul>
          </li>
          @endguest
        </ul>
      </div> 
    </div>
    <div id="menu-wrap">
      <div class="menu-responsive">
      </div>
      <ul class="menu menu-hover-border">
        <div class="menu-element-mobile">
          <div class="responsive-element-mobile">
            <form action="/search" method="POST" role="search">
              {{ csrf_field() }}
              <div class="search">
                <div class="input-group">
                  <input type="text" class="form-control" name="q" placeholder="Meklēt"> 
                  <span class="input-group-btn">
                    <button type="submit" class="btn btn-default">
                      <span class="glyphicon glyphicon-search">
                      </span>
                    </button>
                  </span>
                </div>
              </div>
            </form>
          </div>
        </div>
        <li>
          <a href="{{route('admin.index')}}">Stavokļa panēlis
          </a>
        </li>
        <li>
          <a href="{{route('admin.category.index')}}">Kategorijas
          </a>
        </li>
        <li>
          <a href="{{route('admin.article.index')}}">Raksti
          </a>
        </li>
        <li>
          <a href="{{route('admin.user_managment.user.index')}}">Lietotāji
          </a>
        </li>
      </ul>
    </div>
  </header>
</div>
