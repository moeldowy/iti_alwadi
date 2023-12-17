<?php
session_start();
if(isset($_SESSION['validUser'])&&!empty($_GET['id'])){
    require_once 'connection.php';
    $selectUser=$connection->prepare('SELECT * FROM users WHERE user_id=?');
    $selectUser->execute([$_GET['id']]);
    $selectUser->setFetchMode(PDO::FETCH_ASSOC);
    $dbUser=$selectUser->fetch();
    ?>

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
        <form method="post" action="update.php" enctype="multipart/form-data">
            <label for="image">Image</label>
            <input type="file" name="file" id="image"><br>
            <label for="username">User Name:</label>
            <input type="text" name="username" id="username" value="<?=$dbUser['user_name']?>"><br>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?=$dbUser['user_email']?>"><br>
            <label>Gender</label>
            <label for="male">Male</label>
            <input type="radio" id="male" value="male" name="gender"
                <?php echo($dbUser['user_gender']=='male')?"checked":"" ?>
            >
            <label for="female">Female</label>
            <input type="radio" id="female" value="female" name="gender"

            <?php echo($dbUser['user_gender']=='female')?"checked":"" ?>
            >
            <br>
            <label>SKills</label>
            <?php
            $skills=explode(",",$dbUser['user_skills']);
            $avSkills=['php',"css","HTML","js"];
            foreach($avSkills as $avSkill){
                if(in_array($avSkill,$skills)){?>
                    <label for="<?=$avSkill?>"><?=$avSkill?></label>
    <input type="checkbox" id="<?=$avSkill?>" value="<?=$avSkill?>" name="skills[]" checked>
               <?php }else{?>
                    <label for="<?=$avSkill?>"><?=$avSkill?></label>
                    <input type="checkbox" id="<?=$avSkill?>" value="<?=$avSkill?>" name="skills[]">
               <?php }
            }?>



            <input type="submit" value="Register">
        </form>
    </center>
    </body>
    </html>
<?php }else{
    header('Location: login.php');
}


?>