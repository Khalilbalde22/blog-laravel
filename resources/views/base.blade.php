<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title> @yield('titre') Blog</title>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand fw-bolder" href="/">My Blog</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            @php
                $route = request()->route()->getName();
            @endphp
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a @class(['nav-link fw-bold', 'active' => str_contains($route , 'home') ]) aria-current="page" href="/">Accueil</a>
                    </li>
                    <li class="nav-item">
                    <a @class(['nav-link fw-bold', 'active' => str_contains($route , 'apropos') ]) aria-current="page" href="{{ route('apropos') }}">Apropos</a>
                    </li>
                    <li class="nav-item">
                    <a @class(['nav-link fw-bold', 'active' => str_contains($route , 'articles.') ]) aria-current="page" href="{{ route('articles.index') }}">Articles</a>
                    </li>
                    <li class="nav-item">
                    <a @class(['nav-link fw-bold', 'active' => str_contains($route , 'contact') ]) aria-current="page" href="{{ route('contact') }}">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

        @yield('content')

        <div class="container-fluid">
            footer
        </div>

</body>
</html>