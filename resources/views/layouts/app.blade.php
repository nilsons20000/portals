<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
@include('layouts.head')
<body>
    <div id="app">
        @include('layouts.header')
      <div class="site-content">
        @yield('content')
      </div>
    </div>
    @include('layouts.footer')
</body>
</html>

<a href="#" class="scrollup" id="social-float" >
  <svg xmlns="http://www.w3.org/2000/svg" width="43.389" height="43.389" viewBox="0 0 43.389 43.389">
    <g id="Group_770" data-name="Group 770" transform="translate(-139 -445)">
      <g id="Ellipse_5" data-name="Ellipse 5" transform="translate(139 445)" fill="#f6fff5" stroke="#e01e1e" stroke-width="2">
        <circle cx="21.695" cy="21.695" r="21.695" stroke="none"/>
        <circle cx="21.695" cy="21.695" r="20.695" fill="none"/>
      </g>
      <path id="Path_5" data-name="Path 5" d="M0,14.043,4.918,5.761,8.338,0,19.476,11.643" transform="translate(152.211 452.969) rotate(7)" fill="none" stroke="#e01e1e" stroke-width="5"/>
      <path id="Path_6" data-name="Path 6" d="M0,14.043,4.918,5.761,8.338,0,19.476,11.643" transform="translate(152.211 466.703) rotate(7)" fill="none" stroke="#e01e1e" stroke-width="5"/>
    </g>
  </svg>
 
</a>
@include('cookieConsent::index')
