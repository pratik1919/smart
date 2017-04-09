<?php
/**
 * Created by PhpStorm.
 * User: Pratik
 * Date: 3/20/2017
 * Time: 12:54 PM
 */


include '../config/db_connect.php';
include '../common/common.php';

$positionID = strip_tags($_POST['positionId']);
$name = strip_tags($_POST['p_name']);
$price = strip_tags($_POST['price']);
$desc = strip_tags($_POST['desc']);
$photo =  $_FILES['photo']['name'];
$photo_tmp = $_FILES['photo']['tmp_name'];
$temp = explode(".",$photo);
$new_file_name = round(microtime(true)) . '.' . end($temp);
move_uploaded_file($photo_tmp,"../img/$new_file_name");
addProd($name, $price,  nl2br($desc), $new_file_name, $positionID, $connection);

header('Location: ../index.php');