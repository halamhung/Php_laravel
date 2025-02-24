@extends('layouts.app')

@section('title', 'Shopping Cart')
@section('content')
    <div class="container py-4">
        <div class="card">
            <div class="card-header">
                <h5>Shopping Cart</h5>
                <a href="{{ route('products.index') }}" class="btn btn-outline-primary">
                    <i class="fas fa-shopping-bag"></i> Continue Shopping
                </a>
            </div>
            <div class="card-body">
                @if(session()->has('cart') && count(session('cart')) > 0)
                    @include('cart._cart_items')
                    @include('cart._cart_summary') 
                @else
                    @include('cart._empty_cart')
                @endif
            </div>
        </div>
    </div>
@endsection