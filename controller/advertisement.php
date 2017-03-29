<?php
/**
 * Created by PhpStorm.
 * User: sanjeevbudha
 * Date: 7/3/16
 * Time: 7:27 PM
 */
include('../config/DatabaseConnection.php');
include('../common/common.php');

if(isset($_POST['advertisement'])){

    $ad_id = $_POST['ad_id'];
    $urlLink = $_POST['urlLink'];
    $cat_id = $_POST['category_id'];
    $expiryDate = $_POST['expiryDate'];

    $image = $_FILES['file']['name'];
    $image_tmp = $_FILES['file']['tmp_name'];

    $result = array();

    if($_POST['insert-ad']=="add"){
        $result = createAdvertisement($connection,$urlLink,$cat_id,$expiryDate,$image);
    }
    else if($_POST['insert-ad']=='update'){
        $result = updateAdvertisement($connection,$urlLink,$cat_id,$expiryDate,$image,$ad_id);
    }

    if($result['message']=='success'){
        move_uploaded_file($image_tmp,"../advertisement/$image");
    }

    header("Location:../view/admin/advertise.php");
}


else if(isset($_POST['formType'])){

    $result = array();

    $id = $_POST['id'];

    $result = deleteAdvertisement($connection,$id);

    echo json_encode($result);
}

else if(isset($_POST['edit'])){

    $id = $_POST['id'];

    $result = array();

    $result = editAdvertisement($connection,$id);

    echo json_encode($result);
}
