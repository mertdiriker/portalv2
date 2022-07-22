<div>
				<h1> <img src="portal.png"></h1>
				<a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
				<a href="qrread/default.php"><i class="fas fa-user-circle"></i>QR</a>
				<?php if($_SESSION['yetki']=='Personel'){?>
                <a href="urunler.php"><i class="fas fa-user-circle"></i>Urunler</a>
				<?php } ?>
  
				
                
                <?php if($_SESSION['yetki']=='Admin'){?>
                <a href="firma.php"><i class="fas fa-user-circle"></i>Firmalar</a>
				<a href="test.php"><i class="fas fa-user-circle"></i>UrunlerAdmin</a>
				<a href="personel.php"><i class="fas fa-user-circle"></i>Personel</a>
				<a href="siparis.php"><i class="fas fa-user-circle"></i>Siparisler</a>
				<a href="irsa.php"><i class="fas fa-user-circle"></i>İrsaliye</a>
				<a href="irsastok.php"><i class="fas fa-user-circle"></i>Stok</a>
                <a href="lokasyon.php"><i class="fas fa-user-circle"></i>Lokasyon</a>

                <?php  } ?>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>