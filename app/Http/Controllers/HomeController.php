<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Integrations\EB;

class HomeController extends BaseController
{
    public function index(){
        $a = new EB("getAll");
    }
}
