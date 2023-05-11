<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategorieFormrequest;
use App\Models\Categorie;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.categories.index', [
            'categorie' => Categorie::paginate(1)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.form', [
            'categorie' => new Categorie(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategorieFormrequest $request)
    {
        $categorie = Categorie::create($request->validated());
        return to_route('admin.categorie.index')->with('success', 'la categorie a bien été enregistrer ');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categorie $categorie)
    {
        return view('admin.categories.form',[
        'categorie' => $categorie,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategorieFormrequest $request, Categorie $categorie)
    {
        $categorie->update($request->validated());
        return to_route('admin.categorie.index')->with('success', 'la categorie a bien été modifié ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categorie $categorie)
    {
        $categorie->delete();
        return to_route('admin.categorie.index')->with('danger', 'la ctegorie a bien été supprimer');
    }
}
