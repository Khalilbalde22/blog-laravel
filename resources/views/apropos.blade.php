@extends('base')

@section('titre','a propos')

@section('content')

<div class="container mt-5">

    <div class="card">
        <div class="card-body">
        <div class="row">
            <div class="col-md-4">
              <h1>Decouvrer qui suis-je</h1>
            @foreach ($apropos as $propos)
                <h5>nom : {{ $propos->nom }}</h5>
                <h5>prenom : {{ $propos->prenom }}</h5>
                <h5>Mail : {{ $propos->email }}</h5>
                <h5>Tel : {{ $propos->telephone }}</h5>
                <h5>Adresse : {{ $propos->adresse }}</h5>
            @endforeach
            </div>
            <div class="col-md-8">
            @foreach ($apropos as $propos)
                <h4>{{ $propos->apropos }}</h4>
            @endforeach
              
            </div>
        </div>
        
        </div>
    
    </div>


</div>




@endsection