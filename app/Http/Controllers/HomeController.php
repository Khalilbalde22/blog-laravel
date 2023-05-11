<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\CategorieFormrequest;
use App\Http\Requests\ContactsRequest;
use App\Mail\ArticleContactMail;
use App\Models\Apropos;
use App\Models\Article;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index(){
        $articles = Article::orderBy('created_at', 'desc')->limit(3)->get();
        return view('home', [
            'articles'=> $articles ,
        ]);
    }
    public function listParCategorie(Categorie $categorie, Article $article){
        $categories = $article->query()->where('categorie_id', '=', $categorie->id)->get();
        return view('listCategorie', [
            'categories' => $categories,
        ]);
    }
    public function contactIndex(){
        return  view('contact');
    }
    public function contact(ContactsRequest $contact, Article $article){
        Mail::send(new ArticleContactMail($article, $contact->validated()));
        return back()->with('success', 'Votre message a bien été envoyer');
    }

    public function apropos(){
        $apropos = Apropos::get();
        return view('apropos', [
            'apropos' => $apropos,
        ]);
    }
}
