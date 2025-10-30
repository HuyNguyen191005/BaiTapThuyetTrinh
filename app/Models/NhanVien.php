<?php

namespace App\Models;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class NhanVien extends Authenticatable 
{
    use HasApiTokens, Notifiable;

    protected $table = 'nhanvien'; 
    protected $primaryKey = 'idNhanVien'; 
    public $timestamps = false; 

    /**
     * Báo cho Laravel biết cột mật khẩu tên là 'Pass'
     * RẤT QUAN TRỌNG cho Auth::attempt()
     */
    public function getAuthPassword()
    {
        return $this->Pass;
    }

    protected $fillable = [
        'Ten',
        'Pass',
        'VaiTro',
        'TrangThai',
        'SoDienThoai',
    ];

    protected $hidden = [
        'Pass',
    ];
}
