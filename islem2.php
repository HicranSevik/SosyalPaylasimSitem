<?php
include("connect.php");
session_start();
if ($_SESSION["girisYap"]!="1") {
header("Location:girisYap.php");
} else {

$kullanici_id=$_SESSION["Kullanici_id"];
if($_GET){
  $cevap_id=$_GET["Cevap_id"];
  $soru_id=$_GET["soru_id"];

  if($_GET["durum"]=="begen"){
    $begen=mysqli_query($baglan,"INSERT INTO cevaba_cevap_begeni(Kullanici_id,cevaba_cevap_id)
    values('$kullanici_id','$cevap_id')");
  }
  else if($_GET["durum"]=="vazgec"){
    $begenmekten_vazgec=mysqli_query($baglan,"DELETE FROM cevaba_cevap_begeni
    WHERE cevaba_cevap_id=$cevap_id AND Kullanici_id=$kullanici_id");
  }

header("Location:soruAyrinti.php?soru_id=$soru_id");

}}
?>
