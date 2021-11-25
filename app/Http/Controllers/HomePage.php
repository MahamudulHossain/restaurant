<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Food;
use App\Models\Chefs;

class HomePage extends Controller
{
    public function homeView(){
        $item = Food::all();
        $data = Chefs::all();
    	return view('home',['item'=>$item,'data'=>$data]);
    }

    public function redirects(){
        $item = Food::all();
        $data = Chefs::all();
    	$usertype = Auth::user()->usertype;

    	if($usertype == '1'){
    		return view('admin.adminPage');
    	}else{
            return view('home',['item'=>$item,'data'=>$data]);
    	}
    }
}
