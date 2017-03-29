<?php
include('../../common/common.php');
include('../../config/DatabaseConnection.php');

if (empty($_SESSION['username'])) {
    header("Location: login.php");
}
?>

    <!DOCTYPE html>
    <html>
    <head lang="en">
        <meta charset="UTF-8">
        <title>CareShopNepal</title>
<link rel="icon" href="../../img/csnLogo.png" type="image/png" sizes="16x16">
    </head>

    <body>

    <div class="wrapper"
         style="background: rgba(202, 83, 63, 0.27); color: #630b0b; display: flex; align-items: center; justify-content: center;">
        <?php require('../layout/adminMenu.php') ?>

        <div class="container" style="width: 500px;">
            <form method="post" action="resetPassword.php" role="form">
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
        <?php require('../layout/adminFooter.php') ?>
    </div>
    </body>
    </html>