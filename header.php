<html>
<head>
  <?php
  if ($_SESSION["girisYap"]!="1") {
  header("Location:girisYap.php");
  } else {

  ?>
  <link rel="stylesheet" type="text/css" href="CSS/header.css">
  <style>
  </style>
</head>
<body style="width: 100%; margin:0px">
  <div class="ekran">
  <div class="ust">
    <div class="img">
    <a href="anasayfa.php"><img class= "resim_kiwi" src="fotolarim\kiwi_beyaz.png"></a>
  </div>
  <div class="ara">
    <form action="arama.php" method="get">
      <input type="text" id="search" name="arama" class="aranacak" placeholder= "Ara">
      <img src="fotolarim\search_icon.png" class="icon">
    </form>
  </div>
  <div class="sagust">
      <a href="anasayfa.php"><img src="fotolarim\villa.png" class="villa"></a>
      <a href=""><p class="anaEkran">Ana Ekran</p></a>
      <a href=""><img src="fotolarim\admin.png" class="admin"></a>
      <a href="profil.php"><p class="profil">Profil</p></a>
      <a href="sorusor.php"><div class="sorusor"></div></a>
</div>
</div>
<div class="solyan">
<ul>
  <a href="anasayfa.php"><li><img src="fotolarim\ampulkoyu.png" class="iconlarim"><span class="yazi">Sorular</span></li></a>
  <a href="kesfet.php"><li><img src="fotolarim\pusulakoyu.png" class="iconlarim"><span class="yazi">Keşfet</span></li></a>
  <a href="bildirim.php"><li><img src="fotolarim\mesajkoyu.png" class="iconlarim"><span class="yazi">Bildirimler</span></li></a>
  <a href=""><li><img src="fotolarim\cankoyu.png" class="iconlarim"><span class="yazi">Mesajlar</span></li></a>
</ul>
</div>

</div>
</body>
</html>
<?php } ?>
