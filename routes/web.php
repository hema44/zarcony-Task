<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrandsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\checkOutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductsController;
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
Route::get("login",[AuthController::class,"ShowLoginForm"])->name("login");
Route::post("login",[AuthController::class,"Login"])->name("DoLogin");

Route::get("admin/login",[App\Http\Controllers\Admin\AuthController::class,"ShowLoginForm"])->name("AdminLoginForm");
Route::post("admin/login",[App\Http\Controllers\Admin\AuthController::class,"Login"])->name("AdminLogin");

Route::post("register",[AuthController::class,"Register"])->name("register");
Route::get('/', [ProductsController::class,"index"])->name("home");
Route::get('/products/{id}', [ProductsController::class,"productDetails"])->name("productDetails");
Route::get('/brands', [BrandsController::class,"index"])->name("brands");

Route::middleware("auth")->group(function (){
   Route::get("AddToCart/{id}",[CartController::class,"store"])->name("AddToCart");
   Route::get("cart",[CartController::class,"show"])->name("cart");
   Route::get("cart/{id}",[CartController::class,"delete"])->name("cartDelete");
   Route::get("checkout",[checkOutController::class,"checkout"])->name("checkout");
   Route::post("placeOrder",[OrderController::class,"order"])->name("placeOrder");
   Route::get("logout",[AuthController::class,"logout"])->name("logout");
});

Route::middleware(["auth","Admin"])->prefix("admin")->group(function (){
    Route::resource("brands",BrandController::class);
    Route::get('datatables/brands',[BrandController::class,'datatables'])->name('brands.datatables');
    Route::resource("products",ProductController::class);
    Route::get('datatables/products',[ProductController::class,'datatables'])->name('orders.datatables');
    Route::resource("orders",App\Http\Controllers\Admin\OrderController::class);
    Route::get('datatables/orders',[App\Http\Controllers\Admin\OrderController::class,'datatables'])->name('orders.datatables');
    Route::resource("users",App\Http\Controllers\Admin\UserController::class);
    Route::get('datatables/users',[App\Http\Controllers\Admin\UserController::class,'datatables'])->name('orders.datatables');

    Route::get("/",[AdminController::class,"index"])->name("admin.index");
    Route::get("logout",[App\Http\Controllers\Admin\AuthController::class,"logout"])->name("admin.logout");
    Route::get('get-brands',[BrandController::class,'getBrands'])->name('get-brands');
});
