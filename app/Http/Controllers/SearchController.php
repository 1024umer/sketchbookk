<?php

namespace App\Http\Controllers;

use App\Models\{Product,Wishlist,User,Category};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class SearchController extends Controller
{
    public function search(Request $request){
        $artists = User::where('role_id',2)->get(); 
        $categories = Category::where('is_active',1)->get();
        $products = Product::where('is_approved', 1)
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
            return view('dashboard.shop')->with('title','Shop')->with(compact('products','artists','categories'));
    }
    public function searchByPrice(Request $request){
        $artists = User::where('role_id',2)->get(); 
        $categories = Category::where('is_active',1)->get();
        $products = Product::where('is_approved', 1)
        ->whereRaw('price >= ?', [$request->from])
        ->whereRaw('price <= ?', [$request->to])
        ->orderBy('id', 'desc')
        ->with('imageOne')
        ->paginate(8);
            return view('dashboard.shop')->with('title','Shop')->with(compact('products','artists','categories'));
        
    }
    public function searchByCategory(Request $request, $id) {
        $categoryId = (int)$id; // Convert the provided ID to an integer
        $allProducts = Product::where('is_approved', 1)
            ->orderBy('id', 'desc')
            ->with('imageOne')
            ->get();
        $products = $allProducts->filter(function ($product) use ($categoryId) {
            $categoryIds = json_decode($product->category_id);
            return in_array($categoryId, $categoryIds);
        });
        $products = $products->toQuery()->paginate(8);
        $artists = User::where('role_id',2)->get(); 
        $categories = Category::where('is_active',1)->get();
        return view('dashboard.shop')->with('title','Shop')->with(compact('products','artists','categories'));

    }
    
    public function searchByArtist(Request $request, $id){
        $artists = User::where('role_id',2)->get(); 
        $categories = Category::where('is_active',1)->get();
        $products = Product::where('user_id',$id)->where('is_approved',1)->orderBy('id', 'desc')
        ->with('imageOne')
        ->paginate(8);
        return view('dashboard.shop')->with('title','Shop')->with(compact('products','artists','categories'));
    }
}