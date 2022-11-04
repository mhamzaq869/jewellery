<!-- FOOTER -->
<footer class="bg-dark bg-cover " style="background-image: url({{asset('img/patterns/pattern-2.svg')}})">
    <div class="py-12 border-bottom border-gray-700">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8 col-xl-6">

                    <!-- Heading -->
                    <h5 class="mb-7 text-center text-white">Want style Ideas and Treats?</h5>

                    <!-- Form -->
                    <form class="newsletter-inner mb-11" method="POST" action="{{route('subscribe')}}">
                        @csrf
                        <div class="row gx-5 align-items-start">
                            <div class="col">
                                <input type="email" name="email" class="form-control form-control-gray-700 form-control-lg"
                                    placeholder="Enter Email *">
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-gray-500 btn-lg">Subscribe</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-3">

                    <!-- Heading -->
                    <h4 class="mb-6 text-white">
                        <img src="{{asset($site_setting->logo)}}" alt="logo" width="55px">
                    </h4>

                    <!-- Social -->
                    <ul class="list-unstyled list-inline mb-7 mb-md-0">
                        <li class="list-inline-item">
                            <a href="{{$site_setting->facebook}}" class="text-gray-350">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>
                        {{-- <li class="list-inline-item">
                            <a href="{{$site_setting->facebook}}" class="text-gray-350">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </li> --}}
                        <li class="list-inline-item">
                            <a href="{{$site_setting->twitter}}" class="text-gray-350">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="{{$site_setting->instagram}}" class="text-gray-350">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="{{$site_setting->medium}}" class="text-gray-350">
                                <i class="fab fa-medium"></i>
                            </a>
                        </li>
                    </ul>

                </div>
                <div class="col-6 col-sm">

                    <!-- Heading -->
                    <h6 class="heading-xxs mb-4 text-white">
                        Support
                    </h6>

                    <!-- Links -->
                    <ul class="list-unstyled mb-7 mb-sm-0">
                        <li>
                            <a class="text-gray-300" href="{{route('contact')}}">Contact Us</a>
                        </li>
                        <li>
                            <a class="text-gray-300" href="{{route('faq')}}">FAQs</a>
                        </li>
                        {{-- <li>
                            <a class="text-gray-300" data-bs-toggle="modal" href="#modalSizeChart">Size Guide</a>
                        </li> --}}
                        <li>
                            <a class="text-gray-300" href="{{route('shipping.returns')}}">Shipping & Returns</a>
                        </li>
                    </ul>

                </div>
                <div class="col-6 col-sm">

                    <!-- Heading -->
                    <h6 class="heading-xxs mb-4 text-white">
                        Shop
                    </h6>

                    <!-- Links -->
                    <ul class="list-unstyled mb-7 mb-sm-0">
                        <li>
                            <a class="text-gray-300" href="shop.html">Men's Shopping</a>
                        </li>
                        <li>
                            <a class="text-gray-300" href="shop.html">Women's Shopping</a>
                        </li>
                        <li>
                            <a class="text-gray-300" href="shop.html">Kids' Shopping</a>
                        </li>
                        <li>
                            <a class="text-gray-300" href="shop.html">Discounts</a>
                        </li>
                    </ul>

                </div>
                <div class="col-6 col-sm">

                    <!-- Heading -->
                    <h6 class="heading-xxs mb-4 text-white">
                        Company
                    </h6>

                    <!-- Links -->
                    <ul class="list-unstyled mb-0">
                        <li>
                            <a class="text-gray-300" href="{{route('about')}}">Our Story</a>
                        </li>
                        {{-- <li>
                            <a class="text-gray-300" href="#!">Careers</a>
                        </li> --}}
                        <li>
                            <a class="text-gray-300" href="{{route('terms.condition')}}">Terms & Conditions</a>
                        </li>
                        <li>
                            <a class="text-gray-300" href="{{route('privacy.policy')}}">Privacy & Cookie policy</a>
                        </li>
                    </ul>

                </div>
                <div class="col-6 col-sm">

                    <!-- Heading -->
                    <h6 class="heading-xxs mb-4 text-white">
                        Contact
                    </h6>

                    <!-- Links -->
                    <ul class="list-unstyled mb-0">
                        @foreach ($site_setting->decode_contact as $contact)
                        <li>
                            <a class="text-gray-300" href="#!">{{$contact}}</a>
                        </li>
                        @endforeach
                        @foreach ($site_setting->decode_email as $email)
                        <li>
                            <a class="text-gray-300" href="#!">{{$email}}</a>
                        </li>
                        @endforeach
                    </ul>

                </div>
            </div>
        </div>
    </div>
    <div class="py-6">
        <div class="container">
            <div class="row">
                <div class="col">

                    <!-- Copyright -->
                    <p class="mb-3 mb-md-0 fs-xxs text-muted">
                        © {{date('Y')}} All rights reserved.
                    </p>

                </div>
                <div class="col-auto">

                    <!-- Payment methods -->
                    <img class="footer-payment" src="{{asset('/img/payment/mastercard.svg')}}" alt="...">
                    <img class="footer-payment" src="{{asset('/img/payment/visa.svg')}}" alt="...">
                    <img class="footer-payment" src="{{asset('/img/payment/amex.svg')}}" alt="...">
                    <img class="footer-payment" src="{{asset('/img/payment/paypal.svg')}}" alt="...">
                    <img class="footer-payment" src="{{asset('/img/payment/maestro.svg')}}" alt="...">
                    <img class="footer-payment" src="{{asset('/img/payment/klarna.svg')}}" alt="...">

                </div>
            </div>
        </div>
    </div>
