<?php
include('connect.php');
session_start();

$sorum=$_POST["nazikce"];
$kullaniciid=$_SESSION["Kullanici_id"];
$taglar=$_POST["taglar"];
$zaman=time();
if(!empty($_FILES["fileToUpload"])){
//$filename="admin.png";
$sorumusor=mysqli_query($baglan,"INSERT INTO sorusor(Soru,Konular,Kullanici_id,Resim_gir,zaman) values('$sorum','$taglar','$kullaniciid','$filename','$zaman')");
echo $taglar;
}else {
$sorumusor=mysqli_query($baglan,"INSERT INTO sorusor(Soru,Konular,Kullanici_id,zaman) values('$sorum','$taglar','$kullaniciid','$zaman')");
echo "hicran";
}

header("Location:anasayfa.php");

 }
