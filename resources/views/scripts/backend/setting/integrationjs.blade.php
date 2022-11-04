<script>
    function showFolderModel(url, type = null) {
        $.ajax({
            url: url,
            type: "GET",
            success: function(response) {
                if (response.status == true) {
                    var integration = response.data;

                    if (type == 'other') {
                        $("#integration_id").val(integration.id)
                        $("#client_id").val(integration.client_id)
                        $("#secret_id").val(integration.secret_key)

                        if (integration.type == 'live') {
                            $("#Live").attr('checked', true)
                        } else {
                            $("#Live").removeAttr('checked', false)
                        }

                        if (integration.type == 'sandbox') {
                            $("#SandBox").attr('checked', true)
                        } else {
                            $("#Live").removeAttr('checked', false)
                        }

                        $('#myModalLabel').text(integration.name + ' Integration');
                        $('#add-integration').modal('show');
                    } else if (type == 'smtp') {
                        $("#smtp_integration_id").val(integration.id)
                        $("#host").val(integration.host)
                        $("#username").val(integration.username)
                        $("#password").val(integration.password)
                        $("#encryption").val(integration.encryption)
                        $("#port").val(integration.port)
                        $('#smtpMyModalLabel').text(integration.name + ' Configuaration');
                        $('#smtp').modal('show');
                    } else if (type == 'mailchimp') {
                        $("#mailchimp_integration_id").val(integration.id)
                        $("#list_id").val(integration.app_id)
                        $("#api_key").val(integration.secret_key)
                        $('#mailchimpMyModalLabel').text(integration.name + ' Configuaration');
                        $('#mailchimp').modal('show');
                    }else {
                        $("#other_integration_id").val(integration.id)
                        $("#other_app_id").val(integration.app_id)
                        $("#other_client_id").val(integration.client_id)
                        $("#other_secret_id").val(integration.secret_key)
                        $("#other_cluster").val(integration.cluster)
                        $('#OthermyModalLabel').text(integration.name + ' Integration');
                        $('#add-other-integration').modal('show');
                    }
                }

            }
        });
    }

    function integrationStatus(id,element){
        $status = element.checked == true ? 1 : 0;

        $.ajax({
            type: "POST",
            url: `{{url('/admin/integration/${id}/update')}}`,
            data: {
                _token: "{{csrf_token()}}",
                status: $status
            },
            success: function(data) {
                if(data.status == true){
                    alertNotification('success','Integrations',data.message)
                }
            }
        });
    }

    $("#save-details").submit(function(e) {
        e.preventDefault();

        $.ajax({
            url: $(this).attr('action'),
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                if (response.status == true) {
                    $("#add-integration").modal('hide');
                    alertNotification('success', '', response.message)
                }

            },
            error: function(e) {
                console.log(e);
            }
        });
    });

    $("#other-save-details").submit(function(e) {
        e.preventDefault();

        $.ajax({
            url: $(this).attr('action'),
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                if (response.status == true) {
                    $("#add-other-integration").modal('hide');
                    alertNotification('success', '', response.message)
                }

            },
            error: function(e) {
                console.log(e);
            }
        });
    });

    $("#smtpForm").submit(function(e) {
        e.preventDefault();

        $.ajax({
            url: $(this).attr('action'),
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                if (response.status == true) {
                    $("#add-other-integration").modal('hide');
                    alertNotification('success', '', response.message)
                }

            },
            error: function(e) {
                console.log(e);
            }
        });
    });

    $("#mailchimpForm").submit(function(e) {
        e.preventDefault();

        $.ajax({
            url: $(this).attr('action'),
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                if (response.status == true) {
                    $("#mailchimp").modal('hide');
                    alertNotification('success', '', response.message)
                }

            },
            error: function(e) {
                console.log(e);
            }
        });
    });
</script>
