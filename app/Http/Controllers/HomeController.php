<?php

namespace App\Http\Controllers;

use App\Models\{Product,Blog};
use App\Models\Faq;
use Illuminate\Http\Request;
class HomeController extends Controller
{
    public function index(){
        $featuredproducts = Product::where([['is_active',1],['is_approved',1]])->where('is_featured',1)->with('imageOne')->orderBy('created_at','desc')->get();
        $latestproducts = Product::where([['is_active',1],['is_approved',1]])->with('imageOne')->orderBy('created_at','desc')->latest()->take(8)->get();
        $blogs = Blog::where('is_active',1)->where('is_featured',1)->with('image')->orderBy('created_at','desc')->take(6)->get();
        $faqs = Faq::get();
        return view("dashboard.home")->with('title','Welcome')->with(compact('featuredproducts','blogs','latestproducts','faqs'));
    }
    public function about(){
        return view("dashboard.about")->with('title','About Us');
    }
    
}
