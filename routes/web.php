<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\ToppingController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\OrderController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/pizza-index', [PizzaController::class, 'index'])->name('pizza-index');
Route::get('/pizza-create', [PizzaController::class, 'create'])->name('pizza-create');
Route::post('/store-pizza', [PizzaController::class, 'store'])->name('store-pizza');
Route::get('/pizza-edit/{id}', [PizzaController::class, 'edit'])->name('pizza-edit');
Route::put('/update-pizza/{id}', [PizzaController::class, 'update'])->name('update-pizza');
Route::get('/pizza-destroy/{id}', [PizzaController::class, 'destroy'])->name('pizza-destroy');

Route::get('/topping-index', [ToppingController::class, 'index'])->name('topping-index');
Route::get('/topping-create', [ToppingController::class, 'create'])->name('topping-create');
Route::get('/topping-edit/{id}', [ToppingController::class, 'edit'])->name('topping-edit');
Route::post('/topping-store', [ToppingController::class, 'store'])->name('topping-store');
Route::put('/topping-update/{id}', [ToppingController::class, 'update'])->name('topping-update');
Route::get('/topping-destroy/{id}', [ToppingController::class, 'destroy'])->name('topping-destroy');

Route::get('/promotion-index', [PromotionController::class, 'index'])->name('promotion-index');
Route::get('/promotion-create', [PromotionController::class, 'create'])->name('promotion-create');
Route::get('/promotion-edit/{id}', [PromotionController::class, 'edit'])->name('promotion-edit');
Route::post('/promotion-store', [PromotionController::class, 'store'])->name('promotion-store');
Route::put('/promotion-update/{id}', [PromotionController::class, 'update'])->name('promotion-update');
Route::get('/promotion-destroy/{id}', [PromotionController::class, 'destroy'])->name('promotion-destroy');

Route::get('/order-index', [OrderController::class, 'index'])->name('order-index');
Route::get('/order-create', [OrderController::class, 'create'])->name('order-create');
Route::post('/order-store', [OrderController::class, 'store'])->name('order-store');
