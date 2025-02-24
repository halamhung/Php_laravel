@extends('layouts.app')

@section('title', '404 Not Found')
@section('content')
    <div class="container py-5 text-center">
        <div class="display-1 text-muted mb-5"><i class="fas fa-exclamation-triangle"></i> 404</div>
        <h1 class="h2 mb-3">Oops... Page not found!</h1>
        <p class="h4 text-muted font-weight-normal mb-4">
            The page you are looking for might have been removed, had its name changed,
            or is temporarily unavailable.
        </p>
        <a class="btn btn-primary" href="{{ url('/') }}">
            <i class="fas fa-arrow-left mr-2"></i>Return to homepage
        </a>
    </div>
@endsection