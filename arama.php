<?php
session_start();
if ($_SESSION["girisYap"]!="1") {
header("Location:girisYap.php");
} else {


include("connect.php");
include("header.php");

if ($_SESSION["girisYap"]!="1") {
header("Location:girisYap.php");
} else {


if($_GET){
if($_GET['arama']){
  $arama=$_GET["arama"];
   $getir=mysqli_query($baglan,"SELECT * FROM kullanicilar INNER JOIN sorusor
     ON kullanicilar.kullanici_id=sorusor.kullanici_id where sorusor.Soru like '%$arama%'");
}
}


  function zamanFarkiHesapla($zaman){

  $fark=time()-$zaman;
    if($fark<60){
      $sonuc=$fark;?>
      <span class="saattur"><?php echo round($sonuc)." saniye" ?></span>
    <?php}
    else if($fark>=60 && $fark<(60*60)){
       $sonuc=$fark/60;?>
        <span class="saattur"><?php echo round($sonuc)." dakika" ?></span>
  <?php }
    else if($fark>=(60*60) && $fark<(60*60*24)){
       $sonuc=$fark/(60*60);?>
        <span class="saattur"><?php echo round($sonuc)." saat" ?></span>
  <?php  }
    else if($fark>=(60*60*24) && $fark<(60*60*24*7) ){
      $sonuc=$fark/(60*60*24);?>
      <span class="saattur"><?php echo round($sonuc)." gün" ?></span>
  <?php }
    else if($fark>=(60*60*24*7) && $fark<(60*60*24*7*4)){
      $sonuc=$fark/(60*60*24*7);?>
      <span class="saattur"><?php echo round($sonuc)." hafta" ?></span>
  <?php }
    else if($fark>=(60*60*24*7*4) && $fark<(60*60*24*7*52)){
      $sonuc=$fark/(60*60*24*7*4);?>
      <span class="saattur"><?php echo round($sonuc)." ay" ?></span>
      <?php }
        else if($fark>=(60*60*24*7*4*52)){
          $sonuc=$fark/(60*60*24*7*4*52);?>
          <span class="saattur"><?php echo round($sonuc)." yıl" ?></span>
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
<div class="hersey">
<ul class="ul_hersey">
  <li><a href="anasayfa.php">Herşey</a>
    <ul>
      <li><a href="anasayfa.php">Herşey</a></li>
      <li><a href="anasayfa.php?sayfa=sorular">Sorular</a></li>
      <li><a href="anasayfa.php?sayfa=yanitlar">Yanıtlar</a></li>
    </ul>
  </li>
</ul>
</div>


<?php

?>
    <?php while($goster=mysqli_fetch_array($getir)){?>
      <div class="ortasoru">

     <div class="kimhakkinda">
    <a href="" class="link"><span class="ait"><?php echo $goster['AdSoyad'] ?></span></a>
    <a href="" class="link"><span class="ait2"><?php echo $goster['Konular'] ?></span></a>
    <span class="hakkinda">hakkında soru sordu</span>
  </div>

  <div class="profilkismi">
    <a href=""><img src="profil_foto/<?php echo $goster['ProfilResmi'] ?>" class="image"></a>

    <a href="" class="link2"><span class="ait3"><?php echo $goster['AdSoyad'] ?></span></a>
    <?php
   zamanFarkiHesapla($goster['zaman']);?>
   <div class="bildir">  <a href="" class="bildirhref"></a></div>
   </div>

   <div class="soruveimg">
   <span class="soru"><?php echo $goster['Soru'] ?></span>
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
        $begenisayim=mysqli_query($baglan,"SELECT * FROM soru_begeni  where Soru_id='$soru_id'");
        $kacbegeni=mysqli_fetch_array($begenisayim);
        if(!empty($kacbegeni)){
        echo $kacbegeni["begeni_sayisi"]."begeni";
      }
        if(empty($kacbegeni)){
          echo "0 begeni ";
        }

        $cevap_id_getir=mysqli_fetch_array($cevap);
       $cevabacevap=mysqli_query($baglan,"SELECT *FROM cevabacevap  JOIN cevaplar ON cevaplar.Cevap_id=cevabacevap.Cevap_id where cevaplar.Cevap_id=");
       $kactane=mysqli_num_rows($cevap);
       ?>

       <a href="soruAyrinti.php?soru_id=<?php echo $soru_id ?>" class="kacyorum"> <?php echo $kactane  ?> yorum</a>

   </div>
</div>
  <?php  } ?>
</body>
</html>
<?php } }?>
