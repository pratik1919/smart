<?php
include('../../config/DatabaseConnection.php');
//    include('../../common/common.php');
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link rel="icon" href="../../img/csnLogo.png" type="image/png" sizes="16x16">
    <link rel="stylesheet" href="../../css/component.css" type="text/css"/>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.js"></script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>


    <!-- Start WOWSlider.com HEAD section -->
    <link rel="stylesheet" type="text/css" href="../../slider/engine1/style.css" />
    <script type="text/javascript" src="../../slider/engine1/jquery.js"></script>
    <!-- End WOWSlider.com HEAD section -->



    <!--fonts-->
    <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
    <!--fonts-->
    <script src="http://maps.googleapis.com/maps/api/js"></script>
    <style>
        .navbar{
            color: black;
            background-color: #ffffff;
            border-bottom: 3px solid darkblue;
            border-top: none;
            border-right: none;
            border-left: none;
        }
    </style>

    <script>

        var myCenter=new google.maps.LatLng(27.719231, 85.350376);

        function initialize()
        {
            var mapProp = {
                center:myCenter,
                zoom:10,
                mapTypeId:google.maps.MapTypeId.ROADMAP
            };

            var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

            var marker=new google.maps.Marker({
                position:myCenter
            });

            marker.setMap(map);

            var infowindow = new google.maps.InfoWindow({
                content:"CareShopNepal<br>Mobile Number 9849369369"
            });

            infowindow.open(map,marker);

        }

        google.maps.event.addDomListener(window, 'load', initialize);

    </script>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

</head>
<body>

<div class="wrapper" style="background: rgba(202, 83, 63, 0.27); color: #630b0b;">
    <?php include('../layout/header.php') ?>

    <div class="container" style="width: 1362px;">
        <div class="row featured-product">
            <div class="col-lg-2">
