<?php
include("connect.php");
session_start();
$kullanici_id=$_SESSION['Kullanici_id'];

  $takip=mysqli_query($baglan,"INSERT INTO takipettiklerim(Kullanici_id,	TakipEdilenid)
  values('$kullanici_id','5')");



 ?>
