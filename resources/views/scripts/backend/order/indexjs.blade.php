<script>

    renderTable(@json($orders))

    function renderTable(order)
    {
        $('.datatable').DataTable().destroy();
        let tt = $('.datatable').DataTable({
            data: order,

            order: [
                [0, 'desc']
            ],
            columns: [
                {
                    render: function(data, type, full, meta) {
                        return `<a href="order/${full.order_number}">${full.order_number}</a>`;
                    }
                },
                {
                    render: function(data, type, full, meta) {
                        return full.user.first_name +' '+full.user.last_name;
                    }
                },
                {
                    render: function(data, type, full, meta) {

                        var fullAddress = ``;
                        fullAddress += full.shipping_address.city != null ? full.shipping_address.city +',' : full.billing_address.city
                        fullAddress += full.shipping_address.country != null ? full.shipping_address.country +',' : full.billing_address.country

                        return fullAddress;
                    }
                },
                {
                    render: function(data, type, full, meta) {
                    return '$'+parseFloat(full.total).toFixed(2)
                    }
                },
                {
                    render: function(data, type, full, meta) {
                        return `<img src="${full.payment_method_image}" width="20px" />`+full.payment_method;
                    }
                },
                {
                    render: function(data, type, full, meta) {
                        if (full.status == 'new') {
                            return `<span class="badge badge-light-primary">New</span>`
                        } else if(full.status == 'pending') {
                            return `<span class="badge badge-light-warning">Pending</span>`
                        }else if(full.status == 'processing') {
                            return `<span class="badge badge-light-info">Processing</span>`
                        }else if(full.status == 'delivered') {
                            return `<span class="badge badge-light-success">Delivered</span>`
                        }else if(full.status == 'cancelled') {
                            return `<span class="badge badge-light-danger">Cancelled</span>`
                        }
                    }
                },
                {
                    render: function(data, type, full, meta) {

                        return   moment(full.created_at).calendar();
                    }
                },
                {
                    render: function(data, type, full, meta) {
                        return `<select onchange="changeStatus(${full.id},this.value)" class="select2 form-select w-100">
                                <option value="new" ${full.status == 'new' ? 'selected' : ''}>New</option>
                                <option value="pending" ${full.status == 'pending' ? 'selected' : ''}>Pending</option>
                                <option value="processing" ${full.status == 'processing' ? 'selected' : ''}>Processing</option>
                                <option value="delivered" ${full.status == 'delivered' ? 'selected' : ''}>Delivered</option>
                                <option value="cancelled" ${full.status == 'cancelled' ? 'selected' : ''}>Cancelled</option>
                            </select>`;
                    }
                },
                {
                    render: function(data, type, full, meta) {
                        return `<div class="dropdown ms-50">
                                    <div role="button" class="dropdown-toggle hide-arrow" id="email_more" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical font-medium-2"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                    </div>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="email_more">
                                        <a class="dropdown-item" href="order/${(full.order_number != null ? full.order_number : '-')}/invoice">
                                            <i data-feather='file-text'></i>
                                            <span>Invoice</span>
                                        </a>
                                        <a class="dropdown-item w-100" href="order/${(full.order_number != null ? full.order_number : '-')}">
                                            <i data-feather='info'></i>
                                            Detail
                                        </a>
                                    </div>
                                </div>`;
                    }
                },

            ],
            "columnDefs": [
                { "width": "100%", "targets": 7 }
            ],

            language: {
                sLengthMenu: 'Show _MENU_',
                search: 'Search',
                searchPlaceholder: 'Search..'
            },

            language: {
                paginate: {
                    // remove previous & next text from pagination
                    previous: '&nbsp;',
                    next: '&nbsp;'
                }
            },
        });
    }


    function changeStatus(id,val)
    {
        $.ajax({
            url: "{{route('order.store')}}",
            dataType: "json",
            type: "Post",
            async: true,
            data: {
                _token:"{{csrf_token()}}",
                id:id,
                status:val,
            },
            success: function (response)
            {
                if(response.status == true){
                    renderTable(response.data)
                    alertNotification('success','Order',response.message)
                }
            },
            error: function (xhr, exception) {
                var msg = "";
                if (xhr.status === 0) {
                    msg = "Not connect.\n Verify Network." + xhr.responseText;
                } else if (xhr.status == 404) {
                    msg = "Requested page not found. [404]" + xhr.responseText;
                } else if (xhr.status == 500) {
                    msg = "Internal Server Error [500]." +  xhr.responseText;
                } else if (exception === "parsererror") {
                    msg = "Requested JSON parse failed.";
                } else if (exception === "timeout") {
                    msg = "Time out error." + xhr.responseText;
                } else if (exception === "abort") {
                    msg = "Ajax request aborted.";
                } else {
                    msg = "Error:" + xhr.status + " " + xhr.responseText;
                }
                alertNotification('error','',msg)
            }
        });
    }
 </script>
