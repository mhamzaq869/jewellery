<script>
     function showFolderModel(url) {
        $.ajax({
            url: url,
            type: "GET",
            success: function(response) {
                if(response.status == true){
                    var integration = response.data;
                    $("#integration_id").val(integration.id)
                    $("#client_id").val(integration.client_id)
                    $("#secret_id").val(integration.secret_key)

                    if(integration.type == 'live'){
                        $("#Live").attr('checked',true)
                    }else{
                        $("#Live").removeAttr('checked',false)
                    }

                    if(integration.type == 'sandbox'){
                        $("#SandBox").attr('checked',true)
                    }else{
                        $("#Live").removeAttr('checked',false)
                    }

                    $('#myModalLabel').text(integration.name+ 'Integration');
                    $('#add-integration').modal('show');
                }

            }
        });
    }


    $("#save-details").submit(function(e){
        e.preventDefault();

        $.ajax({
            url: $(this).attr('action'),
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                if(response.status == true){
                    $("#add-integration").modal('hide');
                    alertNotification('success','',response.message)
                }

            },
            error: function(e) {
                console.log(e);
            }
        });
    });

</script>
