@extends('layouts.app')
@section('content')
    <h2>Session Flash</h2>  
        @if(session('session-flash'))
            <div class="alert alert-info">
                {{session('session-flash')}}
            </div>
        @endif
        @if(Session::has('status'))
            <div class="alert alert-success">
                <div>{{ Session::get('status') }}</div>
            </div>
        @endif
        <a class="btn btn-primary" href="/session-flash">session-flash</a>
        <a class="btn btn-primary" href="/session">session no flash (visibile solo alla prima response)</a>
@endsection
