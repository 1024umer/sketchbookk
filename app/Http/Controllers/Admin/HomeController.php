<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{User,Product};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    public function index(){
        if(Auth::check() && Auth::user()->role_id == 1){
            $user = User::count();
            $product = Product::count();
            return view('admin.welcome')->with(compact('user','product'));
        }
        else{
            return redirect()->route('admin.login');
        }
    }
}
