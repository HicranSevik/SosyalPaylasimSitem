<?php
  $deneme="dcv";
  echo "<a href='dfd'>asdsfg</a>";
  <a href=""><img src="profil_foto/<?php echo $goster['ProfilResmi'] ?>" class="image"></a>

  if($fark<60){?>
     <span  class="fark"><?php echo $fark ?> saniye</span>
   <?php/*}
     else if($fark>60 && $fark<60*60){
       $fark=$fark %60;?>
       <span class="fark"><?php echo $fark ?> dakika </span>
       <?php }?>
       <?php/*
       else if($fark>(60*60) && $fark< (60*60*24)){
     $fark=$fark%(60*60);?>
     <span class="fark"><?php echo $fark ?> saat </span>
     <?php} ?>
   <?php else if($fark>(60*60*24)){
     $fark=$fark%(60*60*24);?>
     <span class="fark"><?php echo $fark ?> gün </span>
       <?php}*/?>

echo '<img src="'.$goster['Resim_gir'].'" alt="" class="resim_bolumu">';


 ?>
