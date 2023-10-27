<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blog(){
        return view('dashboard.blog')->with('title','Blogs');
    }
}
