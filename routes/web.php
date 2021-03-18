<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SupplierController;
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

    return redirect('/login');

});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

// Route::middleware(['auth:sanctum', 'verified'])->get('/products', function () {
//     return Inertia::render('Dashboard');
Route::middleware(['auth:sanctum', 'verified'])->post('/borrar-producto', [ProductsController::class, 'borrarProducto'])->name('borrar-producto');
// })->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/products', [ProductsController::class, 'index'])->name('products');
Route::middleware(['auth:sanctum', 'verified'])->get('/products-list', [ProductsController::class, 'list'])->name('products-list');
Route::middleware(['auth:sanctum', 'verified'])->get('/products-list-t', [ProductsController::class, 'listt'])->name('products-list-t');
Route::middleware(['auth:sanctum', 'verified'])->get('/new-product', [ProductsController::class, 'return'])->name('new-product');
Route::middleware(['auth:sanctum', 'verified'])->get('/comprar', [ProductsController::class, 'ordenCompra'])->name('comprar');
Route::middleware(['auth:sanctum', 'verified'])->get('/verify', [ProductsController::class, 'verificar'])->name('verify');
Route::middleware(['auth:sanctum', 'verified'])->post('/verify-order', [ProductsController::class, 'verificarOrden'])->name('verify-order');
Route::middleware(['auth:sanctum', 'verified'])->post('/new-product', [ProductsController::class, 'store'])->name('new-product');
Route::middleware(['auth:sanctum', 'verified'])->post('/comprar', [ProductsController::class, 'ordenCompraPost'])->name('comprar');
Route::middleware(['auth:sanctum', 'verified'])->post('/edit-product', [ProductsController::class, 'edit'])->name('edit-product');



Route::middleware(['auth:sanctum', 'verified'])->get('/supplier', [SupplierController::class, 'index'])->name('supplier');
Route::middleware(['auth:sanctum', 'verified'])->post('/create-supplier', [SupplierController::class, 'store'])->name('create-supplier');
Route::middleware(['auth:sanctum', 'verified'])->get('/create-supplier', [SupplierController::class, 'return'])->name('create-supplier');
Route::middleware(['auth:sanctum', 'verified'])->get('/supplier-list', [SupplierController::class, 'list'])->name('supplier-list');
Route::middleware(['auth:sanctum', 'verified'])->post('/edit-supplier', [SupplierController::class, 'edit'])->name('edit-product');
Route::middleware(['auth:sanctum', 'verified'])->post('/delete-supplier', [SupplierController::class, 'destroy'])->name('delete-product');

