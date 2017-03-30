<!DOCTYPE html>

<?php
include("config/db_connect.php");

$i_id = $_GET['p_id'];


$select_item = "select * from item WHERE id = '$i_id'";
$result = mysqli_query($connection, $select_item);


if (mysqli_num_rows($result) > 0) {
    while ($row_query = mysqli_fetch_array($result)) {
        $item_name = $row_query['item_name'];
        $item_price = $row_query['price'];
        $item_discounted_price = $row_query['discounted_price'];
        $item_description = $row_query['description'];
        $item_image = $row_query['image'];
    }
}

?>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>CareShopNepal</title>
    <link rel="icon" href="img/csnLogo.png" type="image/png" sizes="16x16">
    <script type="text/javascript">

        function validate(){
            var valid = false;
            valid = validateName();
            if(valid == true){
                valid = validatePhone();
            }
            return valid;
        }

        function validateName() {
            var name = $('#name').val();
            var alpha = /^[a-zA-Z\s ]+$/;
            //alert("1");
            var flag = false;

            if (!name.match(alpha)) {
                //alert('Invalid');
                $('#error-name').attr('hidden', false);
                flag = false;
                return flag;
            } else {
                $('#error-name').attr('hidden', true);
                flag = true;
                return flag;
            }
        }

        function validatePhone() {
            var contact = $('#contact').val();
            var beta = /^[0-9]+$/;

            var flag2 = false;
            //alert("1");

            if (!contact.match(beta)) {
                //alert('Invalid');
                $('#error-contact1').attr('hidden', false);
                $('#error-contact').attr('hidden', true);
                flag2 = false;
                return flag2;
            } else if (contact.length>10 || contact.length <10){
                $('#error-contact').attr('hidden', false);
                $('#error-contact1').attr('hidden', true);
                flag2 = false;
                return flag2;
            }else {
                $('#error-contact1').attr('hidden', true);
                $('#error-contact').attr('hidden', true);
                flag2 = true;
                return flag2;
            }
        }

    </script>

</head>

<body>

