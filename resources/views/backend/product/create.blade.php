@extends('backend.layouts.app')

@section('title', 'Product')
@section('home_url', route('product.index'))
@section('page', 'Create')

@push('style')
    <style>

    </style>
@endpush

@section('content')
    <div class="content-body">
        <section id="multiple-column-form">
            <form class="form" action="{{ route('product.store') }}" method="Post" id="productForm" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="card ">
                            <div class="card-body">
                                <input type="file" class="filepond" name="images[]"  multiple >
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h6 class="card-title mb-0">Shipping Configuration</h6>
                            </div>
                            <div class="card-body">
                                <div class="mb-1">
                                    <select name="shipping_id" class="select2 form-select">
                                        <option value="" selected>Shipping</option>
                                        @foreach ($shippings as $shipping)
                                            <option value="{{ $shipping->id }}">{{ $shipping->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('shipping_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>

                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h6 class="card-title mb-0">Vat &amp; TAX</h6>
                            </div>
                            <div class="card-body">

                                <div class="mb-1">
                                    <select name="tax_id" class="select2 form-select">
                                        <option value="" selected>Tax</option>
                                        @foreach ($taxes as $tax)
                                            <option value="{{ $tax->id }}">{{ $tax->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('tax_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h6 class="card-title mb-0">Return policy</h6>
                            </div>
                            <div class="card-body">
                                <div class="form-check form-check-inline mt-1">
                                    <input class="form-check-input shipping_check" type="checkbox" name="return" id="return" value="1">
                                    <label class="form-check-label" for="return">Is return available ?</label>
                                </div>
                                <div class="mt-1">
                                    <input type="number" name="return_days" id="return_days" class="form-control d-none" value="0">
                                </div>
                            </div>
                        </div>



                    </div>


                    <div class="col-8">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add Product</h4>
                            </div>
                            <div class="card-body">

                                    <div class="row">

                                        <div class="col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-column">Title</label>
                                                <input type="text" id="first-name-column" class="form-control"
                                                    placeholder="Enter Product Title" name="title">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-column">Category</label>
                                                <select name="category_id" id="category" class="select2 form-select">
                                                    <option value="" selected>Category</option>
                                                    @foreach ($parent_categories as $parent)
                                                        <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('category_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-column">Sub Category</label>
                                                <select name="subcategory_id" id="subcategory" class="select2 form-select">
                                                    <option value="" selected>Sub Category</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-column">Unit Price (USD)</label>
                                                <input type="number" id="first-name-column" class="form-control" name="unit_price">
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-column">Price (USD)</label>
                                                <input type="number" id="first-name-column" class="form-control" name="price">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-column">Discount (USD)</label>
                                                <select name="discount_id" class="select2 form-select">
                                                    <option value="" selected>Discount</option>
                                                    @foreach ($discounts as $discount)
                                                        <option value="{{ $discount->id }}">{{ $discount->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('discount_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-column">Quantity</label>
                                                <input type="number" id="first-name-column" class="form-control" name="quantity">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-column">Condition</label>
                                                <select name="condition" class="select2 form-select">
                                                    <option value="default" selected>Default</option>
                                                    <option value="new_arrival" >New Arrival</option>
                                                    <option value="hot">Hot</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <h6>Size</h6>
                                            <div class="form-check form-check-inline mt-1">
                                                <input class="form-check-input" type="checkbox" id="small" name="size[]" value="small" checked="">
                                                <label class="form-check-label" for="small">Small</label>
                                            </div>

                                            <div class="form-check form-check-inline mt-1">
                                                <input class="form-check-input" type="checkbox" id="Medium" name="size[]" value="medium" checked="">
                                                <label class="form-check-label" for="Medium">Medium</label>
                                            </div>

                                            <div class="form-check form-check-inline mt-1">
                                                <input class="form-check-input" type="checkbox" id="Large" name="size[]" value="large" checked="">
                                                <label class="form-check-label" for="Large">Large</label>
                                            </div>
                                        </div>



                                        <div class="col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-column">Description</label>
                                                <div id="full-container">
                                                    <textarea name="description" class="d-none" id="description"></textarea>
                                                    <div class="editor" style="height: 200px"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-column">Status</label>
                                                <select name="status" id="status" class="select2 form-select">
                                                    <option value="1" selected>Active</option>
                                                    <option value="0" >Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-1">
                                                <div class="form-check form-check-inline mt-3">
                                                    <input class="form-check-input" type="checkbox" name="is_featured" id="featured" value="1" >
                                                    <label class="form-check-label" for="featured">Is Featured</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 mt-2">
                                            <button type="submit"
                                                class="btn btn-primary me-1 waves-effect waves-float waves-light">Submit</button>
                                            <button type="reset" class="btn btn-outline-secondary waves-effect">Reset</button>
                                        </div>
                                    </div>

                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </div>
@endsection

@push('script')
    <script>
        var categories = @json($categories);

        $("#category").on('change', function(){
            var subcat = categories.filter(item => item.parent_id == this.value);
            var html = '<option value="" selected>Select Subcategory</option>';
            $.each(subcat , function(index, val) {
                html += '<option value="'+val.id+'">'+val.name+'</option>'
            });

            $("#subcategory").html(html)
            $("#subcategory").trigger('change')
        });


        $(".shipping_check").on('click', function(){
            if($(this).val() == 'flat_shipping'){
                $("#flat_shipping").removeClass('d-none')
            }else{
                $("#flat_shipping").addClass('d-none')
            }
        });

        $("#return").on('click', function(){
            if($(this).is(':checked')){
                $("#return_days").removeClass('d-none')
            }else{
                $("#return_days").addClass('d-none')
            }
        });


        var descriptionEditor = new Quill('#full-container .editor', {
            bounds: '#full-container .editor',
            modules: {
            formula: true,
            syntax: true,
            toolbar: [
                [
                {
                    font: []
                },
                {
                    size: []
                }
                ],
                ['bold', 'italic', 'underline', 'strike'],
                [
                {
                    color: []
                },
                {
                    background: []
                }
                ],
                [
                {
                    script: 'super'
                },
                {
                    script: 'sub'
                }
                ],
                [
                {
                    header: '1'
                },
                {
                    header: '2'
                },
                'blockquote',
                'code-block'
                ],
                [
                {
                    list: 'ordered'
                },
                {
                    list: 'bullet'
                },
                {
                    indent: '-1'
                },
                {
                    indent: '+1'
                }
                ],
                [
                'direction',
                {
                    align: []
                }
                ],
                ['link', 'image', 'video', 'formula'],
                ['clean']
            ]
            },
            theme: 'snow'
        });

        $("#productForm").on('submit', function(){
            $("#description").html(descriptionEditor.root.innerHTML)
        });
    </script>
@endpush
