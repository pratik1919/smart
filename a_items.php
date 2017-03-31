<?php
session_start();
include('common/common.php');
include('config/db_connect.php');

if(empty($_SESSION['username'])) {
    header("Location: login.php");
}

?>


<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>CareShopNepal</title>
    <link rel="icon" href="img/csnLogo.png" type="image/png" sizes="16x16">
    <link href="css/jquery.dataTables.min.css" type="text/css" rel="stylesheet">

</head>

<body>

<div class="wrapper" style="background:#E57373;">

    <?php require('a_menu.php') ?>

    <!-- Modal -->
    <div id="AddProduct" class="fade modal" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Product</h4>
                </div>
                <div class="modal-body">
                    <fieldset>
                        <!--                            <legend>Add New Product</legend>-->

                        <form class="form-horizontal" id="item_form" enctype="multipart/form-data" action="controller/item.php" method="post">
                            <div class="row">
                                <input type="hidden" id="item-insert" name="formType" value="add">
                                <input type="hidden" id="item_id" name="item_id">
                                <div class="form-group col-sm-6">
                                    <label class="control-label col-sm-4">Name<span style="color:red;"> *</span></label>

                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="itemName" id="itemName" onchange="checkItemName()">
                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="control-label col-sm-4">Category<span style="color:red;"> *</span></label>

                                    <div class="col-sm-8">
                                        <select name="category_id" class="form-control" id="category-id">
                                            <option value="#">---Select Category---</option>
                                            <?php
                                            $categoryList = getCategory($connection);

                                            foreach($categoryList as $category) {?>

                                                <option value="<?php echo $category["id"] ?>"><?php echo $category["category_name"] ?></option>

                                            <?php }
                                            ?>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="control-label col-sm-4">Sub Category<span style="color:red;"> *</span></label>

                                    <div class="col-sm-8">
                                        <select name="sub_category_id" class="form-control" id="sub_category_id">
                                            <option>---Select Subcategory---</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="control-label col-sm-4">Size<span style="color:red;"> </span></label>

                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="item_size" id="item_size">
                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="control-label col-sm-4">Description<span style="color:red;"> *</span></label>

                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="description" id="description">
                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="control-label col-sm-4">Color<span style="color:red;"> </span></label>

                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="color" id="color">
                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="control-label col-sm-4">Price<span style="color:red;"> *</span></label>

                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="price" id="price">
                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="control-label col-sm-4">Discount<span style="color:red;"> </span></label>

                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="discount" id="discount">
                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="control-label col-sm-4">Discounted Price<span style="color:red;"> </span></label>

                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="discountedPrice" id="discountedPrice">
                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="control-label col-sm-4">Image<span style="color:red;"> </span></label>

                                    <div class="col-sm-8">
                                        <input type="file" name="file" id="image">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" style="padding-left: 18%;">
                                <button type="submit" class="btn btn-primary" id="save">Add</button>
                            </div>
                        </form>
                    </fieldset>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

    <div class="container">
        <div class="row">
            <!-- Trigger the modal with a button -->
            <button type="button" class="btn btn-default" id="itemButton" >Add Product</button>
        </div>
        <div class="row" style="margin-top: 25px;">

            <div class="row" style="margin-top: 25px; padding: 25px; background-color: rgba(248, 248, 248, 0.8);">
                <table id="item_table" class="display" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Product name</th>
                        <th>Actual Price</th>
                        <th>Discounted Price</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php

                    $itemList =  getAllProduct($connection);

                    foreach($itemList as $item){?>
                        <tr>
                            <td><?php echo $item["item_name"] ?></td>
                            <td><?php echo $item["price"]?></td>
                            <td><?php echo $item["discounted_price"]?></td>
                            <td><button class="btn btn-default" onclick="return deleteItem(<?php echo $item["id"]?>)"><span class="glyphicon glyphicon-trash"></span></button>&nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-default" onclick=" return editItem(<?php echo $item['id'] ?>)"><span class="glyphicon glyphicon-pencil"></span></button></td>
                        </tr>
                        <?php
                    }
                    ?>

                    </tbody>
                </table>
            </div>
        </div>

        <?php require('a_footer.php') ?>
    </div>

    <script>

        $('#itemButton').click(function(){

            $('#AddProduct').modal('show');
            $('#AddProduct .modal-title').html('Add Product');
            $('#AddProduct button[type=submit]').html("Add");
            $('#item-insert').attr('value','add');
            $('#item_id').removeAttr('value');
        });

        $('#item_table').DataTable(
            {
                "lengthMenu": [[6,12,24,-1],[6,12,24,"ALL"]]
            }
        );

        $('#discount').on('change',function(){

            var price = parseFloat($('#price').val());
            var discount = parseFloat($('#discount').val());

            var discountPrice = price - (discount/100)*price;

            $('#discountedPrice').attr("value",discountPrice)
        });


        $('#category-id').on('change',function(){

            var e = document.getElementById("category-id");
            var cat = e.options[e.selectedIndex].value;

            var mode = "select";

            $.ajax({
                type:"POST",
                url:'../../controller/subcategory.php',
                data:"formType="+mode+"&id="+cat,
                success:function(data){
                    var data = JSON.parse(data);
                    $('#sub_category_id').empty();
                    for(var i = 0; i < data.length; i++){

                        var sub_cat = "<option value='" +data[i].id+ "'>"+data[i].sub_category_name+"</option>";
                        $('#sub_category_id').append(sub_cat);
                    }


                },error: function (er) {
                    alert("Error while Creating" +er);
                }
            });
        })
    </script>

</body>
</html>