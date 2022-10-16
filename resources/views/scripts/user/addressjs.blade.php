<script>
    function removeAddress(id)
    {
        $.ajax({
            type: 'DELETE',
            url: '{{url("user/address/")}}/'+id,
            data: {_token:"{{csrf_token()}}",_method:'Delete'},
            dataType: 'json',
            success: function(response) {
                if(response.status == true){
                    $("#address_"+id).fadeOut();
                    alertNotification('info','Address',response.message)
                }
            }
        });
    }
</script>
