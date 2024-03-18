<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{env('APP_NAME')}}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css','resources/scss/app.scss', 'resources/js/app.js'])
</head>
<body>
    <section class="container">
        <h1>Demo FormRequest</h1>
        @yield('content')
    </section>
</body>
</html>