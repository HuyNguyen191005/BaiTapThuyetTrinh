<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DanhMuc;

class IndexController extends Controller
{
    public function index() {
       // Lấy tất cả Danh mục và Tải kèm (Eager Load) các Sản phẩm liên quan
        // (chỉ lấy những danh mục có trạng thái hoạt động nếu cần)
        $danhMucs = DanhMuc::where('TrangThai', 1)
                           ->with('sanPhams') // Sử dụng tên method đã định nghĩa trong Model: sanPhams()
                           ->get();

        // Trả về view và truyền dữ liệu đi
        return view('index', compact('danhMucs'));
    }
}   
