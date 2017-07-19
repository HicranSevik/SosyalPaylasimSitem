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
$ben=$_SESSION["Kullanici_id"];
if($_GET){
if(@$_GET['arama']){
  $arama=$_GET["arama"];
   $getir=mysqli_query($baglan,"SELECT * FROM kullanicilar INNER JOIN sorusor
     ON kullanicilar.kullanici_id=sorusor.kullanici_id where sorusor.Soru like '%$arama%'");
}
if ($_GET['k_id']) {

$ben=$_GET['k_id'];
}
}
?>
<?php

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
    <link rel="stylesheet" type="text/css" href="CSS/profil.css">
<style>
</style>
</head>
<body>
  <div class="ortakismi">
    <div class="benim_kapak_fotom">
      <?php
            $profili_al=mysqli_query($baglan,"SELECT * from kullanicilar where Kullanici_id=$ben");
            $al=mysqli_fetch_array($profili_al);
             echo '<img src="profil_foto/'.$al['KapakResmi'].'" class="image_kapak_resmim"/>';
       ?>
    </div>

    <div class="yayinla">
      <div style="float:left;width:100%;">
        <form action="soruSor2.php" method="post">
      <input type="text" id="ad" name="nazikce" class="dusuncelerim"   placeholder="Düşüncelerini paylaş..." required="">
    <input type="hidden" value="Düşüncelerim" name="taglar">
  <div class="kafa">
      <a href=""> <div class="kafaresmi"></a></div>
          <div class="gifim">
      <a href=""> <div class="gif"></div></a></div>
        <div class="resimikonum">
      <a href=""> <div class="resimikonu"></div></a></div>
    </div>

      <div class="sor">
        <input type="submit" name="submit" value="Yayınla" class="yayinla2"/>
      </form>
    </div>
  </div>
<div style="float:left;">

       <?php

       $getirbildirim=mysqli_query($baglan,"SELECT * FROM kullanicilar INNER JOIN bildirimler
         ON kullanicilar.Kullanici_id=bildirimler.Cevaplayan_id  where bildirimler.Kullanici_id=$ben ");

       echo '<span class="yanitsayisi">Bildirimler </span> <hr class="hr"></div>  ';
       echo '<div style="width:100%; float:left;">';
        echo '<div style="width:500px; float:left;">';
           while ($goster=mysqli_fetch_array($getirbildirim)) {   //üst satırı kontrol et
             $soruid=$goster['Soru_id'];
             $getirsoru=mysqli_query($baglan,"SELECT * FROM kullanicilar INNER JOIN sorusor
               ON kullanicilar.Kullanici_id=sorusor.Kullanici_id   where sorusor.Soru_id=$soruid ");
                  $goster2=mysqli_fetch_array($getirsoru);
                  echo'<div class="font">'.$goster2["Soru"].'  adlı sorunuz '.$goster["AdSoyad"].'tarafından cevaplandı</div></br>';


        ?>

       <?php } ?>
          </div>
       <div class="ortaminiprofil">
         <?php
               $profili_al=mysqli_query($baglan,"SELECT * from kullanicilar where Kullanici_id=$ben");
               $al=mysqli_fetch_array($profili_al);

               $sorusayisigetir=mysqli_query($baglan,"SELECT * from sorusor where Kullanici_id=$ben");
               $sorusayisi=mysqli_num_rows($sorusayisigetir);

               $takipcigetir=mysqli_query($baglan,"SELECT * from takipettiklerim where TakipEdilenid	=$ben");
               $takipciler=mysqli_num_rows($takipcigetir);

               $takipgetir=mysqli_query($baglan,"SELECT * from takipettiklerim where Kullanici_id	=$ben");
               $takipedilenler=mysqli_num_rows($takipgetir);

               $sorubegenigetir=mysqli_query($baglan,"SELECT * from soru_begeni where Kullanici_id	=$ben");
               $sorubegeni=mysqli_num_rows($sorubegenigetir);

               $yorumgetir=mysqli_query($baglan,"SELECT * from cevaplar where Kullanici_id	=$ben");
               $yorumlar=mysqli_num_rows($yorumgetir);

                echo '<img src="profil_foto/'.$al['ProfilResmi'].'" class="image_fotom"/>';
                echo'<div ><a href="profil.php?id='.$al['Kullanici_id'].'" class="ad_soyad">'.$al['AdSoyad'].'</a>
                  <br/></br></br><br/></br></br><span class="saga_at1">sorusayisi<span style="float:right;">'.$sorusayisi.'</span></span>
                  <br/><hr><span>Takipciler  <span style="float:right;">        '.$takipciler.'</span></span>
                  <br/><hr></hr><span>Takip Ediliyor <span style="float:right;">  '.$takipedilenler.'</span></span>
                  <br/><hr></hr><span>Begeniler    <span style="float:right;">    '.$sorubegeni.'</span></span>
                  <br/><hr></hr><span>Yorumlar     <span style="float:right;">    '.$yorumlar.'</span></span>
                </div>';
                ?>
     </div>
   </div>
     </div>

</body>
</html>
<?php } }?>
