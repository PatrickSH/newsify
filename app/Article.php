<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\Provider;

class Article extends Model
{

    protected $table = "articles";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'provider_id', 'category_id', 'headline', 'link_external',
        'link_internal','image','content'
    ];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function provider(){
        return $this->belongsTo(Provider::class, 'provider_id');
    }
}
