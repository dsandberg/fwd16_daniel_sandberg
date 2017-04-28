<?php
include_once("config.php");

// session_start();
// if(empty($_SESSION['email']))
// { 
//  header("location:index.php");
// } 
// echo "Welcome ".$_SESSION['name'];

if(isset($_POST['Submit'])) {    
    
    $planeMakerName = $_POST['planeMakerName'];

  

                
        if(empty($planeMakerName)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
                
         else { 
            
        $sql = "INSERT INTO plane_maker(planeMakerName) VALUES(:planeMakerName)";
        $query = $conn->prepare($sql);
       
        $query->bindparam(':planeMakerName', $planeMakerName);
 
        $query->execute();
        
        
        echo "<font color='green'>Data added successfully.";
        echo "<br/><a href='aeroplaneMaker.php'>View Result</a>";
    }
}

        
?>

<!DOCTYPE html>

<html>
    <head>
        <title>Add</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <a href="aeroplaneMaker.php">Back</a>
    <br/><br/>

    <form action="aeroplaneMakerAdd.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr> 
                <td>Makers</td>
            
            <td><input type="text" name="planeMakerName" /></td>

            </tr>
             
    <tr> 
        <td></td>
        <td><button type="submit" name="Submit">OK</button></td>
            </tr>
        </table>
    </form>
   
    <a href="logout.php">Logout</a>
    </body>
</html>