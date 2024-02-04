<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\ToppingController;

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
Route::post('/topping-store', [ToppingController::class, 'index'])->name('topping-store');
