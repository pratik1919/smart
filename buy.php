<?php
$pos = $_POST['positionId'];
?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Smart Gallery</title>
    <!--    <link rel="stylesheet" type="text/css" href="style.css"/>-->
</head>

<body>
<form action="buy.php" id="read" method="post">
    <input type="hidden" id="positionId" name="positionId"/>
    <input type="hidden" value="news" name="content"/>
</form>
<div id="wrapper">

    <div id="header">
        <?php include('header.php') ?>
    </div>

    <div id="content" class="container">
        <?php
        $prod = getProduct($pos, $connection);
        $row = $prod->fetch_assoc();
        ?>

        <div class="row" style="padding-top: 100px; padding-bottom: 100px; ">
            <div class="col-lg-6 col-md-6">
                <img src="img/<?php echo $row['photo']; ?>" height="400px" style="max-width: 100%" alt="">
            </div>
            <div class="col-lg-6 col-md-6">
                <h2><?php echo $row['name']; ?></h2>
                <h4>Rs <?php echo $row['price']; ?>/-</h4>
                <p><?php echo $row['description']; ?></p>
            </div>
        </div>
    </div><!-- #content -->

    <div id="footer">
        <?php
        include 'footer.php';
        ?>
    </div><!-- #footer -->

</div><!-- #wrapper -->


<script type="text/javascript">


</script>


</body>

</html>