<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<div class="wrapper" style="background: rgba(202, 83, 63, 0.27); color: #630b0b;">


    <?php require('header.php') ?>
    <div class="row" style="height: 100px"></div>

    <div class="add" style="float:left; left: 1px;">
        <?php $advertisement = getAdvertisement($connection,0);

        ?>
        <?php if($advertisement!=null){ ?>

            <img src="advertisement/<?php echo $advertisement['advertise_image']?>">

        <?php } ?>
    </div>

    <div class="add" style="float:right; right: 1px;">

        <?php $advertisement = getAdvertisement($connection,1);

        ?>
        <?php if($advertisement){ ?>

            <img src="advertisement/<?php echo $advertisement['advertise_image']?>">

        <?php } ?>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="product">
                    <img class="magniflier" src="itemImages/<?php echo $item_image?>" height="450px" width="100%"/>
                </div>
            </div>
            <div class="col-lg-4"
                 style="font-family: 'Comfortaa', cursive; color: white; background-color: rgba(49, 63, 59, 0.58);">
                <h1><?php echo $item_name?></h1>
                <div class="row">
                    <div class="col-md-6">
                        <h5 style="color: red;"><strong>Rs <strike><?php echo $item_price?>/-</strike></strong></h5>
                        <h4><?php echo $item_discounted_price?>/-</h4>
                    </div>
                    <div class="col-lg-6" style="text-align: right;">
                        <!-- Your share button code -->
                        <div class="fb-share-button"
                             data-href="http://careshopnepal.com/view/user/displayProductView.php?p_id=<?php echo $i_id ?>"
                             data-layout="button_count">
                        </div>

                    </div>
                </div>                <h2>Description</h2>
                <p style="font-family: 'Comfortaa', cursive;"><?php echo $item_description?> </p>
            </div>
            <div class="col-lg-4">
                <fieldset>
                    <legend>Order Now</legend>

                    <form method="post" action="order.php" class="form-horizontal" onsubmit="return validate()">
                        <div class="form-group">
                            <label class="control-label col-sm-4">Delivery Address<span
                                        style="color:red;"> *</span></label>

                            <div class="col-sm-8">
                                <input type="hidden" name="p_id" value="<?php echo $_GET['p_id'] ?>"/>
                                <input type="text" class="form-control" name="deliveryAddress" id="title" required/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-4">With in: <span style="color:red;"> *</span></label>

                            <div class="col-sm-8">
                                <input type="date" class="form-control" name="date" id="date" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-4">Name.<span style="color:red;"> *</span></label>

                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="name" id="name" required>
                                <span hidden="true" id="error-name">Name cannot contain non-character alphabets.</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-4">Contact No.<span style="color:red;"> *</span></label>

                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="contact" id="contact" required>
                                <span hidden="true" id="error-contact">Contact No. must be 10 digit.</span>
                                <span hidden="true" id="error-contact1">Contact No. must not contain non-digits.</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-4">Quantity<span style="color:red;"> *</span></label>

                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="quantity" id="title" value="1" required>
                            </div>

                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4">Any Query?<span style="color:red;"> *</span></label>

                            <div class="col-sm-8">
                                <textarea type="number" class="form-control" name="query" id="title"></textarea>
                            </div>
                            <label class="control-label"></label>
                        </div>
                        <div>
                            <input style="float: right;" type="submit" class="btn btn-primary" id="save" name="order"/>
                        </div>
                    </form>
                </fieldset>
            </div>
        </div>
        <hr/>


        <h3 id="catagory" style="font-family: 'Pacifico', cursive;">You May also like</h3>


        <div class="row">

            <div class="clearfix">
                <div id="<?php echo $pro_category_name ?>" class="carousel slide" data-interval="false">
                    <div class="carousel-inner">
                        <div class="item active">
                            <?php

                            $category = getCategoryByItem($connection,$_GET['p_id']);

                            $likeList = getLikeItem($connection,$category['c_id'],$_GET['p_id']);

                            $counter = 0;
                            foreach($likeList as $item){
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
                                        <h3><?php echo $item['item_name'] ?></h3>
                                        <h5 style="color: red;">Rs <strike><?php echo $item['price'] ?></strike></h5>
                                        <h5>Rs <?php echo $item['discounted_price'] ?></h5>
                                    </div>
                                </div>

                                <?php
                                $counter++;
                            }
                            ?>
                        </div>
                        <!-- /item -->

                        <div class="item">
                            <?php

                            $category = getCategoryByItem($connection,$_GET['p_id']);

                            $likeList = getLikeItem($connection,$category['c_id'],$_GET['p_id']);

                            $counter = 0;
                            foreach($likeList as $item){
                                ?>

                                <div class="col-lg-3" data-target="#carousel" data-slide-to="<?php $counter ?>">
                                    <div id="box"
                                         style="background-image: url('../../itemImages/<?php echo $item['image'] ?>')">
                                        <div id="overlay">
                                            <a href="display_product.php?p_id=<?php echo $item['item_name'] ?>">
                                                <button class="btn btn-success"><span
                                                            class="glyphicon glyphicon-eye-open"></span> View
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                    <div style="text-align: center;">
                                        <h3><?php echo $item['item_name'] ?></h3>
                                        <h5 style="color: red;">Rs <strike><?php echo $item['price'] ?></strike></h5>
                                        <h5>Rs <?php echo $item['discounted_price'] ?></h5>
                                    </div>
                                </div>

                                <?php
                                $counter++;
                            }
                            ?>
                        </div>
                        <!-- /item -->

                    </div>
                    <!-- /carousel-inner -->
                    <a class="left carousel-control" href="#<?php echo $pro_category_name ?>" role="button"
                       style="width: 0px;" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left slider"></span>
                    </a>
                    <a class="right carousel-control" href="#<?php echo $pro_category_name ?>" style="width: 0px;"
                       role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right slider"></span>
                    </a>
                </div>
                <!-- /thumbcarousel -->
            </div>
            <!-- /clearfix -->
        </div>

    </div>

    <script type="text/javascript">
        $(function () {

            var native_width = 0;
            var native_height = 0;
            var mouse = {x: 0, y: 0};
            var magnify;
            var cur_img;

            var ui = {
                magniflier: $('.magniflier')
            };

            // Add the magnifying glass
            if (ui.magniflier.length) {
                var div = document.createElement('div');
                div.setAttribute('class', 'glass');
                ui.glass = $(div);

                $('body').append(div);
            }


            // All the magnifying will happen on "mousemove"

            var mouseMove = function (e) {
                var $el = $(this);

                // Container offset relative to document
                var magnify_offset = cur_img.offset();

                // Mouse position relative to container
                // pageX/pageY - container's offsetLeft/offetTop
                mouse.x = e.pageX - magnify_offset.left;
                mouse.y = e.pageY - magnify_offset.top;

                // The Magnifying glass should only show up when the mouse is inside
                // It is important to note that attaching mouseout and then hiding
                // the glass wont work cuz mouse will never be out due to the glass
                // being inside the parent and having a higher z-index (positioned above)
                if (
                    mouse.x < cur_img.width() &&
                    mouse.y < cur_img.height() &&
                    mouse.x > 0 &&
                    mouse.y > 0
                ) {

                    magnify(e);
                }
                else {
                    ui.glass.fadeOut(100);
                }


            };

            var magnify = function (e) {

                // The background position of div.glass will be
                // changed according to the position
                // of the mouse over the img.magniflier
                //
                // So we will get the ratio of the pixel
                // under the mouse with respect
                // to the image and use that to position the
                // large image inside the magnifying glass

                var rx = Math.round(mouse.x / cur_img.width() * native_width - ui.glass.width() / 2) * -1;
                var ry = Math.round(mouse.y / cur_img.height() * native_height - ui.glass.height() / 2) * -1;
                var bg_pos = rx + "px " + ry + "px";

                // Calculate pos for magnifying glass
                //
                // Easy Logic: Deduct half of width/height
                // from mouse pos.

                // var glass_left = mouse.x - ui.glass.width() / 2;
                // var glass_top  = mouse.y - ui.glass.height() / 2;
                var glass_left = e.pageX - ui.glass.width() / 2;
                var glass_top = e.pageY - ui.glass.height() / 2;
                //console.log(glass_left, glass_top, bg_pos)
                // Now, if you hover on the image, you should
                // see the magnifying glass in action
                ui.glass.css({
                    left: glass_left,
                    top: glass_top,
                    backgroundPosition: bg_pos
                });


            };

            $('.magniflier').on('mousemove', function () {
                ui.glass.fadeIn(100);

                cur_img = $(this);

                var large_img_loaded = cur_img.data('large-img-loaded');
                var src = cur_img.data('large') || cur_img.attr('src');

                // Set large-img-loaded to true
                // cur_img.data('large-img-loaded', true)

                if (src) {
                    ui.glass.css({
                        'background-image': 'url(' + src + ')',
                        'background-repeat': 'no-repeat'
                    });
                }

                // When the user hovers on the image, the script will first calculate
                // the native dimensions if they don't exist. Only after the native dimensions
                // are available, the script will show the zoomed version.
                //if(!native_width && !native_height) {

                if (!cur_img.data('native_width')) {
                    // This will create a new image object with the same image as that in .small
                    // We cannot directly get the dimensions from .small because of the
                    // width specified to 200px in the html. To get the actual dimensions we have
                    // created this image object.
                    var image_object = new Image();

                    image_object.onload = function () {
                        // This code is wrapped in the .load function which is important.
                        // width and height of the object would return 0 if accessed before
                        // the image gets loaded.
                        native_width = image_object.width;
                        native_height = image_object.height;

                        cur_img.data('native_width', native_width);
                        cur_img.data('native_height', native_height);

                        //console.log(native_width, native_height);

                        mouseMove.apply(this, arguments);

                        ui.glass.on('mousemove', mouseMove);
                    };


                    image_object.src = src;

                    return;
                } else {

                    native_width = cur_img.data('native_width');
                    native_height = cur_img.data('native_height');
                }
                //}
                //console.log(native_width, native_height);

                mouseMove.apply(this, arguments);

                ui.glass.on('mousemove', mouseMove);
            });

            ui.glass.on('mouseout', function () {
                ui.glass.off('mousemove', mouseMove);
            });
        });
    </script>

    <div style="height: 650px;"></div>

    <?php require('footer.php') ?>
</div>
</body>
</html>