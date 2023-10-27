<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{isset($title)?$title:'' }} | Sketchbook</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Morden Bootstrap HTML5 Template">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('front/img/favicon.png') }}" type="image/x-icon">
    @stack('css')
</head>
    @include('layout.css')
<body>
<input type="hidden" id="web_base_url" value="{{url('/')}}" />
    @include('layout.header')
    @yield('content')
    @include('layout.footer')
    @include('layout.script')
</body>

@stack('js')

</html>
