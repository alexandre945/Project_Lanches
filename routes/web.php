<?php

use App\Http\Controllers\ControllerCart;
use App\Http\Controllers\ControllerProduct;
use App\Http\Controllers\ControllerCombo;
use App\Http\Controllers\ControllerDrink;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

//route admin


Route::get('/admin/create',[ControllerProduct::class,'create'])->name('admin.create');
Route::post('/admin/store',[ControllerProduct::class,'store'])->name('admin.store');
Route::get('/admin',[ControllerProduct::class,'index'])->name('admin.index');
Route::delete('/admin/delete/{id}',[ControllerProduct::class,'delete'])->name('admin.delete');
Route::get('/admin/update/{id}',[ControllerProduct::class, 'update'])->name('admin.update');
Route::put('/admin/edit/{id}',[ControllerProduct::class,'edit'])->name('admin.edit');

//route user

Route::get('/user/index',[ControllerProduct::class,'show'])->name('user.index');

//combos

Route::get('/combo/create',[ControllerCombo::class, 'create'])->name('combo.create');
Route::post('/combo/store',[ControllerCombo::class, 'store'])->name('combo.store');
Route::get('/combo/index',[ControllerCombo::class, 'index'])->name('combo.index');
Route::get('/comboIndex/show',[ControllerCombo::class, 'show'])->name('comboIndex.show');

//route drink

Route::get('/drink/create',[ControllerDrink::class, 'create'])->name('drink.create');
Route::get('/drink/index' ,[ControllerDrink::class, 'index'])->name('drink.index');
Route::post('/drink/store',[ControllerDrink::class, 'store'])->name('drink.store');
Route::get('/drink/show',[ControllerDrink::class, 'show'])->name('drink.show');

//cart

Route::post('/cart/store/{id}',[ControllerCart::class, 'store'])->name('cart.store');
Route::get('/show/cart',[ControllerCart::class,'show'])->name('show.cart');
Route::delete('/cart/delete/{id}',[ControllerCart::class, 'delete'])->name('delete.cart');

//adreesses
Route::post('/adreesses/create',[UserController::class, 'store'])->name('adeesses.store');

