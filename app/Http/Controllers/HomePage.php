<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Food;
use App\Models\Chefs;
use App\Models\Cart;
use App\Models\ConfirmOrder;
use App\Models\ConfirmOrderInfo;

class HomePage extends Controller
{
    public function homeView(){
        $item = Food::all();
        $data = Chefs::all();
        $userID = Auth::id();
        $cart = Cart::where('user_id',$userID)->count();

    	return view('home',['item'=>$item,'data'=>$data,'cart'=>$cart]);
    }

    public function redirects(){
        $item = Food::all();
        $data = Chefs::all();
    	$usertype = Auth::user()->usertype;
        
    	if($usertype == '1'){
    		return view('admin.adminPage');
    	}else{
            //Counting Cart data
            $userID = Auth::id();
            $cart = Cart::where('user_id',$userID)->count();

            return view('home',['item'=>$item,'data'=>$data,'cart'=>$cart]);
    	}
    }

    public function addtocart(Request $req,$id){

        if(Auth::id()){
            $user_id = Auth::id();
            $food_id = $id;
            $cart = new Cart();
            $cart->user_id = $user_id;
            $cart->food_id = $food_id;
            $cart->quantity = $req->quantity;
            $cart->save();
            return redirect()->back();
        }else{
            return redirect('/login');
        }
    }

    public function showCartData(){
        $userID = Auth::id();
        $cart = Cart::where('user_id',$userID)->count();
       
            $itemData = Cart::where('user_id',$userID)
                       ->join('food','carts.food_id','=','food.id') 
                       ->select('carts.id as Rid','carts.food_id','carts.quantity','food.*')
                       ->get();
            return view('showCartData',['cart'=>$cart,'itemData'=>$itemData]);
    }
    
    public function delCartItem($Rid){

            $cart =Cart::find($Rid);
            $cart->delete();
            return redirect()->back();
    }
    
    public function confirmOrder(Request $req){

        if(Auth::id()){
            $user_id = Auth::id();
            $cartData =Cart::where('user_id',$user_id)->get();
            //return $cartData[1]->food_id;
            foreach ($cartData as $value) {
                $confirmOrder = new ConfirmOrder();
                $confirmOrder->userID = $value['user_id'];
                $confirmOrder->foodID = $value['food_id'];
                $confirmOrder->quantity = $value['quantity']; 
                $confirmOrder->save();          
            }
            $confirmOrderInfo = new ConfirmOrderInfo();

            $confirmOrderInfo->user_id = $user_id;
            $confirmOrderInfo->name = $req->name;
            $confirmOrderInfo->email = $req->email;
            $confirmOrderInfo->address = $req->address;
            $confirmOrderInfo->phone = $req->phone;
            $confirmOrderInfo->save();
            Cart::where('user_id',$user_id)->delete();

            return redirect('/');
            
        }
    }
}
