<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Integrations\TV2;

class HomeController extends BaseController
{
    public function index(){
        return view('main');
    }
}
