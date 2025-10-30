<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\BicyclesController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\SingleController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Import Controllers Front-end
use App\Http\Controllers\AdminLoginController; 
// Import Controllers Admin (Sản phẩm)
use App\Http\Controllers\Admin\SanPhamController; 


/*
| ROUTES DÀNH CHO NGƯỜI DÙNG
*/
Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('sanpham', [BicyclesController::class, 'bicycles'])->name('bicycles.index');
Route::get('giohang', [CartController::class, 'cart'])->name('cart.index');
Route::get('chitietsanpham', [SingleController::class, 'index'])->name('product.details');
Route::get('/contact', function () {
    return view('contact'); 
})->name('contact.show');
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');
Route::post('/contact/finalize', [ContactController::class, 'finalize'])->name('contact.finalize');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');


/*
 ROUTES DÀNH CHO QUẢN TRỊ (ADMIN - PREFIX /admin) - KHÔNG CẦN BẢO VỆ
*/

Route::prefix('admin')->name('admin.')->group(function () {
    
    Route::get('/', function () {
        return view('admin.dashboard'); 
    })->name('dashboard'); 

    Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AdminLoginController::class, 'login'])->name('login.post');
    Route::post('/logout', [AdminLoginController::class, 'logout'])->name('logout');

    Route::get('/sanpham', [SanPhamController::class, 'index'])->name('sanpham.index'); 
    Route::get('/sanpham/them', [SanPhamController::class, 'create'])->name('sanpham.create');
    Route::post('/sanpham/them', [SanPhamController::class, 'store'])->name('sanpham.store');

    Route::middleware(['admin'])->group(function () {
        Route::get('/dashboard', function () {
            $admin = Auth::guard('admin')->user();
            return view('admin.dashboard', ['admin' => $admin]);
        })->name('dashboard');
    });
});
