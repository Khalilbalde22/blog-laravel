@extends('base')

@section('content')


<div class= "bg-light p-5 mb-5 text-center">

    <div class="container">
        <h5>
        Si vous cherchez à en savoir plus sur le développement d'applications et de sites web, le marketing digital ou si vous cherchez des conseils pour vous lancer dans le monde du digital, vous êtes au bon endroit ! Mon blog est un espace dédié aux personnes intéressées par ces sujets.
        En tant que développeur chevronné, je partage mes connaissances et mon expérience pour vous aider à comprendre les différentes technologies et outils nécessaires pour créer des applications et des sites web professionnels. Je donne également des conseils pour optimiser la performance de votre site web et améliorer votre présence en ligne.
</h5>
    
    </div>

  

    <div class="container">
        <h1>Nos derniers Articles</h1>
        <div class="row">
            @foreach ($articles as $article)
                <div class="col">
                    @include('shared.carte', ['articles'])
                </div>
            @endforeach
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col">
            </div>
            <div class="col">
                @foreach ($articles as $article)

                    @if ($article->image)
                        <a href="{{ route('articles.show', ['slug'=>$article->getSlug(), 'article'=>$article]) }}"><img style="width:700px; heigth:20px" src="{{ $article->imageUrl() }}" alt=""></a>
                        
                    @endif
                    <h5>{{ $article->titre }}</h5>
                    <a class="text-decoration-none" href="{{ route('articles.show', ['slug'=>$article->getSlug(), 'article'=>$article]) }}" ><h3 >{{ $article->reference }}</h3></a>
                    <p>{{ $article->description }}</p>
                @endforeach
            </div>
            <div class="col">
            </div>
        </div>
    </div>


</div>






@endsection