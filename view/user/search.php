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
    <title>CareShopNepal</title>
</head>

<body>
<div class="wrapper" style="background: rgba(202, 83, 63, 0.27); color: #630b0b;">

    <?php require('../layout/header.php') ?>

    <div style="height: 150px;"></div>

    <div class="container">


        <fieldset>
            <legend><h3 class="catagory" style="font-family: 'Pacifico', cursive;">Search Result</h3></legend>
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

                <div class="col-lg-3" data-target="#carousel" data-slide-to="0">
                    <div id="box" style="background-image: url('../../itemImages/<?php echo $item['image']?>')">
                        <div id="overlay">
                            <a href="displayProductView.php?p_id=<?php echo $item['id']?>">
                                <button class="btn btn-success"><span class="glyphicon glyphicon-eye-open"></span> View
                                </button>
                            </a>
                        </div>
                    </div>
                    <div style="text-align: center;">
                        <h3><?php echo $item['item_name'] ?></h3>
                        <h4><strike>Rs. <?php echo $item['price'] ?>/-</strike></h4>
                        <h5>Rs.<?php echo $item['discounted_price']?> /-</h5>
                    </div>
                </div>

            <?php
            }
        }
        ?>

    </div>
    <div style="height: 300px;"></div>
    <?php require('../layout/footer.php') ?>
</div>

</body>
</html>
