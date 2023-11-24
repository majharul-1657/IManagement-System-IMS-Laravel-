<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\HomeController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

 Route::get('/', [HomeController::class, 'index']);

Route::prefix('user')->name('user.')->group(function(){

    Route::middleware(['guest:web','PreventBackHistory'])->group(function(){
        Route::get('/login',[UserController::class,'login'])->name('login');
        Route::get('/register',[UserController::class,'register'])->name('register');
          Route::post('/create',[UserController::class,'create'])->name('create');
          Route::post('/check',[UserController::class,'check'])->name('check');

    });

    Route::middleware(['auth:web','PreventBackHistory'])->group(function(){
          Route::get('/home',[UserController::class,'index'])->name('home');
          Route::post('/logout',[UserController::class,'logout'])->name('logout');
          Route::get('/add-new',[UserController::class,'add'])->name('add');




Route::get('/product_index',[UserController::class,'product_index'])->name('product.index');
Route::get('/product-create',[UserController::class, 'product_create'])->name('product.create');
Route::post('/store',[UserController::class, 'store'])->name('product.store');
Route::get('/edit/{id}',[UserController::class, 'edit'])->name('product.edit');
Route::post('/update/{id}',[UserController::class, 'update'])->name('product.update');
Route::get('/delete/{id}',[UserController::class, 'delete'])->name('product.delete');


    });

});


