<?php session_start();?>
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
if(!isset($_SESSION['validUser'])){?>


<center>
    <h1>Login</h1>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <label for="username">Username</label>
        <input type="text" name="username" id="username"><br>

        <label for="password">Password</label>
        <input type="password" name="password" id="password"><br>
        <input type="submit">
    </form>
    <?php
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $username=$_POST['username'];
        $password=$_POST['password'];
        require_once 'connection.php';
        $selectUser=$connection->prepare('SELECT user_name,user_password FROM users WHERE user_name=?');
        $selectUser->execute([$username]);
        $selectUser->setFetchMode(PDO::FETCH_ASSOC);
        $dbUser=$selectUser->fetch();
        if($dbUser){
            if(password_verify($password,$dbUser['user_password'])){
              $_SESSION['validUser']=$dbUser['user_name'];
              header('Location:allUsers.php');
            }else{
                echo "Wrong Username Or Password";
            }
        }else{
            echo "Wrong Username Or Password";
        }


    }
    ?>
</center>
<?php
}else{
    require_once "nav.php";
    echo "you are already LoggedIn";
}
?>
</body>
</html>