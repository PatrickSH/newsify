<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{

    protected $table = "providers";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'country_id', 'name', 'link',
        'copyright_greet'
    ];
}
