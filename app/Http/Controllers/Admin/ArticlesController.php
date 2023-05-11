<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ArticlesFormRequest;
use App\Models\Article;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.articles.index',[
                'article' => Article::orderBy('created_at', 'desc')->withTrashed()->paginate(1)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $article = new Article();
        $article->fill([
            'titre' => 'Digital',
            'auteur' => 'khalil',
        ]);
         return view('admin.articles.create', [
            'article' => $article,
            'categories' => Categorie::pluck('reference','id'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticlesFormRequest $request)
    {   
        if($request->image){
            Storage::disk('public')->delete($request->image);
        }
        Article::create([
            "titre" => $request->titre,
            "reference" => $request->reference,
            "description" => $request->description,
            "image" => $request->image->store('blog','public'),
            "categorie_id" => $request->categorieId,
            "auteur" => $request->auteur,
        ]);
        return to_route('admin.articles.index')->with('success', 'l\'article a bien été enregistrer ');
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
    public function edit(Article $article)
    {
        return view('admin.articles.create', [
            'article' => $article,
            'categories' => Categorie::pluck('reference','id'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArticlesFormRequest $request, Article $article)
    {   
        $data = $request->validated();
        $image = $request->validated('image');
        if($article->image){
            Storage::disk('public')->delete($article->image);
        }
        $data['image'] = $image->store('blog','public');
        $article->update($data);
        return to_route('admin.articles.index')->with('success', 'l\'article a bien été modifier ');
    }

    // private function extractData(Article $article , ArticlesFormRequest $request){
    //     $data = $request->validated();
    //     $image = $request->validated('image');
    //     $data['image'] = $image->store('blog','public');
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return to_route('admin.articles.index')->with('danger', 'l\'article a bien été supprimer ');
    }
}
