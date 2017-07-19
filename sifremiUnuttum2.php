<?php
session_start();


@$kullanicim=$_POST['email'];
@$arkadas=$_POST['arkadas'];
$varmi=mysqli_query($baglan,"SELECT*FROM kullanicilar where email='$kullanicim' AND Arkadasi='$arkadas'");
 $sonuc= mysqli_fetch_array($varmi);
if($sonuc){
  $_SESSION["Kullanici_id"]=$sonuc['Kullanici_id'];
  header("Location:sifreYenile.php");
}
else{
  echo "Bilgileriniz yanlış.Tekrar Deneyin";
    header("Location:sifremiUnuttum.php");
}

?>
