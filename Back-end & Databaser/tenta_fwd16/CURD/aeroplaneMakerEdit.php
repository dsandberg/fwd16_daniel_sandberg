<?php
include_once("config.php");
// session_start();
// if(empty($_SESSION['email'])) {
//     header("location:index.php");
// }
// echo "Welcome ".$_SESSION['name'];
  
    $id = $_GET['id'];
    $sql = "SELECT * FROM plane_maker WHERE planeMakerID=:planeMakerID";
    $query = $conn->prepare($sql);
    $query->execute(array(':planeMakerID' => $id));
    
while($row = $query->fetch()) {
    $planeMakername = $row['planeMakerName'];
    $planemakerid = $row['planeMakerID'];
}
$planeMakerSql = "SELECT * FROM plane_maker";
$planeMakerQuery = $conn->prepare($planeMakerSql);
$planeMakerQuery->execute();

?>
<?php
if(isset($_POST['update'])) {
    
    $id = $_POST['id'];
    $planeMakername = $_POST['planeMakername'];

if(empty($planeMakername)) {
    echo "<font color='red'>Plane Maker Name field is empty.</font><br/>";
} else {
    $sql = "UPDATE plane_maker SET planeMakerName =:planeMakerName WHERE planeMakerID=:planeMakerID";

    $query = $conn->prepare($sql);

    $query->bindparam(':planeMakerName', $planeMakername);
    $query->bindparam(':planeMakerID', $id);

    $query->execute();

    header("Location: aeroplaneMaker.php");
}
}  
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Edit</title>
    </head>
    <body>
        <a href="aeroplaneMaker.php">Back</a>
        <br/><br/>
 
        <form name="form1" method="post" action="aeroplaneMakerEdit.php">
            <table border="0">
                <tr>
                    <td>Makers</td>
                    <td><input type="text" name="planeMakername" value="<?php echo $planeMakername;?>"/></td>
                </tr>
                <tr>  
                    <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?></td>
                    <td><button type="submit" name="update">Update</button></td>
                </tr>
            </table> 
        </form>  
        <a href="logout.php">Logout</a> 
   </body>
</html>



