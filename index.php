<?php
include('config/db_connect.php');

?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link rel="icon" href="img/csnLogo.png" type="image/png" sizes="16x16">
    <link rel="stylesheet" href="css/component.css" type="text/css"/>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

<!--    slider-->
    <link rel="stylesheet" href="css/my-slider.css"/>
    <script src="js/ism-2.2.min.js"></script>



    <script type="text/javascript">
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

</head>
<body>

<div class="wrapper">
    <?php include('header.php') ?>

    <div class="ism-slider" data-transition_type="zoom" data-play_type="loop" data-radios="false" id="my-slider">
        <ol>
            <li>
                <img src="img/flower-729514_1280.jpg">
                <div class="ism-caption ism-caption-0">My slide caption text</div>
            </li>
            <li>
                <img src="img/beautiful-701678_1280.jpg">
                <div class="ism-caption ism-caption-0">My slide caption text</div>
            </li>
            <li>
                <img src="img/summer-192179_1280.jpg">
                <div class="ism-caption ism-caption-0">My slide caption text</div>
            </li>
            <li>
                <img src="img/city-690332_1280.jpg">
                <div class="ism-caption ism-caption-0">My slide caption text</div>
            </li>
            <li>
                <img src="img/bora-bora-685303_1280.jpg">
                <div class="ism-caption ism-caption-0">My slide caption text</div>
            </li>
        </ol>
    </div>



    <div class="container" style="width: 1287px;">
        <div class="col-lg-2" style="padding: 0px; padding-right: 15px;">
            <div class="directNames">
                <img height="125px" width="100%" src="img/asotv.png" alt=""/>
                <hr/>
                <img width="100%" height="60px" src="img/HOT.png" alt=""/>
                <ul>
                    <?php
                    $result = $connection->query("SELECT id, item_name FROM item");
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <li><a href="display_product.php?p_id=<?php echo $row['id'] ?>"><?php echo $row['item_name'] ?></a></li>
                    <?php  } ?>
                </ul>
            </div>
        </div>

        <div class="col-lg-10">


            <?php

            $get_pro = "select * from category";
            $run_pro = mysqli_query($connection, $get_pro);
            while ($row_pro = mysqli_fetch_array($run_pro)) {
                $pro_category_name = $row_pro['category_name'];
                $pro_id = $row_pro['id'];

                $count = getProductCount($connection, $pro_id);

                if ($count) {
                    ?>

                    <div class="row">
                        <a href="category_list.php?id=<?php echo $pro_id ?>"
                        <h3 id="catagory"
                            style="font-family: 'Pacifico', cursive;"><?php echo $pro_category_name ?></h3></a>
                        <div class="clearfix">
                            <div id="<?php echo $pro_category_name ?>" class="carousel slide" data-interval="false">
                                <div class="carousel-inner">
                                    <div class="item active">
                                        <?php
                                        $counter = 0;
                                        $get_pro1 = "select * from item WHERE c_id='$pro_id' order by RAND() LIMIT 4";
                                        $run_pro1 = mysqli_query($connection, $get_pro1);
                                        while ($row_pro = mysqli_fetch_array($run_pro1)) {
                                            $pro_id = $row_pro['id'];
                                            $pro_item_name = $row_pro['item_name'];
                                            $pro_image = $row_pro['image'];
                                            $pro_price = $row_pro['price'];
                                            $discount = $row_pro['discount'];
                                            $pro_discount_price = $row_pro['discounted_price'];
                                            ?>

                                            <div class="col-lg-3" data-target="#carousel"
                                                 data-slide-to="<?php $counter ?>">
                                                <div id="box"
                                                     style="background-image: url('itemImages/<?php echo $pro_image ?>')">
                                                    <div id="overlay">
                                                        <a href="display_product.php?p_id=<?php echo $pro_id ?>">
                                                            <button class="btn btn-success"><span
                                                                        class="glyphicon glyphicon-eye-open"></span>
                                                                View
                                                            </button>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div style="text-align: center;">
                                                    <h3><?php echo$pro_item_name ?></h3>
                                                    <?php
                                                    if ($pro_discount_price < $pro_price){
                                                        ?>

                                                        <h5 style="color: red;">Rs <strike><?php echo $pro_price ?></strike>
                                                        </h5>

                                                        <h5>Rs <?php echo $pro_discount_price ?></h5>
                                                        <?php
                                                    }else {
                                                        ?>
                                                        <h5>Rs <?php echo $pro_discount_price ?></h5>

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
                                        $get_pro1 = "select * from item WHERE id BETWEEN 0 AND 4 order by RAND()";

                                        $run_pro1 = mysqli_query($connection, $get_pro1);

                                        while ($row_pro = mysqli_fetch_array($run_pro1)) {
                                            $pro_id = $row_pro['id'];
                                            $pro_item_name = $row_pro['item_name'];
                                            $pro_image = $row_pro['image'];
                                            $pro_price = $row_pro['price'];
                                            $pro_discount_price = $row_pro['discounted_price'];
                                            ?>

                                            <div class="col-lg-3" data-target="#carousel"
                                                 data-slide-to="<?php $counter ?>">
                                                <div id="box"
                                                     style="background-image: url('itemImages/<?php echo $pro_image ?>')">
                                                    <div id="overlay">
                                                        <a href="display_product.php?p_id=<?php echo $pro_id ?>">
                                                            <button class="btn btn-success"><span
                                                                        class="glyphicon glyphicon-eye-open"></span>
                                                                View
                                                            </button>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div style="text-align: center;">
                                                    <h3><?php echo$pro_item_name ?></h3>
                                                    <?php
                                                    if ($pro_discount_price < $pro_price){
                                                        ?>

                                                        <h5 style="color: red;">Rs <strike><?php echo $pro_price ?></strike>
                                                        </h5>

                                                        <h5>Rs <?php echo $pro_discount_price ?></h5>
                                                        <?php
                                                    }else {
                                                        ?>
                                                        <h5>Rs <?php echo $pro_discount_price ?></h5>

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

                                </div><!-- /carousel-inner -->
                                <a class="left carousel-control" href="#<?php echo $pro_category_name ?>" role="button"
                                   style="width: 0px;" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left slider"></span>
                                </a>
                                <a class="right carousel-control" href="#<?php echo $pro_category_name ?>"
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
    </div>



    <div style="height: 650px;"></div>

    <div class="footer">
        <?php require('footer.php') ?>
    </div>

</div>

<script type="text/javascript">
    (function ($) {
        $(document).ready(function(){

            // hide .navbar first
            $(".menu").hide();

            // fade in .navbar
            $(function () {
                $(window).scroll(function () {
                    // set distance user needs to scroll before we fadeIn navbar
                    if ($(this).scrollTop() > 200) {
                        $('.menu').fadeIn();
                    } else {
                        $('.menu').fadeOut();
                    }
                });
            });
        });
    }(jQuery));

</script>


<script>
    new UISearch( document.getElementById( 'sb-search' ) );
</script>

</body>
</html>