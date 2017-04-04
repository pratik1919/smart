<?php
/**
 * Created by PhpStorm.
 * User: Pratik
 * Date: 7/3/2016
 * Time: 6:10 PM
 */
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
    <title>Smart Gallery</title>
    <script src="js/advertisement.js" type="text/javascript"></script>
</head>

<body>

<div class="wrapper">
    <?php require('a_menu.php') ?>

    <div class="container">

        <div class="col-lg-8">

            <fieldset>
                <legend>
                    Current Advertisements
                </legend>
            </fieldset>
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>Link</th>
                    <th>Category</th>
                    <th>Expiry Date</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>

                <?php
                $advertisementList = getAllAdvertisement($connection);
                foreach($advertisementList as $advertisement){
                    $category = getCategoryById($connection,$advertisement['category_id']);
                    ?>
                    <tr>
                        <td><?php echo $advertisement['url_link']?></td>
                        <td><?php echo $category['category_name'] ?></td>
                        <td><?php echo $advertisement['expiry_date']?></td>
                        <td><button class="btn btn-default" onclick="editAdvertisement(<?php echo $advertisement['id'] ?>)"><span  class="glyphicon glyphicon-pencil" ></span></button>
                            <button class="btn btn-default" onclick="deleteAd(<?php echo $advertisement['id'] ?>)"><span class="glyphicon glyphicon-trash"></span></button>
                        </td>
                    </tr>

                <?php } ?>
                </tbody>
            </table>
        </div>

        <div class="col-lg-4">
            <fieldset>
                <legend>Set Advertisement Links</legend>
            </fieldset>
            <form method="post" action="controller/advertisement.php" enctype="multipart/form-data" role="form" style="padding: 20px;">
                <input type="hidden" name="insert-ad" id="insert-ad" value="add">
                <input type="hidden" name="ad_id" id="ad_id">
                <div class="form-group">
                    <label for="pwd">Link:</label>
                    <input type="text" class="form-control" name="urlLink" id="urlLink" required/>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4">Category<span style="color:red;"> *</span></label>

                    <div>
                        <select name="category_id" class="form-control" id="category-id">
                            <option value="#">---Select Page---</option>
                            <?php
                            $categoryList = getCategory($connection);

                            foreach($categoryList as $category) {?>

                                <option value="<?php echo $category["id"] ?>"><?php echo $category["category_name"] ?></option>

                            <?php }
                            ?>

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="pwd">Expiry Date:</label>
                        <input type="date" class="form-control" name="expiryDate" id="expiryDate" required/>
                    </div>

                </div>
                <div class="form-group">
                    <label for="pwd">Banner (size: 105 X 480)</label>
                    <input type="file" name="file" id="file"  required/>
                </div>
                <input type="submit" class="btn btn-default" name="advertisement" id="advertisement" value="Submit"/>
            </form>

        </div>
    </div>
    <?php require('a_footer.php'); ?>
</div>
</body>
</html>