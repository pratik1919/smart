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
        <?php
        $s_cat = subcat($_GET['cat'], $connection);
        while ($row = $s_cat->fetch_assoc()){
            ?>
            <a href="sub_cat_show.php?id=<?php echo $row['id']; ?>&subcat=<?php echo $row['sub_category_name']; ?>&cat=<?php echo $_GET['cat']; ?>"><?php echo $row['sub_category_name']; ?></a> /
            <?php
        }
        ?>
    </div>

    <div class="container">

        <fieldset>
            <legend><h3 class="catagory"><?php echo $_GET['subcat']?></h3></legend>
        </fieldset>
        <?php
        $id = $_GET['id'];
        $subcategoryList = getItemBySubCat($connection,$id);

        foreach($subcategoryList as $subcategory){?>

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
    <div style="height: 300px;"></div>
    <?php require('footer.php') ?>
</div>

</body>
</html>
