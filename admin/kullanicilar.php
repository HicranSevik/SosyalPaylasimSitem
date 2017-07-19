<?php
session_start();

include("../connect.php");
include("header2.php");
if ($_SESSION["yetki"]!="1") {
header("Location:anasayfa.php");
} else {



   $getir=mysqli_query($baglan,"SELECT * FROM kullanicilar");
      ?>


<html>
<head>
    <link rel="stylesheet" type="text/css" href="../CSS/anasayfa.css">
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

    <?php while($goster=mysqli_fetch_array($getir)){
      $kid=$goster['Kullanici_id'];
      ?>
      <div class="ortasoru" style="background-color:#f2f2f2;">

        <div class="miniprofil">
      <div class="kapak">
      <?php $ben=$_SESSION["Kullanici_id"];
            $profili_al=mysqli_query($baglan,"SELECT * from kullanicilar where Kullanici_id=$kid");
            $al=mysqli_fetch_array($profili_al);
             echo '<img src="../profil_foto/'.$al['KapakResmi'].'" class="image_kapak"/>';
       ?>
      </div>
      <div class="profilim">
      <?php   echo '<img src="../profil_foto/'.$al['ProfilResmi'].'" class="image_profil"/>';
       ?>
       <div class="hr">
         <hr class="hori"></hr>
       </div>
      </div>
      <div class="isim">
        <?php echo '<a href="../profil.php" class="baginti">'.$al['AdSoyad'].'</a> <a href="kullanicisil.php?Kullanici_id='.$al["Kullanici_id"].'" class="baginti">SİL</a>';?>
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

   </div>
</div>
  <?php  } ?>
</div></div>


</body>
</html>
<?php } ?>
