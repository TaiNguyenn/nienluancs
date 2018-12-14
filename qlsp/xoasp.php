<?php
	session_start();

	header('Content-Type: text/html; charset=UTF-8');

    // $conn = mysqli_connect("localhost","root","","buoi3") or die("ket noi that bai!") ;
    $conn = new PDO("mysql:host=localhost;dbname=doan", 'root', '');
 
    // Thiết lập exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $id = $_GET['idspxoa'];
	$del = "DELETE FROM sanpham WHERE idsp='$id'";
	// $sth = $conn->query($del);
 //  	$result=mysqli_fetch_array($sth);
	$result = $conn->exec($del);
	 header('Location: danhsachsp.php');


?>