<script>
    //Product show in cart
   function CartProductsOnPage(){
       $.ajax({
           type: 'GET',
           url: '{{url("carts")}}',
           dataType: 'json',
           success: function(response) {
               if(response.status == true){
                   var data = response.data;
                   var html = '';
                   $.each(response.data, function(index,data){
                         html +=  `<li class="list-group-item" id="cart-${data.id}">
                                        <div class="row align-items-center">
                                            <div class="col-3">

                                                <!-- Image -->
                                                <a href="${root+'product/'+data.slug}">
                                                    <img class="img-fluid" src="${root+data.product.photo}" alt="...">
                                                </a>

                                            </div>
                                            <div class="col">

                                                <!-- Title -->
                                                <div class="d-flex mb-2 fw-bold">
                                                    <a class="text-body" href="#">${data.product.title}</a> <span
                                                        class="ms-auto">${'$'+data.price.toFixed(2)}</span>
                                                </div>

                                                <!-- Text -->
                                                <p class="mb-7 fs-sm text-muted">
                                                    Size: ${data.size}
                                                </p>

                                                <!--Footer -->
                                                <div class="d-flex align-items-center">

                                                    <!-- Select -->
                                                    <select class="form-select form-select-xxs w-auto" onchange="cartUpdateOnPage(this.value,${data.id})">
                                                        <option value="1" ${data.quantity == 1 ? 'selected' : ''}>1</option>
                                                        <option value="2" ${data.quantity == 2 ? 'selected' : ''}>2</option>
                                                        <option value="3" ${data.quantity == 3 ? 'selected' : ''}>3</option>
                                                        <option value="4" ${data.quantity == 4 ? 'selected' : ''}>4</option>
                                                        <option value="5" ${data.quantity == 5 ? 'selected' : ''}>5</option>
                                                        <option value="6" ${data.quantity == 6 ? 'selected' : ''}>6</option>
                                                        <option value="7" ${data.quantity == 7 ? 'selected' : ''}>7</option>
                                                        <option value="8" ${data.quantity == 8 ? 'selected' : ''}>8</option>
                                                        <option value="9" ${data.quantity == 9 ? 'selected' : ''}>9</option>
                                                        <option value="10" ${data.quantity == 10 ? 'selected' : ''}>10</option>
                                                    </select>

                                                    <!-- Remove -->
                                                    <a class="fs-xs text-gray-400 ms-auto" type="button" onclick="cartRemove(${data.id})">
                                                        <i class="fe fe-x"></i> Remove
                                                    </a>

                                                </div>

                                            </div>
                                        </div>
                                    </li>`

                   })

                   $(".cart-append-page").html(html)
                   $(".cart-subtotal").html('$'+response.subtotal.toFixed(2))
                   $(".cart-shipping").html('$'+response.shipping.toFixed(2))
                   $(".cart-tax").html('$'+response.tax.toFixed(2))
                   $(".cart-total").html('$'+response.total_price.toFixed(2))

               }
           }
       });
   }

   //Product Update to cart
   function cartUpdateOnPage(val,id){
       var value = [val]
       $.ajax({
           type: 'POST',
           url: '{{url("cart/update")}}',
           data:{_token:"{{csrf_token()}}", quant:value, id:id},
           dataType: 'json',
           success: function(response) {
               if(response.status == true){
                   CartProductsOnPage();
                   alertNotification('info','Cart',response.message)
               }
           }
       });
   }
</script>
