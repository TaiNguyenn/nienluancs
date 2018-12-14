<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">	
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>CTU - Email</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/email.css">
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
	
	<!-- endheader -->

	<!-- main -->
	<section id="body">
		<div class="container">
			<div class="row">
				

				<div id="main" class="col-md-9">
					<!-- main -->
					<!-- phan slide la cac hieu ung chuyen dong su dung jquey -->
					

					
<div id="wrap-inner">
						<div id="khach-hang">
							<h3>Thông tin khách hàng</h3>
							<p>
								<span class="info">Email: </span>
								{{$info['email']}}
							</p>
							<p>
								<span class="info">Khách hàng: </span>
								{{$info['name']}}
							</p>
							<p>
								<span class="info">Điện thoại: </span>
								{{$info['phone']}}
							</p>
							<p>
								<span class="info">Địa chỉ: </span>
								{{$info['add']}}
							</p>
						</div>						
						<div id="hoa-don">
							<h3>Hóa đơn mua hàng</h3>							
							<table border="1" cellspacing="0">
								<tr class="bold">
									<td width="30%">Tên sản phẩm</td>
									<td width="25%">Giá</td>
									<td width="20%">Số lượng</td>
									<td width="15%">Thành tiền</td>
								</tr>
								@foreach($cart as $item)
								<tr>
									<td>{{$item->name}}</td>
									<td class="price">{{number_format($item->price,0,',','.')}} VNĐ</td>
									<td>{{$item->qty}}</td>
									<td class="price">{{number_format($item->price*$item->qty,0,',','.')}} VNĐ</td>
								</tr>
								@endforeach
								
								<tr>
									<td colspan="3">Tổng tiền:</td>
									<td class="total-price">{{$total}}VNĐ</td>
								</tr>
							</table>
						</div>
						
</div>					
<!-- end main -->
				</div>
			</div>
		</div>
	</section>
	<!-- endmain -->

	<!-- footer -->
	
</body>
</html>