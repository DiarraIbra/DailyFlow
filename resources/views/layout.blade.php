<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DailyFlow - Gestion des tâches</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-dark text-white">

    <!-- Navbar -->
    <nav class="navbar navbar-dark bg-primary p-3">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}">DailyFlow</a>
            <div class="d-flex">
                @auth
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-danger">Se Déconnecter</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-light me-2">Se Connecter</a>
                    <a href="{{ route('register') }}" class="btn btn-warning">S'inscrire</a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Contenu Principal -->
    <div class="container mt-5">
        @yield('content')
    </div>

    <!-- Scripts Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
