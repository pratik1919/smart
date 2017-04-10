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

    tr{
        margin: 5px 0px 5px 0px;
    }
</style>

<body>

<div class="wrapper" >
<?php require('a_menu.php') ?>


<div class="container">

    <div style="height: 100px;"></div>

    <fieldset>
        <legend style="text-align: center;">Set Links</legend>
    </fieldset>

    <table style="width: 80%;">
        <form class="form" method="post" action="#" >
            <tr>
                <td>
                    <span style="font-size: 35px; margin: 30px;" class="glyphicon glyphicon-envelope"></span>
                </td>
                <td>
                    <input type="email" class="form-control" name="mail" id="" value="<?php echo empty($email)?'NULL':$email; ?>"/>
                </td>
            </tr>
            <tr>
                <td>
                    <span style="font-size: 35px; margin: 30px;" class="fa fa-facebook"></span>          </td>
                <td>
                    <input type="text" class="form-control" name="facebook" id=""
                           value="<?php echo empty($facebook)?'NULL':$facebook ?>"/>
                </td>
            </tr>
            <tr>
                <td>
                    <span style="font-size: 35px; margin: 30px;" class="fa fa-twitter"></span>
                </td>
                <td>
                    <input type="text" class="form-control" name="twitter" id="" value="<?php echo empty($twitter)?'NULL':$twitter ?>"/>
                </td>
            </tr>
            <tr>
                <td>
                    <span style="font-size: 35px; margin: 30px;" class="fa fa-instagram"></span>          </td>
                <td>
                    <input type="text" class="form-control" name="instagram" id=""
                           value="<?php echo empty($instagram)?'NULL':$instagram ?>"/>
                </td>
            </tr>
            <tr>
                <td>
                    <span style="font-size: 35px; margin: 30px;" class="fa fa-youtube"></span>              </td>
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