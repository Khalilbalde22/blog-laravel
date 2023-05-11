 @extends('base')

 @section('titre', 'contact')

@section('content')
 
<div class="container mt-5">
 <div class="row">
    <div class="col-md-8">
        <h1>Prenez contact avec moi</h1>
        <form action="{{ route('contact') }}" method="post" class="vstack gap-3">
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
 </div>
 </div>

@endsection