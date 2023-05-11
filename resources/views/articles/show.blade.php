@extends('base')

@section('titre', 'Details de l\'article ')

@section('content')
<div class="container mt-5">
    <img style="width:800px" src="{{ $article->imageUrl() }}" alt="">
    <h5>{{ $article->titre }}</h5>
    <h3 class="text-primary">{{ $article->reference }}</h3>
    <h6>{{ date_format($article->created_at, 'd/m/Y') }}, {{ $article->auteur }}</h6>

    <div class="fw_bold" style="font-size:2rem">
        {{ $article->description }}
    </div>

    <hr>
    
    @include('shared.alerte')

    <div class="mt-4">
        <div class="row">
            <div class="col-md-8">
                <form action="{{ route('articles.contact', $article) }}" method="post" class="vstack gap-3">
                    @csrf
                    <div class="row">
                        @include('shared.input', ['class'=>'col', 'label'=>'nom', 'name'=>'nom'])
                        @include('shared.input', ['class'=>'col', 'label'=>'prenom', 'name'=>'prenom'])
                    </div>
                    <div class="row">
                        @include('shared.input', ['class'=>'col', 'label'=>'telephone', 'name'=>'telephone'])
                        @include('shared.input', ['class'=>'col','type'=>'email', 'label'=>'email', 'name'=>'email'])
                    </div>
                        @include('shared.input', ['class'=>'col','type'=>'textarea', 'label'=>'message', 'name'=>'message'])

                    <div>
                        <button class="btn btn-primary">envoyer</button>
                    </div>
                </form>
            </div>
            <div class="col-md-4">
                <h3>categories</h3>
                <ul class="list-group">
                @foreach ($categories as $category => $v)
                    <li class="list-group-item">
                    <a class="text-decoration-none" href="{{ route('liste.categorie', $category) }}">{{ $v }}</a>
                    </li>
                @endforeach
                
                </ul>
            </div>
        </div>
        
    </div>

    <div class="mt-4">
        <div class="col">
            
        </div>

    </div>

</div>

@endsection