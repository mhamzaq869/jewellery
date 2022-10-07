<script>
    var categories = @json($categories);

    var subcategory_id = {{$product->subcategory_id ?? 0}};
    var category_id = {{$product->category_id}};

    var images = @json($product->decode_images)

    $("#category").on('change', function(){
        var subcat = categories.filter(item => item.parent_id == this.value);
        $("#subcategory").empty();
        var html = '<option value="" selected>Select Subcategory</option>';
        $.each(subcat , function(index, val) {
            html += `<option value="${val.id}" ${subcategory_id == val.id ? 'selected' : ''}>${val.name}</option>`
        });

        $("#subcategory").html(html)
        $("#subcategory").trigger('change')
    });

    $(window).on('load', function(){
        var subcat = categories.filter(item => item.parent_id == category_id);
        var html = '<option value="" selected>Select Subcategory</option>';
        $.each(subcat , function(index, val) {
            html += `<option value="${val.id}" ${subcategory_id == val.id ? 'selected' : ''}>${val.name}</option>`
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

    const pond = FilePond.create(document.querySelector('.filepond'),{
        name: 'images[]',
        allowMultiple:true,
    });

    $.each(images, function(index, val){
        pond.addFiles(root+val);
    });

</script>
