<?php
/**
 * Created by PhpStorm.
 * User: Pratik
 * Date: 6/16/2016
 * Time: 5:09 PM
 */
include("config/db_connect.php");
include("common/common.php");

if(empty($_SESSION['username'])) {
    header("Location: error.php");
}
?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Smart Gallery</title>
    <link rel="icon" href="img/csnLogo.png" type="image/png" sizes="16x16">
    <link href="css/jquery.dataTables.min.css" type="text/css">
    <script type="text/javascript" src="js/jquery-1.12.4.min.js">

    </script>
    <script type = "text/javascript">


        function deliveryStatus(order_id){

            function removeFromList(){
                $.ajax({
                    type:"POST",
                    url:"orders_show.php",
                    data: {action: order_id},
                    success: function (data){
                        window.location.reload();
                    }
                });
            }

            removeFromList();
        }
    </script>

</head>

<body>

<div class="wrapper" style="background: rgba(202, 83, 63, 0.27); color: #630b0b;">

    <?php require('a_menu.php') ?>

    <div class="container">
        <div class="col-lg-8 contentBack" style="padding: 10px; margin-right: 10px;">
            <fieldset>
                <legend style="text-align: center;">Item to be Delivered</legend>
                <table id="to_deliver_table" class="table table-hover table-bordered">
                    <thead>
                    <tr>
                        <th>Deliver Till</th>
                        <th>Product</th>
                        <th>Address</th>
                        <th>Contact</th>
                        <th>Order By</th>
                        <th>Action Taken</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $status = '0';
                    $orderList = getOrderList($connection,$status);

                    foreach($orderList as $order){
                        $items = getItemName($connection,$order['item_id']);

                        ?>
                        <tr>
                            <td><?php echo $order['date'] ?></td>
                            <td><?php echo $items['item_name'] ?></td>
                            <td><?php echo $order['address'] ?></td>
                            <td><?php echo $order['contact'] ?></td>
                            <td><?php echo $order['name'] ?></td>
                            <td><button class="btn btn-success" onclick='deliveryStatus(<?php echo $order['id']?>)' name = '<?php echo $order['id']?>' value='<?php echo $order['id']?>'><span class="glyphicon glyphicon-ok"></span> Click After Delivered</button></td>
                        </tr>

                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </fieldset>
        </div>
        <div class="col-lg-3 contentBack" style="padding: 10px;">
            <fieldset>
                <legend style="text-align: center;">Items Delivered</legend>
                <table id="delivered_table" class="table table-hover">
                    <thead>
                    <tr>
                        <th>Product</th>
                        <th>Contact</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    $status = '1';
                    $orderList = getOrderList($connection,$status);

                    foreach($orderList as $order){

                        $item_n = getItemName($connection,$order['item_id']);

                        if(!empty($item_n)) {
                            ?>
                            <tr>
                                <td><?php echo $item_n['item_name'] ?></td>
                                <td><?php echo $order['contact'] ?></td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                    </tbody>
                </table>
            </fieldset>
        </div>
    </div>
    <?php require('a_footer.php');?>

    <script>
        $('#to_deliver_table').DataTable(
            {
                "lengthMenu": [[6,12,24,-1],[6,12,24,"ALL"]]
            }
        );

        $('#delivered_table').DataTable(
            {
                "lengthMenu": [[6,12,24,-1],[6,12,24,"ALL"]]
            }
        );
    </script>

</div>
</body>
</html>