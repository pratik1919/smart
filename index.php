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


<form action="buy.php" id="read" method="post">
    <input type="hidden" id="positionId" name="positionId"/>
    <input type="hidden" value="news" name="content"/>
</form>

<div class="wrapper">
    <?php include('header.php');

    if (isset($_SESSION['username'])) {
        ?>
        <div class="changeBtnDiv">
            <a href="editSlider.php"><button class="btn btn-default glyphicon glyphicon-pencil">
            </button>
            </a>
        </div>
        <?php
    }
    ?>

    <div class="ism-slider" data-transition_type="zoom" data-play_type="loop" data-radios="false" id="my-slider">
        <ol>
        <?php
        $slider = getSlider($connection);
        while($row = $slider->fetch_assoc()){
            ?>
            <li>
                <img src="img/<?php echo $row['photo']; ?>">
                <div class="ism-caption ism-caption-0"><h1><?php echo $row['description']; ?></h1></div>
            </li>
        <?php
        }
        ?>

<!--            <li>-->
<!--                <img src="img/flower-729514_1280.jpg">-->
<!--                <div class="ism-caption ism-caption-0">My slide caption text</div>-->
<!--            </li>-->
<!--            <li>-->
<!--                <img src="img/beautiful-701678_1280.jpg">-->
<!--                <div class="ism-caption ism-caption-0">My slide caption text</div>-->
<!--            </li>-->
<!--            <li>-->
<!--                <img src="img/summer-192179_1280.jpg">-->
<!--                <div class="ism-caption ism-caption-0">My slide caption text</div>-->
<!--            </li>-->
<!--            <li>-->
<!--                <img src="img/city-690332_1280.jpg">-->
<!--                <div class="ism-caption ism-caption-0">My slide caption text</div>-->
<!--            </li>-->
<!--            <li>-->
<!--                <img src="img/bora-bora-685303_1280.jpg">-->
<!--                <div class="ism-caption ism-caption-0">My slide caption text</div>-->
<!--            </li>-->
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
    <div class="col-md-4 col-sm-4 col-lg-4 featured">
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
    </div>


    <div class="footer">
        <?php require('footer.php') ?>
    </div>

</div>

<script type="text/javascript">
    (function ($) {
        $(document).ready(function () {

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

    function submitForm(item) {
        var pos = $(item).attr("id");
        document.getElementById('positionId').value = pos;
        var id = '#read';
        $(id).submit();
    }


</script>


<script>
    new UISearch(document.getElementById('sb-search'));
</script>

</body>
</html>