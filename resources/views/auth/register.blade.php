@extends('layout')

@section('content')
    <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card bg-dark text-white p-4" style="width: 400px;">
            <h2 class="text-center">Inscription</h2>

            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mb-3">
                    <label for="name">Nom :</label>
                    <input type="text" id="name" name="name" class="form-control" autofocus>
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email">Email :</label>
                    <input type="email" id="email" name="email" class="form-control">
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

                <div class="mb-3">
                    <label for="password_confirmation">Confirmer Mot de passe :</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success w-100">S'inscrire</button>
            </form>

            <div class="text-center mt-3">
                <a href="{{ route('login') }}" class="text-white">Déjà un compte ? Connectez-vous</a>
            </div>
        </div>
    </div>
@endsection
