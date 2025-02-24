@extends('admin.layouts.app')

@section('title', 'Create Product')
@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Create New Product</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('admin.products._form')
                <button type="submit" class="btn btn-primary">Create Product</button>
            </form>
        </div>
    </div>
@endsection