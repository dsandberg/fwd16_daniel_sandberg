<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        // incluse classes
        include_once 'class.php';      
        
        // Create new SQL object
        $db = new SQL();
        
        // Use SQL object to get data from database and det it ti result
        $result = $db->searchDB("sohail")->fetch();
        
        // If result is true
        if ($result) {
            // Create a new Bank object with the database data
            $account1 = new Bank($result[accountFname], $result[accountLname], $result[accountName], $result[accountBalance]);
            // print the Bank objects data
            echo $account1->printBank();
        }
        
        ?>
    </body>
</html>
