<?php session_start(); 
  $var = $_SESSION['userid'];
  $conn = mysqli_connect("localhost","root","","doan") or die("ket noi that bai!") ;
  $sql = "SELECT * FROM thanhvien WHERE id='$var'";
  $sth = $conn->query($sql);
  $result=mysqli_fetch_array($sth);
  $_SESSION['idtv'] = $result['id'];

?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <style type="">
          .content{
            width: 600px;
            margin: 0 auto;
            background-color: #d2b0b017;
            padding-top: 5px;
            padding-bottom: 5px;
            text-align: center;
          }
          .content h3,p{
            text-align: center;
          }
          table {
              font-family: arial, sans-serif;
              border-collapse: collapse;
              width: 35%;
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
          echo "<h3>THÔNG TIN ĐĂNG KÍ </h3>";
        ?>
          <?php
            echo '<img style="width:150px; height: auto; padding-left:10px;" src="data:image/jpeg;base64,'.base64_encode( $result['hinhanh'] ).'"/>';
          ?>
          
          <table  style="margin: auto;">
            <?php
              $getnv = $conn->query($sql);
              if($getnv->num_rows > 0){
              while($row = $getnv->fetch_assoc()){
            ?>                  
                
            <tr>
              <td>Tên đăng nhập:</td>
              <?php
                echo "<td> " . $row["tendangnhap"] . "</td>";
              ?>
            </tr>
            

            <tr>
              <td>Giới tính:</td>
              <?php
                echo "<td> " . $row["gioitinh"] . "</td>";
              ?>
            </tr>
            <tr>
              <td>Năm sinh:</td>
              <?php
                echo "<td> " . $row["namsinh"] . "</td>";
              ?>
            </tr>
            <tr>
              <td>Địa chỉ:</td>
              <?php
                echo "<td> " . $row["diachi"] . "</td>";
              ?>
            </tr>
            <?php }}  ?>    
          </table>
      </div>

      <?php
          echo '<div  style="text-align:center; margin-top: 30px; ">';
            
            
            echo '<button>'.'<a href="danhsachsp.php" style="color:green">Danh sách sản phẩm</a>'.'</button>';
            echo '&nbsp;&nbsp;&nbsp;'.'<button>'.'<a href="logout.php">Logout</a>'.'</button>';
          echo" </div>";
      }
      else{
        $conn->close();
        echo 'Bạn chưa đăng nhập';
        echo "&nbsp;&nbsp;&nbsp;<a href='dangnhap.php' title='Đăng nhập'>Đăng nhập</a>";
        echo "&nbsp;&nbsp;&nbsp;<a href='dangky.php' title='Đăng ký'>Đăng ký</a>";
      }
     ?>
         
    </body>
</html>