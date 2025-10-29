<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// Không cần 'use App\Models\NhanVien;' vì Auth::attempt sẽ tự tìm

class AdminLoginController extends Controller
{
    /**
     * Hiển thị form đăng nhập Admin
     */
    public function showLoginForm()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        }
        // Giữ nguyên view của bạn
        return view('admin.auth.login'); 
    }

    /**
     * Xử lý logic đăng nhập Admin
     */
    public function login(Request $request)
    {
        // 1. Validation (Giữ nguyên của bạn)
        $request->validate([
            'Ten' => 'required|string', 
            'Pass' => 'required|string', 
        ], [
            'Ten.required' => 'Vui lòng nhập tên đăng nhập.',
            'Pass.required' => 'Vui lòng nhập mật khẩu.',
        ]);

        // 2. Tạo mảng credentials để xác thực
        // Key 'password' là bắt buộc, Laravel sẽ tự động
        // lấy giá trị của $request->Pass và so sánh an toàn với cột 'Pass' trong DB
        // (nhờ hàm getAuthPassword() trong Model NhanVien)
        $credentials = [
            'Ten' => $request->Ten,
            'password' => $request->Pass 
        ];

        // 3. Thử đăng nhập trên guard 'admin'
        if (Auth::guard('admin')->attempt($credentials, $request->filled('remember'))) {
            
            // 4. Đăng nhập thành công, *bây giờ* mới kiểm tra VaiTro và TrangThai
            $nhanVien = Auth::guard('admin')->user();
            
            if ($nhanVien->VaiTro === 'admin' && $nhanVien->TrangThai == 1) {
                // Đăng nhập thành công VÀ đúng quyền
                $request->session()->regenerate();
                return redirect()->intended(route('admin.dashboard'));
            }   

            // 5. Đăng nhập thành công (Đúng Ten/Pass)
            // NHƯNG không đúng VaiTro hoặc TrangThai
            Auth::guard('admin')->logout(); // Đăng xuất ra ngay
            return back()->withInput()->withErrors(['Ten' => 'Tài khoản không có quyền truy cập hoặc đang bị khóa.']);
        }

        // 6. Nếu Ten/Pass không đúng
        return back()->withInput()->withErrors(['Ten' => 'Tên đăng nhập hoặc mật khẩu không chính xác.']);
    }
    
    /**
     * Xử lý Đăng xuất Admin (Giữ nguyên của bạn)
     */
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }
}
