<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class CartController extends Controller
{
    public function index(){
        $productIds = session('cart', []);
        $products = Product::whereIn('id', $productIds)->with('imageOne','user')->get();

        return view('dashboard.cart')->with('products', $products);
    }
    public function add(Request $request) {
        try {
            $product = Product::find($request->product_id);
            $cart = session('cart', []);
            
            if (empty($cart)) {
                $cart[] = $request->product_id;
                session(['cart' => $cart]);
                return ['success' => 'Your Product has been added to the cart.'];
            } else {
                foreach ($cart as $cartProductId) {
                    $cartProduct = Product::find($cartProductId);
                    if ($product->user_id !== $cartProduct->user_id) {
                        return ['error' => 'Please add products from the same vendor or clear your cart.'];
                    }
                }
                $cart[] = $request->product_id;
                session(['cart' => $cart]);
                return ['success' => 'Your Product has been added to the cart.'];
            }
        } catch (\Exception $e) {
            return ['error'=> 'There is an error while adding the product to the cart.', 401];
        }
    }
    
    public function getCartCount() {
        $cartCount = count(session('cart', []));
        return response()->json(['cartCount' => $cartCount]);
    }
    public function getCartProduct(){
        try{
            $productIds = session('cart', []);
            $products = Product::whereIn('id', $productIds)->with('imageOne','user')->get();
            return ['products' => $products];
        }
        catch(\Exception $e){
            return ['error',$e->getMessage(),401];
        }
    }
    public function removeSingle(Request $request, $id) {
        $id = (int)$id;
        if ($request->session()->has('cart')) {
            $cart = $request->session()->get('cart');
            if (in_array($id, $cart)) {
                $index = array_search($id, $cart);
                unset($cart[$index]);
                $request->session()->put('cart', $cart);
                return back()->with('success', 'Product has been removed from cart');
            } else {
                return back()->with('error', 'Product not found in cart');
            }
        }
        return back()->with('error', 'Product not found in cart');
    }
    public function clearCart(Request $request) {
        $request->session()->forget('cart');
        return back()->with('success', 'Cart has been cleared');
    }
}
