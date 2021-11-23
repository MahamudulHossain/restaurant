<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomePage extends Controller
{
    public function homeView(){
    	return view('home');
    }

    public function redirects(){
    	$usertype = Auth::user()->usertype;

    	if($usertype == '1'){
    		return view('admin.adminPage');
    	}else{
    		return view('home');
    	}
    }
}
