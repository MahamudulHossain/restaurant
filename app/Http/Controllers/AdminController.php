<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Food;

class AdminController extends Controller
{
    public function usersList(){
    	$data = User::all();
    	return view('admin.users',['data'=>$data]);
    }
    
    public function userDelete($id){
    	$data = User::find($id);
    	$data -> delete();
    	return redirect('/users');
    }
    
    public function foodmenu(){
    	return view('admin.foodMenu');
    }

    public function foodmenudata(Request $req){
    	$data = new Food();

    	$image = $req->image;
    	$imageName = time(). '.' .$image->getClientOriginalExtension();
    	$req->image->move('foodImage',$imageName);

    	$data->image = $imageName;
    	$data->title = $req->title;
    	$data->price = $req->price;
    	$data->description = $req->description;
    	$data->save();
    	return redirect('/foodmenu');

    }
    
}
