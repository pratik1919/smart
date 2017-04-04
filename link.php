<?php
session_start();
//include('../../common/common.php');
include('config/db_connect.php');

if (empty($_SESSION['username'])) {
    header("Location: login.php");
}

$result = $connection->query("SELECT * FROM link");
while($row = mysqli_fetch_assoc($result)){
    $email = $row['mail'];
    $facebook = $row['facebook'];
    $twitter = $row['twitter'];
    $instagram = $row['instagram'];
    $youtube = $row['youtube'];
}
echo $row['email'];
if (isset($_POST['submit'])) {

    $mail = $_POST["mail"];
    $youtube = $_POST["youtube"];
    $instagram = $_POST["instagram"];
    $twitter = $_POST["twitter"];
    $facebook = $_POST["facebook"];

    $insert_link = "UPDATE link set mail='$mail',facebook='$facebook',instagram='$instagram',youtube='$youtube', twitter='$twitter'";
    $connection->query($insert_link);

}
?>


<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Smart Gallery</title>
<link rel="icon" href="img/logo.png" type="image/png" sizes="16x16">
    <link href="css/jquery.dataTables.min.css" type="text/css">
</head>

<style>
    table tr td img{
        height: 100px;
        width: 100px;
    }

    table tr td{
        text-align: right;
    }
</style>

<body>

<div class="wrapper">
<?php require('a_menu.php') ?>


<div class="container">

    <div style="height: 100px;"></div>

    <fieldset>
        <legend style="text-align: center;">Set Links</legend>
    </fieldset>

    <table style="width: 80%;">
        <form method="post" action="#" >
            <tr>
                <td>
                    <button class="btn btn-mail"><span class="fa fa-gmail"></span></button>
                </td>
                <td>
                    <input type="email" class="form-control" name="mail" id="" value="<?php echo empty($email)?'NULL':$email; ?>"/>
                </td>
            </tr>
            <tr>
                <td>
                    <button class="btn btn-facebook"><span class="fa fa-facebook"></span></button>                </td>
                <td>
                    <input type="text" class="form-control" name="facebook" id=""
                           value="<?php echo empty($facebook)?'NULL':$facebook ?>"/>
                </td>
            </tr>
            <tr>
                <td>
                    <button class="btn btn-twitter"><span class="fa fa-twitter"></span></button>
                </td>
                <td>
                    <input type="text" class="form-control" name="twitter" id="" value="<?php echo empty($twitter)?'NULL':$twitter ?>"/>
                </td>
            </tr>
            <tr>
                <td>
                    <button class="btn btn-instagram"><span class="fa fa-instagram"></span></button>                </td>
                <td>
                    <input type="text" class="form-control" name="instagram" id=""
                           value="<?php echo empty($instagram)?'NULL':$instagram ?>"/>
                </td>
            </tr>
            <tr>
                <td>
                    <button class="btn btn-google"><span class="fa fa-youtube"></span></button>                </td>
                <td>
                    <input type="text" class="form-control" name="youtube" id="" value="<?php echo empty($youtube)?'NULL':$youtube ?>"/>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" class="btn btn-default" name="submit" id="" value="Set"/>
                </td>
            </tr>

        </form>
    </table>
</div>

    <?php require('a_footer.php') ?>
</div>

</body>
</html>