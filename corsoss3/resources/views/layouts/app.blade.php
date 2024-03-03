<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>{{config('app.name')}}</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{asset('build/assets/favicon.ico')}}" />
    <!-- Core theme CSS (includes Bootstrap)-->
    @vite([
        'resources/css/app.css',
        'resources/css/styles.css',
        'resources/js/app.js',
        'resources/js/bootstrap.js',
        'resources/scss/custom.scss'
    ])
</head>
<body>
<!-- Responsive navbar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container px-5">
        <a class="navbar-brand" href="#!">{{config('app.name')}}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{route('front.index')}}">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('front.utenti')}}">Utenti</a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- Page Content-->
<div class="container px-4 px-lg-5">
    @yield('content')
</div>
<!-- Footer-->
<footer class="py-5 bg-dark">
    <div class="container px-4 px-lg-5"><p class="m-0 text-center text-white">Copyright &copy; SoluzioneSoftware Corso per Didattica Laravel</p></div>
</footer>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
@vite([
    'resources/js/scripts.js',
    'resources/js/bootstrap.js',
    'resources/js/app.js'
])
@stack('after_scripts')
</body>
</html>
