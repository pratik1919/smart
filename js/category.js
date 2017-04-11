/**
 * Created by sanjeevbudha on 6/18/16.
 */

function addCategory(){

    var data = $('#category_form').serialize();

    $.ajax({
        type:"POST",
        url:'controller/category.php',
        data:data,
        success:function(data){
            var data = JSON.parse(data);

            if(data){
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
function deleteCategory(id,name){

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
                    url:'controller/category.php',
                    data:"formType="+mode+"&id="+id,
                    success:function(data){
                        var data = JSON.parse(data);

                        if(data){
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

function editCategory(id,name){

    $("#categoryName").val(name);

    $('#addCategory').modal('show');
    $('#addCategory #saveCategory').html("Save Changes");
    $('#formType').attr('value','update');
    $('#c_id').attr('value',id);
    $('#addCategory #saveCategory').attr("onclick","updateCategory()");
}

function updateCategory(){

    var data = $('#category_form').serialize();

    $.ajax({
        type:"POST",
        url:'controller/category.php',
        data:data,
        success:function(data){
            var data = JSON.parse(data);

            if(data){
                displayMessage("successfully updated","success");
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
