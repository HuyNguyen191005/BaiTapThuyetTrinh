<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable; // Rất quan trọng!
class NhanVien extends Authenticatable
{
    // Tên bảng trong database
    protected $table = 'NhanVien';
    // Khóa chính
    protected $primaryKey = 'idNhanVien';
    
    // Các trường có thể gán hàng loạt (Mass Assignable)
    protected $fillable = [
        'Ten', 'Pass', 'VaiTro', 'TrangThai', 'SoDienThoai'
    ];

    // Cấu hình mật khẩu
    protected $hidden = [
        'Pass',
    ];

    // Sửa tên cột mật khẩu
    public function getAuthPassword()
    {
        return $this->Pass;
    }
    
    // Thêm hàm kiểm tra quyền Admin
    public function isAdmin()
    {
        return $this->VaiTro === 'Admin' && $this->TrangThai == 1;
    }
}
