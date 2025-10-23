<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SanPham extends Model
{
    /**
     * Tên bảng tương ứng trong cơ sở dữ liệu.
     */
    protected $table = 'SanPham';

    /**
     * Khóa chính của bảng.
     */
    protected $primaryKey = 'idSP';

    /**
     * Tắt tính năng tự động quản lý timestamps (created_at và updated_at) 
     * nếu các cột này không tồn tại trong bảng SanPham.
     */
    public $timestamps = false;

    /**
     * Các thuộc tính có thể được gán hàng loạt (Mass Assignable).
     * Điền vào tất cả các cột bạn muốn cho phép tạo/cập nhật qua form.
     */
    protected $fillable = [
        'Ten',
        'Gia',
        'TrangThai',
        'GiaKhuyenMai',
        'Hinh',
        'MoTa',
        'idLoai',
        'idDM', // Đã bổ sung sau khi chỉnh sửa DB
    ];

    // =======================================================
    //          ĐỊNH NGHĨA CÁC MỐI QUAN HỆ (RELATIONSHIPS)
    // =======================================================
    
    /**
     * Mối quan hệ: SanPham thuộc về một LoaiSP (One-to-Many Inverse).
     */
    public function loaiSP(): BelongsTo
    {
        // 'LoaiSP::class' là Model đích, 'idLoai' là khóa ngoại trong bảng SanPham (bảng hiện tại).
        return $this->belongsTo(LoaiSP::class, 'idLoai');
    }

    /**
     * Mối quan hệ: SanPham thuộc về một DanhMuc (One-to-Many Inverse).
     */
    public function danhMuc(): BelongsTo
    {
        // 'DanhMuc::class' là Model đích, 'idDM' là khóa ngoại trong bảng SanPham.
        return $this->belongsTo(DanhMuc::class, 'idDM');
    }
    
    /**
     * Mối quan hệ: SanPham có nhiều BinhLuan (One-to-Many).
     */
    public function binhLuans()
    {
        return $this->hasMany(BinhLuan::class, 'idSP');
    }
}