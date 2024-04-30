<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function welcome(){

      $articles=Article::where('is_accepted', true)->take(6)->orderBy('created_at', 'desc')->get();
        return view('welcome', compact('articles'));
    }
    public function categoryShow(Category $category){


      return view('categoryShow', compact('category'));
    }

    public function searchArticles (Request $request ){
      $articles = Article::search($request->searched)->where('is_accepted', true)->paginate();
      return view('article.index', compact('articles'));
  }

  
  public function setLanguage ($lang){

    session()->put('locale', $lang);
  return redirect()->back();
  }
}
