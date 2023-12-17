<?php
session_start();
if(isset($_SESSION['validUser'])){?>

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
<center>
    <?php require_once"nav.php"; ?>
    <h1>Add New User</h1>
    <form method="post" action="insert.php" enctype="multipart/form-data">
        <label for="image">Image</label>
        <input type="file" name="file" id="image"><br>
        <label for="username">User Name:</label>
        <input type="text" name="username" id="username"><br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password"><br>
        <label for="email">Email</label>
        <input type="email" name="email" id="email"><br>
        <label>Gender</label>
        <label for="male">Male</label>
        <input type="radio" id="male" value="male" name="gender">
        <label for="female">Female</label>
        <input type="radio" id="female" value="female" name="gender"><br>
        <label>SKills</label>
        <label for="php">PHP</label>
        <input type="checkbox" id="php" value="php" name="skills[]">

        <label for="HTML">HTML</label>
        <input type="checkbox" id="HTML" value="HTML" name="skills[]">
        <br>
        <label for="CSS">CSS</label>
        <input type="checkbox" id="CSS" value="CSS" name="skills[]">

        <label for="js">js</label>
        <input type="checkbox" id="js" value="js" name="skills[]"><br>
        <input type="submit" value="Register">
    </form>
</center>
</body>
</html>
<?php }else{
    header('Location: login.php');
}


?>