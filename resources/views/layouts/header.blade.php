<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript">
</script>
<header class="mob">
  <div class="header-after">
    <a class="logo-link" href="{{ url('/') }}">
      <img src="{{URL::to('/images')}}/IKDIENA_LOGO.svg" alt="IKDIENA_LOGO">
    </a>
    <div class="flex-container-header-desktop">
      <div class="after-header-mobile-element">
        <div class="now-date">
          <?php echo  date('d.m.Y');  ?>
        </div>
        <div class="weather">
          
        </div>
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

          <?php $user=Auth::user();  ?>
           <span class="ajax-login-first"><li><?php var_dump($user); ?> </li></span>

          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
               <span class="ajax-login-third"> <span class="login">{{ Auth::user()->name }} </span></span>
              <span class="caret">
              </span>
            </a>
            <ul class="dropdown-menu" role="menu">
              <li>
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                  Iziet
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
                </form>
              </li>

                <?php 
                $user=Auth::user();
                
                foreach($user->roles as $role){
                if($role->name == 'writer'){ ?>
                    <li><a href="{{URL::to('/writer')}}">Rakstnieka kabinēts</a></li>
                    <li><a href="{{URL::to('/home')}}">Personīgais kabinēts</a></li>
                <?php } else if ($role->name == 'admin') { ?>
                    <li><a href="{{URL::to('/admin')}}">Administratora kabinēts</a></li>
                    <li><a href="{{URL::to('/home')}}">Personīgais kabinēts</a></li>
                 <?php } else if ($role->name == 'registered') { ?>
                    <li><a href="{{URL::to('/home')}}">Personīgais kabinēts</a></li>
                <?php }}?>

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
         <?php $user=Auth::user();  
           ?>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
             <span class="ajax-login-fourth"> <span class="login">{{ Auth::user()->name }} </span></span>
            <span class="caret">
            </span>
          </a>
          <ul class="dropdown-menu loginsystem" role="menu">
            <li>
              <a href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                Iziet
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
              </form>
            </li>

                <?php 
                $user=Auth::user();
                foreach($user->roles as $role){
                if($role->name == 'writer'){ ?>
                    <li><a href="{{URL::to('/writer')}}">Rakstnieka kabinēts</a></li>
                    <li><a href="{{URL::to('/home')}}">Personīgais kabinēts</a></li>
                <?php } else if ($role->name == 'admin') { ?>
                    <li><a href="{{URL::to('/admin')}}">Administratora kabinēts</a></li>
                    <li><a href="{{URL::to('/home')}}">Personīgais kabinēts</a></li>
               <?php } else if ($role->name == 'registered') { ?>
                    <li><a href="{{URL::to('/home')}}">Personīgais kabinēts</a></li>
                <?php }}?>
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
      <div class="now-date">
        <?php echo  date('d.m.Y');  ?>
      </div>
           <div class="weather">
          <?php 
            $json_result = file_get_contents ("https://api.darksky.net/forecast/6bc168971902de3abd9d59647351f769/56.949650,24.105186?units=si");
            $obj=json_decode($json_result,true);
            $keys = array_keys($obj);
            $temperature = $obj["currently"]["temperature"];
            $icon = $obj["currently"]["icon"];
            $weather_array = array("clear-day", "clear-night", "rain", "snow", "sleet", "wind", "fog", "cloudy", "partly-cloudy-day", "partly-cloudy-night");
            if ($icon == 'rain') {
            ?> 
                      <img src="{{URL::to('/images')}}/Group_788.png" alt="rain"> 
                      <?php //OK
            } else if ($icon == 'clear-day') {
            ?> 
                      <img src="{{URL::to('/images')}}/sun_clear_day.svg" alt="clear-day"> 
                      <?php //OK
            } else if ($icon == 'clear-night'){
            ?> 
                      <img src="{{URL::to('/images')}}/Group787.png" alt="clear-night"> 
                      <?php // OK
            } else if ($icon == 'snow') {
            ?> 
                      <img src="{{URL::to('/images')}}/Group786.png" alt="snow">  
                      <?php // OK 
            }else if ($icon == 'sleet') {
            ?> 
                      <img src="{{URL::to('/images')}}/sleet.svg" alt="sleet"> 
                      <?php //OK
            }else if ($icon == 'wind') {
            ?> 
                      <img src="{{URL::to('/images')}}/Group786.png" alt="wind"> 
                      <?php 
            }else if ($icon == 'fog') {
            ?> 
                      <img src="{{URL::to('/images')}}/Group786.png" alt="fog"> 
                      <?php 
            }else if ($icon == 'cloudy') {
            ?> 
                      <img src="{{URL::to('/images')}}/Group778.png" alt="cloudy"> 
                      <?php // OK
            }else if ($icon == 'partly-cloudy-day') {
            ?> 
                      <img src="{{URL::to('/images')}}/Group789.png" alt="partly-cloudy-day"> 
                      <?php //ok
            }else if ($icon == 'partly-cloudy-night') {
            ?> 
                      <img src="{{URL::to('/images')}}/Group779.png" alt="partly-cloudy-night"> 
                      <?php // OK
            }
            $temperature_round = round($temperature);
            ?>
          <span>{{$temperature_round}} °C 
          </span>

        </div>
        
      <div class="name_day">
        <?php echo  $tags  ?>
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
     <?php $user=Auth::user();  ?>
           
    <ul >
      <li class="loginsystem">

        <div class="user-name"><span class="ajax-login-five"> <span class="login">{{ Auth::user()->name }} </span></span>
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

        <?php 
        $user=Auth::user();
        foreach($user->roles as $role){
        if($role->name == 'writer'){ ?>
            <li style="text-align: center;"><a href="{{URL::to('/writer')}}">Rakstnieka kabinēts</a></li>
            <li><a href="{{URL::to('/home')}}">Personīgais kabinēts</a></li>
        <?php } else if ($role->name == 'admin') { ?>
            <li style="text-align: center;"><a href="{{URL::to('/admin')}}">Administratora kabinēts</a></li>
            <li><a href="{{URL::to('/home')}}">Personīgais kabinēts</a></li>
        <?php } else if ($role->name == 'registered') { ?>
                    <li><a href="{{URL::to('/home')}}">Personīgais kabinēts</a></li>
                <?php }}?>
    </ul>
    @endguest
    <div class="menu-element-mobile">
      <div class="responsive-element-mobile">
        <form action="/search" method="POST" role="search">
          {{ csrf_field() }}
          <div class="search">
            <div class="input-group">
              <input type="text" class="form-control search-input" name="q" placeholder="Meklēt" value="{{ $q }}"> 
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
    @include('layouts.top_menu', ['categories' => $categories])
    </ul>
  </div>
