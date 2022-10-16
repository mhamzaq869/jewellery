
    <input type="hidden" name="search_product" class="search_product" @isset($search_product) value="{{$search_product}}" @endisset>
    <input type="hidden" name="category_array" class="categories" @isset($category_array) value="{{$category_array}}" @endisset>
    <input type="hidden" name="brand_array" class="brands" @isset($brand_array) value="{{$brand_array}}" @endisset>
    <input type="hidden" name="size_array" class="sizes" @isset($size_array) value="{{$size_array}}" @endisset>
    <input type="hidden" name="min_price" class="min_price" @isset($min_price) value="{{$min_price}}" @endisset>
    <input type="hidden" name="max_price" class="max_price" @isset($max_price) value="{{$max_price}}" @endisset>


    <ul class="nav nav-vertical" id="filterNav">
        <li class="nav-item">

            <!-- Toggle -->
            <a class="nav-link dropdown-toggle fs-lg text-reset border-bottom mb-6"
                data-bs-toggle="collapse" href="#categoryCollapse">
                Category
            </a>
            @php
            if (isset($category_array)) {
                $check_category = explode(',', $category_array);
            }
            @endphp
            <!-- Collapse -->
            <div class="collapse" id="categoryCollapse">
                <div class="form-group">
                    <ul class="list-styled mb-0" id="productsNav">
                        {{-- <li class="list-styled-item">
                            <a class="list-styled-link" href="#">
                                All
                            </a>
                        </li> --}}
                        @foreach ($categories as $index => $cat)
                        <li class="list-styled-item">

                            <!-- Toggle -->
                            <a class="list-styled-link" data-bs-toggle="collapse"
                                href="#dressesCollapse{{$index}}" aria-expanded="false">
                                {{$cat->name}}
                            </a>

                            <!-- Collapse -->
                            <div class="collapse" id="dressesCollapse{{$index}}"
                                data-bs-parent="#productsNav">
                                <div class="py-4 ps-5">
                                    @foreach ($cat->children as $i => $child)
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" id="{{$child->name}}_{{$i}}" onclick="filter_product_for('category_filter')" name="categories[]" value="{{ $child->id }}"
                                        @if (isset($brand_array)) @if (in_array($child->id, $check_category)) checked @endif
                                        @endif type="checkbox">
                                        <label class="form-check-label" for="{{$child->name}}_{{$i}}">
                                            {{Str::ucfirst($child->name)}}
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </li>
                        @endforeach

                    </ul>
                </div>
            </div>

        </li>
        {{-- <li class="nav-item">

            <!-- Toggle -->
            <a class="nav-link dropdown-toggle fs-lg text-reset border-bottom mb-6"
                data-bs-toggle="collapse" href="#seasonCollapse">
                Season
            </a>

            <!-- Collapse -->
            <div class="collapse" id="seasonCollapse" data-simplebar-collapse="#seasonGroup">
                <div class="form-group form-group-overflow mb-6" id="seasonGroup">
                    <div class="form-check mb-3">
                        <input class="form-check-input" id="seasonOne" type="checkbox" checked>
                        <label class="form-check-label" for="seasonOne">
                            Summer
                        </label>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" id="seasonTwo" type="checkbox">
                        <label class="form-check-label" for="seasonTwo">
                            Winter
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" id="seasonThree" type="checkbox">
                        <label class="form-check-label" for="seasonThree">
                            Spring & Autumn
                        </label>
                    </div>
                </div>
            </div>

        </li> --}}
        <li class="nav-item">
            @php
            if (isset($brand_array)) {
                $check_brand = explode(',', $brand_array);
            }
            @endphp
            <!-- Toggle -->
            <a class="nav-link dropdown-toggle fs-lg text-reset border-bottom mb-6"
                data-bs-toggle="collapse" href="#brandCollapse">
                Brand
            </a>

            <!-- Collapse -->
            <div class="collapse" id="brandCollapse" data-simplebar-collapse="#brandGroup">

                <!-- Search -->
                <div data-list='{"valueNames": ["name"]}'>

                    <!-- Input group -->
                    <div class="input-group input-group-merge mb-6">
                        <input class="form-control form-control-xs search" type="search"
                            placeholder="Search Brand">

                        <!-- Button -->
                        <div class="input-group-append">
                            <button class="btn btn-outline-border btn-xs">
                                <i class="fe fe-search"></i>
                            </button>
                        </div>

                    </div>

                    <!-- Form group -->
                    <div class="form-group form-group-overflow mb-6" id="brandGroup">
                        <div class="list">
                            @foreach ($brands as $i => $brand)
                            <div class="form-check mb-3">
                                <input class="form-check-input"  type="checkbox" onclick="filter_product_for('brand_filter')" name="brands[]"
                                @if (isset($brand_array)) @if (in_array($brand->id, $check_brand)) checked @endif
                                @endif id="{{$brand->name}}_{{$i}}" value="{{$brand->id}}">
                                <label class="form-check-label name" for="{{$brand->name}}_{{$i}}">
                                    {{$brand->name}}
                                </label>
                            </div>
                            @endforeach
                        </div>
                    </div>

                </div>

            </div>

        </li>
        <li class="nav-item">
            @php
                if (isset($size_array)) {
                    $check_size = explode(',', $size_array);
                }
            @endphp
            <!-- Toggle -->
            <a class="nav-link dropdown-toggle fs-lg text-reset border-bottom mb-6"
                data-bs-toggle="collapse" href="#sizeCollapse">
                Size
            </a>

            <!-- Collapse -->
            <div class="collapse" id="sizeCollapse" data-simplebar-collapse="#sizeGroup">
                <div class="form-group form-group-overlow mb-6" id="sizeGroup">

                    <div class="form-check form-check-inline form-check-size mb-2">
                        <input class="form-check-input" id="sizeFour" type="checkbox" name="sizes[]" value="small" onclick="filter_product_for('shape_filter')"
                        @if (isset($size_array)) @if (in_array('small', $check_size)) checked @endif
                        @endisset >
                        <label class="form-check-label" for="sizeFour">
                            S
                        </label>
                    </div>
                    <div class="form-check form-check-inline form-check-size mb-2">
                        <input class="form-check-input" id="sizeFive" type="checkbox" name="sizes[]" value="medium" onclick="filter_product_for('shape_filter')"
                        @if (isset($size_array)) @if (in_array('medium', $check_size)) checked @endif
                        @endisset >
                        <label class="form-check-label" for="sizeFive">
                            M
                        </label>
                    </div>
                    <div class="form-check form-check-inline form-check-size mb-2">
                        <input class="form-check-input" id="sizeSix" type="checkbox" name="sizes[]" value="large" onclick="filter_product_for('shape_filter')"
                        @if (isset($size_array)) @if (in_array('large', $check_size)) checked @endif
                        @endisset >
                        <label class="form-check-label" for="sizeSix">
                            L
                        </label>
                    </div>

                </div>
            </div>

        </li>
        {{-- <li class="nav-item">

            <!-- Toggle -->
            <a class="nav-link dropdown-toggle fs-lg text-reset border-bottom mb-6"
                data-bs-toggle="collapse" href="#colorCollapse">
                Color
            </a>

            <!-- Collapse -->
            <div class="collapse" id="colorCollapse" data-simplebar-collapse="#colorGroup">
                <div class="form-group form-group-overflow mb-6" id="colorGroup">
                    <div class="form-check form-check-color mb-3">
                        <input class="form-check-input" id="colorOne" type="checkbox"
                            style="background-color: black">
                        <label class="form-check-label text-body" for="colorOne">
                            Black
                        </label>
                    </div>
                    <div class="form-check form-check-color mb-3">
                        <input class="form-check-input" id="colorTwo" type="checkbox"
                            style="background-color: #f9f9f9;" checked>
                        <label class="form-check-label text-body" for="colorTwo">
                            White
                        </label>
                    </div>
                    <div class="form-check form-check-color mb-3">
                        <input class="form-check-input" id="colorThree" type="checkbox"
                            style="background-color: #3b86ff">
                        <label class="form-check-label text-body" for="colorThree">
                            Blue
                        </label>
                    </div>
                    <div class="form-check form-check-color mb-3">
                        <input class="form-check-input" id="colorFour" type="checkbox"
                            style="background-color: #ff6f61">
                        <label class="form-check-label text-body" for="colorFour">
                            Red
                        </label>
                    </div>
                    <div class="form-check form-check-color mb-3">
                        <input class="form-check-input" id="colorFive" type="checkbox"
                            style="background-color: #795548" disabled>
                        <label class="form-check-label text-body" for="colorFive">
                            Brown
                        </label>
                    </div>
                    <div class="form-check form-check-color mb-3">
                        <input class="form-check-input" id="colorSix" type="checkbox"
                            style="background-color: #bababa">
                        <label class="form-check-label text-body" for="colorSix">
                            Gray
                        </label>
                    </div>
                    <div class="form-check form-check-color mb-3">
                        <input class="form-check-input" id="colorSeven" type="checkbox"
                            style="background-color: #17a2b8;">
                        <label class="form-check-label text-body" for="colorSeven">
                            Cyan
                        </label>
                    </div>
                    <div class="form-check form-check-color">
                        <input class="form-check-input" id="colorEight" type="checkbox"
                            style="background-color: #e83e8c;">
                        <label class="form-check-label text-body" for="colorEight">
                            Pink
                        </label>
                    </div>
                </div>
            </div>

        </li> --}}

        <li class="nav-item">

            <!-- Toggle -->
            <a class="nav-link dropdown-toggle fs-lg text-reset border-bottom mb-6"
                data-bs-toggle="collapse" href="#priceCollapse">
                Price
            </a>

            <!-- Collapse -->
            <div class="collapse" id="priceCollapse" data-simplebar-collapse="#priceGroup">

                <!-- Form group-->
                <div class="form-group form-group-overflow mb-6" id="priceGroup">
                    <div class="form-check mb-3">
                        <input class="form-check-input price" id="priceOne" type="checkbox" onclick="filter_product_for('price_filter','10-49')" value="10-49"  @isset($min_price) {{$min_price == 10 && $max == 49 ? 'checked' : ''}} @endisset>
                        <label class="form-check-label" for="priceOne">
                            $10.00 - $49.00
                        </label>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input price" id="priceTwo" type="checkbox" onclick="filter_product_for('price_filter','50-99')" value="50-99"  @isset($min_price) {{$min_price == 50 && $max == 99 ? 'checked' : ''}} @endisset>
                        <label class="form-check-label" for="priceTwo">
                            $50.00 - $99.00
                        </label>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input price" id="priceThree" type="checkbox" onclick="filter_product_for('price_filter','100-199')" value="100-199"  @isset($min_price) {{$min_price == 100 && $max == 199 ? 'checked' : ''}} @endisset>
                        <label class="form-check-label" for="priceThree">
                            $100.00 - $199.00
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input price" id="priceFour" type="checkbox" onclick="filter_product_for('price_filter','200-1000000')" value="200-1000000"  @isset($min_price) {{$min_price == 200 && $max == 1000000 ? 'checked' : ''}} @endisset>
                        <label class="form-check-label" for="priceFour">
                            $200.00 and Up
                        </label>
                    </div>
                </div>

                <!-- Range -->
                <div class="d-flex align-items-center">

                    <!-- Input -->
                    <input type="number" class="form-control form-control-xs" id="min_price" placeholder="$10.00"
                        min="10" @isset($min_price)  value="{{$min_price}}" @endisset>

                    <!-- Divider -->
                    <div class="text-gray-350 mx-2">‒</div>

                    <!-- Input -->
                    <input type="number" class="form-control form-control-xs" id="max_price" placeholder="$350.00"
                     @isset($max_price) value="{{$max_price}}" @endisset >

                </div>

            </div>

        </li>
    </ul>
