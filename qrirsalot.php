<?php

$stokid=$_GET['id'];

?>



<form action="qrirsagiris.php?id<?php echo $stokid;?>" method="post">
                                <input type="text"  placeholder=" Lot " name="lot">
                       
                                <br>
                                <br>
                                <button class="btn btn-primary" name="submit">Ekle</button>
                      
                            </form>