<?php
/**
 * Created by PhpStorm.
 * User: sanjeevbudha
 * Date: 6/6/16
 * Time: 2:55 PM
 */
$server_name = "localhost";
$username    = "root";
$password    = "";
$db_name     = "smartgallery";

/*Create Connection*/
$connection = mysqli_connect($server_name,$username,$password,$db_name);

/*Check Connection*/
if(mysqli_connect_errno()){
    echo("Connection failed: ".mysqli_connect_error());
}
