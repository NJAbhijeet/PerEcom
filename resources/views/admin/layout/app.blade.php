<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.layout.head')
</head>

<body class="app sidebar-mini">

    @include('admin.layout.header')

    @include('admin.layout.sidebar')

    @yield('content')

    @include('admin.layout.footer')

    @include('admin.layout.script')


    @yield('script')

    {{-- @include('admin.layout.ajax') --}}

</body>

</html>
