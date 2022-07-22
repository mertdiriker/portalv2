<script>
           $(function(){
               $("#submit<?php echo $cikti["Urunler_ID"];?>").click(function(){
				var urunadv = $("#urunad<?php echo $cikti["Urunler_ID"];?>").val();
				var urunkodv = $("#urunkod<?php echo $cikti["Urunler_ID"];?>").val();
				var urunolcutv = $("#urunolcut<?php echo $cikti["Urunler_ID"];?>").val();
				
                  $.post("update.php",{
					urunad : urunadv   ,
					urunkod :  urunkodv  ,
					urunolcut: urunolcutv  ,
					id:"<?php echo $cikti["Urunler_ID"];?>"
                  },
                  function(data,status){
                      $("#dedit<?php echo $cikti["Urunler_ID"];?>").html(data);
                  });
               });
           });
       </script>