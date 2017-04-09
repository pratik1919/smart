<?php
/**
 * Created by PhpStorm.
 * User: Pratik
 * Date: 4/9/2017
 * Time: 1:15 PM
 */

$id = $_GET['id'];
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

        <legend style="margin-top: 20px;">Edit Slider</legend>
        <form action="controller/editSlider.php" method="post" enctype="multipart/form-data">
            <input type="hidden" value="<?php echo $id; ?>" name="id">
            <div class="form-group">
                <label for="">Description</label><br>
                <textarea name="desc" id="" cols="90" rows="10" width="100%"></textarea>
            </div>

            <div class="form-group">
                <label for="">Photo</label>
                <input type="file" name="photo">
            </div>

            <input class="btn btn-adn" type="submit" value="Change">
        </form>
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


