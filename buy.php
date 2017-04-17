<?php
$pos = $_POST['positionId'];
?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Smart Gallery</title>
    <!--    <link rel="stylesheet" type="text/css" href="style.css"/>-->
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

<form action="buy.php" id="read" method="post">
    <input type="hidden" id="positionId" name="positionId"/>
    <input type="hidden" value="news" name="content"/>
</form>
<div id="wrapper">

    <div id="header">
        <?php include('header.php') ?>
    </div>

    <div id="content" class="container">
        <?php
        $prod = getProduct($pos, $connection);
        $row = $prod->fetch_assoc();
        ?>

        <div class="row" style="padding-top: 100px; padding-bottom: 100px; ">
            <div class="col-lg-6 col-md-6">
                <img src="img/<?php echo $row['photo']; ?>" height="400px" style="max-width: 100%" alt="">
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6" style="text-align: right;">
                <div class="row">


                <div class="col-lg-6 col-md-6 col-sm-6" style="text-align: left">
                    <h3><?php echo $row['name']; ?></h3>
                    <h3>Rs <?php echo $row['price']; ?>/-</h3>
                </div>
                <!-- Your share button code -->
                <div class="fb-share-button"
                     data-href="http://smartgallery/displayProductView.php?p_id=<?php echo $i_id ?>"
                     data-layout="button_count">
                </div>
                <div style="margin-top: 5px;">
                    <a href="https://twitter.com/share" class="twitter-share-button" data-show-count="false">Tweet</a><script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
                </div>
                </div>
                <fieldset style="margin-top: 10px;">
                    <legend>Order Now</legend>

                    <form method="post" action="order.php" class="form-horizontal" onsubmit="return validate()">
                        <div class="form-group">
                            <label class="control-label col-sm-4">Delivery Address<span
                                        style="color:red;"> *</span></label>

                            <div class="col-sm-8">
                                <input type="hidden" name="pname" value="<?php echo $row['name']; ?>"/>
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
            <div>
                <h2><?php echo $row['name']; ?></h2>
                <h4>Rs <?php echo $row['price']; ?>/-</h4>
                <p><?php echo $row['description']; ?></p>
            </div>
        </div>
    </div><!-- #content -->

    <div id="footer">
        <?php
        include 'footer.php';
        ?>
    </div><!-- #footer -->

</div><!-- #wrapper -->


<script type="text/javascript">


</script>


</body>

</html>

