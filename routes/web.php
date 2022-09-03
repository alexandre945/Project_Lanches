<?php

use App\Http\Controllers\ModelProductController;
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


Route::get('/admin/create',[ModelProductController::class,'create'])->name('admin.create');
Route::post('/admin/store',[ModelProductController::class,'store'])->name('admin.store');
Route::get('/admin',[ModelProductController::class,'index'])->name('admin.index');
Route::delete('/admin/delete/{id}',[ModelProductController::class,'delete'])->name('admin.delete');
Route::get('/admin/update/{id}',[ModelProductController::class, 'update'])->name('admin.update');
Route::put('/admin/edit/{id}',[ModelProductController::class,'edit'])->name('admin.edit');

//route user

Route::get('/user/index',[ModelProductController::class,'show'])->name('user.index');

//combos

Route::get('/combo/create',[ModelProductController::class, 'comboCreate'])->name('combo.create');
Route::post('/combo/store',[ModelProductController::class, 'comboStore'])->name('combo.store');
Route::get('/combo/index',[ModelProductController::class, 'comboIndex'])->name('combo.index');
Route::get('/comboIndex/show',[ModelProductController::class, 'comboshow'])->name('comboIndex.show');

//route drink

Route::get('/drink/create',[ModelProductController::class, 'drinkCreate'])->name('drink.create');
Route::get('/drink/index' ,[ModelProductController::class, 'drinkIndex'])->name('drink.index');
Route::post('/drink/store',[ModelProductController::class, 'drinkStore'])->name('drink.store');


//cart

Route::get('/user/cart',[ModelProductController::class,'cart'])->name('user.cart');
Route::get('/drink/show',[ModelProductController::class, 'drinkShow'])->name('drink.show');
