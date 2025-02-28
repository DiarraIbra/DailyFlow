@extends('layout')

@section('content')
    <div class="d-flex flex-column justify-content-center align-items-center vh-100 text-center">
        <h1 class="mb-4">Bienvenue sur <span class="text-primary">DailyFlow</span> 🚀</h1>
        <p class="lead text-light">Organisez vos tâches facilement et efficacement.</p>

        <div class="mt-4">
            <a href="{{ route('register') }}" class="btn btn-warning btn-lg me-3">S'inscrire</a>
            <a href="{{ route('login') }}" class="btn btn-primary btn-lg">Se Connecter</a>
        </div>
    </div>
@endsection
