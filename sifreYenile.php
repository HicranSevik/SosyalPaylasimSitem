<html>
<?php
if ($_SESSION["girisYap"]!="1") {
header("Location:girisYap.php");
} else {

?>
<head>
    <link rel="stylesheet" type="text/css" href="CSS/sifreYenile.css">
  <style>
  </style>
</head>
<body>
  <div class=ekran>
    <div class=header>
      <p class="degistir">Şifremi Değiştir</p>
      <form action="sifreYenile2.php" method="post">
     <input type="text" id="sifreyeni" name="sifreyeni" class="sifreyeni"
     placeholder="Yeni Şifreniz">
     <input type="text" id="sifreyeni2" name="sifreyeni2" class="sifreyeni2"
     placeholder="Tekrar Giriniz">
       <input type="submit" value="Değiştir">
    </div>
  </div>
</body>
</html>
<?php }?>
