<?php


/**
 * Created by PhpStorm.
 * User: sanjeevbudha
 * Date: 6/11/16
 * Time: 6:27 PM
 */
session_start();
function checkLogin($connection,$username,$password){

    $password = md5($password);
    $get_credentials = "select * from user where username='$username' and password = '$password'";

    $run_query = mysqli_query($connection, $get_credentials);

    $data = array();

    if(mysqli_num_rows($run_query) > 0) {

        while ($row_query = mysqli_fetch_array($run_query)) {
            $_SESSION['username'] = $row_query['username'];
            $data['message']="success";
        }
    }
    else{
        $data['message']='fail';
    }

    return $data;
}


function addItem($connection,$item,$cat_id,$s_cat_id,$item_size,$description,$color,$price,$discount,$discountedPrice,$image){

    $created_date = date("Y-m-d");

    $create_item = "INSERT INTO item VALUES(null,'$item','$image','$item_size','$description','$color','$price','$discount','$discountedPrice',null,'$s_cat_id','$cat_id','$created_date',null)";


    $result = mysqli_query($connection,$create_item);

    $data = array();

    if($result){
        $data['message']='success';
    }else{
        $data['message']='error';
    }

    return $create_item;

}

function editProduct($connection,$id){

    $select_item = "SELECT *FROM item WHERE id = '$id' ";

    $result = mysqli_query($connection,$select_item);

    $data = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $data['id'] = $row["id"];
        $data['item_name'] = $row["item_name"];
        $data['image'] = $row["image"];
        $data['size'] = $row["size"];
        $data['description'] = $row["description"];
        $data['color'] = $row["color"];
        $data['price'] = $row["price"];
        $data['discount'] = $row["discount"];
        $data['discounted_price'] = $row["discounted_price"];
        $data['category_name'] = getCategoryName($connection,$row["c_id"]);
        $data['sub_category_name'] = getSubCategoryName($connection,$row["s_id"]);
    }

    return $data;

}

function getCategoryName($connection,$cat_id){

    $select_category = "SELECT *FROM category WHERE id='$cat_id'";

    $result = mysqli_query($connection,$select_category);

    $data = array();

    while($row = mysqli_fetch_assoc($result)){
        $data['category_name'] = $row["category_name"];
    }

    return $data;

}

function getSubCategoryName($connection,$sub_cat_id){

    $select_category = "SELECT * FROM subcategory WHERE id='$sub_cat_id'";

    $result = mysqli_query($connection,$select_category);

    $data = "";

    while($row = mysqli_fetch_assoc($result)){
        $data = $row["sub_category_name"];
    }

    return $data;

}

function updateProduct($connection,$item,$cat_id,$s_cat_id,$item_size,$description,$color,$price,$discount,$discountedPrice,$item_image,$item_id)
{

    $update_item = "UPDATE item SET item_name = '$item' , image = '$item_image', size='$item_size',description='$description',color='$color',price='$price',discount='$discount',discounted_price='$discountedPrice',s_id = '$s_cat_id',c_id='$cat_id' WHERE id='$item_id'";

    $result = mysqli_query($connection,$update_item);

    $data = array();

    if($result){
        $data['message'] = 'success';
    }
    else{
        $data['message'] = 'fail';
    }

    return $data;
}

function deleteProduct($connection,$id){

    $delete_item = "DELETE FROM item WHERE id = '$id' ";

    $result = mysqli_query($connection,$delete_item);

    $data = array();

    if($result){
        $data['message']='success';
    }else{
        $data['message']='fail';
    }

    return $data;

}

function getAllProduct($connection){

    $select_item = "SELECT *FROM item";

    $result = mysqli_query($connection,$select_item);

    return $result;
}

function getCategory($connection){

    $select_category = "SELECT *FROM category";

    $result = mysqli_query($connection,$select_category);

    return $result;
}

function getProductCount($connection, $pro_id){
    $select_item = "SELECT COUNT(*) from item WHERE c_id = $pro_id";

    $count = mysqli_query($connection,$select_item);

    if(mysqli_fetch_row($count) > 0){
        return true;
    }
    else{
        return false;
    }
}

function getSubcategoryCount($connection, $sub_cat_id, $cat_id){

    $select_item = mysqli_query($connection, "SELECT COUNT(*) as total from item WHERE s_id = $sub_cat_id AND c_id = $cat_id");

    $data = mysqli_fetch_assoc($select_item);

    return $data['total'];
}

function addCategory($connection,$categoryName){

    $created_date = date("Y-m-d");

    $create_category = "INSERT INTO category VALUES(null,'$categoryName','$created_date',null)";


    $result = mysqli_query($connection,$create_category);

    $data = array();

    if($result){
        $data['message']='success';
    }else{
        $data['message']=$create_category;
    }

    return $data;


}

function updateCategory($connection,$category, $c_id){

    $update_date = date("Y-m-d");

    $update_subcategory = "UPDATE category SET category_name = '$category',updated_date='$update_date' WHERE id='$c_id'; ";
    $result = mysqli_query($connection,$update_subcategory);

    $data = array();

    if($result){
        $data['message']='success';
    }else{
        $data['message']='error';
    }

    return $data;

}

