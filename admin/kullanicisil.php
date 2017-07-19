<?php
include("../connect.php");
session_start();
if ($_SESSION["yetki"]!="1") {
header("Location:anasayfa.php");
} else {
if($_GET){
  $kullaniciid=$_GET["Kullanici_id"];



    $begenmekten_vazgec=mysqli_query($baglan,"DELETE FROM kullanicilar
    WHERE Kullanici_id=$kullaniciid");


header("Location:kullanicilar.php");

}}
?>
