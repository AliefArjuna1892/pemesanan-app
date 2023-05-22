@extends('layouts.app')

@section('content')
    <div class="jumbotron">
        <h1 class="display-4">Welcome to Hotel Management System</h1>
        <p class="lead">A powerful and efficient solution for managing hotel operations.</p>
        <hr class="my-4">
        <p>Get started by logging in or creating an account.</p>
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="{{ route('login') }}" role="button">Login</a>
            <a class="btn btn-success btn-lg" href="{{ route('register') }}" role="button">Register</a>
        </p>
    </div>
@endsection