function deleteCategory($connection,$id){

    $delete_subcategory = "DELETE FROM category WHERE id = '$id'";

    $result = mysqli_query($connection,$delete_subcategory);

    $data = array();

    if($result){
        $data['message']='success';
    }else{
        $data['message']='fail';
    }

    return $data;

}


function getSubCategory($connection){
    $select_category = "SELECT * FROM subcategory";

    $result = mysqli_query($connection,$select_category);

    return $result;
}

function addSubCategory($connection,$subcategory,$c_id){

    $created_date = date("Y-m-d");

    $create_subcategory = "INSERT INTO subcategory VALUES(null,'$subcategory','$c_id','$created_date',null)";


    $result = mysqli_query($connection,$create_subcategory);

    $data = array();

    if($result){
        $data['message']='success';
    }else{
        $data['message']= 'fail';
    }

    return $data;

}

function updateSubCategory($connection,$subcategory,$sc_id){

    $update_date = date("Y-m-d");

    $update_subcategory = "UPDATE subcategory SET sub_category_name = '$subcategory',updated_date='$update_date' WHERE id='$sc_id'; ";
        $result = mysqli_query($connection,$update_subcategory);

        $data = array();

        if($result){
            $data['message']='success';
        }else{
            $data['message']='error';
        }

        return $data;
}

function deleteSubCategory($connection,$id){

    $delete_subcategory = "DELETE FROM subcategory WHERE id = '$id'";

    $result = mysqli_query($connection,$delete_subcategory);

    $data = array();

    if($result){
        $data['message']='success';
    }else{
        $data['message']='fail';
    }

    return $data;
}

function subcat($id, $connection){
    $select_category = "SELECT * FROM subcategory where c_id = $id";

    $result = mysqli_query($connection,$select_category);

    return $result;
}

function random_password($connection) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";

    $password = substr(str_shuffle($chars),0,8);
    $hashPassword = md5($password);

    $insert_product = "update user set password='".$hashPassword."' where username='careshopnepaladmin'";

    $insert_pro = mysqli_query($connection,$insert_product);

    if($insert_pro){
        return $password;
    }else{
        return "Not Inserted.";
    }
}
function getProductList($connection){

    $select_itemList = "SELECT *FROM item";

    $result = mysqli_query($connection,$select_itemList);

    return $result;

}


function getSubCategoryByCategory($connection,$cat_id){

    $select_cat = "SELECT *FROM subcategory WHERE c_id = '$cat_id' ";

    $result = mysqli_query($connection,$select_cat);

    $data = array();
    $i = 0;

    while($row = mysqli_fetch_assoc($result))
    {
        $data[$i]['id'] = $row['id'];
        $data[$i]['sub_category_name'] = $row['sub_category_name'];
        $i++;
    }

    return $data;

}

function checkDuplicateItem($connection,$itemName){

    $select_itemNameList = "select *from item WHERE item_name = '$itemName'";

    $result = mysqli_query($connection,$select_itemNameList);

    $message = array();
    $data = array();

    while($row = mysqli_fetch_assoc($result)){
         $data['item_name'] = $row['item_name'];
    }

    if(count($data)>0){
        $message['message'] = 'duplicate';
    }else{
        $message['message'] = 'single';
    }

    return $message;
}

function getItemBySubCat($connection,$id){

    $select_item = "select *from item where s_id ='$id' limit 4";

    $result = mysqli_query($connection,$select_item);

    $data = array();
    $i = 0;

    while ($row = mysqli_fetch_assoc($result)) {
        $data[$i]['id'] = $row["id"];
        $data[$i]['item_name'] = $row["item_name"];
        $data[$i]['image'] = $row["image"];
        $data[$i]['size'] = $row["size"];
        $data[$i]['description'] = $row["description"];
        $data[$i]['color'] = $row["color"];
        $data[$i]['price'] = $row["price"];
        $data[$i]['discount'] = $row["discount"];
        $data[$i]['discounted_price'] = $row["discounted_price"];
        $data[$i]['category_name'] = getCategoryName($connection,$row["c_id"]);
        $data[$i]['sub_category_name'] = getSubCategoryName($connection,$row["s_id"]);
        $i++;
    }

    return $data;

}

function getImage($connection){

    $select_image = "select *from item order by id desc limit 5";

    $result = mysqli_query($connection,$select_image);

    $data = array();
    $i = 0;

    while ($row = mysqli_fetch_assoc($result)) {
        $data[$i]['id'] = $row["id"];
        $data[$i]['item_name'] = $row["item_name"];
        $data[$i]['image'] = $row["image"];
        $i++;
    }

    return $data;
}


function getCategoryByItem($connection,$id){

    $select_item_cat = "select *from item where id = '$id'";

    $result = mysqli_query($connection,$select_item_cat);

    $data = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $data['c_id'] = $row["c_id"];
    }

    return $data;
}

