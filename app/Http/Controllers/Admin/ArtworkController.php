<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ArtworkController extends Controller
{
    public function index(){
        $artworks = Product::with('imageOne','image','user')->get();
        return view('admin.artwork.view')->with(compact('artworks'));
    }
    public function approve($id){
        $artist = Product::where('id',$id)->first();
        $artist->update(['is_approved'=>1]);

        return redirect()->back()->with('success','The Artwork has been approved successfully');
    }
    public function deny($id){
        $artist = Product::where('id',$id)->first();
        $artist->update(['is_approved'=>0]);

        return redirect()->back()->with('success','The Artwork has been denied successfully');
    }
}
