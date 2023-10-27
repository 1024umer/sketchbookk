<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class WishlistController extends Controller
{
    public function index(){
        $wishlists = Wishlist::where('user_id',auth()->user()->id)->with('product.imageOne')->orderBy('created_at','desc')->get();
        // dd($wishlist);
        return view('dashboard.wishlist')->with('title','Wishlist')->with(compact('wishlists'));
    }   
    public function add(Request $request){
        if(Auth::check()){
            try{
                $wishlist  = Wishlist::create([
                    'user_id'=> Auth::user()->id,
                    'product_id' => $request->product_id,
                ]);
                return ['success','Art added to the Wishlist!'];
            }catch(\Exception $e){
                return ['error', $e->getMessage()];
            }
        }
        else{
            return ['error','Please login first'];
        }
    }    
    public function remove(Request $request){
        if(Auth::check()){
            try{
                $wishlist  = Wishlist::where([['id',auth()->user()->id],['product_id',$request->product_id]])->first();
                $wishlist->delete();
                return [
                'success'=>true ,
                'message'=>'Wishlsit updated Successfully!'
            ];
            }catch(\Exception $e){
                return ['error', $e->getMessage()];
            }
        }
        else{
            return redirect()->route('login');
        }
    }
    public function delete($id){
        $wishlist = Wishlist::where([['user_id',auth()->user()->id],['product_id',$id]])->get();
        foreach($wishlist as $item){
            $item->delete();
        }
        return back()->with('success','Wishlist has been removed successfully');
    }
}
