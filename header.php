<?php
include('config/db_connect.php');
include('common/common.php');

$link = $connection->query("select * from link");
while ($row = $link->fetch_assoc()) {
    $facebook = $row['facebook'];
    $twitter = $row['twitter'];
    $youtube = $row['youtube'];
    $instagram = $row['instagram'];
}

?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">
    <title>Smart Gallery</title>
    <link rel="icon" href="img/csnLogo.png" type="image/png" sizes="16x16">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="bootstrap/css/bootstrap-social.css" rel="stylesheet" type="text/css">
    <link href="bootstrap/css/font-awesome.css" rel="stylesheet" type="text/css">
    <!--<link rel="stylesheet" href="../css/imageHoverStylesheet.css" type="text/css">-->
    <script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="js/subcategory.js" type="text/javascript"></script>
    <script src="js/category.js" type="text/javascript"></script>
    <script src="js/custom.js" type="text/javascript"></script>
    <script src="js/item.js" type="text/javascript"></script>
    <script src="js/jquery.noty.packaged.min.js"></script>

    <!--    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.js"></script>-->



    <style>
        .navbar {
            color: black;
            background-color: #ffffff;
            border-bottom: 3px solid darkblue;
            border-top: none;
            border-right: none;
            border-left: none;
        }

        .highlight {
            -webkit-box-shadow: 0px 6px 21px -6px rgba(0, 0, 0, 0.75);
            -moz-box-shadow: 0px 6px 21px -6px rgba(0, 0, 0, 0.75);
            box-shadow: 0px 6px 21px -6px #64AEDC;
        }

        .menu-icon{
            color: black;
        }
    </style>
<!--    <script type="text/javascript">-->
<!--        (function(d, s, id) {-->
<!--            var js, fjs = d.getElementsByTagName(s)[0];-->
<!--            if (d.getElementById(id)) return;-->
<!--            js = d.createElement(s); js.id = id;-->
<!--            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6";-->
<!--            fjs.parentNode.insertBefore(js, fjs);-->
<!--        }(document, 'script', 'facebook-jssdk'));-->
<!--    </script>-->

    <script type='text/javascript'>
        (function() { var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//d2yy16lkdmfg04.cloudfront.net/resource/facebookchat.js'; var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
        })(); window.embeddedChatFacebookAsyncInit = function() { embeddedChatFacebook.init("9205"); }
    </script>

</head>
<body>

<!--    add product model-->
<div id="addProductModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Product</h4>
            </div>
            <div class="modal-body">
                <form class="form" action="controller/c_addProduct.php" method="post" enctype="multipart/form-data">

                    <input type="hidden" name="positionId"/>

                    <div class="form-group">
                        <label for="">Name</label>
                        <input class="form-control" type="text" name="p_name" required="" id="p_name" onchange="return checkProductName();" />
                    </div>

                    <div class="form-group">
                        <label for="">Price</label>
                        <input class="form-control" type="text" name="price" required=""/>
                    </div>


                    <div class="form-group">
                        <label for="">Description</label><br/>
                        <textarea style="width: 100%;white-space: pre-wrap;" name="desc" id="" cols="30" rows="10"
                                  required=""></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Photo</label><br/>
                        <input type="file" name="photo" required/>
                    </div>

                    <input type="submit" value="Add" id="submit_btn" class="btn btn-success btn-block"/>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<div id="mySidenav" class="sidenav" style="z-index: 99">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <?php
    if (isset($_SESSION['username'])) {
        ?>
        <a href="logout.php">Logout</a>
        <a href="password.php">Change Password</a>
        <?php
    }
    ?>


    <?php
    $categoryList = getCategory($connection);
    $subCategoryList = getSubCategory($connection);

    foreach ($categoryList as $category) {
        ?>

        <a href="category_list.php?id=<?php echo $category['id'] ?>"<span
                class=""></span> <?php echo $category["category_name"] ?>
        </a>

        <ul class="dropdown-menu sub-menu" style="height: 400px;">


            <?php

            foreach ($subCategoryList as $subCategory) {

                if ($category["id"] == $subCategory["c_id"]) { ?>
                    <div class="col-lg-3">
                        <a href="sub_cat_show.php?id=<?php echo $subCategory['id'] ?>&subcat=<?php echo $subCategory['sub_category_name'] ?>"
                        <li class="dropdown-header"><h5><?php echo $subCategory["sub_category_name"] ?></h5></li>
                        </a>

                        <?php
                        $itemList = getItemBySubCat($connection, $subCategory['id']);

                        $count = count($itemList);

                        foreach ($itemList as $item) {
                            ?>
                            <li>
                                <a href="display_product.php?p_id=<?php echo $item['id'] ?>"><?php echo $item['item_name'] ?></a>
                            </li>

                            <?php

                        }

                        if ($count >= 5) {
                            ?>
                            <a href="sub_cat_show.php?id=<?php echo $subCategory['id'] ?>&subcat=<?php echo $subCategory['sub_category_name'] ?>">See
                                more..</a>
                            <?php
                        }
                        ?>
                    </div>

                    <?php
                }

            }
            ?>
        </ul>
        <?php
    }
    ?>

