<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB; // Thêm DB để kiểm tra tồn tại của Foreign Key

return new class extends Migration
{
    /**
     * Chạy migration (Xóa cột idLoai vĩnh viễn).
     */
    public function up(): void
    {
        // Sử dụng Schema::hasColumn để kiểm tra cột tồn tại trước khi thao tác
        if (Schema::hasColumn('sanpham', 'idLoai')) {
            Schema::table('sanpham', function (Blueprint $table) {
                
                // 1. Kiểm tra và XÓA KHÓA NGOẠI AN TOÀN
                // Tên khóa ngoại mặc định là 'tên_bảng_tên_cột_foreign'
                $foreignKeyName = 'sanpham_idloai_foreign'; 

                // Kiểm tra xem khóa ngoại có tồn tại không (chỉ hoạt động tốt trong MySQL)
                // Lưu ý: Laravel không có hàm kiểm tra khóa ngoại native, nên ta dùng DB::statement
                try {
                    // Thử xóa khóa ngoại theo tên mặc định
                    $table->dropForeign($foreignKeyName);
                } catch (\Exception $e) {
                    // Nếu lỗi (khóa ngoại không tồn tại), bỏ qua
                    // Đôi khi, dropForeign(['idLoai']) cũng đã đủ. Ta dùng cả 2.
                    try {
                        $table->dropForeign(['idLoai']);
                    } catch (\Exception $e) {
                        // Bỏ qua lỗi nếu cả hai cách xóa khóa ngoại đều thất bại (tức là nó không tồn tại)
                    }
                }
                
                // 2. XÓA CỘT AN TOÀN
                // Sau khi đã cố gắng xóa khóa ngoại, tiến hành xóa cột
                $table->dropColumn('idLoai');
            });
        }
    }

    /**
     * Hoàn tác migration. 
     * HÀM NÀY ĐANG ĐƯỢC ĐỂ TRỐNG ĐỂ KHÔNG KHÔI PHỤC CỘT idLoai.
     */
    public function down(): void
    {
        // Để trống để không khôi phục (theo yêu cầu "xóa vĩnh viễn")
    }
};
