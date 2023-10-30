<?php

namespace App\Http\Controllers;

use App\Models\{Product,Wishlist};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ShopController extends Controller
{
    public function index(){
        if(Auth::user() && Auth::user()->role_id != 1){
            $products = Product::where('is_active',1)->where('is_approved',1)->with('imageOne')->paginate(8);
            $wishlist = Wishlist::where('user_id', auth()->user()->id)
            ->pluck('product_id')
            ->toArray();
            return view('dashboard.shop')->with('title','Shop')->with(compact('products','wishlist'));
        }else{
            $products = Product::where('is_active',1)->where('is_approved',1)->with('imageOne')->paginate(8);
            return view('dashboard.shop')->with('title','Shop')->with(compact('products'));
        }
    }
}
