<?php

namespace App\Jobs\DK;

use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Article;
use App\Category;
use App\Provider;
use App\Country;
use App\Integrations\EB as EBIntegration;

class EB
{
    use Dispatchable,Queueable;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $country = Country::where('code','da_DK')->first();
        $provider = Provider::where('name','EB')->first();
        $articles = (new EBIntegration())->getAll();
        foreach($articles as $article){
            $cat_name = (isset($article['category']) && !is_null($article['category'])) ? $article['category'] : 'Unnamed category';
            $category = Category::updateOrCreate(
                ['country_id' => $country->id, 'name' => $cat_name,'slug' => str_slug($cat_name)],
                ['country_id' => $country->id, 'name' => $cat_name, 'slug' => str_slug($cat_name)]
            );
            if(Article::where('link_external',$article['link'])->count() > 0) return false; //Dont record if already in DB
            Article::create([
                'category_id' => $category->id,
                'provider_id' => $provider->id,
                'headline' => $article['headline'],
                'link_external' => $article['link'],
                'link_internal' => "/".rand(1,1000)."/article/eb/".str_slug($article['headline']),
                'image' => $article['main_image'],
                'content' => $article['text'],
            ]);
        }

    }
}
