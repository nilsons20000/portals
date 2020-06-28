<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
@include('layouts.head')
<body>
    <div id="app" class="admin-dashboard">
        @include('layouts.header')
		 <div class="site-content">
        	@yield('content')
         </div>
    </div>

@include('layouts.footer')
</body>
</html>
@include('cookieConsent::index')



























