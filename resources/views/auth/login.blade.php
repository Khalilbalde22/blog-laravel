@extends('base')

@section('titre', 'Connexion')

@section('content')

<div class="container mt-4" >

    <h1>@yield('titre')</h1>

    @include('shared.alerte')
    
    <form action="{{ route('login') }}" method="post" class="vstck gap-3">
        @csrf

        @include('shared.input', ['class'=>'col','type'=>'email', 'label'=>'email', 'name'=>'email'])
        @include('shared.input', ['class'=>'col','type'=>'password', 'label'=>'password', 'name'=>'password'])

        <div>
            <button class="btn btn-primary">se connecter</button>
        </div>

    </form>

</div>



@endsection