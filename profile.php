<?php session_start();?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/script.js"></script>
</head>
<body>
    <?php
        if(isset($_SESSION['validUser'])&&!empty($_GET['id'])){?>
                <?php
                    require_once "connection.php";
                    //require_once"nav.php";
                    $selectUser=$connection->prepare('SELECT * FROM users WHERE user_id=?');
                    $selectUser->execute([$_GET['id']]);
                    $selectUser->setFetchMode(PDO::FETCH_ASSOC);
                    $dbUser=$selectUser->fetch();

                ?>
            <aside class="profile-card">
                <header>
                    <!-- here’s the avatar -->
                    <a target="_blank" href="#">
                        <img src="assets/imgs/<?= $dbUser['user_image']?>" width="80px">
                    </a>

                    <!-- the username -->
                    <h1>
                       <?= $dbUser['user_name']?>
                    </h1>

                    <!-- and role or location -->
                    <h2>
                        <?= $dbUser['user_email']?>
                    </h2>

                </header>

                <!-- bit of a bio; who are you? -->
                <div class="profile-bio">

                    <p>
                        skills:
                        <?php
                        $skills = explode(",",$dbUser['user_skills']);
                        foreach($skills as $skill){
                            echo $skill."<br>";
                        }
                        ?>
                    </p>

                </div>

                <!-- some social links to show off -->
                <ul class="profile-social-links">
                    <li>
                        <a target="_blank" href="https://www.facebook.com/creativedonut">
                            <i class="fa fa-facebook"></i>
                        </a>
                    </li>
                    <li>
                        <a target="_blank" href="https://twitter.com/dropyourbass">
                            <i class="fa fa-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a target="_blank" href="https://github.com/vipulsaxena">
                            <i class="fa fa-github"></i>
                        </a>
                    </li>
                    <li>
                        <a target="_blank" href="https://www.behance.net/vipulsaxena">

                            <i class="fa fa-behance"></i>
                        </a>
                    </li>
                </ul>
            </aside>
        <?php }else{
            header('Location: login.php');
        }
    ?>
</body>
</html>