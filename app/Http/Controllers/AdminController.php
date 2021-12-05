<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Food;
use App\Models\Reservation;
use App\Models\Chefs;
use App\Models\ConfirmOrderInfo;
use App\Models\ConfirmOrder;

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
    	return redirect('/foodmenulist');

    }

    public function foodmenulist(){
    	$data = Food::all();
    	return view('admin.foodMenuList',['data'=>$data]);
    }

    public function updateFood($id){
    	$data = Food::find($id);
    	return view('admin.updateFoodMenu',['data'=>$data]);
    }
    
    public function foodDelete($id){
    	$data = Food::find($id);
    	$data -> delete();
    	return redirect('/foodmenulist');
    }

    public function updatefoodmenudata(Request $req,$id){
    	$data = Food::find($id);

    	if($req->image){
    		$image = $req->image;
	    	$imageName = time(). '.' .$image->getClientOriginalExtension();
	    	$req->image->move('foodImage',$imageName);
	    	$data->image = $imageName;
    	}
    	
    	$data->title = $req->title;
    	$data->price = $req->price;
    	$data->description = $req->description;
    	$data->save();
    	return redirect('/foodmenulist');

    }

    public function reservationForm(Request $req){

    	$data = new Reservation();

    	$data->name = $req->name;
    	$data->email = $req->email;
    	$data->phone = $req->phone;
    	$data->guest = $req->guest;
    	$data->date = $req->date;
    	$data->time = $req->time;
    	$data->message = $req->message;
    	$data->save();
    	return redirect('/');

    }

    public function reservationData(){
    	$data = Reservation::all();
    	return view('admin.reservationList',['data'=>$data]);
    }
    
    public function chefslist(){
    	$data = Chefs::all();
    	return view('admin.chefslist',compact('data'));
    }

    public function addchefsForm(){
    	return view('admin.addchefsForm');
    }
    
    public function addChefsData(Request $req){
    	$data = new Chefs();

    	$image = $req->image;
    	$imageName = time(). '.' .$image->getClientOriginalExtension();
    	$req->image->move('chefsImage',$imageName);

    	$data->image = $imageName;
    	$data->name = $req->name;
    	$data->speciality = $req->speciality;
    	$data->save();
    	return redirect('chefslist');

    }
    
    public function chefDelete($id){
    	$data = Chefs::find($id);
    	$data -> delete();
    	return redirect()->back();
    }

    public function updateChef($id){
    	$data = Chefs::find($id);
    	return view('admin.updateChef',['data'=>$data]);
    }
    
    public function updateChefsdata(Request $req,$id){
    	$data = Chefs::find($id);

    	if($req->image){
    		$image = $req->image;
	    	$imageName = time(). '.' .$image->getClientOriginalExtension();
	    	$req->image->move('chefsImage',$imageName);
	    	$data->image = $imageName;
    	}
    	$data->name = $req->name;
    	$data->speciality = $req->speciality;
    	$data->save();
    	return redirect('/chefslist');

    }

    public function confirmOrderDetails(){
        $details = ConfirmOrderInfo::all();
        
        $itemData = ConfirmOrderInfo::where('user_id',$id)
                   ->join('confirm_orders','confirm_order_infos.user_id','=','confirm_orders.userID') 
                   ->get(); 
        return view('admin.OrderDetails',compact('details','itemData'));
    }
}
