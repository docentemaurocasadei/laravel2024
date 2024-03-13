<!DOCTYPE html>
<html>
<head>
    <title>Laravel Crud con datatables</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css','resources/scss/app.scss','resources/scss/custom.scss','resources/js/app.js'])
</head>
<body>   
    <div class="container mt-5">
        @yield('content')
    </div>
    @stack('after_scripts')
</body>
</html>