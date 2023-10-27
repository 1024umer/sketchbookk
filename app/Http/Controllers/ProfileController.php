<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\RegisterRequest;
use App\Models\{User,File};
use App\Repositories\FileRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class ProfileController extends Controller
{
    protected $file;
    public function __construct(FileRepository $file)
    {
        $this->file = $file;
    }
    public function index(){
        $user = User::where('id',auth()->user()->id)->with('image')->first();
        return view('dashboard.profile')->with('title','My Profile')->with(compact('user'));
    }
    public function update(Request $request){
        $user = User::find(auth()->user()->id);
        $user->update($request->only('name','email'));

        if(isset($request->current_password)){
            if(Hash::check($request->current_password,auth()->user()->password)){
                $user->password = Hash::make($request->password);
                $user->save();
                return redirect()->route('user.profile')->with('success','Your Password has been updated Successfully');
            }else{
                return back()->with('error','Your current password is incorrect');
            }
        }
        if($request->file){
            $image = $this->file->create([$request->file],'users', $user->id,1);
        }
        return redirect()->route('user.profile')->with('success','Your Profile has been updated Successfully');

    }
}
