<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function login(){
         return view('admin.auth.login');
    }
    public function authenticate(LoginRequest $request){
        $user = User::where('email', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)&& $user->role_id == 1) {
                $request->session()->regenerate();
                $request->session()->flash('success', 'Logged In successfully!');
                return redirect()->route('admin.home');
            }
            return back()->with('error','Credentials is not valid, Please try again.');
        } else {
            return back()->with('error','User does not exsist');
        }
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }
}