</header>
<div class="container p-0 header-desktop-fixed">
  <header class="deskt">
    <div class="header-after">
      <a class="logo-link" href="{{ url('/') }}">
        <img src="{{URL::to('/images')}}/IKDIENA_LOGO.svg" alt="IKDIENA_LOGO">
      </a>
       <div class="flex-container-header-desktop">
        <div class="after-header-mobile-element">
          <div class="now-date">
            <?php echo  date('d.m.Y');  ?>
          </div>
         <div class="weather">
        <?php 
          $json_result = file_get_contents ("https://api.darksky.net/forecast/6bc168971902de3abd9d59647351f769/56.949650,24.105186?units=si");
          $obj=json_decode($json_result,true);
          $keys = array_keys($obj);
          $temperature = $obj["currently"]["temperature"];
          $icon = $obj["currently"]["icon"];
          $weather_array = array("clear-day", "clear-night", "rain", "snow", "sleet", "wind", "fog", "cloudy", "partly-cloudy-day", "partly-cloudy-night");
          if ($icon == 'rain') {
        ?> 
          <img src="{{URL::to('/images')}}/Group_788.png" alt="rain"> 
          <?php //OK
            } else if ($icon == 'clear-day') {
            ?> 
                    <img src="{{URL::to('/images')}}/sun_clear_day.svg" alt="clear-day"> 
                    <?php //OK
            } else if ($icon == 'clear-night'){
            ?> 
                    <img src="{{URL::to('/images')}}/Group787.png" alt="clear-night"> 
                    <?php // OK
            } else if ($icon == 'snow') {
            ?> 
                    <img src="{{URL::to('/images')}}/Group786.png" alt="snow">  
                    <?php // OK 
            }else if ($icon == 'sleet') {
            ?> 
                    <img src="{{URL::to('/images')}}/sleet.svg" alt="sleet"> 
                    <?php //OK
            }else if ($icon == 'wind') {
            ?> 
                    <img src="{{URL::to('/images')}}/Group786.png" alt="wind"> 
                    <?php 
            }else if ($icon == 'fog') {
            ?> 
                    <img src="{{URL::to('/images')}}/Group786.png" alt="fog"> 
                    <?php 
            }else if ($icon == 'cloudy') {
            ?> 
                    <img src="{{URL::to('/images')}}/Group778.png" alt="cloudy"> 
                    <?php // OK
            }else if ($icon == 'partly-cloudy-day') {
            ?> 
                    <img src="{{URL::to('/images')}}/Group789.png" alt="partly-cloudy-day"> 
                    <?php //ok
            }else if ($icon == 'partly-cloudy-night') {
            ?> 
                    <img src="{{URL::to('/images')}}/Group779.png" alt="partly-cloudy-night"> 
                    <?php // OK
            }
            $temperature_round = round($temperature);
          ?>
        <span>{{$temperature_round}} °C 
        </span>
      </div>


        


          <div class="name_day">
            <?php echo  $tags  ?>
          </div>



          <form action="/search" method="POST" role="search">
            {{ csrf_field() }}
            <div class="search">
              <div class="input-group">
                <input type="text" class="form-control search-input" name="q"  placeholder="Meklēt" id="search" value="{{ $q }}"> 
                <span class="input-group-btn">
                  <button type="submit" class="btn btn-default">
                    <span class="glyphicon glyphicon-search">
                    </span>
                  </button>
                </span>

              </div>
                  <div id="txtHint" class="select-from-input" style="padding-top:50px; text-align:center;" ></div>
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
                <span class="ajax-login-six"> <span class="login">{{ Auth::user()->name }} </span></span>
                <span class="caret">
                </span>
              </a>
              <ul class="dropdown-menu" role="menu">
                <li>
                  <a href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                    Iziet
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                  </form>
                </li>

                <?php 
                $user=Auth::user();
                foreach($user->roles as $role){
                if($role->name == 'writer'){ ?>
                    <li><a href="{{URL::to('/writer')}}">Rakstnieka kabinēts</a></li>
                    <li><a href="{{URL::to('/home')}}">Personīgais kabinēts</a></li>
                <?php } else if ($role->name == 'admin') { ?>
                    <li><a href="{{URL::to('/admin')}}">Administratora kabinēts</a></li>
                    <li><a href="{{URL::to('/home')}}">Personīgais kabinēts</a></li>
                <?php } else if ($role->name == 'registered') { ?>
                    <li><a href="{{URL::to('/home')}}">Personīgais kabinēts</a></li>
                <?php }}?>

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
               <span class="ajax-login-second"> <span class="login">{{ Auth::user()->name }} </span></span>
              <span class="caret">
              </span>
            </a>
            <ul class="dropdown-menu" role="menu">
              <li>
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                  Iziet
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
                </form>
              </li>

                <?php 
                $user=Auth::user();
                var_dump($user);
                foreach($user->roles as $role){
                if($role->name == 'writer'){ ?>
                    <li><a href="{{URL::to('/writer')}}">Rakstnieka kabinēts</a></li>
                    <li><a href="{{URL::to('/home')}}">Personīgais kabinēts</a></li>
                <?php } else if ($role->name == 'admin') { ?>
                    <li><a href="{{URL::to('/admin')}}">Administratora kabinēts</a></li>
                    <li><a href="{{URL::to('/home')}}">Personīgais kabinēts</a></li>
                <?php } else if ($role->name == 'registered') { ?>
                    <li><a href="{{URL::to('/home')}}">Personīgais kabinēts</a></li>
                <?php }}?>

            </ul>
          </li>
          @endguest
        </ul>
      </div> 
    </div>
    <div id="menu-wrap">
      <div class="menu-responsive">
        <div class="now-date">
          <?php echo  date('d.m.Y');  ?>
        </div>
         <div class="weather">
            <?php 
                $json_result = file_get_contents ("https://api.darksky.net/forecast/6bc168971902de3abd9d59647351f769/56.949650,24.105186?units=si");
                $obj=json_decode($json_result,true);
                $keys = array_keys($obj);
                $temperature = $obj["currently"]["temperature"];
                $icon = $obj["currently"]["icon"];
                $weather_array = array("clear-day", "clear-night", "rain", "snow", "sleet", "wind", "fog", "cloudy", "partly-cloudy-day", "partly-cloudy-night");
                if ($icon == 'rain') {
                ?> 
                            <img src="{{URL::to('/images')}}/Group_788.png" alt="rain"> 
                            <?php //OK
                } else if ($icon == 'clear-day') {
                ?> 
                            <img src="{{URL::to('/images')}}/sun_clear_day.svg" alt="clear-day"> 
                            <?php //OK
                } else if ($icon == 'clear-night'){
                ?> 
                            <img src="{{URL::to('/images')}}/Group787.png" alt="clear-night"> 
                            <?php // OK
                } else if ($icon == 'snow') {
                ?> 
                            <img src="{{URL::to('/images')}}/Group786.png" alt="snow">  
                            <?php // OK 
                }else if ($icon == 'sleet') {
                ?> 
                            <img src="{{URL::to('/images')}}/sleet.svg" alt="sleet"> 
                            <?php //OK
                }else if ($icon == 'wind') {
                ?> 
                            <img src="{{URL::to('/images')}}/Group786.png" alt="wind"> 
                            <?php 
                }else if ($icon == 'fog') {
                ?> 
                            <img src="{{URL::to('/images')}}/Group786.png" alt="fog"> 
                            <?php 
                }else if ($icon == 'cloudy') {
                ?> 
                            <img src="{{URL::to('/images')}}/Group778.png" alt="cloudy"> 
                            <?php // OK
                }else if ($icon == 'partly-cloudy-day') {
                ?> 
                            <img src="{{URL::to('/images')}}/Group789.png" alt="partly-cloudy-day"> 
                            <?php //ok
                }else if ($icon == 'partly-cloudy-night') {
                ?> 
                            <img src="{{URL::to('/images')}}/Group779.png" alt="partly-cloudy-night"> 
                            <?php // OK
                }
                $temperature_round = round($temperature);
                ?>
            <span>{{$temperature_round}} °C 
            </span>
          </div>
        <div class="name_day">
          <?php echo  $tags  ?>
        </div>
      </div>
      <ul class="menu menu-hover-border">
        <div class="menu-element-mobile">
          <div class="responsive-element-mobile">
            <form action="/search" method="POST" role="search">
              {{ csrf_field() }}
              <div class="search">
                <div class="input-group">
                  <input type="text" class="form-control search-input" name="q" placeholder="Meklēt" value="{{ $q }}"> 
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
        @include('layouts.top_menu', ['categories' => $categories])
      </ul>
    </div>
  </header>
</div>

<div id="txtHint" class="title-color" style="padding-top:50px; text-align:center;" ></div>

<script>
$(document).ready(function(){
   $("#search").keyup(function(){
       var str=  $("#search").val();
       console.log(str);
       if ($("#search").is(":focus")) {

           if(str == "") {
           }else {
                   $.get( "{{ url('demos/livesearch?id=') }}"+str, function( data ) {
                      console.log(data);
                       $( "#txtHint" ).html( data );  
                });
           }
           
        }
   });  
}); 
</script>