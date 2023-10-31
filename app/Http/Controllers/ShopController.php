<?php

namespace App\Http\Controllers;

use App\Models\{Product,Wishlist,Category, User};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ShopController extends Controller
{
    public function index(){
            $artists = User::where('role_id',2)->get(); 
            $categories = Category::where('is_active',1)->get();
            $products = Product::where('is_approved',1)->with('imageOne')->paginate(8);
            return view('dashboard.shop')->with('title','Shop')->with(compact('products','categories','artists'));
    }
}
