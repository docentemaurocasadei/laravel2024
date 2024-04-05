<!DOCTYPE html>
<html>
<head>
    <title>Angular Component</title>
    
    <link rel="stylesheet" href="{{asset('corsoss-angular/browser/styles-5INURTSO.css')}}">
</head>
<body>
    <h1>Angular Component in Blade</h1>
    <div id="app">
        <app-root></app-root> <!-- Selettore del componente Angular -->
    </div>
    <!-- Includi i bundle di Vite o Angular -->
    {{-- @vite(['corsoss-angular/src/main.ts']) --}}
    <script type="module" src="{{asset('corsoss-angular/browser/polyfills-RT5I6R6G.js')}}"></script>
    <script type="module" src="{{asset('corsoss-angular/browser/main-C3CCRMEV.js')}}"></script>
    {{-- <script type="module" src="./corsoss-angular/src/main.ts"></script> --}}
</body>
</html>