</div>
<div id="main">
    <span class="menu-icon" style="font-size:30px;cursor:pointer;" onclick="openNav()">&#9776;</span>
    <span><a href="index.php"><img src="img/logo.png" height="70px" alt=""></a></span>
</div>
<div class="dropup" style="position: fixed; bottom: 40px; right: 5px; z-index: 10000000">
    <button style="background-color: yellow;" class="btn dropdown-toggle" type="button" data-toggle="dropdown">
        <span class="fa fa-dollar"> Sell Your Product</span></button>
    <div class="dropdown-menu" style="margin-left: -343px; width: 342px;">
        <div style="padding: 10px;">
            <legend>Sell your product</legend>
            <form action="controller/sellYourProduct.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Product Name</label>
                    <input type="text" class="form-control" name="name" required>
                </div>

                <div class="form-group">
                    <label for="">Description</label> <br>
                    <textarea class="form-control" name="desc" id="" cols="30" rows="10"></textarea>
                </div>

                <div class="form-group">
                    <label for="">Product Photo</label>
                    <input class="form-group" type="file" name="photo" required>
                </div>

                <div class="form-group">
                    <label for="">Contact no.</label>
                    <input class="form-control" type="number" name="contact" required>
                </div>

                <input class="btn btn-success btn-block" type="submit" name="submit" value="Send Us Your Product">
            </form>
        </div>
    </div>
</div>



<div class="top-info">
    <h6 style="padding: 9px; display: inline-block;">mobile / viber / imo:- 9801891313</h6>


    <ul class="nav navbar-nav noStyle">
        <li>
            <form class="navbar-form" role="search" action="search.php" method="post">
                <div class="input-group search">
                    <input type="text" class="form-control" placeholder="Search" name="searchItem">
                    <div class="input-group-btn">
                        <button style="height: 34px;" class="btn btn-default" type="submit" name="submit"
                                value="submit"><i class="glyphicon glyphicon-search"></i></button>
                    </div>
                </div>
            </form>
        </li>
    </ul>

    <div class="social-media">
        <div>
            <a class="btn" href="<?php echo $facebook ?>">
                <span class="fa fa-facebook"></span>
            </a>

            <a class="btn" href="<?php echo $twitter ?>">
                <span class="fa fa-twitter"></span>
            </a>

            <a class="btn" href="<?php echo $instagram ?>">
                <span class="fa fa-instagram"></span>
            </a>

            <a class="btn" href="<?php echo $youtube ?>">
                <span class="fa fa-youtube"></span>
            </a>
        </div>
    </div>
</div>


<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
        document.getElementById("main").style.marginLeft = "250px";
        document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("main").style.marginLeft = "0";
        document.body.style.backgroundColor = "white";
    }

    $("[data-toggle=popover]").popover({
        html: true,
        content: function() {
            return $('#popover-content').html();
        }
    });


    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));


    function checkProductName() {
        var productName = $('#p_name').val();

        var mode ='checkProductName';

        $.ajax({
            type:"POST",
            url:'controller/checkDuplicate.php',
            data:"formType="+mode+"&productName="+productName,
            success:function(data){
                var data = JSON.parse(data);

                if(data){
                    document.getElementById('submit_btn').disabled = true;
                }else{
                    document.getElementById('submit_btn').disabled = false;
                }

            },error: function (er) {
                alert("Error while Creating" +er);
            }
        });
        return false;
    }
</script>

</body>
</html>
