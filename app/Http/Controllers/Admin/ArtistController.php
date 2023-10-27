<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{Artist,User};
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    // public function index(){
    //     $artists = Artist::with('user')->get();
    //     return view('admin.artist.view')->with(compact('artists'));
    // }
    // public function approve($id){
    //     $artist = Artist::where('user_id',$id)->first();
    //     $artist->update(['is_approved'=>1]);

    //     $user = User::where('id',$id)->first();
    //     $user->update(['role_id'=> 2]);

    //     return redirect()->back()->with('success','The Request has been approved successfully');
    // }
    // public function deny($id){
    //     $artist = Artist::where('user_id',$id)->first();
    //     $artist->update(['is_approved'=>0]);

    //     $user = User::where('id',$id)->first();
    //     $user->update(['role_id'=> 3]);

    //     return redirect()->back()->with('success','The Request has been denied successfully');
    // }
}
