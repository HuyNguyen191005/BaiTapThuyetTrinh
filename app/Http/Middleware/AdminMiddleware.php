<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // 1. Kiểm tra trên guard 'admin'
        if (!Auth::guard('admin')->check()) {
            // Nếu chưa đăng nhập, redirect về trang login admin
            return redirect()->route('admin.login');
        }

        // 2. Lấy user từ guard 'admin' và kiểm tra
        $nhanVien = Auth::guard('admin')->user();
        if ($nhanVien->VaiTro != 'admin' || $nhanVien->TrangThai != 1) {
            
            Auth::guard('admin')->logout();
            return redirect()->route('admin.login')->withErrors(['Ten' => 'Tài khoản không có quyền truy cập.']);
        }

        // 3. Nếu đã đăng nhập VÀ là admin, cho phép truy cập
        return $next($request);
    }
}
