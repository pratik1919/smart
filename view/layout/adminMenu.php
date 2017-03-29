<?php
/**
 * Created by PhpStorm.
 * User: Pratik
 * Date: 6/16/2016
 * Time: 3:24 PM
 */

?>
<!DOCTYPE html>
<html>
<head lang="en">
   
    
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
        <!--    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.js"></script>-->
        <script src="../../bootstrap-3.3.6-dist/js/bootstrap.js"></script>
        <script src="../../javascript/jquery.dataTables.min.js"></script>

        <!--fonts-->
        <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
        <!--fonts-->
</head>

<body background="../../img/PolygonalBackground.jpg" style="background-size: cover; background-position: center; background-attachment: fixed;">


<nav class = "navbar navbar-default menu navbar-fixed-top" role = "navigation" style=" padding-right: 25px;">
    <div class = "navbar-header">
        <button type = "button" class = "navbar-toggle"
                data-toggle = "collapse" data-target = "#navbar-collapse">
            <span class = "sr-only">Toggle navigation</span>
            <span class = "icon-bar"></span>
            <span class = "icon-bar"></span>
            <span class = "icon-bar"></span>
        </button>
        <a class = "navbar-brand" href = "../user/home.php"><img style="margin-top: -21px;" height="62px" width="133px" src="../../img/csnLogo.png" alt="test"></a>

    </div>

    <div class = "collapse navbar-collapse js-navbar-collapse" id = "navbar-collapse">
        <ul class="nav navbar-nav">
            <li>
                <a href="../admin/deliveryStatus.php"><span class="glyphicon glyphicon-plane"> </span> Delivery</a>
            </li>
            <li>
                <a href="../admin/addItemView.php"><span class="glyphicon glyphicon-bishop"> </span> Product</a>
            </li>
            <li>
                <a href="../admin/addCategory.php"><span class="glyphicon glyphicon-list-alt"> </span> Category</a>
            </li>
            <li>
                <a href="../admin/advertise.php"><span class="glyphicon glyphicon-list-alt"> </span> Advertise</a>
            </li>
            <li>
                <a href="../admin/link.php"><span class="glyphicon glyphicon-link"> </span> Links</a>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="../admin/password.php">Change Password</a></li>
            <li><a href="../admin/logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
        </ul>
    </div><!-- /.close of nav-collapse -->
</nav>
<div class="row" style="height: 100px">
</div>
</body>
</html>