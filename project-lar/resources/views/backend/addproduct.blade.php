@extends('backend.master')
@section('title','Thêm sản phẩm');
@section('main')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">Sản phẩm</h1>
				</div>
			</div><!--/.row-->
			
			<div class="row">
				<div class="col-xs-12 col-md-12 col-lg-12">
					
					<div class="panel panel-primary">
						<div class="panel-heading">Thêm sản phẩm</div>
						<div class="panel-body">
							@include('errors.note')
							<form method="post" enctype="multipart/form-data" action="{{route('productadmincreate')}}"> 
								{{csrf_field()}}
								<div class="row" style="margin-bottom:40px">
									<div class="col-xs-8">
										<div class="form-group" >
											<label>Tên sản phẩm</label>
											<input required type="text" name="name" class="form-control">
										</div>
										<div class="form-group" >
											<label>Giá sản phẩm</label>
											<input required type="number" name="price" class="form-control">
										</div>
										<!-- <div class="form-group" >
											<label>Ảnh sản phẩm</label>
											<input  id="img" type="file" name="img" class="form-control" onchange="changeImg(this)">
											 <img id="avatar" class="thumbnail" width="300px" src="img/new_seo-10-512.png">
						                   
										</div> -->
										<div class="form-group" >
										<label>Ảnh sản phẩm</label>
										<input id="img" type="file" name="img" onchange="readURL(this);">
										<img id="blah" src="{{ asset('upload/download.svg') }}" height="200px" width="200px" alt="your image" />

					                    
									</div>
										<div class="form-group" >
											<label>Phụ kiện</label>
											<input required type="text" name="accessories" class="form-control">
										</div>
										<div class="form-group" >
											<label>Bảo hành</label>
											<input required type="text" name="warranty" class="form-control">
										</div>
										<div class="form-group" >
											<label>Khuyến mãi</label>
											<input required type="text" name="promotion" class="form-control">
										</div>
										<div class="form-group" >
											<label>Tình trạng</label>
											<input required type="text" name="condition" class="form-control">
										</div>
										<div class="form-group" >
											<label>Trạng thái</label>
											<select required name="status" class="form-control">
												<option value="1">Còn hàng</option>
												<option value="0">Hết hàng</option>
						                    </select>
										</div>
										<div class="form-group" >
											<label>Miêu tả</label>
											<textarea class="ckeditor"required name="description"></textarea>
											<script> 
												var editor =CKEDITOR.replace( 'description', {
		language:'vi',
       
        filebrowserImageBrowseUrl: '{{ asset('editor/ckfinder/ckfinder.html?type=Images') }}',
        filebrowserFlashBrowseUrl: '{{ asset('editor/ckfinder/ckfinder.html?type=Flash') }}',
        
        filebrowserImageUploadUrl: '{{ asset('editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
        filebrowserFlashUploadUrl: '{{ asset('editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
    } );
											</script>
										</div>
										<div class="form-group" >
											<label>Danh mục</label>
											<select required name="cate" class="form-control">
												@foreach($catelist as $cate)
												<option value="{{$cate->cate_id}}">{{$cate->cate_name}}</option>
												@endforeach
												
						                    </select>
										</div>
										<div class="form-group" >
											<label>Loại sản phẩm</label><br>
										Smart Phone: <input type="radio" name="featured" value="1" >
										Laptop: <input type="radio" checked name="featured" value="0" >
										</div>
										<button type="submit" name="submit" class="btn btn-primary">Thêm</button>
										<a href="#" class="btn btn-danger">Hủy bỏ</a>
									</div>
								</div>
								
							</form>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
			</div><!--/.row-->
</div>
	<!--/.main-->
	<script type="text/javascript">
		function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
	</script>
@stop
