<?php
/**
 * Created by PhpStorm.
 * User: Pratik
 * Date: 6/19/2016
 * Time: 1:24 PM
 */

include('config/db_connect.php');

?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Smart Gallery</title>
 <link rel="icon" href="img/csnLogo.png" type="image/png" sizes="16x16">
</head>

<body>
<div class="wrapper">

    <?php require('header.php') ?>


    <div class="subCatMenu">
        Category:
        <?php
        $s_cat = subcat($_GET['cat'], $connection);
        while ($row = $s_cat->fetch_assoc()){
            ?>
            <a href="sub_cat_show.php?id=<?php echo $row['id']; ?>&subcat=<?php echo $row['sub_category_name']; ?>&cat=<?php echo $_GET['cat']; ?>"><?php echo ucwords($row['sub_category_name']); ?></a> /
            <?php
        }
        ?>
    </div>

    <div class="container">

        <fieldset>
            <legend><h3 class="catagory"><?php echo ucwords($_GET['subcat']); ?></h3></legend>
        </fieldset>
        <?php
        $id = $_GET['id'];
        $subcategoryList = getItemBySubCat($connection,$id);

        foreach($subcategoryList as $subcategory){?>

            <div class="col-lg-3 productBox">
                <div id="box" style="background-image: url('itemImages/<?php echo $subcategory['image']?>')">
                </div>
                <div class="row white" style="margin: 0px">
                    <h4><?php echo $subcategory['item_name'] ?></h4>
                    <div class="col-md-6 col-sm-6 col-lg-6" style="text-align: left;">
                        <a href="display_product.php?p_id=<?php echo $subcategory['id']?>"><span class="btn btn-default">Buy</span></div></a>
                    <div class="col-md-6 col-sm-6 col-lg-6" style="text-align: right;">
                        <?php
                        if($subcategory['price'] != ""){
                            ?>
                            <strike>Rs. <?php echo $subcategory['price'] ?>/-</strike>
                            <?php
                        }else{
                            ?>
                            Fixed
                            <?php
                        }
                        ?>
                        <br>
                        Rs <?php echo $subcategory['discounted_price']?>/-</div>
                </div>
            </div>

        <?php
        }
        ?>

    </div>
    <div style="height: 300px;"></div>
    <?php require('footer.php') ?>
</div>

</body>
</html>
