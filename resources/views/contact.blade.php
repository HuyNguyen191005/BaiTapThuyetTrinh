@extends('layouts.app') 

@section('title', 'Liên Hệ')

@section('content')
<!DOCTYPE html>
<html>
<head>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css" />

    <!-- jQuery (Bootstrap's JavaScript plugins) -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>

    <!-- Custom Theme files -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" media="all" />
    
    <!-- Webfont -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:500,900,100,300,700,400' rel='stylesheet' type='text/css' />

    <!-- Dropdown -->
    <script src="{{ asset('js/jquery.easydropdown.js') }}"></script>
    <link href="{{ asset('css/nav.css') }}" rel="stylesheet" type="text/css" media="all"/>

    <script src="{{ asset('js/scripts.js') }}" type="text/javascript"></script>
     <style>
        .form-control {
            width: 100%;  /* Đặt chiều rộng 100% cho các trường input */
            max-width: 400px; /* Giới hạn chiều rộng tối đa nếu cần */
        }

        .form-group {
            margin-bottom: 15px; /* Giảm khoảng cách giữa các trường */
        }

        textarea.form-control {
            height: 100px; /* Đặt chiều cao cho textarea */
        }

        .contact {
            padding: 20px; /* Thêm padding cho container */
            background-color: rgba(255, 255, 255, 0.8); /* Màu nền nhẹ */
            border-radius: 5px; /* Làm tròn góc */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Thêm bóng đổ */
        }

        h3 {
            margin-bottom: 20px; /* Căn chỉnh khoảng cách tiêu đề */
        }
    </style>
</head>
<body>
    <div class="contact">
        <div class="container">
            <h3>CONTACT US</h3>
            <p>Please contact us for all inquiries and purchase options.</p>
            <form action="{{ route('contact.send') }}" method="POST"> <!-- Sử dụng phương thức POST -->
                @csrf <!-- Thêm CSRF token để bảo vệ ứng dụng -->
                
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="USER@DOMAIN.COM" required>
                </div>
                
                <div class="form-group">
                    <input type="text" name="phone" class="form-control" placeholder="PHONE" required>
                </div>
                
                <div class="form-group">
                    <input type="text" name="subject" class="form-control" placeholder="SUBJECT" required>
                </div>

                <div class="form-group">
                    <textarea name="message" class="form-control" placeholder="MESSAGE" required></textarea>
                </div>
                
                <button type="submit" class="btn btn-primary">SEND</button>
            </form>
        </div>
    </div>
</body>
</html>
@endsection