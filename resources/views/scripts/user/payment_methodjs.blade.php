<script>
    function removePayment(id)
    {
        $.ajax({
            type: 'DELETE',
            url: '{{url("user/payment/")}}/'+id,
            data: {_token:"{{csrf_token()}}",_method:'Delete'},
            dataType: 'json',
            success: function(response) {
                if(response.status == true){
                    $("#payment_"+id).fadeOut();
                    alertNotification('info','Payment',response.message)
                }
            }
        });
    }
</script>
