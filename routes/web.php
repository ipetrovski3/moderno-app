<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\PublicController;

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


Route::get('/', [PublicController::class, 'index'])->name('homepage');
Route::get('categories/{id}', [PublicController::class, 'show'])->name('categories.show');
Route::post('/add_to_card', [ProductsController::class, 'add_to_cart'])->name('add_to_cart');
Route::get('/cart', [PublicController::class, 'show_cart'])->name('show.cart');
Route::post('/confirm_order', [OrdersController::class, 'store'])->name('store.order');

Route::get('/dasboard', function () {
  return redirect()->route('dashboard');
})->middleware('auth');

Route::get('/admin', function () {
  return redirect()->route('dashboard');
})->middleware('auth');


Auth::routes(['register' => false, 'verfiy' => true]);

Route::prefix('dashboard')->middleware(['auth'])->group(function () {

  Route::prefix('products')->group(function () {
    Route::get('/', [ProductsController::class, 'index'])->name('products.index');
    Route::get('/new', [ProductsController::class, 'create'])->name('products.create');
    Route::post('/new', [ProductsController::class, 'store'])->name('product.create');
  });

  Route::prefix('categories')->group(function () {
    Route::get('/', [CategoriesController::class, 'index'])->name('categories.index');
    Route::get('/new', [CategoriesController::class, 'create'])->name('categories.create');
    Route::post('/new', [CategoriesController::class, 'store'])->name('categories.create');
  });

  Route::prefix('orders')->group(function () {
    Route::get('/',  [OrdersController::class, 'index'])->name('orders.index');
    Route::post('/', [OrdersController::class, 'update_status'])->name('status.update');
    Route::get('/{id}', [OrdersController::class, 'show'])->name('order.show');
    Route::delete('/delete_order', [OrdersController::class, 'destroy'])->name('order.delete');
  });

  Route::prefix('pdf')->group(function () {
    Route::get('/label', [PdfController::class, 'create_label'])->name('label');
  });
});

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
