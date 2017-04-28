<?php 
include_once("config.php");
// session_start();
// if(empty($_SESSION['email'])) {
//    header("location:index.php");
// } 
// echo "Welcome ".$_SESSION['name'];

    $id = $_GET['id']; 
    $sql = "SELECT * FROM aeroplane WHERE planeMakerID=:planeMakerID"; 
    $query = $conn->prepare($sql); 
    $query->execute(array(':planeMakerID' => $id)); 

while($row = $query->fetch()) { 
    $aeroplanename = $row['aeroplaneName'];
    $aeroplanetopspeed = $row['aeroplaneTopSpeed'];
    $aeroplanerange = $row['aeroplaneRange'];
    $planemakerid = $row['planeMakerID'];   
}
?> 
<?php 
if(isset($_POST['update'])) { 
    $id = $_POST['id']; 
    $aeroplanename = $_POST['aeroplanename'];
    $aeroplanetopspeed = $_POST['aeroplanetopspeed'];
    $aeroplanerange = $_POST['aeroplanerange'];
    $planemakerid = $_POST['planemakerid'];

      

if(empty($aeroplanename) || empty($planemakerid) || empty($aeroplanetopspeed) || empty($aeroplanerange)) {
                
        if(empty($aeroplanename)) {
            echo "";
        }
        
        if(empty($planemakerid)) {
            echo "";
        }
        
        if(empty($aeroplanetopspeed)) {
            echo "";
        }
        
        if(empty($aeroplanerange)) {
            echo "";
        }
} else { 
    $sql = "UPDATE aeroplane SET aeroplaneName=:aeroplanename, aeroplaneTopSpeed =:aeroplanetopspeed, aeroplaneRange =:aeroplanerange WHERE planeMakerID=:planemakerid";
 
    $query = $conn->prepare($sql); 

    $query->bindparam(':aeroplanename', $aeroplanename);
    $query->bindparam(':aeroplanetopspeed', $aeroplanetopspeed);
    $query->bindparam(':aeroplanerange', $aeroplanerange);
    $query->bindparam(':planemakerid', $planemakerid);

    $query->execute(); 
 
    header("Location: aeroplane.php"); 
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
            <a href="aeroplane.php">Back</a>
            <br/><br/> 

            <form name="form1" method="post" action="aeroplaneEdit.php"> 
                <table border="0"> 
                    <tr>
                        <td>Plane</td> 
                        <td><input type="text" name="aeroplanename" value="<?php echo $aeroplanename;?>"/></td>
                    </tr>
                    <tr>
                        <td>Speed</td> 
                        <td><input type="text" name="aeroplanetopspeed" value="<?php echo $aeroplanetopspeed;?>"/></td>
                    </tr>
                    <tr>
                        <td>Range</td> 
                        <td><input type="text" name="aeroplanerange" value="<?php echo $aeroplanerange;?>"/></td>
                    </tr> 
                    <tr> 
                        <td>Maker</td>
                        <td><select name="planemakerid"> 
<?php 
    $planeMakerSql = "SELECT * FROM plane_maker"; 
    $planeMakerQuery = $conn->prepare($planeMakerSql); 
    $planeMakerQuery->execute();

while($planemaker = $planeMakerQuery->fetch()) { 
    if ($planemaker['planeMakerID'] == $planemakerid) { 
        echo "<option value=\"{$planemaker['planeMakerID']}\" selected>{$planemaker['planeMakerName']}</option>"; 
    } else { 
        echo "<option value=\"{$planemaker['planeMakerID']}\">{$planemaker['planeMakerName']}</option>"; 
    } 
}   
?> 
                            </select></td> 
                    </tr> 
                    <tr>  
                        <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?></td>
                        <td><button type="submit" name="update" >Update</button></td> 
                    </tr> 
                </table> 
            </form>
            <a href="logout.php">Logout</a>
        </body>
</html>
 


