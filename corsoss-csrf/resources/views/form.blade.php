@extends('layouts.app')

@section('content')
    <form method="POST" action="{{route('test-cors')}}">
        <button type="submit" class="btn btn-primary">Invia</button>
    </form>
@endsection