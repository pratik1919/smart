<?php
/**
 * Created by PhpStorm.
 * User: test
 * Date: 6/16/2016
 * Time: 9:59 PM
 */

session_start();
setcookie(session_name(), '', 100);
session_unset();
session_destroy();
$_SESSION = array();
header("Location: login.php");

