<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Form Login cho Admin
Route::get('/admin/login', [LoginController::class, 'viewLoginForm'])->name('admin-login');
// Xử lý Login Admin => ko có giao diện
Route::post('admin/login', [LoginController::class, 'login']);
Route::post('admin/logout', [LoginController::class, 'logout'])->name('admin-logout');

// Trang chu admin
Route::get('admin/home', [HomeController::class, 'home'])->name('admin-home')
    ->middleware('check-admin');
// Trang quan ly san pham
Route::get('admin/product', [ProductController::class, 'index'])->name('admin-product')
    ->middleware('check-admin');

Route::post('admin/product/export', [ProductController::class, 'productExport'])->name('admin-product-export');
Route::post('admin/product/import-sample', [ProductController::class, 'productImportSample'])->name('admin-product-import-sample');
Route::post('admin/product/import', [ProductController::class, 'productImport'])->name('admin-product-import');

Route::get('/admin/product/{id}', [ProductController::class, 'showProductById'])->name('admin-product-detail')
    ->middleware('check-admin');

Route::post('admin/product/search', [ProductController::class,'search'])->name('admin-product-search')
    ->middleware('check-admin');

Route::post('/admin/product',[ProductController::class,'createProduct'])->name('admin-product-create')
    ->middleware('check-admin');

Route::post('admin/product/delete',[ProductController::class,'deleteProductById'])->name('admin-product-delete')
    ->middleware('check-admin');
