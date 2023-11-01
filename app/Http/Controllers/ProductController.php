<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\{Product,File,Category};
use App\Repositories\FileRepository;
use Illuminate\Http\Request;
class ProductController extends Controller
{
    protected $file;
    public function __construct(FileRepository $file){
        $this->file = $file;
    }
    public function index(){
        $products = Product::where('user_id',auth()->user()->id)->with('image')->get();
        return view('dashboard.list-artwork')->with('title','Artwork')->with(compact('products'));
    }
    public function add(){
        $categories = Category::where('is_active',1)->get();
        return view('dashboard.add-artwork')->with('title','Artwork')->with(compact('categories'));
    }
    public function store(ProductRequest $request){
        try{
            $product = Product::create([
                'title' => $request->title,
                'description' => $request->description,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'is_active'=> $request->is_active?1:0,
                'is_featured'=> $request->is_featured?1:0,
                'category_id'=>json_encode($request->category_id),
                'user_id'=> auth()->user()->id,
            ]);
            if($request->hasFile('artwork')){
                foreach($request->file('artwork') as $file){
                    $this->file->create([$file],'products', $product->id,2);
                }
            }
            return redirect()->route('user.artwork.list')->with('success','Your Artwork has been added Successfully!');
        }catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function edit($id){
        $product = Product::where('id',$id)->with('image')->first();
        $categories = Category::where('is_active',1)->get();
        return view('dashboard.add-artwork')->with('title','Artwork')->with(compact('product','categories'));
    }
    public function update(ProductRequest $request,$id){
        try{
            $product = Product::where('id',$id)->first();
            $product->update([
                'title' => $request->title,
                'description' => $request->description,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'is_active' => $request->has('is_active') ? 1 : 0,
                'is_featured'=> $request->is_featured?1:0,
                'category_id'=>json_encode($request->category_id),
                'user_id'=> auth()->user()->id,
            ]); 
            $product->save();
            if($request->hasFile('artwork')){
                foreach($request->file('artwork') as $file){
                    $this->file->create([$file],'products', $product->id,2);
                }
            }
            return redirect()->route('user.artwork.list')->with('success','Your Artwork has been updated Successfully!');
        }
        catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function delete($id){
        $product = Product::find($id)->delete();
        return back()->with('success','Product has been deleted Successfully');
    }

    public function productDetails($id){
        $product = Product::where('id',$id)->with('image')->first();
        $categoryIds = json_decode($product->category_id);
        $categories = Category::whereIn('id', $categoryIds)->get();
        return view('dashboard.product-details')->with(compact('product','categories'))->with('title',$product->title);
    }
}
