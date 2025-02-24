@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <!-- Hero Section -->
    <div class="bg-light p-5 mb-4 rounded">
        <div class="container">
            <h1>Welcome to {{ config('app.name') }}</h1>
            <p class="lead">Find the best electrical products for your needs.</p>
            <a href="{{ route('products.index') }}" class="btn btn-primary">Shop Now</a>
        </div>
    </div>

    <!-- Featured Categories -->
    <section class="mb-5">
        <h2 class="mb-4">Categories</h2>
        <div class="row">
            @foreach($categories as $category)
                <div class="col-md-3 mb-4">
                    <div class="card">
                        @if($category->image)
                            <img src="{{ Storage::url($category->image) }}" class="card-img-top" alt="{{ $category->name }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $category->name }}</h5>
                            <p class="card-text">{{ Str::limit($category->description, 50) }}</p>
                            <a href="{{ route('categories.show', $category) }}" class="btn btn-outline-primary">View
                                Products</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Featured Products -->
    <section>
        <h2 class="mb-4">Featured Products</h2>
        <div class="row">
            @foreach($featuredProducts as $product)
                <div class="col-md-3 mb-4">
                    <div class="card">
                        <img src="{{ Storage::url($product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ Str::limit($product->description, 50) }}</p>
                            <p class="h5">${{ number_format($product->price, 2) }}</p>
                            <form action="{{ route('cart.add', $product) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary w-100">
                                    Add to Cart
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection