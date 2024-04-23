@extends('app')
@section('content')
    <ul>
    @foreach ($products as $product)
        <li>{{$product}}</li>    
    @endforeach
    </ul>
@endsection
@push('scripts')
    <script>
        console.log('dentro 1');
    </script>    
@endpush