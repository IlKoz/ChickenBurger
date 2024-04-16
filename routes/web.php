<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use App\Http\Controllers\MainController;
use App\Http\Controllers\CouponsController;
use App\Http\Controllers\TovarsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\WorkerController;
use App\Http\Controllers\TestPageController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/main', function () {
//     return view('main/main');
// })->name('main');php artisan route:clear

// Route::get('/coupons', function () {
//     return view('main/coupons');
// })->name('coupons');

// Main
Route::get('/', [MainController::class, 'index'])->name('main.index');

// TestPage
Route::get('/testPage', [TestPageController::class, 'index'])->name('test.index');

// Coupon
Route::get('/coupons', [CouponsController::class, 'index'])->name('coupons.index');
Route::post('/coupons/create', [CouponsController::class, 'create'])->name('coupons.create');
Route::post('/coupons/delete', [CouponsController::class, 'delete'])->name('coupons.delete');
Route::post('/coupons/deleteAll', [CouponsController::class, 'deleteAll'])->name('coupons.deleteAll');
Route::get('/coupons/{coupon}', [CouponsController::class, 'show'])->name('coupons.show');

// Promo
Route::get('/promo', [MainController::class, 'promo'])->name('main.promo');

// Map
Route::get('/map', [MainController::class, 'map'])->name('main.map');

// User
Route::get('/user/profile', [UserController::class, 'index'])->name('user.index');

// Cart
Route::get('/cart', [CartController::class, 'show'])->name('cart.show');
Route::post('/cart/create', [CartController::class, 'create'])->name('cart.create');
Route::post('/cart/delete', [CartController::class, 'delete'])->name('cart.delete');
Route::post('/cart/deleteAll', [CartController::class, 'deleteAll'])->name('cart.deleteAll');

// Orders
Route::post('/orders/create', [OrdersController::class, 'create'])->name('order.create');

// Worker panel
Route::get('/workerpanel', [WorkerController::class, 'index'])->name('workerpanel.index');
Route::patch('/workerpanel/{order}', [WorkerController::class, 'update'])->name('workerpanel.update');

// Admin panel
// Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/adminpanel', [TovarsController::class, 'index'])->name('adminpanel.index');
	Route::get('/adminpanel/create', [TovarsController::class, 'create'])->name('adminpanel.create');
	Route::post('/adminpanel', [TovarsController::class, 'store'])->name('adminpanel.store');
	Route::get('/adminpanel/{tovar}/edit', [TovarsController::class, 'edit'])->name('adminpanel.edit');
	Route::patch('/adminpanel/{tovar}', [TovarsController::class, 'update'])->name('adminpanel.update');
	Route::delete('/adminpanel/{tovar}', [TovarsController::class, 'destroy'])->name('adminpanel.destroy');
// });


Route::get('/dashboard', [UserController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


// Main
Route::get('/{tovar}', [MainController::class, 'show'])->name('main.show');
