<?php
include_once("config.php");
 
$id = $_GET['id'];
 
$sql = "DELETE FROM plane_maker WHERE planeMakerID=:planeMakerID";
$query = $conn->prepare($sql);
$query->execute(array(':planeMakerID' => $id));
 
header("Location:aeroplaneMaker.php");

