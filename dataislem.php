<?php
include 'databasebaglanti.php';
include 'header.php';
?>
		<div class="content" style="overflow-x:auto;">
			<h2>Ekle Page</h2>
			<div style="overflow-x:auto;">
			<div>
			<h3>Urun Ekle</h3>	
			<form action="insert.php" method="post">
                                <input type="text"  placeholder=" UrunKod " name="urunkod">
                                
                                <input type="text"  placeholder=" UrunOlcut " name="urunolcut">
                                <input type="text"  placeholder=" UrunAdı " name="urunad">
                                <button class="btn btn-primary" name="submit">Ekle</button>
                            </form>
                           
				
			</div>
			<?php if($_SESSION['yetki']=='Admin'){?>
			<div>
			<h3>Firma Ekle</h3>		
			<form action="insertfirma.php" method="post">
                                <input type="text"  placeholder=" Firma Ad " name="firmaad">
								<input type="text"  placeholder=" Firma Yetkili " name="firmayetkili">
								<input type="text"  placeholder=" Firma Tel " name="firmatel">
                                
                                <button class="btn btn-primary" name="submit">Ekle</button>
                            </form>
							<?php  } ?>           
				
			</div>
			<?php if($_SESSION['yetki']=='Admin'){?>
			<div style=>
			<h3>Personel Ekle</h3>		
			<form action="insertpersonel.php" method="post">
                                <input type="text"  placeholder=" Personel Ad " name="personelad">
								<input type="text"  placeholder=" Personel Soyad " name="personelsoyad">
								<input type="text"  placeholder=" Personel Mail " name="personelmail">
								<input type="text"  placeholder=" Personel Tel " name="personeltel">
								<input type="text"  placeholder=" Personel Firma " name="personelfirma">
								
                                
                                <button class="btn btn-primary" name="submit">Ekle</button>
                            </form>
							<?php  } ?>           
				
			</div>
			<?php if($_SESSION['yetki']=='Admin'){?>
			<div>
			<h3>Personel Ekle</h3>		
			<form action="insertpersonel.php" method="post">
                                <input type="text"  placeholder=" Siparis Ad " name="siparisad">
								<input type="text"  placeholder=" Siparis Kod " name="sipariskod">
								<input type="text"  placeholder=" Siparis Firma " name="siparisfirma">
								<input type="text"  placeholder=" Siparis Miktar " name="siparismiktar">
								<input type="text"  placeholder=" Siparis Fiyat " name="siparisfiyat">
								<input type="text"  placeholder=" Siparis Süre " name="siparissüre">
                                <button class="btn btn-primary" name="submit">Ekle</button>
                            </form>
							<?php  } ?>           
				
			</div>
			</div>
		</div>
	</body>
</html>