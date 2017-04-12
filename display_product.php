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
    <title>Smart Gallery</title>
    <link rel="icon" href="img/logo.png" type="image/png" sizes="16x16">
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
<div class="wrapper">


    <?php require('header.php') ?>
    <div class="row" style="height: 50px"></div>

    <div class="add">

        <?php $advertisement = getAdvertisement($connection,1);

        ?>
        <?php if($advertisement){ ?>

            <img src="advertisement/<?php echo $advertisement['advertise_image']?>">

        <?php } ?>
    </div>


    <div class="container">


        <div class="row">
            <div class="col-lg-6">
                <div class="product">
                    <img class="magniflier" style="border-radius:0px;" src="itemImages/<?php echo $item_image?>" height="550px" width="100%"/>
                </div>
            </div>
            <div class="col-lg-6">
                <div style="padding: 2px 15px 5px 15px ;">
                    <h1><?php echo $item_name?></h1>
                    <div class="row">
                        <div class="col-md-6">
                            <?php
                            if($item_price != ""){
                                ?>
                                <h5><strike>Rs. <?php echo $item_price; ?>/-</strike></h5>
                                <?php
                            }else{
                                ?>
                                <h5>Fixed</h5>
                                <?php
                            }
                            ?>
                            <h3>Rs <?php echo $item_discounted_price?>/-</h3>
                        </div>
                        <div class="col-lg-6" style="text-align: right;">
                            <!-- Your share button code -->
                            <div class="fb-share-button"
                                 data-href="http://smartgallery/displayProductView.php?p_id=<?php echo $i_id ?>"
                                 data-layout="button_count">
                            </div>
                            <div style="margin-top: 5px;">
                                <a href="https://twitter.com/share" class="twitter-share-button" data-show-count="false">Tweet</a><script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
                            </div>
                        </div>
                    </div>
                </div>
                <fieldset style="margin-top: 10px;">
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
                            <input style="float: right;" type="submit" value="Order" class="btn btn-primary" id="save" name="order"/>
                        </div>
                    </form>
                </fieldset>
            </div>
        </div>


        <div class="bg-info" style="padding: 10px; margin-top: 20px;">
            <h2>Description</h2>
            <p><?php echo $item_description?> </p>
        </div>
        <hr/>


    </div>


    <?php require('footer.php') ?>
</div>
</body>
</html>