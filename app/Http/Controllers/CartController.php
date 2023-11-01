<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index() {
        $products = session('cart', []);
        $total = 0;
        foreach ($products as $productId => $productDetails) {
        $subtotal = $productDetails['price'] * $productDetails['qty'];
        $total += $subtotal;
    }
        return view('dashboard.cart')->with('products', $products)->with(compact('total'));
    }
    
    
    public function add(Request $request) {
        try {
            if (Auth::check()) {
                if (Auth::user()->role_id == 1 || Auth::user()->role_id == 2) {
                    return ['error' => 'You are not allowed to buy anything', 401];
                } else {
                    $product = Product::where('id',$request->product_id)->with('imageOne')->first();
                    if ($product) {
                        $cart = session('cart', []);
                        if (!empty($cart)) {
                            $firstProductUserId = reset($cart)['user_id']; // Get the user ID of the first product in the cart
                            if ($product->user_id !== $firstProductUserId) {
                                return ['error' => 'Please add products from the same vendor or clear your cart.'];
                            }
                        }
                        $productId = $product->id;
        
                        if (array_key_exists($productId, $cart)) {
                            $cart[$productId]['qty']++;
                        } else {
                            $cart[$productId] = [
                                "id" => $product->id,
                                "title" => $product->title,
                                "user" => $product->user->name,
                                "user_id"=>$product->user->id,
                                "price" => $product->price,
                                'image'=> $product->imageOne->url,
                                "qty" => 1,
                            ];
                        }
        
                        session(['cart' => $cart]);
                        return ['success' => 'Your Product has been added to the cart.'];
                    } else {
                        return ['error' => 'Product not found', 404];
                    }
                }
                }else {
                    $product = Product::where('id',$request->product_id)->with('imageOne')->first();
                    if ($product) {
                        $cart = session('cart', []);
                        if (!empty($cart)) {
                            $firstProductUserId = reset($cart)['user_id']; // Get the user ID of the first product in the cart
                            if ($product->user_id !== $firstProductUserId) {
                                return ['error' => 'Please add products from the same vendor or clear your cart.'];
                            }
                        }
                        $productId = $product->id;
        
                        if (array_key_exists($productId, $cart)) {
                            $cart[$productId]['qty']++;
                        } else {
                            $cart[$productId] = [
                                "id" => $product->id,
                                "title" => $product->title,
                                "user" => $product->user->name,
                                "user_id"=>$product->user->id,
                                "price" => $product->price,
                                'image'=> $product->imageOne->url,
                                "qty" => 1,
                            ];
                        }
        
                        session(['cart' => $cart]);
                        return ['success' => 'Your Product has been added to the cart.'];
                    } else {
                        return ['error' => 'Product not found', 404];
                    }
                }
        } catch (\Exception $e) {
            dd($e->getMessage());
            return ['error' => 'There is an error while adding the product to the cart.', 401];
        }
    }    
    public function getCartCount() {
        $cartCount = count(session('cart', []));
        return response()->json(['cartCount' => $cartCount]);
    }
    public function getCartProduct(){
        try{
            $productIds = session('cart', []);
            dd($productIds);
            $products = Product::whereIn('id', $productIds)->with('imageOne','user')->get();
            return ['products' => $products];
        }
        catch(\Exception $e){
            return ['error',$e->getMessage(),401];
        }
    }
    public function increase($id) {
        $id = (int)$id;
        if (session()->has('cart')) {
            $cart = session('cart');
            if (array_key_exists($id, $cart)) {
                $cart[$id]['qty']++;
                session(['cart' => $cart]);
                return back()->with('success', 'Product quantity has been increased.');
            }
        }
        return back()->with('error', 'Product not found in the cart.');
    }
    
    public function decrease($id) {
        $id = (int)$id;
        if (session()->has('cart')) {
            $cart = session('cart');
            if (array_key_exists($id, $cart)) {
                if ($cart[$id]['qty'] > 1) {
                    $cart[$id]['qty']--;
                    session(['cart' => $cart]);
                    return back()->with('success', 'Product quantity has been decreased.');
                } else {
                    unset($cart[$id]);
                    session(['cart' => $cart]);
                    return back()->with('success', 'Product has been removed from the cart.');
                }
            }
        }
        return back()->with('error', 'Product not found in the cart.');
    }
    
    public function removeSingle(Request $request, $id) {
        $id = (int)$id;
        if ($request->session()->has('cart')) {
            $cart = $request->session()->get('cart');
            if (array_key_exists($id, $cart)) {
                unset($cart[$id]);
                $request->session()->put('cart', $cart);
                return back()->with('success', 'Product has been removed from the cart');
            } else {
                return back()->with('error', 'Product not found in the cart');
            }
        }
        return back()->with('error', 'Product not found in cart');
    }
    public function clearCart(Request $request) {
        $request->session()->forget('cart');
        return back()->with('success', 'Cart has been cleared');
    }
}
