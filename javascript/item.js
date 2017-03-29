/**
 * Created by sanjeevbudha on 6/19/16.
 */

function saveItem(){

    var data = $('#item_form').serialize();

    $.ajax({
        type:"POST",
        url:'../../controller/item.php',
        data:data,
        success:function(data){
            var data = JSON.parse(data);

            if(data.message=='success'){
                displayMessage("successfully added","success");
                customReloadWindow(2000)

            }else{
                displayMessage("Error while saving","error")
            }
        },error: function (er) {
            alert("Error while Creating" +er);
        }
    });
    return false;
}


function checkItemName(){
    var itemName = $('#itemName').val();

    var mode ='checkItemName';

    $.ajax({
        type:"POST",
        url:'../../controller/item.php',
        data:"formType="+mode+"&itemName="+itemName,
        success:function(data){
            var data = JSON.parse(data);

            if(data.message=='duplicate'){
                displayMessage("Duplicate Item Name","error")
            }
        },error: function (er) {
            alert("Error while Creating" +er);
        }
    });
    return false;
}

function deleteItem(id){

    var mode ='delete';

    var n = noty({
        layout: 'center',
        text: "Are you sure you want to delete?",
        killer: true,
        buttons: [
            {
                addClass: 'btn btn-primary', text: 'Ok', onClick: function ($noty) {
                n.close();
                $.ajax({
                    type:"POST",
                    url:'../../controller/item.php',
                    data:"formType="+mode+"&id="+id,
                    success:function(data){
                        var data = JSON.parse(data);

                        if(data.message=='success'){
                            displayMessage("Successfully Deleted","success");
                            customReloadWindow(2000)
                        }

                    },error: function (er) {
                        alert("Error while Creating" +er);
                    }
                });
                return false;
            }
            },
            {
                addClass: 'btn btn-danger', text: 'Cancel', onClick: function ($noty) {
                n.close();
            }
            }
        ]
    })

}

function editItem(id){

    var mode ='edit';

    $.ajax({
        type:"POST",
        url:'../../controller/item.php',
        data:"formType="+mode+"&id="+id,
        success:function(data){
            var data = JSON.parse(data);

            $("#itemName").val(data['item_name']);
            $("#category-id").val();
            $('#sub_category_id').val();
            $('#item_size').val(data['size']);
            $('#description').val(data['description']);
            $('#color').val(data['color']);
            $('#price').val(data['price']);
            $('#discount').val(data['discount']);
            $('#discountedPrice').val(data['discounted_price']);
            $('#image').attr('value',data['image']);

            $('#AddProduct').modal('show');
            $('#AddProduct .modal-title').html("Edit "+ data['item_name']+" Product");
            $('#AddProduct button[type=submit]').html("Save Changes");
            $('#item-insert').attr('value','update');
            $('#item_id').attr('value',data['id']);

            $('.modal').on('hidden.bs.modal', function(){
                $(this).find('form')[0].reset();
            });

        },error: function (er) {
            alert("Error while Creating" +er);
        }
    });

    return false;

}