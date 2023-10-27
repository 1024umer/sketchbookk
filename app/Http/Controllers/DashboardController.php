<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class DashboardController extends Controller
{
    public function index(){
        if(Auth::user()){
            $user = User::where('id',auth()->user()->id)->first();            
            return view('dashboard.my-account')->with('title','Welcome '.Auth::user()->name)
        ->with(compact('user'));
        }
        else{
            return redirect()->route('login');
        }
    }
}
