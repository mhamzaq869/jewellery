<script>
    $('.datatable').DataTable().destroy();
    let tt = $('.datatable').DataTable({
        data: @json($transactions),
        order: [
            [0, 'desc']
        ],
        columns: [
            {
                render: function(data, type, full, meta) {
                    return meta.row + 1;
                }
            },
            {
                render: function(data, type, full, meta) {
                    return `<a href="user/${full.user.id}/edit">${full.user.first_name+' '+full.user.last_name}</a>`;
                }
            },
            {
                render: function(data, type, full, meta) {
                    return `<a href="order/${full.order.order_number}">${full.order.order_number}</a>`;

                }
            },
            {
                render: function(data, type, full, meta) {
                    return `<img src="${full.order.payment_method_image}" width="20px" /> `+full.payment_method
                }
            },
            {
                render: function(data, type, full, meta) {
                    return full.payment_status
                }
            },
            {
                render: function(data, type, full, meta) {
                    return moment(full.created_at).calendar()
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

    // Delete Record
    $('.datatable tbody').on('click', '.delete-record', function () {
        tt.row($(this).parents('tr')).remove().draw();
    });
</script>
