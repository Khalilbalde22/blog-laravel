@extends('admin.admin')

@section('titre', $categorie->exists ? "editer une categorie" : " Ajouter une categorie")

@section('content')

    <h1>@yield('titre')</h1>

    <form class="vstack gap-2" action="{{ route($categorie->exists ? 'admin.categorie.update' : 'admin.categorie.store', $categorie) }}" method="post">
        @csrf
        @method($categorie->exists ? 'put' : 'post')
        <div class="row"> 
        
            <div class="col-md-4">
                @include('shared.input', ['class'=>'col', 'name'=>'reference', 'value'=>$categorie->reference])
            </div>
            <div class="col-md-6">
                @include('shared.input', ['type'=>'textarea', 'label'=>'description', 'name'=>'description', 'value'=>$categorie->description])
            </div>
            
        </div>
        
            {{-- @include('shared.select',  ['type'=>'file', 'class'=>'col', 'label'=>'type', 'name'=>'type', 'value'=>$categories->type]) --}}


        <div>
            <button class="btn btn-primary">
                @if ($categorie->exists)
                    modifier
                @else
                    Ajouter
                @endif
            </button>
        </div>
    
    
    </form>



@endsection