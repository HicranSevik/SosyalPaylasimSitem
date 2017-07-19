<?php
session_start();
include("connect.php");
if ($_SESSION["girisYap"]!="1") {
header("Location:girisYap.php");
} else {

$yenisifrem=$_POST['sifreyeni'];
$yenisifrem2=$_POST['sifreyeni2'];
if($yenisifrem==$yenisifrem2){
  $kid=$_SESSION["Kullanici_id"];
$guncelleme=mysqli_query($baglan,"UPDATE kullanicilar SET Sifre='$yenisifrem' where Kullanici_id='$kid'");
header("Location:girisYap.php");

}}


 ?>
