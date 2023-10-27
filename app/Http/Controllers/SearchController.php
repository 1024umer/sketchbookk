<?php

namespace App\Http\Controllers;

use App\Models\{Product,Wishlist};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class SearchController extends Controller
{
    public function search(Request $request){
        $products = Product::where('is_active', 1)
            ->where(function ($query) use ($request) {
                $searchTerms = explode(' ', $request->search);
                foreach ($searchTerms as $term) {
                    $query->orWhere('title', 'LIKE', '%' . $term . '%')
                        ->orWhere('description', 'LIKE', '%' . $term . '%');
                }
            })
            ->with('imageOne')
            ->orderBy('id', 'desc')
            ->paginate(8);
        if(Auth::check()){
            $wishlist = Wishlist::where('user_id', auth()->user()->id)
            ->pluck('product_id')
            ->toArray();
            return view('dashboard.shop')->with('title','Shop')->with(compact('products','wishlist'));
        }else{
            return view('dashboard.shop')->with('title','Shop')->with(compact('products'));
        }
    }
    public function searchByPrice(Request $request){
        $products = Product::where('is_active', 1)
        ->whereRaw('price >= ?', [$request->from])
        ->whereRaw('price <= ?', [$request->to])
        ->orderBy('id', 'desc')
        ->paginate(8);
        if(Auth::check()){
            $wishlist = Wishlist::where('user_id', auth()->user()->id)
            ->pluck('product_id')
            ->toArray();
            return view('dashboard.shop')->with('title','Shop')->with(compact('products','wishlist'));
        }else{
            return view('dashboard.shop')->with('title','Shop')->with(compact('products'));
        }
    }
}