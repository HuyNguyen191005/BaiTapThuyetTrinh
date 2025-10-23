<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DanhMuc extends Model
{
    // Tên bảng trong database
    protected $table = 'DanhMuc';
    protected $primaryKey = 'idDM';
    public $timestamps = false; // Nếu bạn không dùng created_at/updated_at

    /**
     * Quan hệ: Một Danh mục có nhiều Sản phẩm.
     */
    public function sanPhams()
    {
        // 'SanPham', 'tên_cột_khóa_ngoại_trong_SanPham', 'tên_cột_khóa_chính_trong_DanhMuc'
        return $this->hasMany(SanPham::class, 'idDM', 'idDM');
    }
}