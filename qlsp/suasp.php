<?php
    $conn = mysqli_connect("localhost", "root", "", "doan");
    
    // if (isset($_POST['sua']))
    // {

        $sql = "select * from sanpham where idsp='".$_GET['idspsua']."'";

        $result = $conn->query($sql);
        while($row = $result->fetch_assoc())
        {
        	$idsp = $row['idsp'];
            $namesp = $row['tensp'];
            $price = $row['giasp'];
            $note = $row['chitietsp'];
            $image = $row['hinhanhsp'];
        }
        
?>
<!DOCTYPE html>
<html>
	<style>
		.content{
        width:400px;
        margin:0 auto;
        background-color: white;  
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

		<form onsubmit="return checkForm()" method="POST" action="xulysuasp.php" enctype="multipart/form-data">
		  	
			    <h2 style="color:red"> <center>Sửa thông tin sản phẩm</center></h2>  
    			<p> <center> Vui lòng nhập đầy đủ thông tin sản phẩm</center></p>
			    
    			<div class="content">
    			<table>
			    <input type="hidden" name="idsp" value="<?php echo $idsp ?>">
			    
			    <tr>
				    <td>Tên sản phẩm</td>
				    <td><input type="text" placeholder="Nhập tên sản phẩm" name="tenspsua" id="tensp" required value="<?php echo $namesp ?>"></td>
				</tr>

				<tr>
			    <td>Giá sản phẩm</td>
			    <td><input type="text" placeholder="Nhập giá sản phẩm" name="giaspsua" id="giasp" required value="<?php echo $price ?>"></td>
				</tr>

				<tr>
			    <td>Chi tiết sản phẩm</td>
			    <td><input type="text" placeholder="Nhập chi tiết sản phẩm" name="chitietspsua" id="chitietsp" required value="<?php echo $note ?>"></td>
				</tr>

				<tr>

			    <td>Hình đại diện</td>
			    <td><input type="file" placeholder="Chọn hình đại diện" name="hinhanhspsua" id="hinhanhsp"></td>
			    </tr>
			    

			    <tr>
			    <td></td>
			    
			    <td><button style="color:green" type="submit" name="btnsua" >Lưu sản phẩm</button></td>
			    </tr>
			    </div>
		  	</div>
		  	</table>
		</form>

	</body>
</html>




​

​
