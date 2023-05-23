<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.head')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        @include('includes.header-sidebar')

        @yield('content')

        @include('includes.footer')

    </div>

    @include('includes.footer-scripts')

</body>

</html>
