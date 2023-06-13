<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.head')

<body class="{{ Cookie::get('theme') === 'dark' ? 'dark' : 'light' }}">
@include('layouts.header')

@yield('content')

</body>
</html>
@yield('javascript')
