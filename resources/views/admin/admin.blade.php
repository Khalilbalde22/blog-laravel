<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title> @yield('titre') Document</title>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand fw-bolder" href="#">My blog</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            @php
                $route = request()->route()->getName();
            @endphp
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a @class(['nav-link fw-bolder', 'active' => str_contains($route , 'articles.') ]) aria-current="page" href="{{ route('admin.articles.index') }}">Gerer les Articles</a>
                    </li>
                    <li class="nav-item">
                    <a @class(['nav-link fw-bolder', 'active' => str_contains($route , 'categorie.') ]) href="{{ route('admin.categorie.index') }}">Gerer les Categories</a>
                    </li>
                </ul>
                <div class="sm-auto">
                    @auth
                        <ul class="navbar-nav">
                            <li class="nave-item">
                                <form action=" {{ route('logout') }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="nav-link fw-bold btn btn-danger">se deconnecter</button>
                                </form>
                            </li>
                        </ul>
                    @endauth
                </div>
            </div>
        </div>
    </nav>
 
    
    <div class="container mt-5">

        @include('shared.alerte')


        @yield('content')

    </div>


</body>
</html>