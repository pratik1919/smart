<?php
    include("common/common.php");
    include("config/db_connect.php");

?>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>CareShopNepal</title>
    <link rel="icon" href="img/csnLogo.png" type="image/png" sizes="16x16">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <!--<link rel="stylesheet" href="../css/imageHoverStylesheet.css" type="text/css">-->
    <script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
<!--    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.js"></script>-->
    <script src="bootstrap/js/bootstrap.js"></script>

    <!--fonts-->

    <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
    <!--fonts-->
</head>

<body>



<div class="container" style="display: flex; height: 80%; justify-content: center; align-items: center;">


    <form class="form-signin loginForm" method="post" action="controller/auth.php" enctype="multipart/form-data">
        <input type="hidden" value="change" name="formType">
        <div style="text-align: center;">
            <a href="index.php">
                <img src="img/logo.png" height="150px;" alt=""/>
            </a>
        </div>

        <hr/>
        <h5>Username and Password will be sent to  account</h5>
        <input style="background-color: orangered; border-radius: 0px;" type="submit" class="btn btn-lg btn-primary btn-block" name="change" id="change" value="Change"/>
        <br/>
    </form>

    <div class="row">

    </div>

    <?php $_SESSION['message']=''?>

</div>

</body>
</html>