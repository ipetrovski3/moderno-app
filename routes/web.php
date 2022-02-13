<?php

use App\Http\Controllers\CarouselImagesController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\DocumentsController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\PublicController;
use App\Models\Invoice;

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
Route::get('categories/{slug}', [PublicController::class, 'show'])->name('categories.show');
Route::post('/add_to_card', [ProductsController::class, 'add_to_cart'])->name('add_to_cart');
Route::get('/cart', [PublicController::class, 'show_cart'])->name('show.cart');
Route::post('/confirm_order', [OrdersController::class, 'store'])->name('store.order');
Route::get('/products/{id}', [ProductsController::class, 'show'])->name('product.show');
Route::post('/remove-from-cart', [PublicController::class, 'remove_from_cart'])->name('remove_from_cart');
Route::post('/clear-cart', [PublicController::class, 'clear_cart'])->name('clear_cart');
Route::get('/about_as', function () {
  return view('about');
})->name('about');

Route::get('/contact', [ContactsController::class, 'new'])->name('contact');
Route::post('/contact', [ContactsController::class, 'store'])->name('store.contact');


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
    Route::post('/activate', [ProductsController::class, 'active_deactive'])->name('activate.product');
    Route::post('/select-category', [ProductsController::class, 'select_category'])->name('select.category');
  });

  Route::prefix('categories')->group(function () {
    Route::get('/', [CategoriesController::class, 'index'])->name('categories.index');
    Route::get('/new', [CategoriesController::class, 'create'])->name('categories.create');
    Route::post('/new', [CategoriesController::class, 'store'])->name('categories.create');
    Route::get('/{category}/edit', [CategoriesController::class, 'edit'])->name('category.edit');
    Route::put('/{category}/edit', [CategoriesController::class, 'update'])->name('category.update');
    Route::post('/activate', [CategoriesController::class, 'active'])->name('activate.category');
  });

  Route::prefix('orders')->group(function () {
    Route::get('/',  [OrdersController::class, 'index'])->name('orders.index');
    Route::post('/', [OrdersController::class, 'update_status'])->name('status.update');
    Route::get('/{id}', [OrdersController::class, 'show'])->name('order.show');
    Route::delete('/delete_order', [OrdersController::class, 'destroy'])->name('order.delete');
  });

  Route::prefix('customers')->group(function () {
    Route::get('/', [CustomersController::class, 'index'])->name('customers.index');
    Route::post('/', [CustomersController::class, 'contact_customer'])->name('contact_customer');
    Route::post('/email_all', [CustomersController::class, 'email_all'])->name('email_all');
  });

  Route::prefix('companies')->group(function () {
    Route::get('/', [CompaniesController::class, 'index'])->name('companies.index');
    Route::get('/create', [CompaniesController::class, 'create'])->name('companies.create');
    Route::post('/create', [CompaniesController::class, 'store'])->name('companies.store');
  });

  Route::prefix('images')->group(function () {
    Route::get('/', [CarouselImagesController::class, 'index'])->name('images.index');
    Route::get('/create', [CarouselImagesController::class, 'new'])->name('images.create');
    Route::post('/create', [CarouselImagesController::class, 'store'])->name('images.store');
    Route::post('/activate', [CarouselImagesController::class, 'activate'])->name('image.activate');
    Route::delete('images/{id}', [CarouselImagesController::class, 'destroy'])->name('image.delete');
  });

  Route::prefix('invoices')->group(function () {
    Route::get('/', [InvoicesController::class, 'index'])->name('invoices.index');
    Route::get('/create', [InvoicesController::class, 'create'])->name('invoice.create');
    Route::post('/store', [InvoicesController::class, 'store_customer_invoice'])->name('invoice.store');
    Route::get('/show/{uniqid}', [InvoicesController::class, 'show'])->name('invoices.show');
    Route::get('/incoming-invoice', [InvoicesController::class, 'create_incoming_invoice'])->name('create.incoming.invoice');
    Route::post('/store-incoming-invoice', [InvoicesController::class, 'store_incoming_invoice'])->name('store.incoming.invoice');
    Route::post('/select-company', [InvoicesController::class, 'select_company'])->name('select.company');
  });

  Route::prefix('pdf')->group(function () {
    Route::get('/label/{id}', [PdfController::class, 'create_label'])->name('label');
    Route::get('/invoice-create/{uniqid}', [PdfController::class, 'create_invoice'])->name('invoice.pdf');
  });

  Route::prefix('documents')->group(function () {
    Route::get('/new-document', [DocumentsController::class, 'create'])->name('document.create');
    Route::post('/select-document', [DocumentsController::class, 'select_document'])->name('document.select');
    Route::post('/store-document', [DocumentsController::class, 'create_material_document'])->name('store.document');
    Route::post('remove-article', [DocumentsController::class, 'remove_article'])->name('remove.article');
    Route::post('/select-company', [DocumentsController::class, 'select_company'])->name('select.company');
    Route::post('/select-product', [DocumentsController::class, 'select_product'])->name('select.product');
    Route::post('/invoiced-product', [DocumentsController::class, 'invoiced_product'])->name('invoiced.product');


  });
});

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
