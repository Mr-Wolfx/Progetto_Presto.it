<?php

namespace App\Http\Controllers;

use App\Mail\AdminMail;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RevisorController extends Controller
{
    public function index()
    {
        $article_to_check = Article::where('is_accepted', null)->first();
        return view('revisor.index', compact('article_to_check'));
    }

    public function acceptArticle(Article $article)
    {
        $article->setAccepted(true);
        return redirect()->back()->with('message', 'Complimenti, Articolo Accettato');
    }

    public function rejectArticle(Article $article)
    {
        $article->setAccepted(false);
        return redirect()->back()->with('message', 'Articolo Rifiutato');
    }
    
    public function becomeRevisor()
    {
        return view('revisor.become');
    }
    
   

}
