<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FaqRequest;
use App\Models\Faq;
use Illuminate\Http\Request;
class FaqController extends Controller
{
    public function home(){
        $faqs = Faq::get();
        return view('dashboard.faq')->with(compact('faqs'));
    }
    public function index(){
        $faqs = Faq::orderBy('created_at','desc')->get();
        return view('admin.faq.view')->with(compact('faqs'));
    }
    public function store(FaqRequest $request){
        $faq = Faq::create($request->all());
        return redirect()->route('admin.faq')->with('success','Faq Added Successfully');
    }
    public function add(){
        return view('admin.faq.add');
    }
    public function edit($id){
        $faq = Faq::find($id);
        return view('admin.faq.add')->with(compact('faq'));
    }
    public function update(FaqRequest $request ,$id){
        try{
            $faq = Faq::find($id);
            $faq->update([
                'title' => $request->title,
                'question' => $request->question,
                'answer' => $request->answer,
            ]);
            $faq->save();
            return redirect()->route('admin.faq')->with('success','Faq has been updated Successfully!');
        }catch(\Exception $e){
            return redirect()->back()->with('error','Please add carefully!');
        }
    }
    public function delete($id){
        $faq = Faq::find($id)->delete();
        return back()->with('success','Faq has been deleted Successfully');
    }
}
