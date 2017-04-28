<?php
include_once("config.php");

// Login session grejen
session_start();
 
if(isset($_POST['signup'])){ 
      
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = md5($_POST['pass']);
 
    $insert = $conn->prepare("INSERT INTO users (name,email,pass) values(:name,:email,:pass)");
    $insert->bindParam(':name', $name);
    $insert->bindParam(':email', $email); 
    $insert->bindParam(':pass', $pass);
    $insert->execute();
   
}  
    elseif(isset($_POST['signin'])) {
        
    $email = $_POST['email'];
    $pass = md5($_POST['pass']);
 
    $select = $conn->prepare("SELECT * FROM users WHERE email='$email' and pass='$pass'");
    $select->setFetchMode();
    $select->execute();
    $data=$select->fetch();

 // login fail
 if($data['email']!=$email and $data['pass']!=$pass) {
     
        echo "invalid email or pass";
        
 } // login OK
    elseif($data['email']==$email and $data['pass']==$pass) { 
        
        $_SESSION['email']=$data['email']; 
        $_SESSION['name']=$data['name']; 
        header("location:aeroplane.php"); 
    }
 }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"> 
        <title>Login</title>
        <style>
            .formContainer {
                display: flex;
                height: 100%; 
                align-items: center;
            }

            .rightForm{
                padding:85px;
            }

            .leftForm{
                margin-left: auto;
                padding:85px;
            }
        </style>
    </head>
 <body>
 <div >
    <div >
        <h4>Create Account Here</h4>
  
        <form method="post">
            <input type="text" name="name" placeholder="User Name"><br><br>
            <input type="text" name="email" placeholder="example@example.com"><br><br>
            <input type="password" name="pass" placeholder="password"><br><br>
            <button type="submit" name="signup">SIGN UP</button>
        </form>
    </div>
    <div >
        <h4>Log In Here</h4>
        
        <form method="post">
            <input type="text" name="email" placeholder="example@example.com"><br><br>
            <input type="password" name="pass" placeholder="password"><br><br>
            <button type="submit" name="signin">SIGN IN</button>
        </form>
   </div>
</div>
</body>
</html>