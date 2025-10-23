@extends('master.admin-layout')
@section('title', 'Thêm Sản Phẩm Mới')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Thêm Sản Phẩm Mới</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thông Tin Sản Phẩm</h6>
        </div>
        <div class="card-body">
            
            <form action="{{ route('a.sanpham.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- 1. Tên Sản Phẩm --}}
                <div class="form-group">
                    <label for="Ten">Tên Sản Phẩm (<span class="text-danger">*</span>)</label>
                    <input type="text" class="form-control @error('Ten') is-invalid @enderror" id="Ten" name="Ten" value="{{ old('Ten') }}">
                    @error('Ten')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div>
                
                <div class="form-row">
                    {{-- 2. Giá Gốc (Cột 1/2) --}}
                    <div class="form-group col-md-6 mb-0">
        <label for="Gia">Giá Gốc (<span class="text-danger">*</span>)</label>
        <input type="number" step="any" class="form-control @error('Gia') is-invalid @enderror" id="Gia" name="Gia" value="{{ old('Gia') }}">
        @error('Gia')
            <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
        @enderror
    </div>

                    {{-- 3. Giá Khuyến Mãi (Cột 2/2) --}}
                    <div class="form-group col-md-6 mb-0">
        <label for="GiaKhuyenMai">Giá Khuyến Mãi</label>
        <input type="number" step="any" class="form-control @error('GiaKhuyenMai') is-invalid @enderror" id="GiaKhuyenMai" name="GiaKhuyenMai" value="{{ old('GiaKhuyenMai') }}">
        @error('GiaKhuyenMai')
            <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
        @enderror
    </div>
</div>
<br> {{-- Thêm khoảng cách sau hàng này nếu cần --}}

                <div class="form-row">
                    {{-- 4. Danh Mục (Cột 1/2) --}}
                     <div class="form-group col-md-6 mb-0">
                        <label for="idDM">Danh Mục (<span class="text-danger">*</span>)</label>
                        <select id="idDM" name="idDM" class="form-control @error('idDM') is-invalid @enderror">
                            <option value="">-- Chọn Danh Mục --</option>
                            @foreach ($danhMucs as $dm)
                                <option value="{{ $dm->idDM }}" {{ old('idDM') == $dm->idDM ? 'selected' : '' }}>
                                    {{ $dm->TenDM }}
                                </option>
                            @endforeach
                        </select>
                        @error('idDM')
                            <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                        @enderror
                    </div>
                    
                    {{-- 5. Trạng Thái (Cột 2/2) --}}
                   <div class="form-group col-md-6 mb-0">
                        <label for="TrangThai">Trạng Thái (<span class="text-danger">*</span>)</label>
                        <select id="TrangThai" name="TrangThai" class="form-control @error('TrangThai') is-invalid @enderror">
                            <option value="1" {{ old('TrangThai', 1) == 1 ? 'selected' : '' }}>Kích Hoạt</option>
                            <option value="0" {{ old('TrangThai', 1) == 0 ? 'selected' : '' }}>Ngừng Bán</option>
                        </select>
                        @error('TrangThai')
                            <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                        @enderror
                    </div>
                </div>
            <div class="form-row">
                {{-- 6. Hình Ảnh --}}
                 <div class="form-group col-md-6 mb-0">
                    <label for="Hinh">Hình Ảnh (<span class="text-danger">*</span>)</label>
                    <input type="file" class="form-control-file @error('Hinh') is-invalid @enderror" id="Hinh" name="Hinh">
                    @error('Hinh')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div>
                
                {{-- 7. Mô Tả --}}
                <div class="form-group col-md-6 mb-0">
                    <label for="MoTa">Mô Tả</label>
                    {{-- Sử dụng hàm old() trực tiếp trong textarea để giữ nội dung cũ --}}
                    <textarea class="form-control" id="MoTa" name="MoTa" rows="3">{{ old('MoTa') }}</textarea>
                </div>
            </div>
                <button type="submit" class="btn btn-primary btn-icon-split mt-3">
                    <span class="text">Thêm Sản Phẩm</span>
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
