<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Đăng Nhập Quản Trị</title>

    {{-- CSS Files --}}
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/metisMenu.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/timeline.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sb-admin-2.css') }}" rel="stylesheet">
    <link href="{{ asset('css/morris.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    
    </head>

<body>

    <div class="container">
        <div class="row">
            {{-- Căn giữa form bằng col-md-4 col-md-offset-4 --}}
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Đăng Nhập Quản Trị</h3>
                    </div>
                    <div class="panel-body">

                        {{-- HIỂN THỊ THÔNG BÁO LỖI TỔNG QUÁT TỪ SESSION --}}
                        @if(session('error'))
                            <div class="alert alert-danger"><strong>Lỗi:</strong> {{ session('error') }}</div>
                        @endif
                        {{-- HIỂN THỊ THÔNG BÁO THÀNH CÔNG (ví dụ: sau khi đăng xuất) --}}
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        
                        {{-- START FORM LARAVEL --}}
                        <form role="form" method="POST" action="{{ url('/admin/login') }}">
                            @csrf 
                            <fieldset>
                                
                                {{-- TRƯỜNG TÊN ĐĂNG NHẬP (MAPPING VỚI CỘT 'Ten' CỦA NhanVien) --}}
                                <div class="form-group">
                                    <input class="form-control @error('email') is-invalid @enderror" 
                                           placeholder="Tên đăng nhập" 
                                           name="email" {{-- Vẫn dùng name="email" để dễ xử lý lỗi Laravel --}}
                                           type="text" 
                                           value="{{ old('email') }}" 
                                           autofocus>
                                    
                                    {{-- Hiển thị lỗi Validation cho trường Tên Đăng Nhập --}}
                                    @error('email')
                                        <div class="alert alert-danger mt-1 p-2"><strong>{{ $message }}</strong></div>
                                    @enderror
                                </div>
                                
                                {{-- TRƯỜNG MẬT KHẨU (MAPPING VỚI CỘT 'Pass' CỦA NhanVien) --}}
                                <div class="form-group">
                                    <input class="form-control @error('password') is-invalid @enderror" 
                                           placeholder="Mật khẩu" 
                                           name="password" 
                                           type="password" 
                                           value="">
                                    
                                    {{-- Hiển thị lỗi Validation cho trường Mật Khẩu --}}
                                    @error('password')
                                        <div class="alert alert-danger mt-1 p-2"><strong>{{ $message }}</strong></div>
                                    @enderror
                                </div>
                                
                                {{-- REMEMBER ME --}}
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="1">Ghi nhớ đăng nhập
                                    </label>
                                </div>
                                
                                {{-- NÚT ĐĂNG NHẬP --}}
                                <button type="submit" class="btn btn-lg btn-success btn-block">
                                    Đăng Nhập
                                </button>
                                
                            </fieldset>
                        </form>
                        {{-- END FORM LARAVEL --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- JS Scripts --}}
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('js/raphael-min.js') }}"></script>
    <script src="{{ asset('js/morris.min.js') }}"></script>
    <script src="{{ asset('js/morris-data.js') }}"></script>
    <script src="{{ asset('js/sb-admin-2.js') }}"></script>

</body>

</html>