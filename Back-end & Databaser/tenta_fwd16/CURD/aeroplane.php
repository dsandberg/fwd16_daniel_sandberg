 <?php
    include_once("config.php");
      
    // session_start();
    
    // if(empty($_SESSION['email'])) {
    //     header("location:index.php");
    // }
    
    // echo "Welcome ".$_SESSION['name']; 
    $result = $conn->query("SELECT aeroplane.aeroplaneID, aeroplane.aeroplaneName, aeroplane.aeroplaneTopSpeed, aeroplane.aeroplaneRange, plane_maker.planeMakerName FROM aeroplane 
INNER JOIN plane_maker on aeroplane.planeMakerID = plane_maker.planeMakerID;");
?>
<!DOCTYPE html> 
<html>
    <head>
        <meta charset="UTF-8">
        <title>Plane App</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <!-- Links to VIEWS -->
        <a href="aeroplaneAdd.php">Add Plane</a><br/><br/>
        <a href="aeroplaneMaker.php">Plane Makers</a><br/><br/>
 
    <table width='100%' border=0>
    <!-- HEADERS -->
    <tr bgcolor='#CCCCCC'>
        <td>Maker:</td>
        <td>Plane</td>
        <td>Speed</td>
        <td>Range</td>
        <td>Update</td>
    </tr>
    <?php
    while($row = $result->fetch()) {         
        echo "<tr>"; 
        echo "<td>".$row['planeMakerName']."</td>";
        echo "<td>".$row['aeroplaneName']."</td>";
        echo "<td>".$row['aeroplaneTopSpeed']."</td>";
        echo "<td>".$row['aeroplaneRange']."</td>";
        echo "<td><a href=\"aeroplaneEdit.php?id=$row[aeroplaneID]\">Edit</a>
                    <a href=\"aeroplaneDelete.php?id=$row[aeroplaneID]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a>
                    </td>";     
    }
    ?>
    <a href="logout.php">Logout</a>
    </table>
    </body>
</html>
