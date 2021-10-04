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

Route::get('/categories/{id}', [CategoriesController::class, 'show'])->name('categories.show');
Route::post('/add_to_card', [ProductsController::class, 'add_to_card'])->name('add_to_card');

Auth::routes(['register' => false, 'verfiy' => true]);

Route::prefix('dashboard')->middleware(['auth'])->group(function () {
  Route::get('/', [CategoriesController::class, 'index'])->name('homepage');

  Route::prefix('products')->group(function (){
    Route::get('/', [ProductsController::class, 'index'])->name('products.index'); 
    Route::get('/new', [ProductsController::class, 'create'])->name('products.create');
    Route::post('/new', [ProductsController::class, 'store'])->name('products.create');
  });

  Route::prefix('categories')->group(function (){
    Route::get('/', [CategoriesController::class, 'index'])->name('categories.index'); 
    Route::get('/new', [CategoriesController::class, 'create'])->name('categories.create');
    Route::post('/new', [CategoriesController::class, 'store'])->name('categories.create');
  });      
});

Auth::routes();

Route::get('/', [App\Http\Controllers\CategoriesController::class, 'index'])->name('home');
