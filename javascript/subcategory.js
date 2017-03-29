/**
 * Created by sanjeevbudha on 6/18/16.
 */

function addSubCategory(id){

    $('#addSubCategory').modal('show');
    $('#ca_id').attr('value',id);

}

function deleteSubCat(id){

    var mode ='delete';

    var n = noty({
        layout: 'center',
        text: "Are you sure you want delete? ",
        killer: true,
        buttons: [
            {
                addClass: 'btn btn-primary', text: 'Ok', onClick: function ($noty) {
                n.close();
                $.ajax({
                    type:"POST",
                    url:'../../controller/subcategory.php',
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

function saveSubCategory(){

    var data = $('#subcategory_form').serialize();

    $.ajax({
        type:"POST",
        url:'../../controller/subcategory.php',
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

function editSubCat(id,cname){


    $("#subcategory").val(cname);

    $('#addSubCategory').modal('show');
    $('#addSubCategory .modal-title').html("Edit this Sub Category");
    $('#addSubCategory #saveChanges').html("Save Changes");
    $('#formTypes').attr('value','update');
    $('#ca_id').attr('value',id);
    $('#addSubCategory #saveChanges').attr("onclick","updateSubCat()");
}

function updateSubCat(){

    var data = $('#subcategory_form').serialize();
    $.ajax({
        type:"POST",
        url:'../../controller/subcategory.php',
        data:data,
        success:function(data){
            var data = JSON.parse(data);

            if(data.message=='success'){
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