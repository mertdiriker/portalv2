<?php 
include_once 'config.php';

if (isset($_POST['country_id'])) {
	$query = "SELECT * FROM urunler where Urunler_Firma=".$_POST['country_id'];
	$result = $db->query($query);
	if ($result->num_rows > 0 ) {
			echo '<option value="">Urun Seç</option>';
		 while ($row = $result->fetch_assoc()) {
		 	echo '<option value='.$row['Urunler_ID'].'>'.$row['Urunler_Ad'].'</option>';
		 }
	}else{

		echo '<option>No State Found!</option>';
	}

}


?>