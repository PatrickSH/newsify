<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Provider;
use App\Article;
use App\Country;

class ArticleController extends BaseController
{
    public function index($number,$type,$provider,$article){
        $article = Article::where('link_internal',"/".$number."/".$type."/".$provider."/".$article)
        ->with('category')->first();

        return view('article',compact('article','provider'));
    }
}
