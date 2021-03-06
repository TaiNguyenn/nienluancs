@extends('frontend.master')
@section('title','Danh mục sản phẩm')
@section('main')
<link rel="stylesheet" href="css/category.css">
<div id="wrap-inner">
						<div class="products">
							<h3></h3>
							
							<div class="product-list row">
								@foreach($data as $item)
								<div class="product-item col-md-3 col-sm-6 col-xs-12">
									<a href="#"><img src="{{asset('upload/'.$item->prod_img)}}" class="img-thumbnail"></a>
									<p><a href="#">{{$item->prod_name}}</a></p>
									<p class="price">{{number_format($item->prod_price,0,',','.')}}đ</p>	  
									<div class="marsk">
										<a href="{{asset('detail/'.$item->prod_id.'/'.$item->prod_slug.'.html')}}">Xem chi tiết</a>
									</div>                                    
								</div> 
								@endforeach  
							</div>
							              	                	
						</div>

						<div id="pagination">
							
							{{$data->links()}}
						</div>
</div>
@stop

					
					