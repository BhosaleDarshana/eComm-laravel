<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\cart;
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
}
