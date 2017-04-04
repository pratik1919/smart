<?php
include('common/common.php');
include('config/db_connect.php');

if (empty($_SESSION['username'])) {
    header("Location: login.php");
}
?>

    <!DOCTYPE html>
    <html>
    <head lang="en">
        <meta charset="UTF-8">
        <title>CareShopNepal</title>
<link rel="icon" href="img/csnLogo.png" type="image/png" sizes="16x16">
    </head>

    <body>

    <div class="wrapper" >
        <?php require('a_menu.php') ?>

        <div class="container" style="width: 500px;">
            <form method="post" action="reset_password.php" role="form">
                <div class="form-group">
                    <label for="pwd">Old Password:</label>
                    <input type="password" class="form-control" name="oldPassword" id="pwd" required/>
                </div>
                <div class="form-group">
                    <label for="pwd">New Password:</label>
                    <input type="password" class="form-control" name="newPassword" id="newpwd" required/>
                </div>
                <div class="form-group">
                    <label for="pwd">Confirm Password:</label>
                    <input type="password" class="form-control" name="renewPassword" id="renewpwd" required>
                </div>
                <input type="submit" class="btn btn-default" name="change" id="change" value="Submit"/>
            </form>
        </div>
        <?php require('a_footer.php') ?>
    </div>
    </body>
    </html>