<?php
include 'databasebaglanti.php';
// We need to use sessions, so you should always start sessions using the below code.


// We don't have the password or email info stored in sessions so instead we can get the results from the database.
$stmt = $con->prepare('SELECT * FROM urunler WHERE Urunler_Firma = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('s', $_SESSION['firma']);	
$stmt->execute();
$sonuc = $stmt->get_result();
$stmt->fetch();
$stmt->close();
?>

<?php

include 'header.php';
?>
		<div class="content">
			<h2>Urunler Page</h2>
			<?php 
					while ($cikti = $sonuc->fetch_array())
					{if ($cikti["Urunler_Silindi"]==FALSE){?>
					
					<div id=cdedit<?php echo $cikti["Urunler_ID"];?>>
				
				    <form action="edit.php?id=<?php echo $cikti["Urunler_ID"];?>" method="post">
					<table>
						<tr>
							<td>Urun ID:</td>
							<td><?php echo $cikti["Urunler_ID"];?></td>
						</tr>
						<tr>
							<td>Urun Kod:</td>
							<td><?php echo $cikti["Urunler_Kod"];?></td>
						</tr>
						<tr>
							<td>Urun Ad:</td>
							<td><?php echo $cikti["Urunler_Ad"];?></td>
						</tr>
						<tr>
							<td>Urun Olcut:</td>
							<td><?php echo $cikti["Urunler_Olcut"];?></td>
							
								
							<td><button class="btn btn-primary" name="submit">Edit</button></td>
						</tr>
						</table>
					</form>
						
				</div>
				<?php
					}}?>
                
			
		</div>
	</body>
</html>