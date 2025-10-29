<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Đăng Nhập Quản Trị</title>

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/metisMenu.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/timeline.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sb-admin-2.css') }}" rel="stylesheet">
    <link href="{{ asset('css/morris.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    
    <style>
        /* Tùy chỉnh màu thông báo lỗi cho dễ nhìn hơn */
        .alert-danger { padding: 8px; margin-top: 5px; font-size: 13px; }
    </style>

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Đăng Nhập Quản Trị</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="POST" action="{{ route('admin.login.post') }}">
                            @csrf
                            <fieldset>
                                
                                <div class="form-group">
                                    <input class="form-control" placeholder="Tên đăng nhập" name="Ten" type="text" autofocus value="{{ old('Ten') }}">
                                    @error('Ten')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <input class="form-control" placeholder="Mật khẩu" name="Pass" type="password">
                                    @error('Pass')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="1">Ghi nhớ đăng nhập
                                    </label>
                                </div>
                                
                                <button type="submit" class="btn btn-lg btn-success btn-block">
                                    Đăng nhập
                                </button>
                                
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('js/sb-admin-2.js') }}"></script> 

</body>
</html>