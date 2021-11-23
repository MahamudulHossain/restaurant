<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomePage extends Controller
{
    public function homeView(){
    	return view('home');
    }
}
