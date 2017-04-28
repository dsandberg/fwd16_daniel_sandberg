<?php
include_once("config.php");
 
$id = $_GET['id'];
 
$sql = "DELETE FROM aeroplane WHERE aeroplaneID=:aeroplaneID";
$query = $conn->prepare($sql);
$query->execute(array(':aeroplaneID' => $id)); 
  

header("Location:aeroplane.php");


