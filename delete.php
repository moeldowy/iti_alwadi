<?php
session_start();
if(isset($_SESSION['validUser'])&&!empty($_GET['id'])){?>
    <?php
    require_once "connection.php";
    //require_once"nav.php";
    $selectUser=$connection->prepare('DELETE FROM users WHERE user_id=?');
    $selectUser->execute([$_GET['id']]);
    header('Location:allUsers.php');}
else{
    header('Location:login.php');
}