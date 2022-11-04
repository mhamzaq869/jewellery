<script>
    $('.datatable').DataTable().destroy();
    let tt = $('.datatable').DataTable({
        data: @json($waitlists),
        order: [
            [0, 'desc']
        ],
        columns: [{
                render: function(data, type, full, meta) {
                    return meta.row + 1;
                }
            },
            {
                render: function(data, type, full, meta) {

                    return `<a href="/admin/product/${full.product_id}/edit"><img src="${root + full.product.photo}" class="w-50" alt="image"><span class="ml-3">${full.product.title}</span></a>`;
                }
            },
            {
                render: function(data, type, full, meta) {
                    return full.name;
                }
            },
            {
                render: function(data, type, full, meta) {
                    return full.email;
                }
            },
            {
                render: function(data, type, full, meta) {
                    return moment(full.created_at).calendar();
                }
            },


        ],
        dom: '<"d-flex justify-content-between align-items-center header-actions mx-1 row mt-75"' +
            '<"col-sm-12 col-md-4 col-lg-4" l>' +
            '<"col-sm-12 col-md-8 col-lg-8 ps-xl-75 ps-0"<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-md-end align-items-center flex-sm-nowrap flex-wrap me-1"<"me-1"f>B>>' +
            '>t' +
            '<"d-flex justify-content-between mx-2 row mb-1"' +
            '<"col-sm-12 col-md-6"i>' +
            '<"col-sm-12 col-md-6"p>' +
            '>',
        language: {
            sLengthMenu: 'Show _MENU_',
            search: 'Search',
            searchPlaceholder: 'Search..'
        },
        // Buttons with Dropdown
        buttons: [{
                extend: 'collection',
                className: 'btn btn-outline-secondary dropdown-toggle me-2',
                text: feather.icons['external-link'].toSvg({
                    class: 'font-small-4 me-50'
                }) + 'Export',
                buttons: [{
                        extend: 'csv',
                        text: feather.icons['file-text'].toSvg({
                            class: 'font-small-4 me-50'
                        }) + 'Csv',
                        className: 'dropdown-item',
                        exportOptions: {
                            columns: [1, 2, 3, 4]
                        }
                    },
                    {
                        extend: 'excel',
                        text: feather.icons['file'].toSvg({
                            class: 'font-small-4 me-50'
                        }) + 'Excel',
                        className: 'dropdown-item',
                        exportOptions: {
                            columns: [1, 2, 3, 4]
                        }
                    },
                    {
                        extend: 'copy',
                        text: feather.icons['copy'].toSvg({
                            class: 'font-small-4 me-50'
                        }) + 'Copy',
                        className: 'dropdown-item',
                        exportOptions: {
                            columns: [1, 2, 3, 4]
                        }
                    }
                ],
                init: function(api, node, config) {
                    $(node).removeClass('btn-secondary');
                    $(node).parent().removeClass('btn-group');
                    setTimeout(function() {
                        $(node).closest('.dt-buttons').removeClass(
                            'btn-group').addClass(
                            'd-inline-flex mt-50');
                    }, 50);
                }
            },

        ],

        language: {
            paginate: {
                // remove previous & next text from pagination
                previous: '&nbsp;',
                next: '&nbsp;'
            }
        },
    });
</script>
