@extends('layouts.app')
@section('title','Trang Chu')
@section('content')
<!DOCTYPE html>
<html>
<head>
<title>Bike Shop - Ecommerce Category Flat Bootstrap Responsive Website Template | Home :: w3layouts</title>

<!-- Bootstrap CSS -->
<link href="{{ asset('css/bootstrap.css') }}" rel='stylesheet' type='text/css' />

<!-- jQuery (Bootstrap's JavaScript plugins) -->
<script src="{{ asset('js/jquery.min.js') }}"></script>

<!-- Custom Theme files -->
<link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" media="all" />

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Bike-shop Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

<script type="application/x-javascript"> 
    addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); 
    function hideURLbar(){ window.scrollTo(0,1); } 
</script>

<!-- Webfont -->
<link href='http://fonts.googleapis.com/css?family=Roboto:500,900,100,300,700,400' rel='stylesheet' type='text/css' />

<!-- Dropdown -->
<script src="{{ asset('js/jquery.easydropdown.js') }}"></script>
<link href="{{ asset('css/nav.css') }}" rel="stylesheet" type="text/css" media="all"/>

<script src="{{ asset('js/scripts.js') }}" type="text/javascript"></script>

<!-- Smooth Scrolling -->
<script type="text/javascript" src="{{ asset('js/move-top.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/easing.js') }}"></script>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $(".scroll").click(function(event){		
            event.preventDefault();
            $('html,body').animate({scrollTop:$(this.hash).offset().top},900);
        });
    });
</script>

</head>
<body>
<!--banner-->
<script src="js/responsiveslides.min.js"></script>
<script>  
    $(function () {
      $("#slider").responsiveSlides({
      	auto: true,
      	nav: true,
      	speed: 500,
        namespace: "callbacks",
        pager: true,
      });
    });
  </script>


    <h2 class="text-center mb-5">DANH SÁCH SẢN PHẨM THEO DANH MỤC</h2>

 @foreach ($danhMucs as $danhMuc)
    
    <div class="category-section mb-5">
        <h3 class="fw-bold text-uppercase mb-4">{{ $danhMuc->TenDM }}</h3> 
        
        @if ($danhMuc->sanPhams->count() > 0)
            
            {{-- Sử dụng class 'row' để tạo hàng ngang chứa sản phẩm --}}
            <div class="row">
                
                @foreach ($danhMuc->sanPhams as $sanPham)
                    {{-- Sử dụng class cột để phân chia sản phẩm (4 cột trên desktop) --}}
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                        <div class="card h-100 shadow-sm border-0 product-card">
                            
                            {{-- Ảnh sản phẩm --}}
                            <img src="{{ asset($sanPham->Hinh) }}" class="card-img-top product-image" alt="{{ $sanPham->Ten }}">
                            
                            <div class="card-body d-flex flex-column">
                                {{-- Tên sản phẩm --}}
                                <h5 class="card-title product-title">{{ $sanPham->Ten }}</h5>
                                
                                {{-- HIỂN THỊ GIÁ --}}
<div class="mt-auto">
    @if ($sanPham->GiaKhuyenMai && $sanPham->GiaKhuyenMai < $sanPham->Gia)
        {{-- Nếu CÓ Giá Khuyến Mãi --}}
        
        {{-- Giá Khuyến Mãi (NỔI BẬT) --}}
        <p class="text-danger fs-5 fw-bold mb-0">
            {{ number_format($sanPham->GiaKhuyenMai, 0, ',', '.') }} VNĐ
        </p>
        
        {{-- Giá Gốc (CÓ GẠCH NGANG) --}}
        <p class="text-muted text-decoration-line-through small">
            {{ number_format($sanPham->Gia, 0, ',', '.') }} VNĐ
        </p>
    @else
        {{-- Nếu KHÔNG CÓ Giá Khuyến Mãi --}}
        <p class="fs-5 fw-bold mb-0 text-success">
            {{ number_format($sanPham->Gia, 0, ',', '.') }} VNĐ
        </p>
    @endif
</div>
                                <a href="#" class="btn btn-primary btn-sm mt-2">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div> 
        @endif
    </div>
@endforeach


