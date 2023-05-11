@extends('base')

@section('titre', 'Les articles')

@section('content')


<div class="container">
{{-- recherce --}}

<div class= "bg-light p-5 mb-5 text-center">
    <form action="" method="get" class="display-flex gap-2">
        <input type="text" placeholder="chercher" class="form-control" name="recherche" value="{{ $input['titre'] ?? '' }}">
        <button class="btn btn-primary-sm-flex-grow-0">
            rechercher 
        </button>
    </form>
</div>


<div class="row mt-3">
    @foreach ($articles as $article)
        <div class="col-3">
            @include('shared.carte')
        </div>
    @endforeach
</div>

<div class="my-4">
    {{ $articles->links() }}
</div>

</div>




@endsection