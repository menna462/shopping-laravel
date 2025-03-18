<?php

use App\Http\Controllers\backend\BackendController;
use App\Http\Controllers\BasicinfoController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\frontend\FrontendController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('CheckAdmain')->group(function () {

    Route::get('/backend/users', [UserController::class, 'index'])->name('users');
    Route::get('/backend/products', [ProductController::class, 'index'])->name('products');
    Route::get('/backend/basicinfo', [BasicinfoController::class, 'index'])->name('basicinfo');
    Route::get('/backend/location', [LocationController::class, 'index'])->name('locations');


    // crud operation user
    Route::get('/User/show/{id}', [UserController::class, 'show'])->name('user.show');
    Route::get('/User/delete/{id}', [UserController::class, 'delete'])->name('user.delete');
    Route::get('/User/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/User/update', [UserController::class, 'update'])->name('user.update');


    // crud operation product
    Route::get('/Products/show/{id}', [ProductController::class, 'show'])->name('product.show');
    Route::get('/Products/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
    Route::get('/Products/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/Products/store', [ProductController::class, 'store'])->name('product.store');
    Route::get('/Products/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('/Products/update', [ProductController::class, 'update'])->name('product.update');
    // crud operation product

    Route::get('/Locations/show/{id}', [LocationController::class, 'show'])->name('location.show');
    Route::get('/Locations/delete/{id}', [LocationController::class, 'delete'])->name('location.delete');
    Route::get('/Locations/create', [LocationController::class, 'create'])->name('location.create');
    Route::post('/Locations/store', [LocationController::class, 'store'])->name('location.store');
    Route::get('/Locations/edit/{id}', [LocationController::class, 'edit'])->name('location.edit');
    Route::post('/Locations/update', [LocationController::class, 'update'])->name('location.update');
});


    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::get('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::put('/cart/update/{id}', [CartController::class, 'updateCart'])->name('cart.update');
    Route::get('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
    Route::get('/backend/order', [OrderController::class, 'index'])->name('orders.index');
    Route::post('/backend/order/{order}/pay', [OrderController::class, 'markAsPaid'])->name('orders.pay');
    Route::get('/cart/send-order', [CartController::class, 'sendOrderToWhatsApp'])->name('cart.sendOrder');


Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/shop', [ProductController::class, 'shop'])->name('shop'); // عرض كل المنتجات
Route::get('/product/{id}', [ProductController::class, 'show2'])->name('product.show2'); // عرض منتج معين
Route::controller(BackendController::class)->group(function () {
    Route::get('/user/logout', 'userLogout')->name('userlogout');
});
Route::get('/about', function () {
    return view('include.about');
})->name('about');
Route::get('/cart-count', [CartController::class, 'getCartCount']);







require __DIR__ . '/auth.php';
