<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\cart;
use Session;

class ProductController extends Controller
{
    //
    function index(){
    $data = Product::all();
    return view('product',['products'=>$data]);
    }

    function detail($id){
        $data= Product::find($id);
        return view('detail',['product'=>$data]);
    }

    function search(Request $req){
        //return $req->input();
        $data= Product::where('name','like', '%'.$req->input('query').'%')->get();
        return view('search',['products'=>$data]);
    }

    function addToCart(Request $req){
        if($req->session()->has('user')){
            $cart = new cart;
            $cart->user_id=$req->session()->get('user')['id']; //user_id, product_id from database table cart
            $cart->product_id=$req->product_id; // req->prodcut_id from name in add to cart input tag
            $cart->save();
            return redirect("/");
            //return "hello";
        }else{
            return redirect("/login");
        }
    }

    static function cartItem(){
        $userID=Session::get('user')['id'];
        return cart::where('user_id',$userID)->count();
    }
}
