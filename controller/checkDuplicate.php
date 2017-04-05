<?php
/**
 * Created by PhpStorm.
 * User: budha
 * Date: 4/5/2017
 * Time: 11:27 PM
 */
include('../config/db_connect.php');
include('../common/common.php');

if($_POST['formType']=='checkProductName'){

    $productName = $_POST['productName'];

    $result = checkDuplicateProduct($connection,$productName);

    echo json_encode($result);

}