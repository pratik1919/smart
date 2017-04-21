<?php
/**
 * Created by PhpStorm.
 * User: Pratik
 * Date: 6/19/2016
 * Time: 1:24 PM
 */

?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Smart Gallery</title>
</head>

<body>
<div class="wrapper">

    <?php require('header.php') ?>

    <div style="height: 150px;"></div>

    <div class="container">


        <fieldset>
            <legend><h3 class="catagory">Search Result</h3></legend>
        </fieldset>
        <?php
        $searchItem = $_POST['searchItem'];
        $itemList = searchItem($connection,$searchItem);

        if(count($itemList)==null){
            echo 'No result found';
        }
        else {
            foreach ($itemList as $item) {
                ?>

                <div class="col-lg-3 col-md-3 col-sm-3 productBox" style="margin-top: 10px">
                    <div id="box" style="background-image: url('itemImages/<?php echo $item['image']?>')">
                    </div>
                    <div class="row white" style="margin: 0px">
                        <h4><?php echo $item['item_name'] ?></h4>
                        <div class="col-md-6 col-sm-6 col-lg-6" style="text-align: left;">
                            <a href="display_product.php?p_id=<?php echo $item['id']?>"><span class="btn btn-default">Buy</span></div></a>
                        <div class="col-md-6 col-sm-6 col-lg-6" style="text-align: right;">
                            <?php
                            if($item['price'] != ""){
                                ?>
                                <strike>Rs. <?php echo $item['price'] ?>/-</strike>
                                <?php
                            }else{
                                ?>
                                Fixed
                                <?php
                            }
                            ?>
                            <br>
                            Rs <?php echo $item['discounted_price'] ?>/-</div>
                    </div>
                </div>


            <?php
            }
        }
        ?>

    </div>
    <div style="height: 300px;"></div>
    <?php require('footer.php') ?>
</div>

</body>
</html>