</footer>

<!-- JAVASCRIPT -->
<!-- Map (replace the API key to enable) -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCnKt8_N4-FKOnhI_pSaDL7g_g-XI1-R9E"></script>

<!-- Vendor JS -->
<script src="{{ asset('js/vendor.bundle.js') }}"></script>

<!-- Theme JS -->
<script src="{{ asset('js/theme.bundle.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{asset('backend/app-assets/vendors/js/extensions/toastr.min.js')}}"></script>
<script src="https://js.pusher.com/7.0.2/pusher.min.js"></script>
<script type="text/javascript">
    var pusher = new Pusher("{{ pusherCredentials('key') }}", {
        cluster: "{{ pusherCredentials('cluster') }}",
    });
    // Enter a unique channel you wish your users to be subscribed in.
    var channel = pusher.subscribe('order.' + `{{ Auth::id() }}`);

</script>

@stack('script')
<script>
    var root = "{{asset('')}}" //domain name with http|https
    //Product Detail modal
    function ProductModal(id){
        $.ajax({
            type: 'GET',
            url: '{{url("product")}}/'+id+'/detail/ajax',
            dataType: 'json',
            success: function(response) {
                if(response.status == true){
                    var data = response.data
                    var size = '<span class="size-error d-none text-danger small font-weight-bold"><b>You must select product size</b></span><br>'
                    $(".modalImage").attr('src',root+data.photo);
                    $(".modalLink").attr('href',root+'product/'+data.slug);
                    $(".modalTitle").text(capitalizeFirstLetter(data.title));
                    if(data.discount > 0){

                        var price =  `<div class="fw-bold">
                                        <span class="fs-xs text-gray-350 text-decoration-line-through">$${data.price}</span>
                                        <span class="text-primary">$${data.price - data.discount}</span>
                                    </div>`
                    }else{
                        var price = `<div class="fw-bold text-muted">
                                        $${data.price}
                                    </div>`
                    }
                    $(".modalPrice").html(price);
                    $(".modalStock").text(data.quantity > 0 ? '(In Stock)' : '');
                    $(".product_id").val(data.id);
                    $(".modalDetail").html(data.short_description);
                    $.each(data.decode_size,function(index,item){
                        size += `<div class="form-check form-check-inline form-check-size mb-2 border-color">
                                    <input type="radio" class="form-check-input size" name="size" id="modalProductSize${index}" value="${item}" >
                                    <label class="form-check-label" for="modalProductSize${index}">${capitalizeFirstLetter(item)}</label>
                                </div>`
                    });
                    $(".Modalsize").html(size);
                    $(".modalProduct").modal('show');
                }
            }
        });
    }
    //Product show in cart
    CartProducts()
    function CartProducts(){
        $.ajax({
            type: 'GET',
            url: '{{url("carts")}}',
            dataType: 'json',
            success: function(response) {
                if(response.status == true){
                   var data = response.data;
                    var html = '';
                    $.each(response.data, function(index,data){
                        html += `<li class="list-group-item" id="cart-${data.id}">
                                    <div class="row align-items-center">
                                        <div class="col-4">
                                            <!-- Image -->
                                            <a href="${root+'product/'+data.slug}">
                                                <img class="img-fluid" src="${root+data.product.photo}" alt="...">
                                            </a>
                                        </div>
                                        <div class="col-8">

                                            <!-- Title -->
                                            <p class="fs-sm fw-bold mb-6">
                                                <a class="text-body" href="product.html">${data.product.title}</a> <br>
                                                <span class="text-muted">${'$'+data.price.toFixed(2)}</span>
                                            </p>

                                            <!--Footer -->
                                            <div class="d-flex align-items-center">

                                                <!-- Select -->
                                                <select class="form-select form-select-xxs w-auto" onchange="cartUpdate(this.value,${data.id})">
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
                    $("#nav_cart_count").attr('data-cart-items',data.length)
                    $("#cart_length").html(data.length)
                    $(".cart-append").html(html)
                    $(".cart_subtotal").html('$'+response.subtotal.toFixed(2))

                }
            }
        });
    }

    //Product Search
    $("#searchProductForm").submit(function(e) {
        e.preventDefault();

        var form = $(this);
        var url = form.attr('action'); //get submit url [replace url here if desired]
        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(), // serializes form input
            success: function(response) {
                var data = response.data;
                if(response.status == true){
                    $html = `<p>Search Results:</p>`;

                    if(data.length > 0){
                        for($i=0; $i < data.length; $i++){
                            $html +=`<div class="row align-items-center position-relative mb-5">
                                        <div class="col-4 col-md-3">

                                            <!-- Image -->
                                            <img class="img-fluid" src="${root+data[$i].photo}" alt="...">

                                        </div>
                                        <div class="col position-static">

                                            <!-- Text -->
                                            <p class="mb-0 fw-bold">
                                                <a class="stretched-link text-body" href="/product/${data[$i].slug}">${data[$i].title}</a> <br>
                                                <span class="text-muted">$${data[$i].price}</span>
                                            </p>

                                        </div>
                                    </div>`;
                        }

                        $html += `<a class="btn btn-link px-0 text-reset" href="/shop">
                                    View All <i class="fe fe-arrow-right ms-2"></i>
                                </a>`
                    }else{
                        $html = `<!-- Text -->
                                <p class="mb-3 fs-sm text-center">
                                    Nothing matches your search
                                </p>

                                <!-- Smiley -->
                                <p class="mb-0 fs-sm text-center">
                                    😞
                                </p>`
                    }

                    $('.searchReasult').html($html);
                }else{
                    alertNotification('error','Search',response.message)
                }
            }
        });
    });

    //Product add to cart
    $("#addToCartForm").submit(function(e) {
        e.preventDefault(); // prevent actual form submit

        if($('input[name=size]:checked').val() == undefined){
            $('.border-color').addClass('border border-danger')
            $('.size-error').removeClass('d-none')
            return false;
        }else{
            $('.border-color').removeClass('border border-danger')
        }

        var form = $(this);
        var url = form.attr('action'); //get submit url [replace url here if desired]
        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(), // serializes form input
            success: function(response) {
                if(response.status == true){
                    CartProducts();
                    $(".modalProduct").modal('hide');
                    $('.size-error').addClass('d-none')
                    alertNotification('info','Cart',response.message)
                }else{
                    alertNotification('error','Cart',response.message)
                }
            }
        });
    });

    //Product add to cart single
    function addCartSingle(id){
        $.ajax({
            type: 'GET',
            url: '{{url("add-to-cart-single")}}/'+id,
            dataType: 'json',
            success: function(response) {
                if(response.status == true){
                    CartProducts();
                    alertNotification('info','Cart',response.message)
                }
            }
        });
    }

     //Product Update to cart
    function cartUpdate(val,id){
        var value = [val]
        $.ajax({
            type: 'POST',
            url: '{{url("cart/update")}}',
            data:{_token:"{{csrf_token()}}", quant:value, id:id},
            dataType: 'json',
            success: function(response) {
                if(response.status == true){
                    CartProducts();
                    alertNotification('info','Cart',response.message)
                }
            }
        });
    }

    //Product remove to cart
    function cartRemove(id){
        $.ajax({
            type: 'GET',
            url: '{{url("cart/")}}/'+id+'/destroy',
            dataType: 'json',
            success: function(response) {
                if(response.status == true){
                    $("#cart-"+id).fadeOut();
                    CartProducts();
                    alertNotification('info','Cart',response.message)
                }
            }
        });
    }

    //Product add to cart single
    function addWishlist(id){
        $.ajax({
            type: 'POST',
            url: '{{route("wishlist.store")}}',
            data: {
                _token: "{{csrf_token()}}",
                id:id
            },
            success: function(response) {
                if(response.status == true){
                    alertNotification('info','Wishlist',response.message)
                }else{
                    alertNotification('error','',response.message)
                }
            }
        });
    }

    //Product waitList
    $("#waitlistForm").on('submit', (function(e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                if(data.status == true){
                    $("#modalWaitList").modal('hide')
                    alertNotification('info','WaitList',data.message)
                }else{
                    alertNotification('error','WaitList',data.message)
                }
            },
            error: function(e) {
                console.log(e);
            }
        });
    }));
    // Define function to capitalize the first letter of a string
    function capitalizeFirstLetter(string){
        return string.charAt(0).toUpperCase() + string.slice(1);
    }

    //Alert Notification Message Popup
    function alertNotification(type, heading, message) {
        toastr[type](message, heading, {
            closeButton: true,
            tapToDismiss: false,
        });
    }

    //Change Catalog tabs on Hover
    function changeNavTav(cat){
        $(`.nav-link`).removeClass('show active');
        $(`.nav-link-${cat}`).addClass('active');

        $(`.tab-pane`).removeClass('show active');
        $(`#${cat}`).addClass('show active');
    }

    //Newsletter Submit Form
    $(".newsletter-inner").on('submit', (function(e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                if(data.status == true){
                    alertNotification('info','Newsletter',data.message)
                }else{
                    alertNotification('error','Newsletter',data.message)
                }
            },
            error: function(e) {
                console.log(e);
            }
        });
    }));

    // Social Share
    const facebookButton = document.getElementById('facebook');
    const pinterestButton = document.getElementById('pinterest');
    const twitterButton = document.getElementById('twitter');

    facebookButton.addEventListener('click', function() {
        socialDialog(`https://www.facebook.com/sharer/sharer.php?u=${window.location.href}`);
    });

    pinterestButton.addEventListener('click', function() {
        socialDialog(`http://pinterest.com/pin/create/button/?url=${window.location.href}&media=${window.location.href}`);
    });

    twitterButton.addEventListener('click', function() {
        socialDialog(`https://twitter.com/intent/tweet?url=${window.location.href}`);
    });

    function socialDialog (url, social_dialog){
        const dialogWidth = 800;
        const dialogHeight = 600;
        const dialogTop = ( screen.height - dialogHeight ) / 2;
        const dialogLeft = ( screen.width - dialogWidth ) / 2;
        window.open(url, social_dialog, `width=${dialogWidth},height=${dialogHeight},top=${dialogTop},left=${dialogLeft}`);
        return false;
    }

</script>

