<script>
    function removeWishlist(id)
    {
        $.ajax({
            type: 'DELETE',
            url: '{{url("user/wishlist/")}}/'+id,
            data: {_token:"{{csrf_token()}}",_method:'Delete'},
            dataType: 'json',
            success: function(response) {
                if(response.status == true){
                    $("#wishlist_"+id).fadeOut();
                    alertNotification('info','Wishlist',response.message)
                }
            }
        });
    }
</script>
