<!DOCTYPE html>
<html>
<head>
    @include('admin.elements.header')
</head>

<body class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper">

        @include('admin.elements.navbar')

        @include('admin.elements.sidebar')

        @yield('content')

        @include('admin.elements.footer')

    </div>

    @include('admin.elements.script')

    @yield('js')

</body>

</html>
