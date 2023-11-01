<?php

use App\Http\Controllers\Auth\{LoginController,RegisterController,ForgetPasswordController};
use App\Http\Controllers\{HomeController,BlogController,DashboardController,ContactController,ProfileController,
    ProductController,ShopController,WishlistController,SearchController,CartController,CheckoutController,OrderController};
use App\Http\Controllers\Admin\FaqController;

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/", [HomeController::class,"index"])->name("dashboard");
Route::get("/about", [HomeController::class,"about"])->name("about");

Route::get("/contact", [ContactController::class,"contact"])->name("contact");
Route::post('/contact/store',[ContactController::class,'store'])->name('contact.store');

Route::get("/blog", [BlogController::class,"blog"])->name("blog");
Route::get('/shop',[ShopController::class,'index'])->name('shop');
Route::post('/shop/search',[SearchController::class,'search'])->name('products.search');
Route::post('/shop/price',[SearchController::class,'searchByPrice'])->name('products.search.price');
Route::get('/shop/category/{id}',[SearchController::class,'searchByCategory'])->name('products.search.category');
Route::get('/shop/artist/{id}',[SearchController::class,'searchByArtist'])->name('products.search.artist');

Route::get("/product/details/{id}", [ProductController::class,"productDetails"])->name("product.details");

Route::get('/faqs',[FaqController::class,'home'])->name('faq.home');
Route::get('/cart',[CartController::class,'index'])->name('cart');
Route::post('/cart/add',[CartController::class,'add'])->name('cart.add');
Route::get('/cart/count',[CartController::class,'getCartCount'])->name('cart.count');
Route::get('/cart/product',[CartController::class,'getCartProduct'])->name('cart.product');
Route::get('/cart/remove/single/{id}',[CartController::class,'removeSingle'])->name('cart.remove.single');
Route::get('/cart/clear',[CartController::class,'clearCart'])->name('cart.clear');
Route::get('/cart/increase/product/{id}',[CartController::class,'increase'])->name('cart.increase.product');
Route::get('/cart/decrease/product/{id}',[CartController::class,'decrease'])->name('cart.decrease.product');


Route::get('/checkout',[CheckoutController::class,'index'])->name('checkout');
Route::post('/checkout/post',[CheckoutController::class,'stripeCheckout'])->name('checkout.post');
Route::get('/checkout/success',[CheckoutController::class,'stripeSuccess'])->name('payment.success');
Route::get('/checkout/fail',[CheckoutController::class,'stripeFail'])->name('payment.fail');

// Forgot Password
// Route::get('/forgot-password', [ForgetPasswordController::class, 'index'])->name('auth.login');
Route::get('/forget-password', [ForgetPasswordController::class, 'index'])->name('auth.forgetPassword');
Route::post('/forget-password', [ForgetPasswordController::class, 'reset'])->name('auth.forgetPassword.reset');
Route::get('/reset-password/{token}', function (string $token) {
    return view('dashboard.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');
Route::get('/reset-password/{token}', function (string $token) {
    return view('dashboard.reset-password', ['token' => $token])->with('title', 'Reset Password');
})->middleware('guest')->name('password.reset');
Route::post('/reset-password', [ForgetPasswordController::class, 'resetPassword'])->name('password.update');

//Forget Password Ends


Route::get("/login", [LoginController::class,"login"])->name("login");
Route::post("/authenticate", [LoginController::class,"authenticate"])->name("authenticate");
Route::post("/signup", [RegisterController::class,"signup"])->name("signup");
Route::get("/logout", [LoginController::class,"logout"])->name("logout");

Route::middleware(['auth'])->prefix('dashboard')->name('user.')->group(function () {
    Route::get("/my-account", [DashboardController::class,"index"])->name("account");
    Route::get("/my-account/profile", [ProfileController::class,"index"])->name("profile");
    Route::post("/my-account/profile/update", [ProfileController::class,"update"])->name("update");

    Route::get("/my-account/artwork/list", [ProductController::class,"index"])->name("artwork.list");
    Route::get("/my-account/artwork/add", [ProductController::class,"add"])->name("artwork.add");
    Route::post("/my-account/artwork/store", [ProductController::class,"store"])->name("artwork.store");
    Route::get("/my-account/artwork/edit/{id}", [ProductController::class,"edit"])->name("artwork.edit");
    Route::post("/my-account/artwork/update/{id}", [ProductController::class,"update"])->name("artwork.update");
    Route::get("/my-account/artwork/delete/{id}", [ProductController::class,"delete"])->name("artwork.delete");

    Route::get('/wishlist',[WishlistController::class,'index'])->name('wishlist');
    Route::post("/wishlist/add",[WishlistController::class,'add'])->name('wishlist.add');
    Route::post("/wishlist/remove",[WishlistController::class,'remove'])->name('wishlist.remove');
    Route::get("/wishlist/remove/{id}",[WishlistController::class,'delete'])->name('wishlist.delete');

    Route::get('/order/list',[OrderController::class,'index'])->name('order.list');
    Route::get('/order/view/{order_id}',[OrderController::class,'view'])->name('order.view');
    Route::post('/orders/update/{order_id}',[OrderController::class,'update'])->name('order.update');
});

