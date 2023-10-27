<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
class UserController extends Controller
{
    public function index(){
    $users = User::where('id','!=',auth()->user()->id)->with('image')->orderBy('created_at','desc')->get();
        return view('admin.user.all_users')->with(compact('users'));
    }
    // public function approve($id){
    //     $user = User::find($id);
    //     $user->update([
    //         'is_approved'=> 1
    //     ]);
    //     $user->refresh();
    //     return back()->with('success','User Approved Successfully');
    // }
    // public function deny($id){
    //     $user = User::find($id);
    //     $user->update([
    //         'is_approved'=> 0
    //     ]);
    //     $user->refresh();
    //     return back()->with('success','User Denied Successfully');
    // }
    public function delete($id){
        $product = User::find($id)->delete();
        return back()->with('success','User has been deleted Successfully');
    }
    public function add(){
        return view('admin.user.user_profile');
    }
}