function getLikeItem($connection,$c_id,$p_id){

    $select_item = "select *from item where not id = '$p_id' and c_id='$c_id' limit 4";

    $result = mysqli_query($connection,$select_item);

    $data = array();
    $i = 0;

    while ($row = mysqli_fetch_assoc($result)) {
        $data[$i]['id'] = $row["id"];
        $data[$i]['item_name'] = $row["item_name"];
        $data[$i]['image'] = $row["image"];
        $data[$i]['price'] = $row["price"];
        $data[$i]['discounted_price'] = $row["discounted_price"];
        $i++;
    }

    return $data;
}

function getItemName($connection,$id){

    $select_name = "select *from item where id = '$id'";

    $result = mysqli_query($connection,$select_name);

    $data = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $data['item_name'] = $row["item_name"];
    }

    return $data;
}

function getOrderList($connection,$status){

    $select_orders = "select * from order_table where status = '$status'";

    $result = mysqli_query($connection, $select_orders);

    $data = array();
    $i = 0;

    while ($row = mysqli_fetch_assoc($result)) {
        $data[$i]['id'] = $row["id"];
        $data[$i]['address'] = $row["address"];
        $data[$i]['date'] = $row["date"];
        $data[$i]['status'] = $row["status"];
        $data[$i]['contact'] = $row["contact"];
        $data[$i]['item_id'] = $row["item_id"];
        $data[$i]['name'] = $row["name"];
        $i++;
    }

    return $data;

}
function createAdvertisement($connection,$urlLink,$cat_id,$expiryDate,$image){

    $created_date = date("Y-m-d");

    $create_sql = "insert into advertisement(url_link,category_id,advertise_image,created_date,expiry_date) values('$urlLink','$cat_id','$image','$created_date','$expiryDate')";

    $data = array();

    $result = mysqli_query($connection,$create_sql);

    if($result){
        $data['message']='success';
    }else{
        $data['message']='fail';
    }

    return $data;
}

function getAllAdvertisement($connection){

    $select_advertisement = "select *from advertisement";

    $result = mysqli_query($connection,$select_advertisement);

    $data = array();
    $i = 0;

    while ($row = mysqli_fetch_assoc($result)) {
        $data[$i]['id'] = $row["id"];
        $data[$i]['url_link'] = $row["url_link"];
        $data[$i]['category_id'] = $row["category_id"];
        $data[$i]['expiry_date'] = $row["expiry_date"];
        $i++;
    }

    return $data;
}

function getCategoryById($connection,$id){

    $select_name = "select *from category where id = '$id'";

    $result = mysqli_query($connection,$select_name);

    $data = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $data['category_name'] = $row["category_name"];
    }

    return $data;
}

function deleteAdvertisement($connection,$id){

    $delete_ad = "DELETE FROM advertisement WHERE id = '$id'";

    $result = mysqli_query($connection,$delete_ad);

    $data = array();

    if($result){
        $data['message']='success';
    }else{
        $data['message']='fail';
    }

    return $data;
}
function editAdvertisement($connection,$id){

    $select_advertisement = "SELECT *FROM advertisement WHERE id = '$id' ";

    $result = mysqli_query($connection,$select_advertisement);

    $data = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $data['id'] = $row["id"];
        $data['url_link'] = $row["url_link"];
        $data['category_id'] = $row["category_id"];
        $data['advertise_image'] = $row["advertise_image"];
        $data['expiry_date'] = $row["expiry_date"];
    }

    return $data;
}

function updateAdvertisement($connection,$urlLink,$cat_id,$expiryDate,$image,$id){

    $update_date = date("Y-m-d");

    $update_ad = "UPDATE advertisement SET url_link = '$urlLink',category_id='$cat_id',advertise_image='$image',updated_date='$update_date',expiry_date='$expiryDate' WHERE id='$id'; ";
    $result = mysqli_query($connection,$update_ad);

    $data = array();

    if($result){
        $data['message']='success';
    }else{
        $data['message']='error';
    }

    return $data;
}

function searchItem($connection,$search){

    $select_item = "select *from item where item_name  like '%$search%'";

    $result = mysqli_query($connection,$select_item);

    $data = array();
    $i = 0;

    while ($row = mysqli_fetch_assoc($result)) {
        $data[$i]['id'] = $row["id"];
        $data[$i]['item_name'] = $row["item_name"];
        $data[$i]['image'] = $row["image"];
        $data[$i]['price'] = $row["price"];
        $data[$i]['discounted_price'] = $row["discounted_price"];
        $i++;
    }

    return $data;
}

function getAdvertisement($connection,$count){

    $select_advertisement = "SELECT * FROM advertisement ORDER BY id LIMIT 1 OFFSET $count";

    $result = mysqli_query($connection,$select_advertisement);

    $data = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $data['id'] = $row["id"];
        $data['url_link'] = $row["url_link"];
        $data['category_id'] = $row["category_id"];
        $data['advertise_image'] = $row["advertise_image"];
        $data['expiry_date'] = $row["expiry_date"];
    }

    return $data;
}