<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
class CategoryController extends Controller
{
    public function index(){
        $categories = Category::get();
        return view('admin.categories.view')->with(compact('categories'));
    }
    public function add(){
        return view('admin.categories.add');
    }
    public function store(CategoryRequest $request){
        try{    
            $category = Category::create([
                'name'=> $request->name,
                'slug'=> $request->slug,
                'is_active' => $request->is_active?1:0,
            ]);
            $category->save();
            return redirect()->route('admin.category')->with('success','Category has been added Successfully!');
        }
        catch(\Exception $e){
            return redirect()->back()->with('error','Please add carefully!');
        }
    }
    public function edit($id){
        $category = Category::find($id);
        return view('admin.categories.add')->with(compact('category'));
    }
    public function update(CategoryRequest $request ,$id){
        try{
            $category = Category::find($id);
            $category->update([
                'name' => $request->name,
                'slug' => $request->slug,
                'is_active' => $request->is_active?1:0,
            ]);
            $category->save();
            return redirect()->route('admin.category')->with('success','Category has been updated Successfully!');
        }catch(\Exception $e){
            return redirect()->back()->with('error','Please add carefully!');
        }
    }
    public function delete($id){
        $product = Category::find($id)->delete();
        return back()->with('success','Category has been deleted Successfully');
    }
}
