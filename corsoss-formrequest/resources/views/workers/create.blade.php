@extends('layouts.app')

@section('content')
    <form action="{{route('workers.store')}}" method="POST">
        @csrf
          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="nome cognome" value="{{old('name')}}">
            @error('name')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Indirizzo Email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder=""  value="{{old('email')}}">
          </div>
            @error('email')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror          
          <button class="btn btn-primary" type="submit">Salva</button>
    </form>
@endsection