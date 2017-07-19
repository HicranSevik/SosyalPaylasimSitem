<?php
include("connect.php");
include("kaydol.php");

if(!empty($_POST)){
  $ad=         $_POST["ad"];
  $hakkinda=   $_POST["hakkinda"];
  $email=      $_POST["email"];
  $sifre=      $_POST["sifre"];
  $arkadas=    $_POST["unutma"];
  $profil=     $_POST["profil"];
  $kapak=      $_POST["kapak"];




$mailkontrol=  mysqli_query($baglan,  "SELECT * FROM kullanicilar where Email='$email' ") or die("Hatalı");
//var_dump($mailkontrol);
  $kayitvarmi=mysqli_num_rows($mailkontrol);
  if($kayitvarmi){
    echo "BU İSİMDE KULLANICI MEVCUT";
  }
  else{
  $kaydet=mysqli_query($baglan,"INSERT INTO kullanicilar(AdSoyad,Hakkimda,Email,Sifre,Arkadasi,ProfilResmi,KapakResmi)
  values('$ad','$hakkinda','$email','$sifre','$arkadas','$profil','$kapak')");

  if($kaydet)
  {
    echo "kayıt başarılı";
  }
    else{
      echo "kayıt başarısız";
    }
  }
  header("Location:anasayfa.php");
  $baglan->close();

}

 ?>
