@extends('layout')

@section('content')
    <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card bg-dark text-white p-4" style="width: 400px;">
            <h2 class="text-center">Connexion</h2>

            @if (session('error'))
                <div class="alert alert-danger text-center">
                    {{ session('error') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                    <label for="email">Email :</label>
                    <input type="email" id="email" name="email" class="form-control" autofocus>
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password">Mot de passe :</label>
                    <input type="password" id="password" name="password" class="form-control">
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary w-100">Se Connecter</button>
            </form>

            <div class="text-center mt-3">
                <a href="{{ route('register') }}" class="text-white">Créer un compte</a>
            </div>
        </div>
    </div>
@endsection
