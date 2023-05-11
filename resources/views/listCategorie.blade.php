@extends('base')

@section('titre', 'list par categories')

@section('content')

<div class="container">
    <div class="row mt-5">
        @foreach ($categories as $article)
            @include('shared.carte')
        @endforeach

    </div>

</div>


@endsection