<?php
include("../connect.php");
session_start();
if ($_SESSION["yetki"]!="1") {
header("Location:anasayfa.php");
} else {
if($_GET){
  $soru_id=$_GET["soru_id"];



    $begenmekten_vazgec=mysqli_query($baglan,"DELETE FROM sorusor
    WHERE Soru_id=$soru_id");


header("Location:admin.php");

}}
?>
