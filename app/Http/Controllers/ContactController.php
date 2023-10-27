<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;
class ContactController extends Controller
{
    public function contact(){
        return view("dashboard.contact")->with('title','Contact Us');
    }
    public function store(ContactRequest $request)
    {
        try {
            $contact = Contact::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'phone' => $request->phone,
                'email' => $request->email,
                'message' => $request->message,
            ]);

            if ($contact) {
                return redirect()->route('contact')->with('success', 'Your Message has been Submitted Successfully');
            } else {
                return redirect()->route('contact')->with('error', 'Failed to submit your message.');
            }
        } catch (\Exception $e) {
            return redirect()->route('contact')->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

}
