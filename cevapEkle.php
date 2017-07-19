<?php
include("connect.php");
session_start();
if ($_SESSION["girisYap"]!="1") {
header("Location:girisYap.php");
} else {

if($_POST){
  $kullaniciid=$_SESSION["Kullanici_id"];
  print_r($_SESSION);
  $cevap=$_POST["cevap"];
  $soru_id=$_POST["soru_id"];
  $time=time();
  $kaydet=mysqli_query($baglan,"INSERT INTO cevaplar(Cevap,Kullanici_id,Soru_id,zaman) values('$cevap','$kullaniciid','$soru_id','$time')");
  $time=time();
  $sorgu=mysqli_query($baglan,"SELECT*FROM sorusor where Soru_id=$soru_id");
  $getir=mysqli_fetch_array($sorgu);
  $sorukullaniciid=$getir["Kullanici_id"];
  $kaydetbildirm=mysqli_query($baglan,"INSERT INTO bildirimler(Kullanici_id,Soru_id,Cevaplayan_id,tarih) values('$sorukullaniciid','$soru_id','$kullaniciid','$time')");
  header("Location:soruAyrinti.php?soru_id=$soru_id");
}}

 ?>
