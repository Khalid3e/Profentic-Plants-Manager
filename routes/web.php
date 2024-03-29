<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PlantController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LanguageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
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
    $language = session('language');
    App::setLocale($language);
    return view('auth.login');
});

//product
Route::get('/add-product', function () {
    return view('Admin.add_product');
})->middleware(['auth'])->name('add.product');

Route::post('/insert-product',[ProductController::class,'store'])->middleware(['auth']);

Route::get('/delete-product/{id}',[ProductController::class,'delete'])->middleware(['auth']);

Route::get('/all-product',[ProductController::class,'allProduct'])->middleware(['auth'])->name('all.product');

Route::get('/available-products',[ProductController::class,'availableProducts'])->middleware(['auth'])->name('available.products');

Route::get('/purchase-products/{id}', [ProductController::class,'purchaseData'])->middleware(['auth']);

Route::post('/insert-purchase-products',[ProductController::class,'storePurchase'])->middleware(['auth']);


//invoice
Route::get('/add-invoice/{id}', [InvoiceController::class,'formData'])->middleware(['auth']);

Route::get('/new-invoice', [InvoiceController::class,'newformData'])->middleware(['auth'])->name('new.invoice');

Route::post('/insert-invoice',[InvoiceController::class,'store'])->middleware(['auth']);

Route::get('/invoice-details', function () {
    return view('Admin.invoice_details');
})->middleware(['auth'])->name('invoice.details');

Route::get('/all-invoice', [InvoiceController::class,'allInvoices'])->middleware(['auth'])->name('all.invoices');

Route::get('/sold-products',[InvoiceController::class,'soldProducts'])->middleware(['auth'])->name('sold.products');
// Route::get('/delete', [InvoiceController::class,'delete']);


//order
Route::get('/add-order/{name}', [ProductController::class,'formData'])->middleware(['auth'])->name('add.order');

Route::post('/insert-order',[OrderController::class,'store'])->middleware(['auth']);

Route::get('/all-orders',[OrderController::class,'ordersData'])->middleware(['auth'])->name('all.orders');

Route::get('/pending-orders',[OrderController::class,'pendingOrders'])->middleware(['auth'])->name('pending.orders');

Route::get('/delivered-orders',[OrderController::class,'deliveredOrders'])->middleware(['auth'])->name('delivered.orders');

Route::get('/new-order', [OrderController::class,'newformData'])->middleware(['auth'])->name('new.order');

Route::post('/insert-new-order',[OrderController::class,'newStore'])->middleware(['auth']);


//customer
Route::get('/add-customer', function () {
    return view('Admin.add_customer');
})->middleware(['auth'])->name('add.customer');

Route::post('/insert-customer',[CustomerController::class,'store'])->middleware(['auth']);

Route::get('/all-customers',[CustomerController::class,'customersData'])->middleware(['auth'])->name('all.customers');



//plant
Route::get('/add-plant', function () {
    return view('Admin.add_plant');
})->middleware(['auth'])->name('add.plant');

Route::post('/insert-plant',[PlantController::class,'store'])->middleware(['auth']);

Route::delete('/bulk-delete-plants',[PlantController::class,'bulkDelete'])->middleware(['auth'])->name('plant.delete');
Route::get('/delete-plant/{id}',[PlantController::class,'delete'])->middleware(['auth']);

Route::get('/export',[PlantController::class,'export'])->middleware(['auth'])->name('export');
Route::post('/import',[PlantController::class,'import'])->middleware(['auth'])->name('import');

Route::get('/all-plant',[PlantController::class,'allPlant'])->middleware(['auth'])->name('all.plant');

Route::get('/available-plants',[PlantController::class,'availablePlants'])->middleware(['auth'])->name('available.plants');

Route::get('/plant-details/{id}', [PlantController::class,'plantDetails'])->middleware(['auth'])->name('plant.details');

Route::post('/insert-purchase-plants',[PlantController::class,'storePurchase'])->middleware(['auth']);



//dashboard
Route::get('/dashboard', [PlantController::class,'countPlants'])->middleware(['auth'])->name('dashboard');

Route::get('/countAllPlants', function () {
    return view('dashboard');
});

//global
Route::get('/lang/{locale}', [LanguageController::class, 'languageSwitch'])->name('language.switch');
Route::get('/genenrateQRCode', [QRCodeController::class, 'genenrateQR'])->name('home.index');

require __DIR__.'/auth.php';
