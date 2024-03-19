@extends('layouts.app')

@section('content')
    {{$message}}
    
@endsection

@push('after_scripts')
    <script>
        console.log('{{$js}}');
    </script>
@endpush