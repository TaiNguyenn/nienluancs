<?php
    header('Content-Type: text/html"; charset=utf-8');
    session_start();
    if(isset($_POST['btnthem']))
    {
        $conn = mysqli_connect("localhost", "root", "", "doan") or die("ket noi that bai!");
        
        $img = addslashes(file_get_contents($_FILES['hinhanhsp']['tmp_name']));
        $var = $_SESSION['idtv'];

        $sql = "INSERT INTO sanpham (tensp, chitietsp, giasp, hinhanhsp , idtv) VALUES ('".$_POST['tensp']."','".$_POST['chitietsp']."','".$_POST['giasp']."','$img','".$var."')";

        // $_SESSION['idtvien'] = $var;

        if($conn->query($sql)){
            header('Location: danhsachsp.php');
        }
    }
?>