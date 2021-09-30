<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductsController;

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

// Route::get('/', [CategoriesController::class, 'index'])->name('homepage');

Route::get('/dasboard', function() {
  return redirect()->route('dashboard');
})->middleware('auth');

Route::get('/admin', function() {
  return redirect()->route('dashboard');
})->middleware('auth');


Auth::routes(['register' => false, 'verfiy' => true]);

Route::prefix('dashboard')->middleware(['auth'])->group(function () {
  Route::get('/', [CategoriesController::class, 'index'])->name('homepage');
  Route::get('/products', [ProductsController::class, 'index'])->name('products.index'); 
  Route::get('/new', [ProductsController::class, 'create'])->name('product.create');
  Route::post('/new', [ProductsController::class, 'store'])->name('product.create');
      
});

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
