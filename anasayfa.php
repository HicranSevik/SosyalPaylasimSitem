<?php
session_start();

include("connect.php");
include("header.php");
if ($_SESSION["girisYap"]!="1") {
header("Location:girisYap.php");
} else {


if($_GET){
if($_GET['sayfa']=="sorular"){
  $getir=mysqli_query($baglan,"SELECT * FROM kullanicilar INNER JOIN sorusor
    ON kullanicilar.kullanici_id=sorusor.kullanici_id ");

  echo "sorular sayfasındasın";
}
else if($_GET['sayfa']=="yanitlar"){
  echo "yanıtlar sayfasındasınız";
  $getir=mysqli_query($baglan,"SELECT * FROM kullanicilar INNER JOIN sorusor
    ON kullanicilar.kullanici_id=sorusor.kullanici_id");
}

}
else{
$getir=mysqli_query($baglan,"SELECT * FROM kullanicilar INNER JOIN sorusor
    ON kullanicilar.kullanici_id=sorusor.kullanici_id  order by zaman desc");


}

  function zamanFarkiHesapla($zaman){
      $sonuc=0;
  $fark=time()-$zaman;
  //$fark=1400;;

    if($fark<60){
      $sonuc=$fark;?>
      <span class="saattur"><?php echo round($sonuc)." saniye"; ?></span>
    <?php }
    else if($fark>=60 && $fark<(60*60)){
       $sonuc=$fark/60;

      // echo '<span class="saattur">'.round($sonuc).' dakika;</span>';
       ?>
        <span class="saattur"><?php echo round($sonuc)." dakika"; ?></span>
  <?php }
    else if($fark>=(60*60) && $fark<(60*60*24)){

       $sonuc=$fark/(60*60);?>

        <span class="saattur"><?php echo round($sonuc)." saat"; ?></span>
  <?php  }
    else if($fark>=(60*60*24) && $fark<(60*60*24*7) ){
      $sonuc=$fark/(60*60*24);?>
      <span class="saattur"><?php echo round($sonuc)." gün" ;?></span>
  <?php }
    else if($fark>=(60*60*24*7) && $fark<(60*60*24*7*4)){
      $sonuc=$fark/(60*60*24*7);?>
      <span class="saattur"><?php echo round($sonuc)." hafta"; ?></span>
  <?php }
    else if($fark>=(60*60*24*7*4) && $fark<(60*60*24*7*52)){
      $sonuc=$fark/(60*60*24*7*4);?>
      <span class="saattur"><?php echo round($sonuc)." ay"; ?></span>
      <?php }
        else if($fark>=(60*60*24*7*4*52)){
          $sonuc=$fark/(60*60*24*7*4*52);?>
          <span class="saattur"><?php echo round($sonuc)." yıl"; ?></span>
  <?php  }
    return $sonuc;
  } ?>


<html>
<head>
    <link rel="stylesheet" type="text/css" href="CSS/anasayfa.css">
<style>
</style>
</head>
<body>
  <div class="hersey" style="background-color:#f2f2f2;">

  </div>


<?php
?>
<div class="" style="width:70%; float:left;">
<div class="" style="width:500px; float:left;">

    <?php while($goster=mysqli_fetch_array($getir)){?>
      <div class="ortasoru">

     <div class="kimhakkinda">
    <a href="profil.php?k_id=<?php echo $goster['Kullanici_id'] ?>" class="link"><span class="ait"><?php echo $goster['AdSoyad'] ?></span></a>
    <a href="" class="link"><span class="ait2"><?php echo $goster['Konular'] ?></span></a>
    <span class="hakkinda">hakkında soru sordu</span>
  </div>

  <div class="profilkismi">
    <a href="profil.php?k_id=<?php echo $goster['Kullanici_id'] ?>"><img src="profil_foto/<?php echo $goster['ProfilResmi'] ?>" class="image"></a>

    <a href="profil.php?k_id=<?php echo $goster['Kullanici_id'] ?>" class="link2"><span class="ait3"><?php echo $goster['AdSoyad'] ?></span></a>
    <?php
   zamanFarkiHesapla($goster['zaman']);?>
   <div class="bildir">  <a href="" class="bildirhref"></a></div>
   </div>

   <div class="soruveimg">
   <a href="soruAyrinti.php?soru_id=<?php echo $goster["Soru_id"] ?>" class="kacyorum" ><span class="soru"><?php echo $goster['Soru'] ?></span></a>
  <?php if(!empty($goster['Resim_gir'])){?>
   <img src="<?php echo "profil_foto/".$goster['Resim_gir'] ?>" class="resim_bolumu">
 <?php }?>
   </div>
   <div class="taglar">
   </div>
   <div class="yorumbegeni">
     <?php

        $kiminsordugu=$goster['Kullanici_id'];
//  $cevap=mysqli_query($baglan,"SELECT Cevap_id FROM cevaplar where Kullanici_id='$kiminsordugu'");
        $soru_id=$goster["Soru_id"];
        $cevap=mysqli_query($baglan,"SELECT Cevap_id FROM cevaplar where Soru_id='$soru_id'");


        $cevap_id_getir=mysqli_fetch_array($cevap);
       $cevabacevap=mysqli_query($baglan,"SELECT *FROM cevabacevap  JOIN cevaplar ON cevaplar.Cevap_id=cevabacevap.Cevap_id where cevaplar.Cevap_id=");
       $kactane=mysqli_num_rows($cevap);
       ?>


       <a href="soruAyrinti.php?soru_id=<?php echo $soru_id ?>" class="kacyorum" > <?php echo $kactane  ?> yorum</a>
       <div class="paylas"></div>
       <?php
       $begenisayim=mysqli_query($baglan,"SELECT * FROM soru_begeni  where Soru_id='$soru_id'");
       $kacbegeni=mysqli_num_rows($begenisayim);
       echo '<div class="begeni_degerim">'.$kacbegeni.' begeni</div>';
       $ben=$_SESSION["Kullanici_id"];
       $begendi=mysqli_query($baglan,"SELECT * FROM soru_begeni  where Soru_id='$soru_id'and Kullanici_id=$ben");
       $begendimmi=mysqli_num_rows($begendi);

       if($begendimmi>0){
         echo '<a href="islem3.php?soru_id='.$soru_id.'&durum=vazgec"><div class="kalp2"></div></a>';

       }
       else {
         echo '<a href="islem3.php?soru_id='.$soru_id.'&durum=begen"><div class="kalp"></div></a>';
       }
       ?>

   </div>
</div>
  <?php  } ?>
</div></div>

  <div class="miniprofil">
<div class="kapak">
<?php $ben=$_SESSION["Kullanici_id"];
      $profili_al=mysqli_query($baglan,"SELECT * from kullanicilar where Kullanici_id=$ben");
      $al=mysqli_fetch_array($profili_al);
       echo '<img src="profil_foto/'.$al['KapakResmi'].'" class="image_kapak"/>';
 ?>
</div>
<div class="profilim">
<?php   echo '<img src="profil_foto/'.$al['ProfilResmi'].'" class="image_profil"/>';
 ?>
 <div class="hr">
   <hr class="hori"></hr>
 </div>
</div>
<div class="isim">
  <?php echo '<a href="profil.php" class="baginti">'.$al['AdSoyad'].'</a>';?>
</div>
<div class="gonderi">
  <?php

$gonderisayisi=mysqli_query($baglan,"SELECT * FROM sorusor where Kullanici_id=$ben");
$kacgonderi=mysqli_num_rows($gonderisayisi);
echo '<span class="gonderim">'.'<b>'.$kacgonderi.'</b> </br> Gönderiler '.'<span>';
   ?>
</div>
<div class="takipci">
<?php
$takipcisayisi=mysqli_query($baglan,"SELECT * FROM takipettiklerim where Kullanici_id=$ben");
$kactakipci=mysqli_num_rows($takipcisayisi);
echo '<span class="takipcilerim">'.'<b>'.$kactakipci.'</b> </br> Takipçiler '.'<span>';
?>
</div>



  </div>
</body>
</html>
<?php } ?>
