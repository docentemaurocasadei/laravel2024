<!-- resources/views/products/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Product</div>
                    <div class="card-body">
                        <x-form action="{{ route('products.update', $product->id) }}" >
                            @method('PUT')
                            <x-form-fields name="name" label="Name" :value="$product->name" />
                            <x-form-fields name="sku" label="SKU" :value="$product->sku" />
                        </x-form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
