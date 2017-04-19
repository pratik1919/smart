<?php
/**
 * Created by PhpStorm.
 * User: Sanjeev Budha
 * Date: 4/18/2017
 * Time: 10:45 PM
 */

if (isset($_POST['order'])) {

    $pro_id = $_POST['p_id'];

    $delivery_address = $_POST['deliveryAddress'];
    $within_date = $_POST['date'];
    $name = $_POST['name'];
    $contact_number = $_POST['contact'];
    $quantity = $_POST['quantity'];
    $any_query = $_POST['query'];
    $thanks = 'Thanks,';
    $thanks1 = 'Have a good day';

    $insert_order = "insert into order_table VALUES (null,'$delivery_address','$within_date','$name','$contact_number','$quantity','$any_query','$pro_id','0')";
    $run_query = mysqli_query($connection, $insert_order);

    if ($run_query) {
        $insert_order = "select item_name from item where id = $pro_id";
        $run_query = mysqli_query($connection, $insert_order);

        while ($row_query = mysqli_fetch_array($run_query)) {
            $item_name = $row_query['item_name'];
        }


        require_once('PHPMailer/PHPMailerAutoload.php');
        $mail = new PHPMailer();
        $mail->CharSet =  "utf-8";

        $mail->Username = "contactcareshop@gmail.com";
        $mail->Password = "CareShop123";
        $mail->SMTPSecure = "ssl";
        $mail->From='contactcareshop@gmail.com';
        $mail->FromName='Care Shop Nepal';
        $mail->AddAddress('contactcareshop@gmail.com');
        $mail->Subject  =  'Product Order';
        $mail->IsHTML(true);
        $mail->Body    = 'Hello Smart Gallery,<br> A product order has been placed with following details:
            <br><br>Product Name: '.$item_name.'
            <br>Quantity: '.$quantity.'
            <br>Delivery Address: '.$delivery_address.'
            <br>Date Within: '.$within_date.'
            <br>Additional Query: '.$any_query.'
            <br><br>Client Name:'.$name.'
            <br>Contact No.: '.$contact_number.'
            <br><br>'.$thanks.'
            <br>'.$thanks1;

        if($mail->Send())
        {
            echo "<script>window.open('index.php','_self')</script>";
            echo 'Ordered successfully.' ;
        }
        else
        {
            echo "<script>window.open('index.php','_self')</script>";
            echo "Mail Error - >".$mail->ErrorInfo;
        }
    } else {
        echo "Not Ordered";
    }

}