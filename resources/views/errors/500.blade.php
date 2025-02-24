@extends('layouts.app')

@section('title', '500 Server Error')
@section('content')
    <div class="container py-5 text-center">
        <div class="display-1 text-muted mb-5"><i class="fas fa-bug"></i> 500</div>
        <h1 class="h2 mb-3">Internal Server Error</h1>
        <p class="h4 text-muted font-weight-normal mb-4">
            Something went wrong on our servers while we were processing your request.
            We are fixing the issue. Please try again later.
        </p>
        <a class="btn btn-primary" href="{{ url('/') }}">
            <i class="fas fa-arrow-left mr-2"></i>Return to homepage
        </a>
    </div>
@endsection