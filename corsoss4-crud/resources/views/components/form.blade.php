@props(['action'])
<form method="POST" action="{{$action}}">
    @csrf
    {{ $slot }}
    <button type="submit" class="btn btn-primary">Salva</button>
</form>
