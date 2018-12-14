<?php
        $conn = new mysqli ("localhost", "root", "", "doan");
        session_start();
        if (isset($_POST['btnsua']))
        {
            
            $target_path = "uploads/";
            $anhmoi = $_FILES['hinhanhspsua']['tmp_name']; 

            $idsp = $_POST['idsp'];

            $sqlavt = "SELECT hinhanhsp from sanpham where idsp = $idsp";
            $result = $conn->query($sqlavt);

            // echo $result;         

            while($row = $result->fetch_assoc())
            {
                $anhcu = $row["hinhanhsp"];


            }
            
            if($anhcu)
                {
                    if($anhmoi)
                    {
                        $avt = addslashes(file_get_contents($anhmoi));

                        $sql = "UPDATE sanpham set tensp = '".$_POST["tenspsua"]."', giasp = ".$_POST["giaspsua"].",
                            chitietsp = '".$_POST["chitietspsua"]."', hinhanhsp = '".$avt."' where idsp = ".$idsp;
                                                   
                        $result = $conn->query($sql);
                        echo "<meta http-equiv='refresh' content='0;url=danhsachsp.php'>";

                    }
                    else
                    {
                        $sql = "UPDATE sanpham set tensp = '".$_POST["tenspsua"]."', giasp = ".$_POST["giaspsua"].",
                            chitietsp = '".$_POST["chitietspsua"]."' where idsp = ".$idsp;
                                                   
                        $result = $conn->query($sql);      
                        echo "<meta http-equiv='refresh' content='0;url=danhsachsp.php'>";

                    }
                      
                }
                else
                {
                    if($anhmoi)
                    {
                        $avt = addslashes(file_get_contents($anhmoi));
                        echo "<meta http-equiv='refresh' content='0;url=danhsachsp.php'>";
                    }
                    else
                    {
                        $avt=null;
                    }
                    $sql = "UPDATE sanpham set tensp = '".$_POST["tenspsua"]."', giasp = ".$_POST["giaspsua"].",
                    chitietsp = '".$_POST["chitietspsua"]."', hinhanhsp = '".$avt."' where idsp = ".$idsp;
                    
                    $result = $conn->query($sql); 
                    echo "<meta http-equiv='refresh' content='0;url=danhsachsp.php'>";
                    
                }
            
            $conn->close();
            

        }
        ?>