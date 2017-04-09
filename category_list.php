<?php
/**
 * Created by PhpStorm.
 * User: Pratik
 * Date: 7/2/2016
 * Time: 3:56 PM
 */

include("config/db_connect.php");
//include("common/common.php");
?>

<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Smart Gallery</title>
    <link rel="icon" href="img/logo.png" type="image/png" sizes="16x16">
</head>
<body>

<div class="wrapper">
    <?php include('header.php') ?>
    <div class="subCatMenu">
        Category:
        <?php
        $s_cat = subcat($_GET['id'], $connection);
        while ($row = $s_cat->fetch_assoc()){
            ?>
            <a href="sub_cat_show.php?id=<?php echo $row['id']; ?>&subcat=<?php echo $row['sub_category_name']; ?>&cat=<?php echo $_GET['id']; ?>"><?php echo ucwords($row['sub_category_name']); ?></a> /
        <?php
        }
        ?>
    </div>

    <div class="container">
        <?php

        $c_id = $_GET['id'];

        $subcategoryList = getItemByCat($connection, $c_id);

        foreach($subcategoryList as $subcategory){
        ?>

        <a href="display_product.php?p_id=<?php echo $subcategory['id']?>">
        <div class="col-lg-3 productBox">
            <div id="box" style="background-image: url('itemImages/<?php echo $subcategory['image']?>')">
            </div>
            <div class="disc" style="text-align: center;">
                <h3 style="margin-top: 0px;"><?php echo $subcategory['item_name'] ?></h3>
                <?php
                if($subcategory['price'] != ""){
                    ?>
                    <h4><strike>Rs. <?php echo $subcategory['price'] ?>/-</strike></h4>
                <?php
                }else{
                    ?>
                <h4> Fixed </h4>
                  <?php
                }
                ?>
                <h5>Rs.<?php echo $subcategory['discounted_price']?> /-</h5>
            </div>
        </div>
        </a>

        <?php
        }
        ?>



    </div>

    <div style="height: 200px;"></div>
    <?php require('footer.php') ?>
</div>
</body>
</html>