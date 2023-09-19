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

