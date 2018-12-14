<!DOCTYPE html>
<html>
<head>
	<base href="{{asset('layout/frontend')}}/">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">	
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title> @yield('title')</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/home.css">
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script type="text/javascript">
		$(function() {
			var pull        = $('#pull');
			menu        = $('nav ul');
			menuHeight  = menu.height();

			$(pull).on('click', function(e) {
				e.preventDefault();
				menu.slideToggle();
			});
		});

		$(window).resize(function(){
			var w = $(window).width();
			if(w > 320 && menu.is(':hidden')) {
				menu.removeAttr('style');
			}
		});
	</script>
</head>
<body>    
	<!-- header -->
	<header id="header">
		<div class="container">
			<div class="row">
				<div id="logo" class="col-md-3 col-sm-12 col-xs-12">
					<h1>
						<a href="{{route('frontend')}}"><img height="80px" src="img/home/logoctu.jpg"></a>						
						<nav><a id="pull" class="btn btn-danger" href="#">
							<i class="fa fa-bars"></i>
						</a></nav>			
					</h1>
				</div>
				<div id="search" class="col-md-7 col-sm-12 col-xs-12">
					<form class="navbar-form" role="search" method="post" action="{{route('timkiem.fetch')}}">
						{{ csrf_field() }}
					
					<input type="text" name="text" value="">
					<input type="submit" name="submit" value="Tìm Kiếm">
				</form>




				</div>

				<div id="cart" class="col-md-2 col-sm-12 col-xs-12">
					<a class="display" href="{{asset('cart/show')}}">Giỏ hàng</a>
					<a href="{{asset('cart/show')}}">{{Cart::count()}}</a>				    
				</div>
			</div>			
		</div>
	</header><!-- /header -->
	<!-- endheader -->

	<!-- main -->
	<section id="body">
		<div class="container">
			<div class="row">
				<div id="sidebar" class="col-md-3">
					<nav id="menu">
						<ul>
							<li class="menu-item">danh mục sản phẩm</li>
							@foreach($categories as $cate)
							<li class="menu-item"><a href="{{asset('category/'.$cate->cate_id.'/'.$cate->cate_slug.'.html')}}">{{$cate->cate_name}}</a></li>
							@endforeach						
						</ul>
						<!-- <a href="#" id="pull">Danh mục</a> -->
					</nav>

					<div id="banner-l" class="text-center">
						<div class="banner-l-item">
							<a href="{{asset('category/8/iphone.html')}}"><img src="img/home/banner-l-10.jpg" alt="" class="img-thumbnail"></a>
						</div>
						<div class="banner-l-item">
							<a href="{{asset('category/9/samsung.html')}}"><img src="img/home/banner-l-11.jpg" alt="" class="img-thumbnail"></a>
						</div>
						<div class="banner-l-item">
							<a href="{{asset('category/10/oppo.html')}}"><img src="img/home/banner-l-12.jpg" alt="" class="img-thumbnail"></a>
						</div>
						<div class="banner-l-item">
							<a href="{{asset('category/7/sony.html')}}"><img src="img/home/banner-l-13.jpg" alt="" class="img-thumbnail"></a>
						</div>
						<div class="banner-l-item">
							<a href="{{asset('category/13/nokia.html')}}"><img src="img/home/banner-l-14.jpg" alt="" class="img-thumbnail"></a>
						</div>
						<div class="banner-l-item">
							
						</div>
						<div class="banner-l-item">
							<a href="{{asset('category/13/nokia.html')}}"><img src="img/home/banner-l-16.jpg" alt="" class="img-thumbnail"></a>
						</div>
						<div class="banner-l-item">
							<a href="{{asset('category/14/xiaomi.html')}}"><img src="img/home/banner-l-17.jpg" alt="" class="img-thumbnail"></a>
						</div>
						<div class="banner-l-item">
							<a href="{{asset('category/15/macbook.html')}}"><img src="img/home/banner-l-8.jpg" alt="" class="img-thumbnail"></a>
						</div>
						<div class="banner-l-item">
							<a href="{{asset('category/16/laptop.html')}}"><img src="img/home/banner-l-9.jpg" alt="" class="img-thumbnail"></a>
						</div>
					</div>
				</div>

				<div id="main" class="col-md-9">
					<!-- main -->
					<!-- phan slide la cac hieu ung chuyen dong su dung jquey -->
					<div id="slider">
						<div id="demo" class="carousel slide" data-ride="carousel">

							<!-- Indicators -->
							<ul class="carousel-indicators">
								<li data-target="#demo" data-slide-to="0" class="active"></li>
								<li data-target="#demo" data-slide-to="1"></li>
								<li data-target="#demo" data-slide-to="2"></li>
							</ul>

							<!-- The slideshow -->
							<div class="carousel-inner">
								<div class="carousel-item active">
									<a href="{{asset('category/10/oppo.html')}}"><img src="img/home/slide-8.png" alt="Los Angeles" ></a>
								</div>
								<div class="carousel-item">
									<a href="{{asset('detail/124/iphone-xs-64gb.html')}}"><img src="img/home/slide-5.png" alt="Chicago"></a>
								</div>
								<div class="carousel-item">
									<a href="{{asset('detail/130/samsung-galaxy-note-9-512gb.html')}}"><img src="img/home/slide-9.png" alt="New York" ></a>
								</div>
							</div>

							<!-- Left and right controls -->
							<a class="carousel-control-prev" href="#demo" data-slide="prev">
								<span class="carousel-control-prev-icon"></span>
							</a>
							<a class="carousel-control-next" href="#demo" data-slide="next">
								<span class="carousel-control-next-icon"></span>
							</a>
						</div>
					</div>

					<div id="banner-t" class="text-center">
						<div class="row">
							<div class="banner-t-item col-md-6 col-sm-12 col-xs-12">
								<a href="{{asset('category/8/iphone.html')}}"><img src="img/home/banner-t-8.png" alt="" class="img-thumbnail"></a>
							</div>
							<div class="banner-t-item col-md-6 col-sm-12 col-xs-12">
								<a href="{{asset('detail/101/samsung-galaxy-s8-plus.html')}}"><img src="img/home/banner-t-9.png" alt="" class="img-thumbnail"></a>
							</div>
						</div>					
					</div>
					<!--Wrap-->
					@yield('main')
					</div>
			</div>
		</div>
	</section>
	<!-- endmain -->

	<!-- footer -->
	<footer id="footer">			
		<div id="footer-t">
			<div class="container">
				<div class="row">				
					<div id="logo-f" class="col-md-3 col-sm-12 col-xs-12 text-center">						
						<a><img height="80px" src="img/home/logoctu.jpg"></a>		
					</div>
					<div id="about" class="col-md-3 col-sm-12 col-xs-12">
						<h3>Giới thiệu</h3>
						<p class="text-justify">Trường Đại học Cần Thơ được thành lập năm 1966, là một trường đại học đa ngành đa lĩnh vực và là cơ sở đào tạo, nghiên cứu khoa học trọng điểm của Nhà nước ở Đồng bằng sông Cửu Long. Trong suốt quá trình hình thành và phát triển, Trường không ngừng cải tiến năng lực nghiên cứu, giảng dạy và phục vụ, tăng cường hoạt...</p>
					</div>
					<div id="hotline" class="col-md-3 col-sm-12 col-xs-12">
						<h3>Hotline</h3>
						<p>Phone: 0355 919 913</p>
						<p>Email: taib1507302@student.ctu.edu.vn</p>
					</div>
					<div id="contact" class="col-md-3 col-sm-12 col-xs-12">
						<h3>Địa chỉ</h3>
						<p>Address: Khu II, đường 3/2, P. Xuân Khánh, Q. Ninh Kiều, TP. Cần Thơ.</p>
						
					</div>
				</div>				
			</div>
			<div id="footer-b">				
				<div class="container">
					<div class="row">
						<div id="footer-b-l" class="col-md-6 col-sm-12 col-xs-12 text-center">
							<p>www.ctu.edu.vn</p>
						</div>
						<div id="footer-b-r" class="col-md-6 col-sm-12 col-xs-12 text-center">
							<p>© Điện thoại: (84-292) 3832663; Fax: (84-292) 3838474; Email: dhct@ctu.edu.vn.</p>
						</div>
					</div>
				</div>
				<div id="scroll">
					<a href="{{route('frontend')}}"><img src="img/home/scroll.png"></a>
				</div>	
			</div>
		</div>
	</footer>
	<!-- endfooter -->
</body>
</html>