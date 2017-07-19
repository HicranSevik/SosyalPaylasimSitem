<?php
session_start();
include("connect.php");
include("girisYap.php");

$kullanicim=$_POST['email'];
$sifrem=$_POST['sifre'];
$varmi=mysqli_query($baglan,"SELECT*FROM kullanicilar where Email='$kullanicim'  AND Sifre='$sifrem'");

  while ($getir=mysqli_fetch_array($varmi)) {
    # code...
    $_SESSION["Kullanici_id"]=$getir["Kullanici_id"];
    $_SESSION["AdSoyad"]=$getir["AdSoyad"];
    $_SESSION["yetki"]=$getir["yetki"];
    $_SESSION["girisYap"]="1";
if($getir["yetki"]==1){
   header("Location:admin/admin.php");
}
else{
 header("Location:anasayfa.php");
 }

}
/*if(!empty($kullanicim) && !empty($sifrem)){
$varmi=mysqli_query($baglan,"SELECT*FROM kullanicilar where email='$kullanicim' OR AdSoyad='$kullanicim' AND sifre='$sifrem'");


if(empty($varmi))
{
  echo "Bu isimde bir kullanıcı bulunmamaktadır";
  header("Refresh: 2; url=kaydol.php");
  session_destroy();
}
else {
  $islem=mysqli_fetch_assoc($varmi) or die("basarisiz");
  //$islem=mysqli_fetch_assoc($baglan,"SELECT*FROM kullanicilar where email='$kullanicim' OR AdSoyad='$kullanicim' AND sifre='$sifrem'")
  //or die(basarisiz);
  $Kullanici_id=          $islem["Kullanici_id"];
  $ad=                    $islem["AdSoyad"];
  $yetki=                 $islem["yetki"];
  $_SESSION["Kullanici_id"]=$Kullanici_id;
  $_SESSION["AdSoyad"]=$ad;
  $_SESSION["yetki"]=$yetki;
  header("Location:anasayfa.php");
}
}
else
echo "başarısız";*/

 ?>
