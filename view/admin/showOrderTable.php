<?php

session_start();
include("../../config/DatabaseConnection.php");

if(empty($_SESSION['username'])) {
    header("Location: error.php");
}
/**
 * Created by PhpStorm.
 * User: test
 * Date: 7/1/2016
 * Time: 10:26 PM
 */

removeFromTable();

function removeFromTable(){
    global $connection;

    $id = $_POST['action'];

    $get_order_query = "update order_table set status = '1' where id = '$id'";
    $update_order_table = mysqli_query($connection,$get_order_query);

}
