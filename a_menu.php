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
        <title>Smart Gallery</title>
        <link rel="icon" href="img/logo.png" type="image/png" sizes="16x16">
        <link rel="stylesheet" href="css/style.css" type="text/css" rel="stylesheet">
        <link href="css/jquery.dataTables.min.css" type="text/css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap-social.css" rel="stylesheet" type="text/css">
    <link href="bootstrap/css/font-awesome.css" rel="stylesheet" type="text/css">
        <!--<link rel="stylesheet" href="../css/imageHoverStylesheet.css" type="text/css">-->
        <script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>
        <script src="js/subcategory.js" type="text/javascript"></script>
        <script src="js/category.js" type="text/javascript"></script>
        <script src="js/custom.js" type="text/javascript"></script>
        <script src="js/item.js" type="text/javascript"></script>
        <script src="js/jquery.noty.packaged.min.js"></script>
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
        <!--    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.js"></script>-->
        <script src="bootstrap/js/bootstrap.js"></script>
        <script src="js/jquery.dataTables.min.js"></script>

        <!--fonts-->
        <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
        <!--fonts-->
</head>

<!--<body background="img/PolygonalBackground.jpg" style="background-size: cover; background-position: center; background-attachment: fixed;">-->


<nav class = "navbar navbar-default menu navbar-fixed-top" role = "navigation" >
    <div class = "navbar-header">
        <button type = "button" class = "navbar-toggle"
                data-toggle = "collapse" data-target = "#navbar-collapse">
            <span class = "sr-only">Toggle navigation</span>
            <span class = "icon-bar"></span>
            <span class = "icon-bar"></span>
            <span class = "icon-bar"></span>
        </button>
        <a class = "navbar-brand" href = "index.php"><img style="margin-top: -21px;" height="62px" width="133px" src="img/logo.png" alt="test"></a>

    </div>

    <div class = "collapse navbar-collapse js-navbar-collapse" id = "navbar-collapse"  style="background-color: #f39c12;width: 100%">
        <ul class="nav navbar-nav">
            <li>
                <a href="delivery_status.php" style="color: #ecf0f1"><span class="glyphicon glyphicon-plane"> </span> Delivery</a>
            </li>
            <li>
                <a href="a_items.php"  style="color: #ecf0f1"><span class="glyphicon glyphicon-bishop"> </span> Product</a>
            </li>
            <li>
                <a href="a_category.php"  style="color: #ecf0f1"><span class="glyphicon glyphicon-list-alt"> </span> Category</a>
            </li>
            <li>
                <a href="advertise.php"  style="color: #ecf0f1"><span class="glyphicon glyphicon-list-alt"> </span> Advertise</a>
            </li>
            <li>
                <a href="link.php"  style="color: #ecf0f1"><span class="glyphicon glyphicon-link"> </span> Links</a>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="password.php"  style="color: #ecf0f1;">Change Password</a></li>
            <li><a href="logout.php"  style="color: #ecf0f1; "><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
        </ul>
    </div><!-- /.close of nav-collapse -->
</nav>
<div class="row" style="height: 50px">
</div>
</body>
</html>