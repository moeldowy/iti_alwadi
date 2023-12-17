<?php
session_start();
if(isset($_SESSION['validUser'])){
    include_once 'connection.php';
    $selectUsers=$connection->prepare('SELECT * FROM users');
    $selectUsers->execute();
    $allusers=$selectUsers->fetchAll(PDO::FETCH_ASSOC);
    require_once"nav.php";?>

    <table border="1">
        <tr>
            <td>img</td>
            <td>Name</td>
            <td>action</td>
        </tr>
        <?php foreach ($allusers as $user){?>
            <tr>
                <td><img src="
            <?= (!empty($user['user_image']))? 'assets/imgs/'.$user['user_image']:'assets/imgs/person.png';?>
        " width="50px" height="50px"></td>
                <td><?= $user['user_name']?></td>
                <td>
                    <a href="profile.php?id=<?=$user['user_id']?>">View</a>|
                    <a href="edit.php?id=<?=$user['user_id']?>">Edit</a>|
                    <a href="delete.php?id=<?=$user['user_id']?>">Delete</a>
                </td>
            </tr>


        <?php }?>
    </table>
<?php }else{
    header('Location: login.php');
}


?>
