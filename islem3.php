<?php
include("connect.php");
session_start();
if ($_SESSION["girisYap"]!="1") {
header("Location:girisYap.php");
} else {

$kullanici_id=$_SESSION["Kullanici_id"];
if($_GET){
  $soru_id=$_GET["soru_id"];

  if($_GET["durum"]=="begen"){
    $begen=mysqli_query($baglan,"INSERT INTO soru_begeni(Soru_id,Kullanici_id)
    values('$soru_id','$kullanici_id')");
  }
  else if($_GET["durum"]=="vazgec"){
    $begenmekten_vazgec=mysqli_query($baglan,"DELETE FROM soru_begeni
    WHERE Soru_id=$soru_id AND Kullanici_id=$kullanici_id");
  }

header("Location:anasayfa.php");

}}
?>
