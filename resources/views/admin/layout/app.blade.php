<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    {{-- <link rel = "icon" class="img-fluid" href ="" type = "image/x-icon"> --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    @include('admin.layout.style')
    @stack('styles')
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="skin-blue sidebar-mini">
@include('admin.layout.header')
@switch(Auth::user()->role)
    @case('ward')
        @include('admin.sidebar.ward')
        @break
    @case('admin')
          @include('admin.sidebar.admin')
        @break
    @default
        
@endswitch

<!-- BEGIN CONTAINER -->
{{-- @include('layout.flash-message') --}}

@yield('content')
<!-- END CONTAINER -->
@include('admin.layout.footer')
@include('admin.layout.script')
@stack('scripts')
</body>
</html>
