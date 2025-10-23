<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SanPham; // Import Model SanPham
use App\Models\DanhMuc; // Import Model DanhMuc


class SanPhamController extends Controller
{
    /**
     * Hiển thị form thêm sản phẩm.
     */
// Sửa lỗi: Chỉ truyền biến đã được định nghĩa ($danhMucs)
public function create()
{
    // Lấy danh sách Danh mục
    $danhMucs = DanhMuc::all();
    // Biến $loaiSPs đã bị xóa/comment nên không được định nghĩa
    
    // Chỉ truyền $danhMucs vào view
    return view('admin.create', compact('danhMucs'));
}

    /**
     * Kiểm tra dữ liệu và Lưu sản phẩm mới vào CSDL.
     */
    public function store(Request $request)
    {
        // ===============================================
        // BƯỚC 1: KIỂM TRA DỮ LIỆU (VALIDATION)
        // ===============================================
        $validated = $request->validate([
            'Ten' => 'required|max:255',
            'Gia' => 'required|numeric|min:0',
            'TrangThai' => 'required|in:0,1',
            'GiaKhuyenMai' => 'nullable|numeric|lt:Gia|min:0', // Giá KM phải nhỏ hơn Giá
            'Hinh' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Yêu cầu file ảnh, max 2MB
            'MoTa' => 'nullable',
            'idLoai' => 'nullable|exists:LoaiSP,idLoai', // idLoai phải tồn tại trong bảng LoaiSP
            'idDM' => 'required|exists:DanhMuc,idDM', // idDM phải tồn tại trong bảng DanhMuc
        ], [
            'required' => 'Trường :attribute là bắt buộc.',
            'numeric' => 'Trường :attribute phải là số.',
            'lt' => 'Giá Khuyến Mãi phải nhỏ hơn Giá Gốc.',
            'image' => 'File phải là hình ảnh.',
            'max' => 'Tên sản phẩm không được quá 255 ký tự.',
            'exists' => ':attribute không hợp lệ.',
        ]);

        // ===============================================
        // BƯỚC 2: XỬ LÝ UPLOAD ẢNH
        // ===============================================
        $imagePath = null;
        if ($request->hasFile('Hinh')) {
            $image = $request->file('Hinh');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            
            // Lưu ảnh vào thư mục public/images (hoặc storage/app/public/images nếu bạn cấu hình)
            $image->move(public_path('images'), $imageName);
            
            $imagePath = 'images/' . $imageName; // Đường dẫn sẽ được lưu vào CSDL
        }

        // ===============================================
        // BƯỚC 3: LƯU SẢN PHẨM VÀO CSDL
        // ===============================================
        SanPham::create([
            'Ten' => $validated['Ten'],
            'Gia' => $validated['Gia'],
            'TrangThai' => $validated['TrangThai'],
            'GiaKhuyenMai' => $validated['GiaKhuyenMai'],
            'Hinh' => $imagePath,
            'MoTa' => $validated['MoTa'],
            'idLoai' => $request->idLoai ?? NULL,
            'idDM' => $validated['idDM'],
        ]);

        // ===============================================
        // BƯỚC 4: THÔNG BÁO VÀ CHUYỂN HƯỚNG
        // ===============================================
       return redirect()->route('a.sanpham.create') // <-- THAY ĐỔI TỪ 'admin.sanpham.create'
                 ->with('success', 'Thêm sản phẩm thành công!');
    }
}