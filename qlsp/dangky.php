
<!DOCTYPE html>
<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <style>
    .content{
        width:350px;
        margin:0 auto;
        background-color: white;  
        padding:10px;
        border:1px solid black;

    }

    
    </style>
    
</head>
<script>
        function checkForm()
        {
            var username = document.getElementById('username').value;
            var pwd = document.getElementById('password').value;
            var repwd = document.getElementById('repassword').value;
            var image = document.getElementById('avt').value;
            var namsinh = document.getElementById('namsinh').value;
            var add = document.getElementById('add').value;
            
            //gioi tinh
            var gtnam = document.getElementById('Nam');
            var gtnu = document.getElementById('Nu');
            var gtkhac = document.getElementById('Khac');
            //dk
            // var ten = /^([A-Za-z]+\.)*[A-Za-z0-9]{6,15}$/;
            // var matkhau = /^[A-Za-z0-9]{6,15}$/;
            if (username == '' && pwd == ''&& repwd == '' && image == '' && namsinh == '' && add == ''){
                    
                    alert('Bạn chưa điền thông tin');  
                    return false;
                }

            if(username == '')
            {
                alert('Bạn chưa nhập tên đăng nhập!');     
                return false;
            }
            // if(ten.test(username)==false)
            // {
            //     alert('Tên đăng nhập phải bắt đầu bằng chữ cái, sau đó là chữ hoặc số, có độ dài từ 6-15 ký tự!');
            //     return false;
            // }
            if( pwd == '')
            {
                alert('Bạn chưa nhập mật khẩu!');
                return false;       
            }
            // if(matkhau.test(pwd)==false)
            // {
            //     alert('Mật khẩu phải chứa chữ và số, có độ dài từ 6-15 ký tự!');
            //     return false;
            // }
            if( repwd == '')
            {
                alert('Bạn chưa nhập lại mật khẩu!');
                return false;       
            }
            if(pwd !== repwd)
            {
                alert('Mật khẩu không khớp!');
                return false;
            }
            if(image == '')
            {
                alert('Bạn chưa chọn hình ảnh!');
                return false;
            }
            if(gtnam.checked==false && gtnu.checked==false && gtkhac.checked==false)
            {
                alert('Bạn chưa chọn giới tính!');
                return false;
            }
            if(namsinh == '')
            {
                alert('Bạn chưa nhập năm sinh!');     
                return false;
            }
            if(add == '')
            {
                alert('Bạn chưa nhập địa chỉ!');     
                return false;
            }
            else{
                return true;
            }
            
            return false;
        }
        


        
    </script>


    <body>
    <form onsubmit="return checkForm()" method="POST" action="xuly.php" enctype="multipart/form-data">
    <h2 style="color:red"> <center>Đăng kí tài khoản mới</center></h2>  
    <p> <center> Vui lòng điền đầy đủ thông tin bên dưới để đăng kí tài khoản mới.</center></p>
    <div class="content" >  
    
    <table>
        <tr>
            <td> Tên đăng nhập </td>
            <td> <input type="text" placeholder="Nhập tên đăng nhập" name="username" id="username"> </td>
            <p id="er1" style="color: green"></p>
            <p id="er2" style="color: red"></p>
        </tr>
        <tr>
            <td> Mật khẩu </td>
            <td> <input type="password" placeholder="Nhập mật khẩu" name="password" id="password"> </td>
        </tr>
        <tr>
            <td> Gõ lại mật khẩu </td>
            <td> <input type="password" placeholder="Nhập lại mật khẩu" name="repassword" id="repassword"> </td>
        </tr>
        <tr>
            <td> Hình đại diện </td>
            <td> <input type="file" value="image" name="avt" id="avt"> </td>
            
        </tr>
        <tr>
            <td> Giới tính </td>
            <td><input type="radio" id="Nam" name="gioitinh" value="Nam" > Nam
                <input type="radio" id="Nu" name="gioitinh" value="Nữ"> Nữ
                <input type="radio" id="Khac" name="gioitinh" value="Khác"> Khác 
            </td>
        </tr>
        <tr>
            <td> Năm sinh </td>
            <td> <input type="text" placeholder="Nhập năm sinh" name="namsinh" id="namsinh"> </td>   
        </tr>
        <tr>                    
            <td> Địa chỉ </td>
            <td> <input type="text" placeholder="Nhập địa chỉ" name="add" id="add"> </td>
        </tr>
        <tr>
            <td> </td>
            <td><button style="color:green" type="submit" name="btndangky">Đăng ký</button><button><a style="text-decoration: none; color:red; "  href="dangky.php">Làm lại</a></button> </td>

        </tr>
    
    </table>    
    </div>
    </form>
        </body>

</html>
​
