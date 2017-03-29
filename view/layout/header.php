<?php
include('../../config/DatabaseConnection.php');
include('../../common/common.php');

$link = $connection->query("select * from link");
while($row=$link->fetch_assoc()){
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
        <title>CareShopNepal</title>
        <link rel="icon" href="../../img/csnLogo.png" type="image/png" sizes="16x16">
        <link rel="stylesheet" href="../../css/style.css" type="text/css">
        <!--<link rel="stylesheet" href="../css/imageHoverStylesheet.css" type="text/css">-->
        <script type="text/javascript" src="../../javascript/jquery-1.12.4.min.js"></script>
        <script src="../../javascript/subcategory.js" type="text/javascript"></script>
        <script src="../../javascript/category.js" type="text/javascript"></script>
        <script src="../../javascript/custom.js" type="text/javascript"></script>
        <script src="../../javascript/item.js" type="text/javascript"></script>
        <script src="../../javascript/jquery.noty.packaged.min.js"></script>
        <link href="../../bootstrap-3.3.6-dist/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="../../bootstrap-3.3.6-dist/css/bootstrap-social.css" rel="stylesheet" type="text/css">
        <link href="../../bootstrap-3.3.6-dist/css/font-awesome.css" rel="stylesheet" type="text/css">
        <!--    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.js"></script>-->
        <script src="../../bootstrap-3.3.6-dist/js/bootstrap.js"></script>


        <style>
            .navbar{
                color: black;
                background-color: #ffffff;
                border-bottom: 3px solid darkblue;
                border-top: none;
                border-right: none;
                border-left: none;
            }

            .highlight{
                -webkit-box-shadow: 0px 6px 21px -6px rgba(0,0,0,0.75);
                -moz-box-shadow: 0px 6px 21px -6px rgba(0,0,0,0.75);
                box-shadow: 0px 6px 21px -6px #64AEDC;
                /*margin: 20px;*/
                /*padding: 1%;*/
            }
        </style>
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
                            <input class="form-control" type="text" name="name" required=""/>
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

                        <input type="submit" value="Add" class="btn btn-success btn-block"/>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <?php
        if(isset($_SESSION['login'])){
            ?>
            <a href="controller/c_logout.php">Logout</a>
            <a href="controller/c_logout.php">Change Password</a>
            <?php
        }
        ?>


                    <?php
                    $categoryList = getCategory($connection);
                    $subCategoryList = getSubCategory($connection);

                    foreach($categoryList as $category)
                    {?>

                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class=""></span> <?php echo $category["category_name"]?>
                            </a>

                            <ul class="dropdown-menu sub-menu" style="height: 400px;">


                                <?php

                                foreach($subCategoryList as $subCategory){

                                    if($category["id"]==$subCategory["c_id"]) {?>
                                        <div class="col-lg-3">
                                            <a href="subCategoryItemDisplay.php?id=<?php echo $subCategory['id']?>&subcat=<?php echo $subCategory['sub_category_name']?>" <li class="dropdown-header"><h5><?php echo $subCategory["sub_category_name"] ?></h5></li></a>

                                            <?php
                                            $itemList = getItemBySubCat($connection,$subCategory['id']);

                                            $count = count($itemList);

                                            foreach($itemList as $item){
                                                ?>
                                                <li><a href="displayProductView.php?p_id=<?php echo $item['id']?>"><?php echo $item['item_name']?></a></li>

                                                <?php

                                            }

                                            if($count >=5){
                                                ?>
                                                <a href="subCategoryItemDisplay.php?id=<?php echo $subCategory['id']?>&subcat=<?php echo $subCategory['sub_category_name']?>">See more..</a>
                                                <?php
                                            }
                                            ?>

                                        </div>

                                        <?php
                                    }

                                }?>


                            </ul>
                        <?php
                    }
                    ?>

    </div>
    <div id="main">
        <span style="font-size:30px;cursor:pointer; color: yellow;" onclick="openNav()">&#9776;</span>
        <span><img src="img/logo.png" height="70px" alt=""></span>
    </div>

    <div class="top-info">
        <h6 style="padding: 9px; display: inline-block;"><i class="glyphicon glyphicon-phone"></i> Call : 985-1243865</h6>



    <ul class="nav navbar-nav noStyle">
        <li>
            <form class="navbar-form" role="search" action="../user/search.php" method="post">
                <div class="input-group" style="width: 600px;">
                    <input type="text" class="form-control" placeholder="Search" name="searchItem">
                    <div class="input-group-btn">
                        <button style="height: 34px;" class="btn btn-default" type="submit" name="submit" value="submit"><i class="glyphicon glyphicon-search"></i></button>
                    </div>
                </div>
            </form>
        </li>
    </ul>

    <div class="social-media">
        <div>
            <a class="btn">
                <span class="fa fa-facebook"></span>
            </a>

            <a class="btn">
                <span class="fa fa-twitter"></span>
            </a>

            <a class="btn">
                <span class="fa fa-instagram"></span>
            </a>

            <a class="btn">
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
            document.getElementById("main").style.marginLeft= "0";
            document.body.style.backgroundColor = "white";
        }

        $(document).ready(function(){$("#main").fixedScrollPosition("50px")})
    </script>

    </body>
</html>
