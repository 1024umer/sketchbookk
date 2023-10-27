<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BlogRequest;
use App\Models\Blog;
use App\Repositories\FileRepository;
use Illuminate\Http\Request;
class BlogController extends Controller
{
    protected $file;
    public function __construct(FileRepository $file){
        $this->file = $file;
    }
    public function index(){
        $blogs = Blog::with('image')->get();
        return view('admin.blog.view')->with(compact('blogs'));
    }
    public function add(){
        return view('admin.blog.add');
    }
    public function store(BlogRequest $request){
        try{
            $blog = Blog::create([
                'name' => $request->name,
                'title' => $request->title,
                'description' => $request->description,
                'is_active' => $request->is_active?1:0,
                'is_featured' => $request->is_featured?1:0,
                'slug'=>$request->slug,
            ]);
            if($request->file){
                $image = $this->file->create([$request->file],'blogs', $blog->id,1);
            }
            return redirect()->route('admin.blog')->with('success','Blog has been added successfully');
        }
        catch(\Exception $e){
            return back()->with('error', 'Please fill out all fields carefully');
        }
    }
    public function edit($id){
        $blog = Blog::where('id',$id)->with('image')->first();
        // dd($blog);
        return view('admin.blog.add')->with(compact('blog'));
    }
    public function update(Request $request ,$id){
        try{
            $blog = Blog::find($id);
            $blog->update([
                'name' => $request->name,
                'title' => $request->title,
                'description' => $request->description,
                'is_active' => $request->is_active?1:0,
                'is_featured' => $request->is_featured?1:0,
                'slug'=>$request->slug,
            ]);
            $blog->save();
            if($request->file){
                $image = $this->file->create([$request->file],'blogs', $blog->id,1);
            }
            return redirect()->route('admin.blog')->with('success','Blog has been updated Successfully!');
        }catch(\Exception $e){
            return redirect()->back()->with('error','Please add carefully!');
        }
    }
    public function delete($id){
        $product = Blog::find($id)->delete();
        return back()->with('success','Blog has been deleted Successfully');
    }
}
