@extends('admin.layouts.app')

@section('title', 'Create Category')
@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Create New Category</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('admin.categories._form')
                <button type="submit" class="btn btn-primary">Create Category</button>
            </form>
        </div>
    </div>
@endsection