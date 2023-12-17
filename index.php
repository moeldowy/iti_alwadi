<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
require_once'nav.php';
?>
<center>
    <h1>Welcome To Our Users Management System </h1>
    <?php
    session_start();
    if(isset($_SESSION['validUser'])){?>
    <h3>Please log in First <a href="login.php">here</a></h3>
    <?php }else{
        echo"Your Already loggedin please wait 3 seconds";
       header('Refresh:3;URL=allUsers.php');
    }?>
</center>
</body>
</html>