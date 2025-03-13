<?php 
include ("config.php");
$id=$_GET['noahli'];
mysqli_query($con,"DELETE FROM ahli WHERE noahli='$id'");
header("location:table.php");
?>