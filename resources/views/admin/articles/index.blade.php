@extends('admin.admin')

@section('titre', 'Articles')

@section('content')



    <div class="d-flex justify-content-between align-items-center ">
        <h1>les articles</h1>
        <a href="{{ route('admin.articles.create') }}" class="btn btn-primary"> Ajouter un articles </a>
    </div>

    <table class="table table-striped">
    
        <thead>
            <tr>
                <th>Titre</th>
                <th>Reference</th>
                <th>Description</th>
                <th>Auteur</th>
                <th>Image</th>
                <th class="text-end">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($article as $artic)
                <tr>
                    <td>{{ $artic->titre }}</td>
                    <td>{{ $artic->reference }}</td>
                    <td>{{ $artic->description }}</td>
                    <td>{{ $artic->auteur}}</td>
                    <td>{{ $artic->image }}</td>
                    <td>
                        <div class="d-flex gap-2 w-100 justify-content-end">
                            <a class="btn btn-primary" href="{{ route('admin.articles.edit', $artic) }}">editer</a>
                            <form action="{{ route('admin.articles.destroy', $artic) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">supprimer</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    
    </table>

    {{ $article->links() }}


@stop