<!--                <ul class="nav nav-pills">-->
<!--                    <li class="">-->
<!--                        <ul class="dropdown-menu" style=" margin-top: -1px; border-radius: 0;">-->
<!--                            --><?php
//                            $categoryList = getCategory($connection);
//                            $subCategoryList = getSubCategory($connection);
//
//                            foreach($categoryList as $category)
//                            {?>
<!--                                <li>-->
<!--                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class=""></span> --><?php //echo $category["category_name"]?>
<!---->
<!--                                        <b class="caret"></b></a>-->
<!---->
<!--                                    <ul class="dropdown-menu sub-menu" style="height: 400px;">-->
<!---->
<!---->
<!--                                        --><?php
//
//                                        foreach($subCategoryList as $subCategory){
//
//                                            if($category["id"]==$subCategory["c_id"]) {?>
<!--                                                <div class="col-lg-3">-->
<!--                                                    <a href="subCategoryItemDisplay.php?id=--><?php //echo $subCategory['id']?><!--&subcat=--><?php //echo $subCategory['sub_category_name']?><!--" <li class="dropdown-header"><h5>--><?php //echo $subCategory["sub_category_name"] ?><!--</h5></li></a>-->
<!---->
<!--                                                    --><?php
//                                                    $itemList = getItemBySubCat($connection,$subCategory['id']);
//
//                                                    $count = count($itemList);
//
//                                                    foreach($itemList as $item){
//                                                        ?>
<!--                                                        <li><a href="displayProductView.php?p_id=--><?php //echo $item['id']?><!--">--><?php //echo $item['item_name']?><!--</a></li>-->
<!---->
<!--                                                    --><?php
//
//                                                    }
//
//                                                    if($count >=5){
//                                                        ?>
<!--                                                        <a href="subCategoryItemDisplay.php?id=--><?php //echo $subCategory['id']?><!--&subcat=--><?php //echo $subCategory['sub_category_name']?><!--">See more..</a>-->
<!--                                                        --><?php
//                                                    }
//                                                    ?>
<!---->
<!--                                                </div>-->
<!---->
<!--                                            --><?php
//                                            }
//
//                                        }?>
<!---->
<!---->
<!--                                    </ul></li>-->
<!--                            --><?php
//                            }
//                            ?>
<!--                        </ul>-->
<!---->
<!--                    </li>-->
<!--                </ul>-->
            </div>
            <div class="row nopadding">
                <!--            <!-- Start WOWSlider.com BODY section --> <!-- add to the <body> of your page -->
                <div id="wowslider-container1" style="height: 400px;">
                    <div class="ws_images">
  <ul>
                        <?php
                            $imageList = getImage($connection);

                            foreach($imageList as $image){
                                ?>
                              
                                    <li><img height="400px" width="100%" src="../../itemImages/<?php echo $image['image']?>" alt="1" title="<?php echo $image['item_name']?>" id="wows1_0"/></li>
                               
                        <?php
                            }
                        ?>
 </ul>
                    </div>
                    <div class="ws_bullets">
                        <div>
                            <?php
                            $imageList = getImage($connection);

                            foreach($imageList as $image){?>

                            <a href="#" title="<?php echo $image['item_name']?>"></a>

                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <script type="text/javascript" src="../../slider/engine1/wowslider.js"></script>
                <script type="text/javascript" src="../../slider/engine1/script.js"></script>
                <!-- End WOWSlider.com BODY section -->
            </div>
<!--            <div class="col-lg-3 nopadding" style="height: 400px;">-->
<!--                <div class="fb-page" data-href="https://www.facebook.com/Care-Shop-Nepal-971713859591068/" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/Care-Shop-Nepal-971713859591068/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Care-Shop-Nepal-971713859591068/">Care Shop Nepal</a></blockquote></div>-->
<!--            </div>-->
        </div>

    </div>

    <hr/>

    <div class="row" style="height: 30px;"></div>


    <div class="container" style="width: 1287px;">
        <div class="col-lg-2" style="padding: 0px; padding-right: 15px;">
            <div class="directNames">
<img height="125px" width="100%" src="../../img/asotv.png" alt=""/>
                <hr/>
                <img width="100%" height="60px" src="../../img/HOT.png" alt=""/>
                <ul>
                    <?php
                    $result = $connection->query("SELECT id, item_name FROM item");
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <li><a href="displayProductView.php?p_id=<?php echo $row['id'] ?>"><?php echo $row['item_name'] ?></a></li>
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
                ?>

                <div class="row">
                    <a href="categoryList.php?id=<?php echo $pro_id ?>" <h3 id="catagory" style="font-family: 'Pacifico', cursive;"><?php echo $pro_category_name ?></h3></a>
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

                                        <div class="col-lg-3" data-target="#carousel" data-slide-to="<?php $counter ?>">
                                            <div id="box" style="background-image: url('../../itemImages/<?php echo $pro_image?>')">
                                                <div id="overlay">
                                                    <a href="displayProductView.php?p_id=<?php echo $pro_id?>">
                                                        <button class="btn btn-success"><span
                                                                class="glyphicon glyphicon-eye-open"></span> View
                                                        </button>
                                                    </a>
                                                </div>
                                            </div>
                                            <div style="text-align: center;">
                                                <h3><?php echo $pro_item_name ?></h3>
                                                
                                                <?php if($pro_price){ ?>
                                                <h5 style="color: red;">Rs <strike><?php echo $pro_price ?></strike></h5>
                                                <?php } ?> 
                                                <h5>Rs <?php echo $pro_discount_price ?></h5>
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

                                        <div class="col-lg-3" data-target="#carousel" data-slide-to="<?php $counter ?>">
                                            <div id="box" style="background-image: url('../../itemImages/<?php echo $pro_image?>')">
                                                <div id="overlay">
                                                    <a href="displayProductView.php?p_id=<?php echo $pro_id?>">
                                                        <button class="btn btn-success"><span
                                                                class="glyphicon glyphicon-eye-open"></span> View
                                                        </button>
                                                    </a>
                                                </div>
                                            </div>
                                            <div style="text-align: center;">
                                                <h3><?php echo $pro_item_name ?></h3>
                                               
                                                <h5 style="color: red;">Rs <strike><?php echo $pro_price ?></strike></h5>
                                                
                                                <h5>Rs <?php echo $pro_discount_price ?></h5>
                                            </div>
                                        </div>

                                        <?php
                                        $counter++;
                                    }
                                    ?>
                                </div><!-- /item -->

                            </div><!-- /carousel-inner -->
                            <a class="left carousel-control" href="#<?php echo $pro_category_name ?>" role="button" style="width: 0px;" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left slider"></span>
                            </a>
                            <a class="right carousel-control" href="#<?php echo $pro_category_name ?>" style="width: 0px;" role="button" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right slider"></span>
                            </a>
                        </div> <!-- /thumbcarousel -->
                    </div><!-- /clearfix -->
                </div>
            <?php } ?>

        </div>
    </div>

    <div style="height: 650px;"></div>

    <div class="footer">
        <?php require('../layout/footer.php') ?>
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