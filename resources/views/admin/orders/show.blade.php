@extends('admin.layouts.app')

@section('title', 'Order Details')
@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Order #{{ $order->id }} Details</h5>
        </div>
        <div class="card-body">
            @include('admin.orders._order_info')
            @include('admin.orders._order_items')
            @include('admin.orders._status_form')
        </div>
    </div>
@endsection