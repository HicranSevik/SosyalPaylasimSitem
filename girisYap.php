<html>
<head>
    <link rel="stylesheet" type="text/css" href="CSS/girisYap.css">
  <style>
  </style>
</head>
<body style="background-color:#f2f2f2">
  <div class="tamami">
  <div class="ekran">
  <p class="girisYazisi">Giriş Yap</p>
   <a href="">  <div class=facebook>
     <span class="face">f</span>
     <p class="metinface">Facebook ile Giriş Yap</p>
  </div></a>
    <p class="yada">YADA</p>
     <form action="girisYap2.php" method="POST">
    <input type="text" id="email" name="email" class="email"
    placeholder="Eposta / Kullanıcı adı" required>
    <input type="password" id="sifre" name="sifre" class="sifre"
    placeholder="Şifre"  minlength="6" maxlength="16" required="">
    <input type="submit" value="Giriş Yap" >
  </form>
  <p class="soru">Daha üye değil misiniz?
  <a href="kaydol.php" class="kaydol">Kaydol</a></p>
  <p class="unuttum"><a href="sifremiUnuttum.php" class="kaydol">
  Şifremi Unuttum</a></p>
</div>
</div>
</body>
</html>
