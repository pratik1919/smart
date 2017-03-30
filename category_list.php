<?php
/**
 * Created by PhpStorm.
 * User: Pratik
 * Date: 7/2/2016
 * Time: 3:56 PM
 */

include("config/db_connect.php");
?>

<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>CareShopNepal</title>
    <link rel="icon" href="img/csnLogo.png" type="image/png" sizes="16x16">
</head>
<body>

<div class="wrapper" style="background: rgba(202, 83, 63, 0.27); color: #630b0b;">
    <?php include('header.php') ?>
    <div style="height: 150px;"></div>

    <div class="container">
        <?php

        $subcategoryList = getSubCategoryByCategory($connection,$_GET['id']);


        foreach($subcategoryList as $subcategory) {

            $count = getSubcategoryCount($connection, $subcategory['id'], $_GET['id']);

            if ($count > 0) {

                ?>

                <div class="row">
                    <a href="sub_cat_show.php?id=<?php echo $subcategory['id'] ?>&subcat=<?php echo $subcategory['sub_category_name'] ?>"
                    <h3 id="catagory"
                        style="font-family: 'Pacifico', cursive;"><?php echo $subcategory['sub_category_name'] ?></h3></a>
                    <div class="clearfix">
                        <div id="<?php echo $subcategory['sub_category_name'] ?>" class="carousel slide"
                             data-interval="false">
                            <div class="carousel-inner">
                                <div class="item active">
                                    <?php
                                    $counter = 0;
                                    $itemList = getItemBySubCat($connection, $subcategory['id']);

                                    foreach ($itemList as $item) {
                                        ?>

                                        <div class="col-lg-3" data-target="#carousel" data-slide-to="<?php $counter ?>">
                                            <div id="box"
                                                 style="background-image: url('itemImages/<?php echo $item['image'] ?>')">
                                                <div id="overlay">
                                                    <a href="display_product.php?p_id=<?php echo $item['id'] ?>">
                                                        <button class="btn btn-success"><span
                                                                    class="glyphicon glyphicon-eye-open"></span> View
                                                        </button>
                                                    </a>
                                                </div>
                                            </div>
                                            <div style="text-align: center;">

                                                <?php
                                                if ($item['discounted_price'] < $item['price']){
                                                    ?>
                                                    <h3><?php echo $item['item_name'] ?></h3>
                                                    <h5 style="color: red;">Rs <strike><?php echo $item['price'] ?></strike>
                                                    </h5>

                                                    <h5>Rs <?php echo $item['discounted_price'] ?></h5>
                                                    <?php
                                                }else {
                                                    ?>
                                                    <h5>Rs <?php echo $item['discounted_price'] ?></h5>

                                                    <?php
                                                }
                                                ?>

                                            </div>
                                        </div>

                                        <?php
                                        $counter++;
                                    }
                                    ?>
                                </div><!-- /item -->

                                <div class="item">
                                    <?php
                                    $counter = 0;
                                    $itemList = getItemBySubCat($connection, $subcategory['id']);

                                    foreach ($itemList as $item) {
                                        ?>

                                        <div class="col-lg-3" data-target="#carousel" data-slide-to="<?php $counter ?>">
                                            <div id="box"
                                                 style="background-image: url('../../itemImages/<?php echo $item['image'] ?>')">
                                                <div id="overlay">
                                                    <a href="#">
                                                        <button class="btn btn-success"><span
                                                                    class="glyphicon glyphicon-eye-open"></span> View
                                                        </button>
                                                    </a>
                                                </div>
                                            </div>
                                            <div style="text-align: center;">
                                                <h3><?php echo $item['item_name'] ?></h3>
                                                <h5 style="color: red;">Rs <strike><?php echo $item['price'] ?></strike>
                                                </h5>
                                                <h5>Rs <?php echo $item['discounted_price'] ?></h5>
                                            </div>
                                        </div>

                                        <?php
                                        $counter++;
                                    }
                                    ?>
                                </div>

                            </div>
                            <a class="left carousel-control" href="#<?php echo $subcategory['sub_category_name'] ?>"
                               role="button" style="width: 0px;" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left slider"></span>
                            </a>
                            <a class="right carousel-control" href="#<?php echo $subcategory['sub_category_name'] ?>"
                               style="width: 0px;" role="button" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right slider"></span>
                            </a>
                        </div> <!-- /thumbcarousel -->
                    </div><!-- /clearfix -->
                </div>
            <?php }
        }
        ?>

    </div>

    <div style="height: 200px;"></div>
    <?php require('footer.php') ?>
</div>
</body>
</html>