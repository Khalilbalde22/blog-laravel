@extends('admin.admin')

@section('titre', 'categories')

@section('content')

    <div class="d-flex justify-content-between align-items-center ">
        <h1>Administrer les Categories</h1>
        <a href="{{ route('admin.categorie.create') }}" class="btn btn-primary"> Ajouter une categorie </a>
    </div>

    <table class="table table-striped">
    
        <thead>
            <tr>
                <th>Titre</th>
                <th>Reference</th>
                <th>Description</th>
                <th class="text-end">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categorie as $categ)
                <tr>
                    <td>{{ $categ->reference }}</td>
                    <td>{{ $categ->description }}</td>
                    <td>
                        <div class="d-flex gap-2 w-100 justify-content-end">
                            <a class="btn btn-primary" href="{{ route('admin.categorie.edit', $categ) }}">editer</a>
                            <form action="{{ route('admin.categorie.destroy', $categ) }}" method="post">
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

    {{ $categorie->links() }}


@stop