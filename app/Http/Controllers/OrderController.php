<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::where('user_id',auth()->user()->id)->with('user','product')->get();
        // dd($orders);
        return view('dashboard.artist-order-list')->with(compact('orders'));
    }
    public function getAll(){
        $orders = Order::with('user','product')->get();
        // dd($orders);
        return view('admin.order.view')->with(compact('orders'));
    }
    public function adminView($id){
        $order = Order::where('order_id',$id)->with('user','product.imageOne')->first();
        return view('admin.order.detail')->with(compact('order'));
    }
    public function view($id){
        $order = Order::where('order_id',$id)->with('user','product.imageOne')->first();
        return view('dashboard.artist-order-view')->with(compact('order'));
    }
    public function update(Request $request, $id){
        $order = Order::where('order_id',$id)->first();
        if($request->order_status == 1){
            $order->update(['order_status'=>'pending']);
            $order->save();
        }
        else if($request->order_status == 2){
            $order->update(['order_status'=>'In Progress']);
            $order->save();
        }
        else if($request->order_status == 3){
            $order->update(['order_status'=>'In route']);
            $order->save();
        }
        else if($request->order_status == 4){
            $order->update(['order_status'=>'Delivered']);
            $order->save();
        }else{
            $order->update(['order_status'=>'pending']);
            $order->save();
        }
        return redirect()->back()->with('success','Order Updated');
    }
}
