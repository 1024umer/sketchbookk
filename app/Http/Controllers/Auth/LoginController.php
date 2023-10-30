<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    public function login(Request $request){
            return view("dashboard.login")->with('title','Welcome');
    }
    public function authenticate(Request $request)
    {
        // dd('here');
        $validator = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

            if (Auth::attempt($validator,true)) {
                $user = Auth::user();

                if ($user->role_id === 1) {
                    return redirect()->route('admin.home');
                }
                    else{
                        $request->session()->regenerate();
                        $request->session()->flash('success', 'Logged In successfully!');
                        return redirect()->route('dashboard')->with('title',auth()->user()->name);
                    }
                }else {

                    return back()->withErrors(['invalid_credentials' => 'Invalid Credentials']);
            }
            
        }
        public function logout(Request $request){
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/login');
        }
}
