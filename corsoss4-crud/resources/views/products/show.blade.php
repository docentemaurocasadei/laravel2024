<!-- resources/views/products/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Show Product</div>
                    <div class="card-body">
                        <x-label name="name" label="Name" :value="$product->name" />
                        <x-label name="sku" label="SKU" :value="$product->sku" />
                        <a href="{{route('products.index')}}" class="btn btn-sm btn-primary">Ritorna</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
