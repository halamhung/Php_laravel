@extends('admin.layouts.app')

@section('title', 'Create User')
@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Create New User</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                @include('admin.users._form')
                <button type="submit" class="btn btn-primary">Create User</button>
            </form>
        </div>
    </div>
@endsection