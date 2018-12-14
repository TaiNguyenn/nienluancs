<?php
	session_start();

	header('Content-Type: text/html; charset=UTF-8');

    $conn = mysqli_connect("localhost","root","","doan") or die("ket noi that bai!") ;

	  $sql = "SELECT idsp, tensp, giasp from sanpham inner join thanhvien on sanpham.idtv=thanhvien.id where sanpham.idtv='".$_SESSION['idtv']."' ORDER BY idsp";
	  // $sth = $conn->query($sql);
	  // $result=mysqli_fetch_array($sth);

?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <style type="">
      	.content{
        	width: 550px;
        	margin: 0 auto;
        	background-color: #FFFFFF;
        	padding-top: 1px;
        	padding-bottom: 5px;
      	}
      	.content h3,p{
       		text-align: center;
      	}
      	table {
          	font-family: arial, sans-serif;
          	border-collapse: collapse;
          	width: 95%;
          	margin-left: 13px !important;
      	}
      	td, th {
	    	border: 1px solid #bbbbbb;
	    	text-align: center;
	    	padding: 8px;
		}

		tr:nth-child(even) {
		    background-color: #cccccc;
		}
      	td{
        	font-size: 13px !important;
          	text-align: left;
          	padding: 8px;
          	padding-left: 20px;
      	}
      	h3{
        	text-align: center;
      	}
     	h4{
      		padding-left: 20px;
      	}
      	a{
          text-decoration:none;
          color:red;
          }
    </style>
</head>
	<body>
		<div class="content">
			<?php 
	        	if (isset($_SESSION['username']) && isset($_SESSION['password'])){
	          		echo '<h3>Danh sách của thành viên '.$_SESSION['username']."</h3>";
	          		
	        ?>
			
			<table style="margin-top: 10px">
				<tr>
					<th>STT</th>
					<th>Tên SP</th>
					<th>Giá SP</th>
					<th colspan="3">Lựa chọn</th>
				</tr>
	        <?php
	              $getsp = $conn->query($sql);
	              if($getsp->num_rows > 0){
	              while($row = $getsp->fetch_assoc()){
	        ?>                  	
	            <tr>
	              <?php
	                echo "<td> " . $row["idsp"] . "</td>";
	              
					echo "<td> " . $row["tensp"] . "</td>";
	              
	                echo "<td> " . $row["giasp"] . "</td>";
	              
	                echo '<td> <a style="color:blue" href="chitietsp.php?idspham='.$row['idsp'].'">Xem chi tiết</a> </td>';
	                echo '<td> <a href="suasp.php?idspsua='.$row['idsp'].'"><img src="edit.png" alt="" style="width: 20px; height: 20px;"></a> </td>';
		                echo '<td> <a href="xoasp.php?idspxoa='.$row['idsp'].'"><img src="delete.png" alt="" style="width: 20px; height: 20px;"></a> </td>';
	              ?>
	            </tr>
            <?php }}  ?> 



          	</table>
        	<?php
        	echo '<div  style="text-align:center; margin-top: 30px;">';
            	
            echo '<button>'.'<a href="logout.php">Logout</a>'.'</button>';
            echo '&nbsp;&nbsp;&nbsp;'.'<button>'.'<a style="color:
orange" href="trangchu.php">Trang chủ</a>'.'</button>';
            	echo '&nbsp;&nbsp;&nbsp;'.'<button>'.'<a style="color:green" href="themsp.php" title="Thêm sản phẩm">Thêm sản phẩm</a>'.'</button>';
          	echo" </div>";
     		}
     		else{	
	          	echo 'Bạn chưa đăng nhập';
		        echo "&nbsp;&nbsp;&nbsp;<a href='dangnhap.php' title='Đăng nhập'>Đăng nhập</a>";
		        echo "&nbsp;&nbsp;&nbsp;<a href='dangky.php' title='Đăng ký'>Đăng ký</a>";
      		}
      		?>
      </div>

	</body>
</html>
​
