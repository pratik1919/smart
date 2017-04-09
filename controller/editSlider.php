<?php
/**
 * Created by PhpStorm.
 * User: Pratik
 * Date: 4/9/2017
 * Time: 1:19 PM
 */

include '../config/db_connect.php';

$id = $_POST['id'];
$desc = $_POST['desc'];

$delete = "DELETE FROM `slider` WHERE `id` = $id";
$connection->query($delete);

$photo =  $_FILES['photo']['name'];
$photo_tmp = $_FILES['photo']['tmp_name'];
$temp = explode(".",$photo);
$new_file_name = round(microtime(true)) . '.' . end($temp);
move_uploaded_file($photo_tmp,"../img/$new_file_name");

$insert = "INSERT INTO `slider`(`photo`, `description`) VALUES ('$new_file_name', '$desc')";
$connection->query($insert);

header('Location: ../editSlider.php');