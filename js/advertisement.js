/**
 * Created by Pratik on 7/4/2016.
 */

function deleteAd(id){

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
                    url:'controller/advertisement.php',
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

function editAdvertisement(id){

    var mode ='edit';

    $.ajax({
        type:"POST",
        url:'controller/advertisement.php',
        data:"edit="+mode+"&id="+id,
        success:function(data){

            var data = JSON.parse(data);

            $("#urlLink").val(data['url_link']);
            $("#category-id").val();
            $('#expiryDate').val(data['expiry_date']);

            $('#insert-ad').attr('value','update');
            $('#ad_id').attr('value',data['id']);

            $('.modal').on('hidden.bs.modal', function(){
                $(this).find('form')[0].reset();
            });

        },error: function (er) {
            alert("Error while Creating" +er);
        }
    });

    return false;

}
