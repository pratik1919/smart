<!DOCTYPE>
<?php
include("../../config/DatabaseConnection.php");
session_start();
if(!empty($_SESSION['username'])){
    header("Location: deliveryStatus.php");
}
?>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>CareShopNepal</title>
    <link rel="icon" href="../../img/csnLogo.png" type="image/png" sizes="16x16">
    <link rel="stylesheet" href="../../css/style.css" type="text/css">
    <!--<link rel="stylesheet" href="../css/imageHoverStylesheet.css" type="text/css">-->
    <script type="text/javascript" src="../javascript/jquery-1.12.4.min.js"></script>
    <link href="../../bootstrap-3.3.6-dist/css/bootstrap.css" rel="stylesheet" type="text/css">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.js"></script>
    <script src="../../bootstrap-3.3.6-dist/js/bootstrap.js"></script>
    <script src="../../javascript/jquery.noty.packaged.min.js"></script>
    <script src="../../javascript/custom.js"></script>
    <!--fonts-->
    <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
    <!--fonts-->
</head>
<body>
<div class="container" style="display: flex; height: 80%; justify-content: center; align-items: center;">
<!--    --><?php
//    if($_SESSION['message']){
//        echo $_SESSION['message'];
//    }
//    ?>
    <form class="form-signin loginForm" id="login-form">
        <input type="hidden" name="login" value="login">
        <h2 style=" text-align: center; font-family: 'Pacifico', cursive;">Care Shop Nepal</h2>
        <!--        <label for="username" class="sr-only">Username</label>-->
        <input type="text" id="username" class="form-control" placeholder="Username" name="username" required autofocus>
        <!--        <label for="inputPassword" class="sr-only">Password</label>-->
        <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" type="button" id="signIn" name="login">Sign in</button>
        <br/>
        <a href="changePassword.php">Forgot Password</a>
    </form>
    <div class="row">
    </div>
</div>
<?php
?>
<script>
    $('#signIn').on('click',function(){
        var data = $('#login-form').serialize();
        $.ajax({
            type:"POST",
            url:'../../controller/auth.php',
            data:data,
            success:function(data){

                var data = JSON.parse(data)

                if(data.message  == 'success'){
                    window.location = "deliveryStatus.php";
                }else if(data.message == 'fail'){
                    displayLoginMessage("user or password is incorrect","error")
                }
            },error: function (er) {
                alert("Error while Creating" +er);
            }
        });
        return false;
    })
</script>
</body>
</html>

