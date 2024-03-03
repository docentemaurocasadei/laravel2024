@extends('layouts.app')
@section('content')
    @parent
    <h1 class="text-dark">contenuto di utenti</h1>
    <table class="table table-sm">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">id</th>
            <th scope="col">nome</th>
            <th scope="col">cognome</th>
            <th scope="col">email</th>
        </tr>
        </thead>
        <tbody>
            @foreach($utenti as $utente)
                <tr>
                    <th scope="row">{{$loop->index}}</th>
                    <td><a href="{{route('front.utente', $utente->id)}}">{{$utente->id}}</a></td>
                    <td>{{$utente->nome}}</td>
                    <td>{{$utente->cognome}}</td>
                    <td>{{$utente->email}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
