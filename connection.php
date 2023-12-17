<?php
//Connect with DBMS (using PDO interface)
try{
    $connection = new PDO('mysql:dbname=alwadidb;host=localhost','root','');
    //now you access your database

}catch (PDOException $exception){
    echo $exception->getMessage();
}