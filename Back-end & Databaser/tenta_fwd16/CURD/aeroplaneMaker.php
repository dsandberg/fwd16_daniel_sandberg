<!DOCTYPE html>
 <?php
        include_once("config.php");
        
        // session_start();
         
        // if(empty($_SESSION['email'])) {
        //     header("location:index.php");
        // }
 
        // echo "Welcome ".$_SESSION['name']; 
        $result = $conn->query("SELECT * FROM plane_maker");
?>  
<html> 
    <head>
        <meta charset="UTF-8">
        <title>Aeroplane App</title>
    </head>
    <body>
        <a href="aeroplaneMakerAdd.php">Maker</a><br/><br/>
        <a href="aeroplane.php">Plane</a><br/><br/>
 
    <table width='100%' border=0>
    <tr bgcolor='#CCCCCC'>
        <td>Maker </td>
        <td>Update</td>
    </tr> 
    <?php 
    while($row = $result->fetch()) {         
        echo "<tr>";
        echo "<td>".$row['planeMakerName']."</td>";
        echo "<td><a href=\"aeroplaneMakerEdit.php?id=$row[planeMakerID]\">Edit</a>  <a href=\"aeroplaneMakerDelete.php?id=$row[planeMakerID]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";        
    } 
    ?> 
    <a href="logout.php">Logout</a> 
    </table>  
    </body>
</html>