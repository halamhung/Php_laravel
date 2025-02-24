@extends('admin.layouts.app')

@section('title', 'Edit User')
@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Edit User: {{ $user->name }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('users.update', $user) }}" method="POST">
                @csrf
                @method('PUT')
                @include('admin.users._form')
                <button type="submit" class="btn btn-primary">Update User</button>
            </form>
        </div>
    </div>
@endsection