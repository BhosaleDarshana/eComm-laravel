<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\cart;
use App\Models\Order;
use Session;
use Illuminate\Support\Facades\DB;

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

    function cartList(){
        //return "hello";
        $userID=Session::get('user')['id']; // we get user id from session
        $data = DB::table('cart') // take data with cart table in DB
        ->join('products','cart.product_id','products.id') // join two table products and cart with key like id is inproducts table nad prodcut_id in cart table 
        ->select('products.*','cart.id as cart_id') // select all product columns table to display with *  and cart id for get assigned product tabele id 
        ->where('cart.user_id',$userID) //with condition usrr_id that is logged in person
        ->get();

        return view('cartlist',['products'=>$data]);
    }

    function removeCart($id){
        cart::destroy($id);
        return redirect('cartlist');
    }

    function orderNow(){
        $userId = Session::get('user')['id'];
        $total = DB::table('cart')
        ->join('products','cart.product_id','products.id')
        ->where('cart.user_id',$userId)
        ->sum('products.price');

        return view('ordernow',['total'=>$total]);
    }

    function orderPlace(Request $req){
        $userId = Session::get('user')['id'];
        $allCart = cart::where('user_id',$userId)->get();
        foreach($allCart as $cart){
            $order = new Order;
            $order ->product_id = $cart['product_id'];
            $order ->user_id = $cart['user_id'];
            $order ->address=$req->address;
            $order ->status="pending";
            $order ->payment_method=$req->payment;
            $order ->payment_status="pending";
            $order ->save();
        }
        cart::where('user_id',$userId)->delete(); // delete or empty cart of that perticular user
        return redirect('/');
        	//return $req->input();
    }

    function myOrder(){
        $userID = Session::get('user')['id'];
        $orders = DB::table('order')
        ->join('products','order.product_id','products.id')
        ->where('order.user_id',$userID)
        ->get();

        return view('myorder',['orders'=>$orders]);
    }

}
