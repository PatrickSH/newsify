<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Integrations\TV2;

class HomeController extends BaseController
{
    public function index(){
        $a = (new TV2())->getAll();
        var_dump($a);die;
    }
}
