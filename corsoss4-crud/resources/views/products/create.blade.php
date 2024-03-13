<!-- resources/views/products/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Product</div>
                    <div class="card-body">
                        <x-form action="{{ route('products.store') }}">
                            <x-form-fields name="name" label="Name" />
                            <x-form-fields name="sku" label="SKU" />
                        </x-form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
