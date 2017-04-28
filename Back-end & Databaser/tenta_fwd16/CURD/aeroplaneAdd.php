<?php

include_once("config.php");
  
// session_start();
            
// if(empty($_SESSION['email'])) {
//     header("location:index.php");
// }

// echo "Welcome ".$_SESSION['name'];
 
// Post

if(isset($_POST['Submit'])) { 
    $aeroplanename = $_POST['aeroplanename'];
    $aeroplanetopspeed = $_POST['aeroplanetopspeed'];
    $aeroplanerange = $_POST['aeroplanerange'];
    $planemakerid = $_POST['planemakerid'];
       
    
if(empty($aeroplanename) || empty($planemakerid) || empty($aeroplanetopspeed) || empty($aeroplanerange)) {
                
        if(empty($aeroplanename)) {
            echo "<font color='red'>empty.</font><br/>";
        }
        
        if(empty($planemakerid)) {
            echo "<font color='red'>empty.</font><br/>";
        }
        
        if(empty($aeroplanetopspeed)) {
            echo "<font color='red'>empty.</font><br/>";
        }
        
        if(empty($aeroplanerange)) {
            echo "<font color='red'>empty.</font><br/>";
        }
        } else {         
        $sql = "INSERT INTO aeroplane (aeroplaneName, aeroplaneTopSpeed, aeroplaneRange, planeMakerID) "
                . "VALUES(:aeroplanename, :aeroplanetopspeed, :aeroplanerange, :planemakerid)";
        $query = $conn->prepare($sql);
                
        $query->bindparam(':aeroplanename', $aeroplanename);
        $query->bindparam(':aeroplanetopspeed', $aeroplanetopspeed);
        $query->bindparam(':aeroplanerange', $aeroplanerange);
        $query->bindparam(':planemakerid', $planemakerid);
        $query->execute();


        echo "<font color='green'>Data added successfully.";
        echo "<br/><a href='aeroplane.php'>View Result</a>";
    }
}       
?>
<!DOCTYPE html>

<html>
    <head>
        <title>Plane List</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <a href="aeroplane.php">Back</a>
         
    <br/><br/>

    <form action="aeroplaneAdd.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr> 
                <th>Plane</th>              
                <td><input type="text" name="aeroplanename"  /></td>
            </tr>
            <tr>
                <th>Speed</th>             
                <td><input type="text" name="aeroplanetopspeed" /></td>
            </tr>
            <tr>
                <th>Range</th>             
                <td><input type="text" name="aeroplanerange" /></td>
            </tr>
            
            <tr> 
                <th>Maker</th>  
            <td>
                <select name="planemakerid"> 
<?php
    $planeMakerSql = "SELECT * FROM plane_maker"; 
    $planeMakerQuery = $conn->prepare($planeMakerSql); 
    $planeMakerQuery->execute();  
    
    while($planemaker = $planeMakerQuery->fetch()) { 
        if ($planemaker['planeMakerID'] == $ownerid) { 
          echo "<option value=\"{$planemaker['planeMakerID']}\" selected>{$planemaker['planeMakerName']}</option>"; 
           
        } else {  
          echo "<option value=\"{$planemaker['planeMakerID']}\">{$planemaker['planeMakerName']}</option>"; 
    }  
} 
?>  
                </select> 
            </td> 
        </tr> 
        <tr>
            <td></td><td><button type="submit" name="Submit">Submit</button></td>
        </tr>
        </table> 
    </form>
        <a href="logout.php">Logout</a>
    </body>
</html> 

