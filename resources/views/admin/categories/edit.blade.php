@extends('admin.layouts.app')

@section('title', 'Edit Category')
@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Edit Category: {{ $category->name }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('categories.update', $category) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @include('admin.categories._form')
                <button type="submit" class="btn btn-primary">Update Category</button>
            </form>
        </div>
    </div>
@endsection