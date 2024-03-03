@extends('layouts.app')
@section('content')
    @parent
    @empty($utente)
        <h2 class="my-5 text-center">Utente non trovato</h2>
    @else
        <div class="card my-5" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{$utente->nome}}{{$utente->cognome}}</h5>
                <div class="font-italic">{{$utente->località ?? null}}</div>
                <p class="card-text">{{$utente->descrizione  ?? null}}</p>
                <a href="mailto:{{$utente->email}}" class="btn btn-primary">{{$utente->email}}</a>
            </div>
        </div>
    @endempty
@endsection
