<!DOCTYPE>
<?php
include("config/db_connect.php");
session_start();
if(!empty($_SESSION['username'])){
    header("Location: delivery_status.php");
}
?>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Smart Gallery</title>
    <link rel="icon" href="img/csnLogo.png" type="image/png" sizes="16x16">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <!--<link rel="stylesheet" href="../css/imageHoverStylesheet.css" type="text/css">-->
    <script type="text/javascript" src="../javascript/jquery-1.12.4.min.js"></script>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="js/jquery.noty.packaged.min.js"></script>
    <script src="js/custom.js"></script>
    <!--fonts-->
    <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
    <!--fonts-->
</head>
<body>
<div class="container" style="display: flex; height: 80%; justify-content: center; align-items: center;">

    <form class="form-signin loginForm" id="login-form">
        <input type="hidden" name="login" value="login">
        <h2>Smart Gallery</h2>
        <!--        <label for="username" class="sr-only">Username</label>-->
        <input type="text" id="username" class="form-control" placeholder="Username" name="username" required autofocus>
        <!--        <label for="inputPassword" class="sr-only">Password</label>-->
        <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" type="button" id="signIn" name="login">Sign in</button>
        <br/>
        <a href="change_password.php">Forgot Password</a>
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
            url:'controller/auth.php',
            data:data,
            success:function(data){

                var data = JSON.parse(data)

                if(data.message  == 'success'){
                    window.location = "delivery_status.php";
                }else if(data.message == 'fail'){
                    displayLoginMessage("user or password is incorrect","error")
                }
            },

            error: function (er) {
                alert("Error while Creating" +er);
            }
        });
        return false;
    })
</script>
</body>
</html>

