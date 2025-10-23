<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\BicyclesController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\SingleController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Import Controllers Front-end
use App\Http\Controllers\Admin\AdminLoginController; 
// Import Controllers Admin (Sản phẩm)
use App\Http\Controllers\Admin\SanPhamController; 


/*
|--------------------------------------------------------------------------
| ROUTES DÀNH CHO NGƯỜI DÙNG (FRONT-END)
|--------------------------------------------------------------------------
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
|--------------------------------------------------------------------------
| ROUTES DÀNH CHO QUẢN TRỊ (ADMIN - PREFIX /a) - KHÔNG CẦN BẢO VỆ
|--------------------------------------------------------------------------
*/

Route::prefix('a')->name('a.')->group(function () {
    
    // --- 1. ROUTES DASHBOARD & LOGIN (Giữ lại nếu cần)
    Route::get('/', function () {
        return view('admin.dashboard'); 
    })->name('dashboard'); 

    // Route cho Login/Logout (sử dụng AdminLoginController)
    Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AdminLoginController::class, 'login']);
    Route::post('/logout', [AdminLoginController::class, 'logout'])->name('logout');

    // --- 2. ROUTES QUẢN LÝ SẢN PHẨM (Tường minh)
    
    // DANH SÁCH: GET /a/sanpham
    Route::get('/sanpham', [SanPhamController::class, 'index'])->name('sanpham.index'); 
    
    // THÊM: GET /a/sanpham/them (Form)
    Route::get('/sanpham/them', [SanPhamController::class, 'create'])->name('sanpham.create');

    // LƯU: POST /a/sanpham/them (Xử lý POST)
    Route::post('/sanpham/them', [SanPhamController::class, 'store'])->name('sanpham.store');
    
  
    
});
