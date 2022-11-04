<script>
    var current_product = "{{ $products->count() }}"

    $("#min_price,#max_price").keypress(function(event){
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if(keycode == '13'){
            filter_product_for('search_filter')
        }
    })

    /* Function for Product For(Man,Woman,Junior) */
    function filter_product_for(filter_type, price = null) {

        var min_price = $('#min_price').val();
        var max_price = $('#max_price').val();
        var search_product = $('#search').val();

        if (min_price != null || max_price != null) {
            if (price != null) {
                var maxmin = price.split('-')
                min_price = maxmin[0]
                max_price = maxmin[1]
            }
        }

        if(!$(".price").is(':checked')){
            min_price = ''
            max_price = ''
        }

        $('.min_price').val(min_price);
        $('.max_price').val(max_price);
        $('.search_product').val(search_product);

        var brand = document.getElementsByName('brands[]');
        var brand_array = "";
        for (var i = 0, n = brand.length; i < n; i++) {
            if (brand[i].checked) {
                brand_array += "," + brand[i].value;
            }
        }
        if (brand_array) brand_array = brand_array.substring(1);
        $('.brands').val(brand_array);

        var category = document.getElementsByName('categories[]');
        var category_array = "";
        for (var i = 0, n = category.length; i < n; i++) {
            if (category[i].checked) {
                category_array += "," + category[i].value;
            }
        }
        if (category_array) category_array = category_array.substring(1);
        $('.categories').val(category_array);

        var shape = document.getElementsByName('sizes[]');
        var shape_array = "";
        for (var i = 0, n = shape.length; i < n; i++) {
            if (shape[i].checked) {
                shape_array += "," + shape[i].value;
            }
        }
        if (shape_array) shape_array = shape_array.substring(1);
        $('.sizes').val(shape_array);

        $('.filterProducts').submit();

    }

    $(".filterProducts").submit(function(e) {
        e.preventDefault(); // prevent actual form submit
        var form = $(this);
        var url = form.attr('action'); //get submit url [replace url here if desired]
        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(), // serializes form input
            success: function(response){
                if(response.code == 200 && response.status == true)
                {
                    var data = response.result.data,
                        html = '';

                    $.each(data, function(index,item){

                        if(item.discount > 0){

                            var price =  `<div class="fw-bold">
                                                <span class="fs-xs text-gray-350 text-decoration-line-through">$${item.price}</span>
                                                <span class="text-primary">$${item.price - item.discount}</span>
                                            </div>`
                        }else{
                            var price = `<div class="fw-bold text-muted">
                                                $${item.price}
                                            </div>`
                        }

                        html += ` <div class="col-6 col-md-4">
                                    <div class="card mb-7">
                                        <div class="badge bg-white text-body card-badge card-badge-start text-uppercase">
                                            ${item.condition}
                                        </div>

                                        <!-- Image -->
                                        <div class="card-img">
                                            <!-- Image -->
                                            <a class="card-img-hover" href="${root}product/${item.slug}">
                                                <img class="card-img-top card-img-back" src="${root+item.photo_2}" alt="...">
                                                <img class="card-img-top card-img-front" src="${root+item.photo}" alt="...">
                                            </a>

                                            <!-- Actions -->
                                            <div class="card-actions">
                                                <span class="card-action">
                                                    <button type="button" class="btn btn-xs btn-circle btn-white-primary"
                                                        onclick="ProductModal(${item.id})">
                                                        <i class="fe fe-eye"></i>
                                                    </button>
                                                </span>
                                                <span class="card-action">
                                                    <button type="button" class="btn btn-xs btn-circle btn-white-primary"
                                                        onclick="addCartSingle('${item.slug}')">
                                                        <i class="fe fe-shopping-cart"></i>
                                                    </button>
                                                </span>
                                                <span class="card-action">
                                                    <button type="button" class="btn btn-xs btn-circle btn-white-primary"
                                                    onclick="addWishlist(${item.id})">
                                                        <i class="fe fe-heart"></i>
                                                    </button>
                                                </span>
                                            </div>

                                        </div>

                                        <!-- Body -->
                                        <div class="card-body px-0">

                                            <!-- Category -->
                                            <div class="fs-xs">
                                                <a class="text-muted"
                                                    href="shop/${item.category.name}">${item.category.name}</a>
                                                <i class="fa-solid fa-chevron-right font-9"></i>
                                                <a class="text-muted"
                                                    href="shop/${item.category.name}/${item.subcategory.name}">${item.subcategory.name}</a>
                                            </div>

                                            <!-- Title -->
                                            <div class="fw-bold">
                                                <a class="text-body" href="${root}product/${item.slug}">
                                                    ${item.title}
                                                </a>
                                            </div>

                                            <!-- Price -->
                                            ${price}
                                        </div>
                                    </div>
                                </div>`
                    });

                    $('.productLists').html(html)

                }else{
                    alertNotification('error','',response.message)
                }
            }
        });
    });

    //Load more on scroll page down
    var page = 1;
    var processing;
    $(document).ready(function(){
        $(".loadmore").click(function(){
            if(current_product > 0){
                $(".loader").removeClass('d-none');
                $(".loadmore").addClass('d-none');
                loadMoreData(++page);
            }
        });
    });

    function loadMoreData(page){
        $.ajax({
            url: "{{ route('filter.product') }}"+'?page=' + page,
            method: "get",
            dataType: "json",
            success: function(response){
                if(response.status == 1){
                    var data = response.result.data;
                    var html = '';
                    processing = false;

                    if(data.length > 0){
                        $.each(data, function(index,item){

                            if(item.discount > 0){

                                var price =  `<div class="fw-bold">
                                                    <span class="fs-xs text-gray-350 text-decoration-line-through">$${item.price}</span>
                                                    <span class="text-primary">$${item.price - item.discount}</span>
                                                </div>`
                            }else{
                                var price = `<div class="fw-bold text-muted">
                                                    $${item.price}
                                                </div>`
                            }

                            html += ` <div class="col-6 col-md-4">
                                        <div class="card mb-7">
                                            <div class="badge bg-white text-body card-badge card-badge-start text-uppercase">
                                                ${item.condition}
                                            </div>

                                            <!-- Image -->
                                            <div class="card-img">
                                                <!-- Image -->
                                                <a class="card-img-hover" href="${root}product/${item.slug}">
                                                    <img class="card-img-top card-img-back" src="${root+item.photo_2}" alt="...">
                                                    <img class="card-img-top card-img-front" src="${root+item.photo}" alt="...">
                                                </a>

                                                <!-- Actions -->
                                                <div class="card-actions">
                                                    <span class="card-action">
                                                        <button type="button" class="btn btn-xs btn-circle btn-white-primary"
                                                            onclick="ProductModal(${item.id})">
                                                            <i class="fe fe-eye"></i>
                                                        </button>
                                                    </span>
                                                    <span class="card-action">
                                                        <button type="button" class="btn btn-xs btn-circle btn-white-primary"
                                                            onclick="addCartSingle('${item.slug}')">
                                                            <i class="fe fe-shopping-cart"></i>
                                                        </button>
                                                    </span>
                                                    <span class="card-action">
                                                        <button type="button" class="btn btn-xs btn-circle btn-white-primary"
                                                        onclick="addWishlist(${item.id})">
                                                            <i class="fe fe-heart"></i>
                                                        </button>
                                                    </span>
                                                </div>

                                            </div>

                                            <!-- Body -->
                                            <div class="card-body px-0">

                                                <!-- Category -->
                                                <div class="fs-xs">
                                                    <a class="text-muted"
                                                        href="shop/${item.category.name}">${item.category.name}</a>
                                                    <i class="fa-solid fa-chevron-right font-9"></i>
                                                    <a class="text-muted"
                                                        href="shop/${item.category.name}/${item.subcategory.name}">${item.subcategory.name}</a>
                                                </div>

                                                <!-- Title -->
                                                <div class="fw-bold">
                                                    <a class="text-body" href="${root}product/${item.slug}">
                                                        ${item.title}
                                                    </a>
                                                </div>

                                                <!-- Price -->
                                                ${price}
                                            </div>
                                        </div>
                                    </div>`
                        });

                        $('.productLists').append(html)
                        $(".loadmore").removeClass('d-none');
                        $(".loader").addClass('d-none');
                    }else{
                        $('.productLists').append('<span class="text-center"> <i class="fe fe-alert-circle"></i> No More Products Found!</span>');
                        $(".loadmore").addClass('d-none');
                        $(".loader").addClass('d-none');
                    }
                }else{
                    console.error('server err');
                }
            }
        })
    }
</script>
