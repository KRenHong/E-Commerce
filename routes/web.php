<?php

use App\Http\Controllers\UserContrller;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\PaypalPaymentController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [HomeController::class,"index"])->name("home");

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Admin controllers
Route::get("admin",[AdminController::class,"index"])->name("admin.index");
Route::get("admin/login",[AdminController::class,"showAdminLoginForm"])->name("admin.login");
Route::post("admin/login",[AdminController::class,"adminLogin"])->name("admin.log");
Route::post("admin/logout",[AdminController::class,"adminLogOut"])->name("admin.logout");

// Resources routes
Route::resource('category',CategoryController::class);
Route::resource('item',ItemController::class);
Route::resource('Comment',CommentController::class);
Route::resource('order',OrderController::class);

// Route method get item by category
Route::get("items/category/{category}",[HomeController::class,"getItemByCategory"])->name("cat.items");

// Card routes
Route::get("/card",[CartController::class,"index"])->name('cart.index');
Route::post("add/card/{item}",[CartController::class,"addItemToCart"])->name('add.cart');
Route::put("update/{item}/card",[CartController::class,"updateItemOnCart"])->name('update.cart');
Route::delete("remove/{item}/card",[CartController::class,"removeItemFromCart"])->name('remove.cart');

// Payments with stripe route
// Checkout route
Route::get('/checkout/{amount}',[PaymentsController::class,"checkout"])->name("cart.checkout");

// Charge route
Route::post('/charge',[PaymentsController::class,"charge"])->name("cart.charge");

//Payment with paypal routes
Route::get("/handel-payment",[PaypalPaymentController::class,"handelPayment"])->name("make.payment");
Route::get("/Cancel-payment",[PaypalPaymentController::class,"CancelPayment"])->name("cancel.payment");
Route::get("/Payment-success",[PaypalPaymentController::class,"SuccessPayment"])->name("success.payment");

// Send email route
Route::post("/send_email",[MailController::class,'SendEmail'])->name("send_email");

// User controller route
Route::get('/my_orders',[UserContrller::class,'getUserOrders'])->name("user.orders");

// Edit profile route
Route::get('edit/user/{user}',[UserContrller::class,'edit'])->name('user.edit');

// Update profile route
Route::put('update/{user}/user',[UserContrller::class,'update'])->name('user.update');