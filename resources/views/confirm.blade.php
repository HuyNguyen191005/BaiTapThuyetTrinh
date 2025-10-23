<!DOCTYPE html>
<html>
<head>
    <link href="{{ asset('css/bootstrap.css') }}" rel='stylesheet' type='text/css' />
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
    <div class="container">
        <h3>Xác Nhận Thông Tin</h3>
        <p>Dưới đây là thông tin mà bạn đã nhập:</p>
        
        <ul>
            <li><strong>Email:</strong> {{ $data['email'] }}</li>
            <li><strong>Số Điện Thoại:</strong> {{ $data['phone'] }}</li>
            <li><strong>Tiêu Đề:</strong> {{ $data['subject'] }}</li>
            <li><strong>Nội Dung:</strong> {{ $data['message'] }}</li>
        </ul>

        <form action="{{ route('contact.finalize') }}" method="POST">
            @csrf
            <input type="hidden" name="email" value="{{ $data['email'] }}">
            <input type="hidden" name="phone" value="{{ $data['phone'] }}">
            <input type="hidden" name="subject" value="{{ $data['subject'] }}">
            <input type="hidden" name="message" value="{{ $data['message'] }}">
            <button type="submit" class="btn btn-success">Xác Nhận</button>
            <a href="{{ route('contact.show') }}" class="btn btn-secondary">Quay Lại</a>
        </form>
    </div>
</body>
</html>