<!--bikes-->
<div class="bikes">	
		 <h3>POPULAR BIKES</h3>
		 <div class="bikes-grids">			 
			 <ul id="flexiselDemo1">
				 <li>
					 <img src="images/bik1.jpg" alt=""/>
					 <div class="bike-info">
						 <div class="model">
							 <h4>FIXED GEAR<span>$249.00</span></h4>							 
						 </div>
						 <div class="model-info">
						     <select>
							  <option value="volvo">OPTION</option>
							  <option value="saab">Option</option>
							  <option value="opel">Option</option>
							  <option value="audi">Option</option>
							 </select>
							 <a href="{{ route('bicycles.index') }}">BUY</a>
						 </div>						 
						 <div class="clearfix"></div>
					 </div>
					 <div class="viw">
						<a href="{{ route('bicycles.index') }}">Quick View</a>
					 </div>
				 </li>
				 <li>
				 <img src="images/bik2.jpg" alt=""/>
				 <div class="bike-info">
						 <div class="model">
							 <h4>BIG BOY ULTRA<span>$249.00</span></h4>							 
						 </div>
						 <div class="model-info">
						     <select>
							  <option value="volvo">OPTION</option>
							  <option value="saab">Option</option>
							  <option value="opel">Option</option>
							  <option value="audi">Option</option>
							 </select>
							 <a href="{{ route('bicycles.index') }}">BUY</a>
						 </div>						 
						 <div class="clearfix"></div>
					 </div>
					 <div class="viw">
						<a href="{{ route('bicycles.index') }}">Quick View</a>
					 </div>
				 </li>
				 <li>
					 <img src="images/bik3.jpg" alt=""/>
					 <div class="bike-info">
						 <div class="model">
							 <h4>ROCK HOVER<span>$300.00</span></h4>							 
						 </div>
						 <div class="model-info">
						     <select>
							  <option value="volvo">OPTION</option>
							  <option value="saab">Option</option>
							  <option value="opel">Option</option>
							  <option value="audi">Option</option>
							 </select>
							 <a href="{{ route('bicycles.index') }}">BUY</a>
						 </div>						 
						 <div class="clearfix"></div>
					 </div>
					 <div class="viw">
						<a href="{{ route('bicycles.index') }}">Quick View</a>
					 </div>
				 </li>
				 <li>
				     <img src="images/bik4.jpg" alt=""/>
					 <div class="bike-info">
						 <div class="model">
							 <h4>SANSACHG<span>$249.00</span></h4>							 
						 </div>
						 <div class="model-info">
						     <select>
							  <option value="volvo">OPTION</option>
							  <option value="saab">Option</option>
							  <option value="opel">Option</option>
							  <option value="audi">Option</option>
							 </select>
							 <a href="{{ route('bicycles.index') }}">BUY</a>
						 </div>						 
						 <div class="clearfix"></div>
					 </div>
					 <div class="viw">
						<a href="{{ route('bicycles.index') }}">Quick View</a>
					 </div>
				 </li>
				 <li>
					 <img src="images/bik5.jpg" alt=""/>
					 <div class="bike-info">
						 <div class="model">
							 <h4>JETT MAC<span>$340.00</span></h4>							 
						 </div>
						 <div class="model-info">
						     <select>
							  <option value="volvo">OPTION</option>
							  <option value="saab">Option</option>
							  <option value="opel">Option</option>
							  <option value="audi">Option</option>
							 </select>
							 <a href="{{ route('bicycles.index') }}">BUY</a>
						 </div>						 
						 <div class="clearfix"></div>
					 </div>
					 <div class="viw">
						<a href="{{ route('bicycles.index') }}">Quick View</a>
					 </div>
				 </li>
				 <li>
				      <img src="images/bik6.jpg" alt=""/>
					  <div class="bike-info">
						 <div class="model">
							 <h4>SANSACHG<span>$249.00</span></h4>							 
						 </div>
						 <div class="model-info">
						     <select>
							  <option value="volvo">OPTION</option>
							  <option value="saab">Option</option>
							  <option value="opel">Option</option>
							  <option value="audi">Option</option>
							 </select>
							 <a href="{{ route('bicycles.index') }}">BUY</a>
						 </div>						 
						 <div class="clearfix"></div>
					 </div>
					 <div class="viw">
						<a href="{{ route('bicycles.index') }}">Quick View</a>
					 </div>
				 </li>
		    </ul>
			<script type="text/javascript">
			 $(window).load(function() {			
			  $("#flexiselDemo1").flexisel({
				visibleItems: 3,
				animationSpeed: 1000,
				autoPlay: true,
				autoPlaySpeed: 3000,    		
				pauseOnHover:true,
				enableResponsiveBreakpoints: true,
				responsiveBreakpoints: { 
					portrait: { 
						changePoint:480,
						visibleItems: 1
					}, 
					landscape: { 
						changePoint:640,
						visibleItems: 2
					},
					tablet: { 
						changePoint:768,
						visibleItems: 3
					}
				}
			});
			});
			</script>
			<script type="text/javascript" src="js/jquery.flexisel.js"></script>			 
	</div>
</div>
<!---->
<div class="contact">
	<div class="container">
		<h3>CONTACT US</h3>
		<p>Please contact us for all inquiries and purchase options.</p>
		<form>
			 <input type="text" placeholder="NAME" required="">
			 <input type="text" placeholder="SURNAME" required="">			 
			 <input class="user" type="text" placeholder="USER@DOMAIN.COM" required=""><br>
			 <textarea placeholder="MESSAGE"></textarea>
			 <input type="submit" value="SEND">
		</form>
	</div>
</div>
<!---->
<!--<div class="footer">
	 <div class="container wrap">
		<div class="logo2">
			 <a href="index.html"><img src="images/logo2.png" alt=""/></a>
		</div>
		<div class="ftr-menu">
			 <ul>
				 <li><a href="bicycles.html">BICYCLES</a></li>
				 <li><a href="parts.html">PARTS</a></li>
				 <li><a href="accessories.html">ACCESSORIES</a></li>
				 <li><a href="404.html">EXTRAS</a></li>
			 </ul>
		</div>
		<div class="clearfix"></div>
	 </div>
</div>-->
<!---->

</body>
</html>


@endsection