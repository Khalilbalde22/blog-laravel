<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactsRequest;
use App\Http\Requests\RecherecheRequest;
use App\Mail\ArticleContactMail;
use App\Models\Article;
use App\Models\Categorie;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class listAritcleController extends Controller
{
    public function index(RecherecheRequest $recherche){
   
        $requet = Article::query()->orderBy('created_at', 'desc');
        // if($recherche->has('recherche')){
        //     $requet = $requet->where('titre', '=', ucfirst(strtolower($recherche->input('recherche'))) );
        // }
         if($recherche->has('recherche')){
            $requet = $requet->where('titre', 'like', "%{$recherche->input('recherche')}%" );
        }
        return view('articles.index', [
            'articles' => $requet->paginate(16),
        ]);
    }

    public function show(string $slug , Article $article){
        $slugTruves = $article->getSlug();
        if($slug !== $slugTruves ){
            return to_route('articles.show', ['slug' => $slug, 'article'=>$article]);
        } 
        return view('articles.show', [
            'article' => $article,
            'categories' => Categorie::pluck('reference','id')
        ]);
    }

    public function contact(ContactsRequest $contact, Article $article){
        Mail::send(new ArticleContactMail($article, $contact->validated()));
        return back()->with('success', 'Votre message a bien été envoyer');
    }
}
