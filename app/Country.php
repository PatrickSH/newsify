<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Provider;

class Country extends Model
{

    protected $table = "countries";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'code', 'flag',
    ];

    public function providers(){
        return $this->hasMany(Provider::class,'country_id');
    }
}
