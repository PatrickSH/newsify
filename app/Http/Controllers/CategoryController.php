<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Integrations\TV2;
use App\Provider;
use App\Article;
use App\Category;

class CategoryController extends BaseController
{
    public function index($provider,$name){
        $provider_id = Provider::where('name',str_slug($provider))->first()->id;
        $categories = Category::where('name',$name)->with(['articles' => function($query) use($provider_id){
            $query->where('provider_id',$provider_id);
        }])->get();


        return view('articles',compact('categories'));
    }
}
