<?php
    
    require_once("databasebaglanti.php");
   

  
            

    if(isset($_POST['submit']))
    {
        if(empty($_POST['urunid2']) || (empty($_POST['urunmiktar'])))
        {
            echo ' Boşları doldur ';
        }
        else
        {
            $urunkod = $_GET['kod'];
            $urunid = $_GET['id'];
            $miktar = $_POST['urunmiktar'];
            $urunid2=$_POST['urunid2'];
          
            $tarih = date('d-m-Y H:i:s',time());
            $ekleyen = $_SESSION['id'];
           
           
            $stmt = $con->prepare('UPDATE urunler SET Urunler_Recete = TRUE WHERE Urunler_ID=?');
            $stmt->bind_param('s',$urunid);	

        
            $stmt->execute();


            $stmt->fetch();
            $stmt->close();
         

            

            $query = " insert into urunrecete (Urunrecete_UrunID,Urunrecete_Urun2ID,Urunrecete_Miktar) values('$urunkod','$urunid2','$miktar')";
            $result = mysqli_query($con,$query);

            if($result)
            {
                header("location:recete.php?id=$urunid&kod=$urunkod");
            }
            else
            {
                echo '  Please Check Your Query ';
            }
        }
    }
    else
    {
        
        header("location:test.php");
    }



?>