
<!DOCTYPE html>
<html>
	<style>
	.content{
        width:370px;
        margin:0 auto;
        background-color: #FFFFFF;  
        padding:10px;
        border:1px solid black;
    }
		
	</style>
	<script type="text/javascript">
		function checkForm()
        {
            var tensp = document.getElementById('tensp').value;
            var chitietsp = document.getElementById('chitietsp').value;
            var giasp = document.getElementById('giasp').value;
            var hinhanhsp = document.getElementById('hinhanhsp').value;

            if (tensp == '' && chitietsp == ''&& giasp == '' && hinhanhsp == ''){
                    
                    alert('Bạn chưa điền thông tin');  
                    return false;
                }

                if(tensp == '')
            {
                alert('Bạn chưa nhập tên sản phẩm!');     
                return false;
            }
            if(chitietsp == '')
            {
                alert('Bạn chưa nhập chi tiết sản phẩm!');     
                return false;
            }
            if(giasp == '')
            {
                alert('Bạn chưa nhập giá sản phẩm!');     
                return false;
            }
            if(hinhanhsp == '')
            {
                alert('Bạn chưa chọn hình ảnh sản phẩm!');     
                return false;
            }else{
                return true;
            }
                return false;

        }
	</script>
	<body>

		<form  onsubmit="return checkForm()" method="POST" action="xulythemsp.php" enctype="multipart/form-data">
			<h2 style="color:red"> <center>Thêm sản phẩm</center></h2>  
    		<p> <center> Vui lòng nhập đầy đủ thông tin sản phẩm</center></p>
		    <div class="content">
		    	<table>
		    		<tr>

					    <td>Tên sản phẩm</td>
					    <td><input type="text" placeholder="Nhập tên sản phẩm" name="tensp" id="tensp"></td>
			    	</tr>
			    	<tr>

					    <td>Chi tiết sản phẩm</td>
					    <td><input type="text" placeholder="Nhập chi tiết sản phẩm" name="chitietsp" id="chitietsp"></td>
			    	</tr>
			    	<tr>

					    <td>Giá sản phẩm</td>
					    <td><input type="text" placeholder="Nhập giá sản phẩm" name="giasp" id="giasp"></td>
					</tr>
					<tr>

					    <td>Hình đại diện</td>
					    <td><input type="file" placeholder="Thêm ảnh sản phẩm" name="hinhanhsp" id="hinhanhsp"></td>
					    
			    	</tr>
			    	<tr>
			    		<td></td>
					    <td><button style="color:green" type="submit" name="btnthem">Lưu sản phẩm</button></td>
			  		</tr>
			    
			    </table>
			</div>
		  
		 
		</form>

	</body>
</html>


​
