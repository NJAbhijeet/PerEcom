<!DOCTYPE html>
<html lang="en">

<head>
    @include('vendorpro.layout.head')
</head>

<body class="app sidebar-mini">

    @include('vendorpro.layout.header')

    @include('vendorpro.layout.sidebar')

    @yield('content')

    @include('vendorpro.layout.footer')

    @include('vendorpro.layout.script')


    @yield('script')

    {{-- @include('admin.layout.ajax') --}}

</body>

</html>
