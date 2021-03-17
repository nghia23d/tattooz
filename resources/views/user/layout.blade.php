<!doctype html>
<html class="no-js" lang="">
    <head>
       @include('user.elements.head')
    </head>
    <body>
      
        @include('user.elements.menu')

        @yield('content')

        @include('user.elements.footer')

		
        @include('user.elements.script')
    </body>
</html>
