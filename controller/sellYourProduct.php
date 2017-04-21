<?php
/**
 * Created by PhpStorm.
 * User: budha
 * Date: 4/19/2017
 * Time: 10:24 PM
 */


if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $desc = $_POST['desc'];

    $photo = $_FILES['photo']['name'];
    $photo_tmp = $_FILES['photo']['tmp_name'];

    $contact = $_POST['contact'];

    require_once '../PHPMailer/PHPMailerAutoload.php';
    $mail = new PHPMailer();
    $mail->CharSet =  "utf-8";
    $mail->SMTPDebug = 2;
    $mail->Username = "budhasanjeev@gmail.com";
    $mail->Password = "iam@Ktm36";
    $mail->SMTPSecure = "ssl";
    $mail->From='budhasanjeev@gmail.com';
    $mail->FromName='Smart Gallery';
    $mail->AddAddress('budhasanjeev@gmail.com');
    $mail->Subject  =  'Product Order';
    $mail->IsHTML(true);
    //$mail->AddEmbeddedImage(".$photo.", "my-attach", ".$photo.");
    $mail->Subject = "Sell Your Product";
    $mail->Body    = 'Hello Smart Gallery,<br> I want to sell my product. The product detail is given below.
    <br><br>Product Name: '.$name.'
    <br>Description: '.$desc.'
    <br>contact: '.$contact.'
    <br>';
    
    if($mail->send())
    {
        echo "<script>window.open('../index.php','_self')</script>";
        echo 'success.' ;
    }
    else
    {
//        echo "<script>window.open('../index.php','_self')</script>";
        echo "Mail Error - >".$mail->ErrorInfo;
    }

}