<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pagesController extends Controller
{
    public function welcome(){
        return view('welcome');
    }

    public function menulist(){
        return view('menu');
    }
}
