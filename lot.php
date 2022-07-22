<?php
$miktar=$_POST['miktarid'];
$j=$_POST['i'];
?>
<br>
<?php for ($i = 1; $i <= $miktar; $i++) {
    ?>


<input type="text"  placeholder="Lot Numarası" name="lotnm<?php echo $j;?><?php echo $i;?>"><label >&emsp;Üretim Tarihi : </label>   <input type="date"   name="irsurttarih<?php echo $j;?><?php echo $i;?>"  value= "">

<br>

<?php

} ?>


<?php
include 'databasebaglanti.php';
    $query = "SELECT * FROM lokasyon ORDER BY lokasyon_kodu";
    $result = $con->query($query);

    ?>


<select name="lokasyon<?php echo $j;?>" id="lokasyon" class="form-control" style="width:150px;"> <option value="">&emsp;Lokasyon Seç</option>
               <?php
                   if ($result->num_rows > 0 ) {
                       while ($row = $result->fetch_assoc()) {
                           echo '<option value="'.$row['lokasyon_kodu'].'">'.$row['lokasyon_kodu'].'</option>';
                         }
                       }
               ?> 
          </select>
