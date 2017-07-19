<?php
include("connect.php");
session_start();
include("header.php");

if ($_SESSION["girisYap"]!="1") {
header("Location:girisYap.php");
} else {

if($_GET){ //if GET
  if(empty($_GET["soru_id"])){
    $soru_id=1;
  }
else {
  $soru_id=$_GET["soru_id"];
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
}
$getir2=mysqli_query($baglan,"SELECT * FROM kullanicilar INNER JOIN sorusor
  ON kullanicilar.kullanici_id=sorusor.kullanici_id where sorusor.Soru_id=$soru_id ");
}



echo ' <link rel="stylesheet" type="text/css" href="CSS/anasayfa.css">';
echo '<!--div iskelet -->
<div style="width:100%;height:auto;float:left;">';//div iskelet
   while($goster=mysqli_fetch_array($getir2))
   {//while goster
     ?>
     <div class="ortasoru"><!--Div Ortasoru -->
       <div class="kimhakkinda" ><!--Div kimhakkinda -->
      <a href="" class="link"><span class="ait"><?php echo $goster['AdSoyad'] ?></span></a>
      <a href="" class="link"><span class="ait2"><?php echo $goster['Konular'] ?></span></a>
      <span class="hakkinda">hakkında soru sordu</span>
    </div><!--Div hakkinda  end-->

    <div class="profilkismi"><!--Div profil kısmı  -->
    <a href=""><img src="profil_foto/<?php echo $goster['ProfilResmi'] ?>" class="image"></a>
      <link rel="stylesheet" type="text/css" href="CSS/soruAyrinti.css">
    <a href="" class="link2"><span class="ait3"><?php echo $goster['AdSoyad'] ?></span></a>
    <?php
    zamanFarkiHesapla($goster['zaman']);?>
    <div class="bildir">  <a href="" class="bildirhref"></a></div>
  </div><!--Div profil kısmı end -->
  <div class="soruveimg"><!--Div soruveimg -->
  <span class="soru"><?php echo $goster['Soru'] ?></span>
  <?php if(!empty($goster['Resim_gir'])){?>
  <img src="<?php echo "profil_foto/".$goster['Resim_gir'] ?>" class="resim_bolumu">
  <?php }?>
</div><!--Div soruveimg end-->

  <div class="taglar"><!--Div taglar-->

  </div><!--Div taglar end-->

  <div class="" style="float:left; border:1px solid #ccc; width:98%; margin-top:5px;"><!-- div form  -->
    <form action="cevapEkle.php" method="post">
    <input type="text" name="cevap" class="cevaptexti" placeholder="Cevapla"/>
    <input type="hidden" name="soru_id" value="<?php echo $soru_id ?>" />
    <input type="submit" value="cevapla" />
    </form>
  </div><!--div form end -->

     <div class="yorumbegeni"><!-- Yorumbegeni -->
    <?php
      //$cevap=mysqli_query($baglan,"SELECT * FROM cevaplar where soru_id='$soru_id' ");
      $cevap=mysqli_query($baglan,"SELECT * FROM kullanicilar INNER JOIN cevaplar
        ON kullanicilar.Kullanici_id=cevaplar.Kullanici_id   where cevaplar.soru_id=$soru_id ");

         while($cevaplarim=mysqli_fetch_array($cevap))
         {//while cevaplarim
           $yorum_id=$cevaplarim['Cevap_id'];
           $cevabiminbegenisi=mysqli_query($baglan,"SELECT * FROM yorum_begeni where Cevap_id='$yorum_id'");
           $asda=mysqli_fetch_array($cevabiminbegenisi);
            ?>


            <div class="kimhakkinda" style="width:95%; margin-left:20px;">
              <div class="cevabim" >
                <div class="cevap_profil">
             <div class="adsoyadprofil"><?php echo '<img src="profil_foto/'.$cevaplarim['ProfilResmi'].'" class="profilimresmim" width="100"/>';  ?>
             <a href="" class="link"><span class="ait3"><?php echo $cevaplarim['AdSoyad'] ?></span></a></div>
            <div class="zaman">
             <?php
            zamanFarkiHesapla($cevaplarim['zaman']);?></div>

              <div class="bildir"><a href="" class="bildirhref"></a></div>
            </div>
       <span class="ait2"><?php echo $cevaplarim['Cevap'] ?></span>
     </div>
      <div style="width:40px; height:80px; float:left;border:1px solid #ccc; margin-top:20px;">
        <?php
        $c=$cevaplarim['Cevap_id'];
        $begeni2=mysqli_query($baglan,"SELECT * from yorum_begeni where Cevap_id='$c'");
        $sonbegeni=mysqli_num_rows($begeni2);
        echo $sonbegeni;

        $begenimvarmi=mysqli_query($baglan,"SELECT *FROM yorum_begeni where Kullanici_id=$_SESSION[Kullanici_id] AND Cevap_id=$c");
        $begenimkontrol=mysqli_num_rows($begenimvarmi);
        if($begenimkontrol>0){
          echo '<a href="islem.php?Cevap_id='.$c.'&soru_id='.$soru_id.'&durum=vazgec"><div class="kalp2"></div></a>';

        }
        else {
            echo '<a href="islem.php?Cevap_id='.$c.'&soru_id='.$soru_id.'&durum=begen"><div class="kalp"></div></a>';
        }

         ?>

      </div>

            </div>


            <?php

           $cevabimin_cevabi=mysqli_query($baglan,"SELECT * FROM kullanicilar INNER JOIN cevabacevap
            ON kullanicilar.Kullanici_id=cevabacevap.Kullanici_id   where cevabacevap.Cevap_id=$yorum_id ");
             while($cevabimin_cevaplari=mysqli_fetch_array($cevabimin_cevabi))
             {//while cevabımın cevapları
                ?>
                <div class="cecevap">
                <div class="a">
                  <div class="kimhakkinda" style="width:95%; margin-left:20px;">
                    <div class="cevabim" style="background-color:#ccc;">
                      <div class="cevap_profil">
                   <div class="adsoyadprofil"><?php echo '<img src="profil_foto/'.$cevabimin_cevaplari['ProfilResmi'].'" class="profilimresmim" width="100"/>';  ?>
                   <a href="" class="link"><span class="ait3"><?php echo $cevabimin_cevaplari['AdSoyad'] ?></span></a></div>
                  <div class="zaman">
                   <?php
                  zamanFarkiHesapla($cevabimin_cevaplari['zaman']);?></div>

                    <div class="bildir"><a href="" class="bildirhref"></a></div>
                  </div>
             <span class="ait2"><?php echo $cevabimin_cevaplari['cevap'] ?></span>
           </div>
            <div style="width:40px; height:80px; float:left;border:1px solid #ccc; margin-top:20px;">
              <?php
               $c=$cevabimin_cevaplari['cevabacevap_id'];
               $c_cevaplariminbegenisi=mysqli_query($baglan,"SELECT * from cevaba_cevap_begeni where cevaba_cevap_id='$c'");
               $sonbegeni=mysqli_num_rows($c_cevaplariminbegenisi);
               echo $sonbegeni;
               $begenimvarmi=mysqli_query($baglan,"SELECT *FROM cevaba_cevap_begeni where Kullanici_id=$_SESSION[Kullanici_id] AND cevaba_cevap_id=$c");
               $begenimkontrol=mysqli_num_rows($begenimvarmi);
               if($begenimkontrol>0){
                 echo '<a href="islem2.php?Cevap_id='.$c.'&soru_id='.$soru_id.'&durum=vazgec"><div class="kalp2"></div></a>';

               }
               else {
                   echo '<a href="islem2.php?Cevap_id='.$c.'&soru_id='.$soru_id.'&durum=begen"><div class="kalp"></div></a>';
               }
               ?>
            </div>

                  </div>

               </div>  </div>
                <?php

             }//while cevabımın cevapları end


         }//while cevaplarim end

            ?>
       </div> <!--div yorum_begeni end -->
  </div><!-- Div Ortasoru end -->
        <?php

    }}//while goster end
?>


<?php   //if GET END ?>
