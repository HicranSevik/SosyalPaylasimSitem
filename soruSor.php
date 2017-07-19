<html>

<head>
    <link rel="stylesheet" type="text/css" href="CSS/soruSor.css">
  <style>
</style>
</head>
<body>
  <div class="tamami" style="margin=auto">
  <div class="ekran">
    <div class="soru">
      <p class="sorutext">Bir Soru Sor</p>
      <div class="carpi">
        <p class="x">X</p>
      </div>
    </div>
    <form action="soruSor2.php" method="post" enctype="multipart/form-data">
    <input type="text" id="ad" name="nazikce" class="nazikce"
   placeholder="Nazikçe Soru Sor" required="">
  <div class="girisyap">
   <input type="text" class="taglar" name="taglar" placeholder="Virgül formatında yazınız" required=""/>
    <input type="file" class="buton" name="fileToUpload">
    <span>Resim yükleyin...</span>
    </div>
     <div class=footer>
      <div class="sor">
        <input type="submit" name="submit" value="Sor" class="buton2"/>
      </div>
    </div>
  </form>
  </div>
</div>
</body>
</html>
