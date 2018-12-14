<?php
    header('Content-Type: text/html"; charset=utf-8');

    if(isset($_POST['btndangky']))
    {  
        if($_POST['repassword'] ==  $_POST['password']){
            $conn = mysqli_connect("localhost", "root", "", "doan") or die("ket noi that bai!");

            $image = addslashes(file_get_contents($_FILES['avt']['tmp_name']));

            // $sothich='';
            // foreach ($_POST['sothich'] as $st)
            // {
            //         $sothich = $sothich.', '.$st;
            // }

                $sql = "INSERT INTO thanhvien (tendangnhap, matkhau, hinhanh, gioitinh, namsinh, diachi) VALUES ('".$_POST['username']."','".md5($_POST['password'])."','$image','".$_POST['gioitinh']."', '".$_POST['namsinh']."', '".$_POST['add']."')";
          
            

            if($conn->query($sql)){

                //header('Location: thongtincanhan.php?username='.$_POST['username'].'');
                header('Location: dangnhap.php');
            }
        }
        else header('Location: dangky.php');
    }

?>
