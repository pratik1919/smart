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
        <legend style="margin-top: 20px;">Edit Slider</legend>

        <?php
        $slider = getSlider($connection);
        while($row = $slider->fetch_assoc()){
            ?>
            <div class="row panel panel-danger">

                <div class="col-lg-4 col-md-4 col-sm-4">
                    <img src="img/<?php echo $row['photo']; ?>" alt="" width="100%">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <p><?php echo $row['description']; ?></p>
                </div>

                <div class="col-lg-2 col-md-2 col-sm-2">
                    <a class="btn btn-default" href="edit.php?id=<?php echo $row['id']; ?>">Change</a>
                </div>
            </div>
        <?php
        }
        ?>
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

