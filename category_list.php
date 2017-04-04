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

        <div class="col-lg-3" data-target="#carousel" data-slide-to="0">
            <div id="box" style="background-image: url('itemImages/<?php echo $subcategory['image']?>')">
                <div id="overlay">
                    <a href="display_product.php?p_id=<?php echo $subcategory['id']?>"><button class="btn btn-success"><span class="glyphicon glyphicon-eye-open"></span> View</button></a>
                </div>
            </div>
            <div style="text-align: center;">
                <h3><?php echo $subcategory['item_name'] ?></h3>
                <h4><strike>Rs. <?php echo $subcategory['price'] ?>/-</strike></h4>
                <h5>Rs.<?php echo $subcategory['discounted_price']?> /-</h5>
            </div>
        </div>

        <?php
        }
        ?>



    </div>

    <div style="height: 200px;"></div>
    <?php require('footer.php') ?>
</div>
</body>
</html>