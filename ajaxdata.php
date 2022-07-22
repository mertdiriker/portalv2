<?php
include 'databasebaglanti.php' ;

if ($_POST['firma_id']){
    $query = "SELECT * FROM urunler where Urunler_Firma".$_POST['firma_id'];
    $result = $db->query($query);
    if ($result->num_rows > 0 ) {
        echo '<option value=""> Ürün Seç </option>' ;
            while ($row = $result -> fetch_assoc()) {
                echo '<option value='.$row['id'].'>'.$row['Urunler_Ad'].'</option>';
            }
    }else {
        echo '<option> Ürün Bulunamadı </option>';
    }
}

?>
