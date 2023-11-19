<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
//This is the Login route
Route::post('/login', App\Http\Controllers\Auth\LoginController::class);

//this it the API routes for the Items
Route::get('items', [App\Http\Controllers\ItemsController::class,'index'])->name('items.all');
Route::post('items', [App\Http\Controllers\ItemsController::class,'storeItems'])->name('items.store');
Route::put('items', [App\Http\Controllers\ItemsController::class,'updateItems'])->name('items.update');
Route::delete('items/{id}', [App\Http\Controllers\ItemsController::class,'deleteItems'])->name('items.destroy');
Route::get('items/{id}', [App\Http\Controllers\ItemsController::class,'getItems'])->name('items.get');


//this is the API routes for Customer
Route::get('customer', [App\Http\Controllers\CustomerController::class,'index'])->name('customer.all');
Route::post('customer', [App\Http\Controllers\CustomerController::class,'storeCustomer'])->name('customer.store');
Route::put('customer', [App\Http\Controllers\CustomerController::class,'updateCustomer'])->name('customer.update');
Route::delete('customer/{id}', [App\Http\Controllers\CustomerController::class,'deleteCustomer'])->name('customer.delete');
Route::get('customer/{id}', [App\Http\Controllers\CustomerController::class,'getCustomer'])->name('customer.get');

//This is the API routes Invoices
Route::get('invoices', [App\Http\Controllers\InvoicesController::class,'index'])->name('invoices.all');
Route::post('invoices', [App\Http\Controllers\InvoicesController::class,'storeInvoices'])->name('invoices.store');
Route::put('invoices', [App\Http\Controllers\InvoicesController::class,'updateInvoices'])->name('invoices.update');
Route::delete('invoices/{id}', [App\Http\Controllers\InvoicesController::class,'deleteInvoices'])->name('invoices.delete');
Route::get('invoices/{id}', [App\Http\Controllers\InvoicesController::class,'getInvoices'])->name('invoices.get');


//This is the API routes for the InvoiceItems
Route::get('invoice_items', [App\Http\Controllers\InvoiceItemsController::class,'index'])->name('invoice_items.all');
Route::get('invoice_items/{id}', [App\Http\Controllers\InvoiceItemsController::class,'getInvoiceItems'])->name('invoice_items.get');
Route::post('invoice_items', [App\Http\Controllers\InvoiceItemsController::class,'store'])->name('invoice_items.store');
Route::put('invoice_items', [App\Http\Controllers\InvoiceItemsController::class,'update'])->name('invoice_items.update');
Route::delete('invoice_items/{id}', [App\Http\Controllers\InvoiceItemsController::class,'destroy'])->name('invoice_items.destroy');
