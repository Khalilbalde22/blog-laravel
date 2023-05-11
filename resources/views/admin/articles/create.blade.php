@extends('admin.admin')

@section('titre', $article->exists ? "editer un article" : " Ajouter un article")

@section('content')

    <h1>@yield('titre')</h1>

    <form class="vstack gap-2" action="{{ route($article->exists ? 'admin.articles.update' : 'admin.articles.store', $article) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method($article->exists ? 'put' : 'post')
        <div class="row"> 
        
            @include('shared.input', ['class'=>'col', 'label'=>'titre', 'name'=>'titre', 'value'=>$article->titre])
            <div class="col row">
                @include('shared.input', ['class'=>'col', 'name'=>'reference', 'value'=>$article->reference])
            </div>
            
        </div>
        
        @include('shared.input', ['type'=>'textarea', 'label'=>'description', 'name'=>'description', 'value'=>$article->description])
        <div class="row">
            @include('shared.input',  ['type'=>'file', 'class'=>'col', 'label'=>'image', 'name'=>'image', 'value'=>$article->image])
            @include('shared.select',  ['type'=>'select', 'label'=>'categories', 'name'=>'categorieId','class'=>'col', 'value'=>$article->categories()->pluck('id') ,'multiple'=>false ])
            @include('shared.input',  ['class'=>'col', 'label'=>'auteur', 'name'=>'auteur', 'value'=>$article->auteur])
        </div>
            {{-- @include('shared.select',  ['type'=>'file', 'class'=>'col', 'label'=>'type', 'name'=>'type', 'value'=>$articles->type]) --}}


        <div>
            <button class="btn btn-primary">
                @if ($article->exists)
                    modifier
                @else
                    Ajouter
                @endif
            </button>
        </div>
    
    
    </form>



@endsection