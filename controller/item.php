<?php
/**
 * Created by PhpStorm.
 * User: sanjeevbudha
 * Date: 6/16/16
 * Time: 3:45 PM
 */

include('../config/DatabaseConnection.php');
include('../common/common.php');

if($_POST['formType']=='add'){

    $item = $_POST['itemName'];
    $cat_id = $_POST['category_id'];
    $s_cat_id = $_POST['sub_category_id'];
    $item_size = empty($_POST['item_size'])?'NULL':$_POST['item_size'];
    $description = $_POST['description'];
    $color = empty($_POST['color'])?'NULL':$_POST['color'];
    $price = $_POST['price'];
    $discount = empty($_POST['discount'])?'NULL':$_POST['discount'];
    $discountedPrice = empty($_POST['discountedPrice'])?'NULL':$_POST['discountedPrice'];

    $item_image = $_FILES['file']['name'];
    $item_image_tmp = $_FILES['file']['tmp_name'];

    $result = array();

    move_uploaded_file($item_image_tmp,"../itemImages/$item_image");


    $result = addItem($connection,$item,$cat_id,$s_cat_id,$item_size,$description,$color,$price,$discount,$discountedPrice,$item_image);

    header("Location:../view/admin/addItemView.php");
}

else if($_POST['formType']=='edit'){

    $id = $_POST['id'];

    $result = array();

    $result = editProduct($connection,$id);

    echo json_encode($result);
}

else if($_POST['formType']=='update'){

    $item_id = $_POST['item_id'];

    $item = $_POST['itemName'];
    $cat_id = $_POST['category_id'];
    $s_cat_id = $_POST['sub_category_id'];
    $item_size = empty($_POST['item_size'])?'NULL':$_POST['item_size'];
    $description = $_POST['description'];
    $color = empty($_POST['color'])?'NULL':$_POST['color'];
    $price = $_POST['price'];
    $discount = empty($_POST['discount'])?'NULL':$_POST['discount'];
    $discountedPrice = empty($_POST['discountedPrice'])?'NULL':$_POST['discountedPrice'];

    $item_image = $_FILES['file']['name'];
    $item_image_tmp = $_FILES['file']['tmp_name'];

    $result = array();

    move_uploaded_file($item_image_tmp,"../itemImages/$item_image");


    $result = updateProduct($connection,$item,$cat_id,$s_cat_id,$item_size,$description,$color,$price,$discount,$discountedPrice,$item_image,$item_id);

   
    header("Location:../view/admin/addItemView.php");

}
else if($_POST['formType']=='delete'){

    $id = $_POST['id'];

    $result = array();

    $result = deleteProduct($connection,$id);

    echo json_encode($result);
}

else if($_POST['formType']=='checkItemName'){

    $itemName = $_POST['itemName'];

    $result = array();

    $result = checkDuplicateItem($connection,$itemName);

    echo json_encode($result);

}

else if($_POST['formType']=='select'){

    $id = $_POST['sub_cat'];

    $result = array();

    $result = getItemBySubCat($connection,$id);

    echo json_encode($result);
}