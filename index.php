<?php
include('config/db_connect.php');

?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link rel="icon" href="img/logo.png" type="image/png" sizes="16x16">
    <link rel="stylesheet" href="css/component.css" type="text/css"/>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

<!--    slider-->
    <link rel="stylesheet" href="css/my-slider.css"/>
    <script src="js/ism-2.2.min.js"></script>




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
    <div class="col-md-4 col-sm-4 col-lg-4 featured">
        <?php
        $prod = getProduct("featured-1", $connection);
        $row = $prod->fetch_assoc();

        if (isset($_SESSION['username'])) {
            ?>
            <div class="changeBtnDiv">
                <button class="btn btn-default glyphicon glyphicon-pencil" data-position-id="featured-1"
                        data-toggle="modal" data-target="#addProductModal">
                </button>
            </div>
            <?php
        }
        ?>
        <img id="featured-1" onclick="submitForm(this)" src="img/<?php echo $row['photo']; ?>" alt="">
    </div>
    <div class="col-md-4 col-sm-4 col-lg-4 featured">
        <?php
        $prod = getProduct("featured-2", $connection);
        $row = $prod->fetch_assoc();

        if (isset($_SESSION['username'])) {
            ?>
            <div class="changeBtnDiv">
                <button class="btn btn-default glyphicon glyphicon-pencil" data-position-id="featured-2"
                        data-toggle="modal" data-target="#addProductModal">
                </button>
            </div>
            <?php
        }
        ?>
        <img id="featured-2" onclick="submitForm(this)" src="img/<?php echo $row['photo']; ?>" alt="">
    </div>
    <div class="col-md-4 col-sm-4 col-lg-4 featured" >
        <?php
        $prod = getProduct("featured-3", $connection);
        $row = $prod->fetch_assoc();

        if (isset($_SESSION['username'])) {
            ?>
            <div class="changeBtnDiv">
                <button class="btn btn-default glyphicon glyphicon-pencil" data-position-id="featured-3"
                        data-toggle="modal" data-target="#addProductModal">
                </button>
            </div>
            <?php
        }
        ?>
        <img id="featured-3" onclick="submitForm(this)" src="img/<?php echo $row['photo']; ?>" alt="">
    </div>


    <div class="container">

        <div class="row"></div>

        <div class="row">
            <legend class="title">Latest Products</legend>
            <div class="col-md-4 col-sm-4 col-lg-4 pad">

                <?php
                $prod = getProduct("LP-1", $connection);
                $row = $prod->fetch_assoc();
                ?>

                <div class="product"
                     style="height: 300px; background-image: url('img/<?php echo $row['photo']; ?>')">
                    <?php

                    if (isset($_SESSION['username'])) {
                        ?>
                        <div class="changeBtnDiv">
                            <button class="btn btn-default glyphicon glyphicon-pencil" data-position-id="LP-1"
                                    data-toggle="modal" data-target="#addProductModal">
                            </button>
                        </div>
                        <?php
                    }
                    ?>

                    <div class="overlay">
                        <h5><?php echo $row['name']; ?><br> <span
                                    style="font-size: 24px;">Rs <?php echo $row['price']; ?>/- </span><br>
                            <button class="btn btn-success" id="LP-1" onclick="submitForm(this)">Buy Now</button>
                        </h5>
                    </div>

                </div>
            </div>

            <div class="col-md-4 col-sm-4 col-lg-4 pad">
                <?php
                $prod = getProduct("LP-2", $connection);
                $row = $prod->fetch_assoc();
                ?>
                <div class="product"
                     style="height: 300px; background-image: url('img/<?php echo $row['photo']; ?>')">
                    <?php
                    if (isset($_SESSION['username'])) {
                        ?>
                        <div class="changeBtnDiv">
                            <button class="btn btn-default glyphicon glyphicon-pencil" data-position-id="LP-2"
                                    data-toggle="modal" data-target="#addProductModal">
                            </button>
                        </div>
                        <?php
                    }
                    ?>

                    <div class="overlay">
                        <h5><?php echo $row['name']; ?><br> <span
                                    style="font-size: 24px;">Rs <?php echo $row['price']; ?>/- </span><br>
                            <button class="btn btn-success" id="LP-2" onclick="submitForm(this)">Buy Now</button>
                        </h5>
                    </div>

                </div>
            </div>

            <div class="col-md-4 col-sm-4 col-lg-4 pad">
                <?php
                $prod = getProduct("LP-3", $connection);
                $row = $prod->fetch_assoc();
                ?>
                <div class="product" style="height: 300px; background-image: url('img/<?php echo $row['photo']; ?>')">
                    <?php

                    if (isset($_SESSION['username'])) {
                        ?>
                        <div class="changeBtnDiv">
                            <button class="btn btn-default glyphicon glyphicon-pencil" data-position-id="LP-3"
                                    data-toggle="modal" data-target="#addProductModal">
                            </button>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="overlay">
                        <h5><?php echo $row['name']; ?><br> <span
                                    style="font-size: 24px;">Rs <?php echo $row['price']; ?>/- </span><br>
                            <button class="btn btn-success" id="LP-3" onclick="submitForm(this)">Buy Now</button>
                        </h5>
                    </div>
                </div>
            </div>
        </div>


        <div class="product-section">
            <legend class="title">Best Sellers</legend>

            <div class="row best-seller">
                <?php
                $prod = getProduct("BS-1", $connection);
                $row = $prod->fetch_assoc();
                if (isset($_SESSION['username'])) {
                    ?>
                    <div class="changeBtnDiv">
                        <button class="btn btn-default glyphicon glyphicon-pencil" data-position-id="BS-1"
                                data-toggle="modal" data-target="#addProductModal">
                        </button>
                    </div>
                    <?php
                }
                ?>
                <div class="col-md-6 col-sm-6 col-lg-6">
                    <h1 class="title"><?php echo $row['name']; ?><br> <span
                                style="font-size: 24px;">Rs <?php echo $row['price']; ?>/- </span><br>
                        <button class="btn btn-success" id="BS-1" onclick="submitForm(this)">Buy Now</button>
                    </h1>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6">
                    <img src="img/<?php echo $row['photo']; ?>" alt="">
                </div>
            </div>

            <div class="row best-seller">
                <?php
                $prod = getProduct("BS-2", $connection);
                $row = $prod->fetch_assoc();
                if (isset($_SESSION['username'])) {
                    ?>
                    <div class="changeBtnDiv">
                        <button class="btn btn-default glyphicon glyphicon-pencil" data-position-id="BS-2"
                                data-toggle="modal" data-target="#addProductModal">
                        </button>
                    </div>
                    <?php
                }
                ?>
                <div class="col-md-6 col-sm-6 col-lg-6">
                    <h1 class="title"><?php echo $row['name']; ?><br> <span
                                style="font-size: 24px;">Rs <?php echo $row['price']; ?>/- </span><br>
                        <button class="btn btn-success" id="BS-2" onclick="submitForm(this)">Buy Now</button>
                    </h1>

                </div>
                <div class="col-md-6 col-sm-6 col-lg-6">
                    <img src="img/<?php echo $row['photo']; ?>" alt="">
                </div>
            </div>


            <div class="row best-seller">
                <?php
                $prod = getProduct("BS-3", $connection);
                $row = $prod->fetch_assoc();
                if (isset($_SESSION['username'])) {
                    ?>
                    <div class="changeBtnDiv">
                        <button class="btn btn-default glyphicon glyphicon-pencil" data-position-id="BS-3"
                                data-toggle="modal" data-target="#addProductModal">
                        </button>
                    </div>
                    <?php
                }
                ?>
                <div class="col-md-6 col-sm-6 col-lg-6">
                    <h1 class="title"><?php echo $row['name']; ?><br> <span
                                style="font-size: 24px;">Rs <?php echo $row['price']; ?>/- </span><br>
                        <button class="btn btn-success" id="BS-3" onclick="submitForm(this)">Buy Now</button>
                    </h1>

                </div>
                <div class="col-md-6 col-sm-6 col-lg-6">
                    <img src="img/<?php echo $row['photo']; ?>" alt="">
                </div>
            </div>

            <div class="row best-seller">
                <?php
                $prod = getProduct("BS-4", $connection);
                $row = $prod->fetch_assoc();
                if (isset($_SESSION['username'])) {
                    ?>
                    <div class="changeBtnDiv">
                        <button class="btn btn-default glyphicon glyphicon-pencil" data-position-id="BS-4"
                                data-toggle="modal" data-target="#addProductModal">
                        </button>
                    </div>
                    <?php
                }
                ?>
                <div class="col-md-6 col-sm-6 col-lg-6">
                    <h1 class="title"><?php echo $row['name']; ?><br> <span
                                style="font-size: 24px;">Rs <?php echo $row['price']; ?>/- </span><br>
                        <button class="btn btn-success" id="BS-4" onclick="submitForm(this)">Buy Now</button>
                    </h1>

                </div>
                <div class="col-md-6 col-sm-6 col-lg-6">
                    <img src="img/<?php echo $row['photo']; ?>" alt="">
                </div>
            </div>


            <div class="row best-seller">
                <?php
                $prod = getProduct("BS-5", $connection);
                $row = $prod->fetch_assoc();
                if (isset($_SESSION['username'])) {
                    ?>
                    <div class="changeBtnDiv">
                        <button class="btn btn-default glyphicon glyphicon-pencil" data-position-id="BS-5"
                                data-toggle="modal" data-target="#addProductModal">
                        </button>
                    </div>
                    <?php
                }
                ?>
                <div class="col-md-6 col-sm-6 col-lg-6">
                    <h1 class="title"><?php echo $row['name']; ?><br> <span
                                style="font-size: 24px;">Rs <?php echo $row['price']; ?>/- </span><br>
                        <button class="btn btn-success" id="BS-5" onclick="submitForm(this)">Buy Now</button>
                    </h1>

                </div>
                <div class="col-md-6 col-sm-6 col-lg-6">
                    <img src="img/<?php echo $row['photo']; ?>" alt="">
                </div>
            </div>


            <div class="row best-seller">
                <?php
                $prod = getProduct("BS-6", $connection);
                $row = $prod->fetch_assoc();
                if (isset($_SESSION['username'])) {
                    ?>
                    <div class="changeBtnDiv">
                        <button class="btn btn-default glyphicon glyphicon-pencil" data-position-id="BS-6"
                                data-toggle="modal" data-target="#addProductModal">
                        </button>
                    </div>
                    <?php
                }
                ?>
                <div class="col-md-6 col-sm-6 col-lg-6">
                    <h1 class="title"><?php echo $row['name']; ?><br> <span
                                style="font-size: 24px;">Rs <?php echo $row['price']; ?>/- </span><br>
                        <button class="btn btn-success" id="BS-6" onclick="submitForm(this)">Buy Now</button>
                    </h1>

                </div>
                <div class="col-md-6 col-sm-6 col-lg-6">
                    <img src="img/<?php echo $row['photo']; ?>" alt="">
                </div>
            </div>

        </div>


        <div class="row">


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

    $('#addProductModal').on('show.bs.modal', function (e) {
        var positionId = $(e.relatedTarget).data('position-id');
        $(e.currentTarget).find('input[name="positionId"]').val(positionId);

    });

    function submitForm(item){
        var pos = $(item).attr("id");
        document.getElementById('positionId').value = pos;
        var id = '#read';
        $(id).submit();
    };



</script>


<script>
    new UISearch( document.getElementById( 'sb-search' ) );
</script>

</body>
</html>