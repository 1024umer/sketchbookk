<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function signup(RegisterRequest $request)
    {
        $user = User::create([
            'role_id' => $request->artist?2:3,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        if ($user) {
            $request->session()->regenerate();
            $request->session()->flash('success', 'Logged In successfully!');
            return redirect()->route('user.account')->with('title','Welcome');
        } else {
            return redirect()->back()->with('error','Please fill out the form correctly!');
        }
    } 
}