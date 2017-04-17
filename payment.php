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
        <legend style="margin-top: 50px;">You can paymen us through</legend>

        <div class="row">
            <div class="col-md-6 col-sm-6 col-lg-6">
                <dl style="font-weight: 600">
                    <dt>IME | Western Union</dt>
                    <dd>Shahadev Bhandari</dd>
                    <dd>Chakrapath, Kathmandu, Nepal</dd>
                    <dd>Citizenship No. 116486</dd>
                </dl>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6">
                <dl style="font-weight: 600">
                    <dt>Nepal Investment Bank</dt>
                    <dd>Account Type : Current Account</dd>
                    <dd>Account No.: 03501040253031</dd>
                    <dd>Branch: Chakrapath</dd>
                </dl>
            </div>
        </div>
    </div><!-- #content -->

    <div style="height: 50px;"></div>
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

