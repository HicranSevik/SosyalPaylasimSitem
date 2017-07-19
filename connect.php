<?php
@$baglan=mysqli_connect("localhost","root","","kiwi_qa");
@mysqli_set_charset($baglan,"utf8");
if($baglan){
//  echo "Veritabanına bağlandı";
}
else {
  echo "Veritabanına bağlanılamadı";
}


 ?>
