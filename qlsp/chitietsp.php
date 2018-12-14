<?php
	session_start();

	header('Content-Type: text/html; charset=UTF-8');

    $conn = mysqli_connect("localhost","root","","doan") or die("ket noi that bai!") ;

	$sql = "SELECT idsp, tensp, giasp,chitietsp, hinhanhsp, idtv from sanpham inner join thanhvien on sanpham.idtv=thanhvien.id where sanpham.idsp='".$_GET['idspham']."' ORDER BY idsp";
	$sth = $conn->query($sql);
  	$result=mysqli_fetch_array($sth);

?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <style type="">
      	.content{
        	width: 750px;
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
				 
				 echo "<h4>Chi tiết: </h4>";
			?>
			
			<table style="margin-top: 10px">
				<tr>
					<th>STT</th>
					
					<th>Tên SP</th>
					<th>Giá SP</th>
					<th>Chi tiết SP</th>
					<th>Hình ảnh</th>
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
	                echo "<td> " . $row["chitietsp"] . "</td>";
		            echo '<td><img style="width:50px; height: auto;" src="data:image/jpeg;base64,'.base64_encode( $result['hinhanhsp'] ).'"/></td>';
	              ?>
	            </tr>
            <?php }}  ?> 

          </table>
         <?php
          echo '<div  style="text-align:center; margin-top: 30px;">';
            echo '<button>'.'<a href="logout.php">Logout</a>'.'</button>';
            echo '&nbsp;&nbsp;&nbsp;'.'<button>'.'<a style="color:
orange" href="trangchu.php">Trang chủ</a>'.'</button>';
              
            echo '&nbsp;&nbsp;&nbsp;'.'<button>'.'<a style="color:blue" href="danhsachsp.php">Danh sách sản phẩm</a>'.'</button>';
            echo '&nbsp;&nbsp;&nbsp;'.'<button>'.'<a style="color:green" href="themsp.php" title="Thêm sản phẩm">Thêm sản phẩm</a>'.'</button>';
          echo" </div>";
      	?>
      </div>

	</body>
</html>
​
