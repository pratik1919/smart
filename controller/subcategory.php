<?php
/**
 * Created by PhpStorm.
 * User: sanjeevbudha
 * Date: 6/17/16
 * Time: 5:53 PM
 */

include('../config/db_connect.php');
include('../common/common.php');

if($_POST['formType']=='add'){
    $subcategory = $_POST['subcategory'];
    $category_id = $_POST['ca_id'];

    $result = array();

    $result = addSubCategory($connection,$subcategory,$category_id);

    echo json_encode($result);
}

else if($_POST['formType']=='update'){

    $subcategory = $_POST['subcategory'];
    $category_id = $_POST['ca_id'];

    $result = array();

    $result = updateSubCategory($connection,$subcategory,$category_id);

    echo json_encode($result);
}
else if($_POST['formType']=='delete') {

    $id = $_POST['id'];

    $result = array();

    $result = deleteSubCategory($connection, $id);

    echo json_encode($result);
}

else if($_POST['formType']=='select'){

    $cat_id = $_POST['id'];

    $result = array();

    $result = getSubCategoryByCategory($connection,$cat_id);

    echo json_encode($result);
}