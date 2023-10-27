<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ContactReplyMail;
use App\Models\{Contact,User};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
class ContactController extends Controller
{
    public function index(){
        $contacts = Contact::get();
        return view('admin.contacts.view')->with(compact('contacts'));
    }
    public function send(Request $request){
        try{
            $user = Contact::where('id',$request->user_id)->first();
            Mail::to($user->email)->send(new ContactReplyMail($user,$request->message));
            return redirect()->back()->with('success','Mail send successfully');
        }catch(\Exception $e){
            return back()->with('error', $e->getMessage());
        }
    }
}
