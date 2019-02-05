<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Integrations\TV2;
use App\Provider;
use App\Article;
use App\Country;

class HomeController extends BaseController
{
    public function index(){
        $countries = Country::with('providers')->get();
        return view('main',compact('countries'));
    }

    public function showProviderCats($provider){
        $provider = Provider::where('name',strtoupper($provider))->first();
        $articles = Article::where('provider_id',$provider->id)->with('category')->get();
        $categories = [];
        foreach($articles as $category){
            $categories[$category->category->id] = ['name' => $category->category->name, 'id' => $category->category->id];
        }
        return view('category',compact('categories'));
    }
}
