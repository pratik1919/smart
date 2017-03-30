<?php
/**
 * Created by PhpStorm.
 * User: sanjeevbudha
 * Date: 6/17/16
 * Time: 1:45 PM
 */

include('../config/db_connect.php');
include('../common/common.php');

if($_POST['formType']=='add'){
    $categoryName = $_POST['categoryName'];

    $result = array();

    $result = addCategory($connection,$categoryName);

    echo json_encode($result);
}

else if($_POST['formType']=='update'){


    $category = $_POST['categoryName'];
    $category_id = $_POST['c_id'];

    $result = array();

    $result = updateCategory($connection,$category,$category_id);

    echo json_encode($result);
}

else if($_POST['formType']=='delete'){

    $id = $_POST['id'];

    $result = array();

    $result = deleteCategory($connection,$id);

    echo json_encode($result);
}