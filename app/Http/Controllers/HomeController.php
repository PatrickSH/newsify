<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Integrations\BT;

class HomeController extends BaseController
{
    public function index(){
        $a = (new BT())->getAll();
        var_dump($a);die;
    }
}
