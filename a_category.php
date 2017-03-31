<?php
/**
 * Created by PhpStorm.
 * User: Pratik
 * Date: 6/16/2016
 * Time: 5:09 PM
 */
?>
<?php
include("config/db_connect.php");
include('common/common.php');

//session_start();
//
//if(!empty($_SESSION['login_user'])){
//    header("Location: a_category.php");
//}

if(empty($_SESSION['username'])){
    header("Location: login.php");
}

?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>CareShopNepal</title>

    <link rel="icon" href="img/csnLogo.png" type="image/png" sizes="16x16">

    <script>
        function showMes(){
            noty({layout: 'topRight', text: "Testing", type: "information", timeout: 10000});
        }
    </script>
</head>

<body>

<div class="wrapper" style="background:#E57373;">
    <!-- Add Category Modal -->
    <div id="addCategory" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="background-color: #5cb85c;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="font-family: 'Pacifico', cursive; color: #ffffff;">Smart Gallery</h4>
                </div>

                <!--            <div class="container">-->
                <div class="modal-body">
                    <fieldset>
                        <form class="form-horizontal" id="category_form">
                            <input type="hidden" value="add" name="formType" id="formType">
                            <input type="hidden" name="c_id" id="c_id">
                            <div class="form-group">
                                <label class="control-label col-sm-4">Category<span style="color:red;"> *</span></label>

                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="categoryName" id="categoryName">
                                </div>
                            </div>
                            <div>
                                <button type="button" style="margin-left: 430px;" class="btn btn-success" id="saveCategory" onclick="addCategory();">Add</button>
                            </div>
                        </form>
                    </fieldset>
                </div>
                <!--            </div>-->

                <div class="modal-footer" style="background-color: #5cb85c;">
                    <!--                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
                </div>
            </div>
        </div>
    </div>


    <!-- Add Sub-Category Modal -->
    <div id="addSubCategory" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="background-color: #5cb85c;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="font-family: 'Pacifico', cursive; color: #ffffff;">Care Shop Nepal</h4>
                </div>

                <!--            <div class="container">-->
                <div class="modal-body">
                    <fieldset>
                        <form class="form-horizontal" id="subcategory_form">
                            <input type="hidden" name="formType" value="add" id="formTypes">
                            <input type="hidden" name="ca_id" id="ca_id">
                            <div class="form-group">
                                <label class="control-label col-sm-4">Sub-Category<span style="color:red;"> *</span></label>

                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="subcategory" id="subcategory">
                                </div>
                            </div>
                            <div>
                                <button style="margin-left: 430px;" type="button" class="btn btn-success" id="saveChanges" onclick="saveSubCategory()">Add</button>
                            </div>
                        </form>
                    </fieldset>
                </div>
                <!--            </div>-->

                <div class="modal-footer" style="background-color: #5cb85c;">
                    <!--                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
                </div>
            </div>
        </div>
    </div>

    <?php require('a_menu.php') ?>

    <div class="container" style="width: 700px;">
        <div class="row" style="margin-bottom: 20px;">
            <button class="btn btn-success" data-toggle="modal" data-target="#addCategory">Add Category</button>

        </div>

        <?php

        $categoryList = getCategory($connection);
        $subCategoryList = getSubCategory($connection);

        foreach($categoryList as $category)

        {
            ?>
            <div class="row categoryTable contentBack" style="margin-top: 10px; margin-bottom: 10px;">
                <fieldset style="margin: 5px;">
                    <legend style="text-align: left; padding: 7px;" id="<?php echo $category["id"] ?>" >
                        <?php echo $category["category_name"]?>
                        <button class="btn btn-danger pull-right" onclick="return deleteCategory('<?php echo $category["id"]?>','<?php echo $category["category_name"]?>')"><span class="glyphicon glyphicon-trash"></span></button>
                        <button class="btn btn-success pull-right" onclick="return editCategory('<?php echo $category["id"]?>','<?php echo $category["category_name"]?>')"><span class="glyphicon glyphicon-pencil"></span></button>
                    </legend>
                    <table class="table table-hover table-bordered">
                        <thead>
                        <tr>
                            <th>Sub-Category</th>
                            <th style="text-align: center;" colspan="2">Action <button class="btn btn-small btn-success pull-right" onclick="addSubCategory('<?php echo $category["id"]?>')"><span class="glyphicon glyphicon-plus"></span></button></th>
                        </tr>
                        </thead>
                        <tbody>


                        <?php
                        foreach($subCategoryList as $subCategory){
                            if($category["id"]==$subCategory["c_id"]){?>


                                <tr id="<?php echo $subCategory["id"] ?>">
                                    <td style="text-align: center;" id="subCatName"><?php echo $subCategory["sub_category_name"]?></td>
                                    <td style="text-align: center;">
                                        <button class="btn btn-default" onclick="editSubCat('<?php echo $subCategory["id"]?>','<?php echo $subCategory["sub_category_name"]?>')"><span class="glyphicon glyphicon-pencil"></span></button>
                                        <button class="btn btn-default"  onclick="deleteSubCat('<?php echo $subCategory["id"]?>','<?php echo $subCategory["sub_category_name"]?>')"><span class="glyphicon glyphicon-trash"></span></button>
                                    </td>
                                </tr>

                            <?php  }
                        }?>



                        </tbody>
                    </table>
                </fieldset>
            </div>

            <?php
        }

        ?>

    </div>


    <script>


    </script>

    <?php require('a_footer.php') ?>
</div>
</body>
</html>