<?php
// session_start();

header('Content-Type: text/html; charset=UTF-8');
if(isset($_POST['ok']))
{
    $conn=mysqli_connect("localhost","root","","doan") or die("ket noi that bai!");

    $tk = $_POST["username"];
    $mk = md5($_POST['pwd']);
    // $mk = md5(mysqli_real_escape_string($conn, $_POST["pwd"]));
    // echo "$mk";
    $sql="SELECT * FROM thanhvien WHERE tendangnhap='$tk' AND matkhau='$mk' ";

    // echo "$sql";
    $query=mysqli_query($conn,$sql);

    if(mysqli_num_rows($query) !== 0)
    {   
        $row=mysqli_fetch_array($query);
        session_start();
        $_SESSION['username'] = $row['tendangnhap'];
        $_SESSION['password'] = $row['matkhau'];
        $_SESSION['userid'] = $row['id'];


        header('Location: trangchu.php');       
    }
     // else{
     //     echo "bạn nhập sai tên đăng nhập hoặc mật khẩu";
     // }
    
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <style>
            form{
                width: 300px;
                margin:0 auto;
            }
            .div{
                margin-top: 10px;
                text-align: center;

            }


        </style>
    </head>
    <body>
        <form action='dangnhap.php?do=login' method='POST'>
            <table cellpadding='0' cellspacing='0' >
                <tr>
                    <td>
                        Tên đăng nhập
                    </td>
                    <td>
                        <input type='text' name='username' required />
                    </td>
                </tr>
                <tr>
                    <td>
                        Mật khẩu
                    </td>
                    <td>
                        <input type='password' name='pwd' required/>
                    </td>
                </tr>
            </table>
            <div class="div">
                <input type='submit' name="ok" value='Đăng nhập' />
                <button><a style="color: red; text-decoration: none;" href='dangky.php' title='Đăng ký'>Đăng ký</a></button>
            </div>
            
        </form>
    </body>
</html>