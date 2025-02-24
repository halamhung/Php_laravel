@extends('admin.layouts.app')

@section('title', 'Edit Product')
@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Edit Product: {{ $product->name }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @include('admin.products._form')
                <button type="submit" class="btn btn-primary">Update Product</button>
            </form>
        </div>
    </div>
@endsection