<html>

?>
<head>
  <link rel="stylesheet" type="text/css" href="CSS/kaydol.css">
  <style>
  </style>
</head>
<body style="background-color:#f2f2f2;">
  <div class="tamami" >
  <div class="ekran" style="margin:auto;">
<img src="fotolarim\kiwim.png" alt="kiwi" class="kiwi"/>
<p class="simdi">Şimdi kaydol ve arkadaşlarının ne </br>sorduğunu gör!</p>
<a href="">  <div class=facebook>
  <span class="face">f</span>
  <p class="metinface">Facebook ile Giriş Yap</p>
</div></a>
  <p class="yada">YADA</p>
<div class="form">
<form action="kaydol2.php" method="POST">
  <input type="text" id="ad" name="ad" class="ad"
  placeholder="Adın Soyadın" required>

  <input type="email" id="email" name="email" class="email"
  placeholder="Eposta Adresin">

  <input type="password" id="sifre" name="sifre" class="sifre"
  placeholder="Şifren" minlength="6" required maxlength="16">

  <input type="text" id="unutma" name="unutma" class="unutma"
  placeholder="En Yakın Arkadaşının Adı(Şifreyi Unutursan)" required>

  <textarea rows="5" cols="58" placeholder="Hakkında" name="hakkinda" class="hakkinda"></textarea>
  <p class="metin_profil">Profil Resmin :</p>
<br/>


  <label class="fileContainer">
    Profil görseli yükle
    <input type="file" name="profil"/>
</label>

  <p class="profil_kapak">Kapak Resmin :</p>

  <br/>
    <label class="fileContainer2">
      Kapak görseli yükle
      <input type="file" name="kapak"/>
  </label>

  <input type="submit" name="kayitol" value="Kayıt Ol">
</div>
  </div>
</div>
</body>
</html>
