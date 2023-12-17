<?php
session_start();
$_SESSION['validUser']='mohammed';
if(isset($_SESSION['validUser'])&&$_SERVER['REQUEST_METHOD']=='POST'){
    require_once "connection.php";
    $insertSql=$connection->prepare('INSERT INTO users (user_image,user_name,user_password,user_email,user_gender,user_skills) VALUES (?,?,?,?,?,?)');
// TO Protect your script from SQL injection
    $username=$_POST['username'];
    $password=password_hash($_POST['password'],PASSWORD_DEFAULT);
    $email=$_POST['email'];
    $gender=$_POST['gender'];
    $skills=implode(',',$_POST['skills']);
    $imageName=$_FILES['file']['name'];
    $image_tmp=$_FILES['file']['tmp_name'];
    $allowedExt=['png','jpg','jpeg','pneg','gif','web'];
    $splitFileName=explode('.',$imageName);
    $fileExt=end($splitFileName);
    if(in_array($fileExt,$allowedExt)&&isset($_FILES['file'])){
        move_uploaded_file($image_tmp,'assets/imgs/'.$imageName);
    }
    $insertSql->execute([$imageName,$username,$password,$email,$gender,$skills]);
    header('Location: allUsers.php');

}else{
    header('Location: login.php');
}
