<?php
/**
 * Created by PhpStorm.
 * User: sanjeevbudha
 * Date: 6/25/16
 * Time: 1:08 PM
 */


include('../config/DatabaseConnection.php');
include('../common/common.php');

if(isset($_POST['login'])){
    if($_POST['login']=='login'){

        $username = $_POST['username'];
        $password = $_POST['password'];

        $result = array();

        $result = checkLogin($connection,$username,$password);

        echo json_encode($result);
    }
}

else if(isset($_POST['formType'])){

    if($_POST['formType']=='change'){

    $password = random_password($connection);
    require_once('../PHPMailer-master/PHPMailerAutoload.php');
    $mail = new PHPMailer();
    $mail->CharSet =  "utf-8";
// enable SMTP authentication
//$mail->SMTPDebug = 1;
// GMAIL username
    $mail->Username = "contactcareshop@gmail.com";
// GMAIL password
    $mail->Password = "CareShop123";
// sets GMAIL as the SMTP server
// set the SMTP port for the GMAIL server
    $mail->From='contactcareshop@gmail.com';
    $mail->FromName='Care Shop Nepal';
    $mail->AddAddress('contactcareshop@gmail.com');
    $mail->Subject  =  'Password Has Been Changed';
    $mail->IsHTML(true);
    $mail->Body    = 'Hello! Don\'t worry about forgetting your password, following is your <br><br>Username: careshopnepaladmin<br>Password: '.$password.' <br><br>Best Wishes,<br>CareShopNepal.';
    if($mail->Send())
    {
        $_SESSION['message']='Admin credentials have been sent to admin email address';
        header("Location:../view/admin/login.php");
    }
    else
    {
        $_SESSION['message']=$mail->ErrorInfo;
    }

echo $mail->ErrorInfo;
}
}