<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Article;

class Category extends Model
{

    protected $table = "categories";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'country_id', 'name'
    ];

    public function articles(){
        return $this->hasMany(Article::class,'category_id');
    }

}
