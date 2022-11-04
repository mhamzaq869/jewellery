<script>
    renderTable(@json($reviews))
    renderTablePending(@json($pending_reviews))
    renderTableApproved(@json($approved_reviews))

    function renderTable(order)
    {
        $('.datatable').DataTable().destroy();
        let tt = $('.datatable').DataTable({
            data: order,

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

                        return `<img src="${root + full.product.photo}" class="w-75" alt="image">`;
                    }
                },
                {
                    render: function(data, type, full, meta) {
                        return full.product.title;
                    }
                },
                {
                    render: function(data, type, full, meta) {
                        if (full.user != null) {
                            return full.user.name
                        } else {
                            return '--';
                        }
                    }
                },
                {
                    render: function(data, type, full, meta) {
                        return full.email;
                    }
                },
                {
                    render: function(data, type, full, meta) {
                        return full.title;
                    }
                },
                {
                    render: function(data, type, full, meta) {
                        return full.rating;
                    }
                },
                {
                    render: function(data, type, full, meta) {
                        return full.review;
                    }
                },
                {
                    render: function(data, type, full, meta) {
                        if (full.status == 1) {
                            return `<span class="badge badge-light-success">Approved</span>`
                        } else {
                            return `<span class="badge badge-light-warning">Pending</span>`
                        }
                    }
                },
                {
                    render: function(data, type, full, meta) {
                        return `<select onchange="changeStatus(${full.id},this.value)" class="select2 form-select w-100">
                                <option value="0" ${full.status == '0' ? 'selected' : ''}>Pending</option>
                                <option value="1" ${full.status == '1' ? 'selected' : ''}>Approve</option>
                            </select>`;
                    }
                },

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

    // Pending Reviews
    function renderTablePending(order)
    {
        $('.pending-datatable').DataTable().destroy();
        let ptt = $('.pending-datatable').DataTable({
            data: order,

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

                        return `<img src="${root + full.product.photo}" class="w-75" alt="image">`;
                    }
                },
                {
                    render: function(data, type, full, meta) {
                        return full.product.title;
                    }
                },
                {
                    render: function(data, type, full, meta) {
                        if (full.user != null) {
                            return full.user.name
                        } else {
                            return '--';
                        }
                    }
                },
                {
                    render: function(data, type, full, meta) {
                        return full.email;
                    }
                },
                {
                    render: function(data, type, full, meta) {
                        return full.title;
                    }
                },
                {
                    render: function(data, type, full, meta) {
                        return full.rating;
                    }
                },
                {
                    render: function(data, type, full, meta) {
                        return full.review;
                    }
                },
                {
                    render: function(data, type, full, meta) {
                        if (full.status == 1) {
                            return `<span class="badge badge-light-success">Approved</span>`
                        } else {
                            return `<span class="badge badge-light-warning">Pending</span>`
                        }
                    }
                },
                {
                    render: function(data, type, full, meta) {
                        return `<select onchange="changeStatus(${full.id},this.value)" class="select2 form-select w-100">
                                <option value="0" ${full.status == '0' ? 'selected' : ''}>Pending</option>
                                <option value="1" ${full.status == '1' ? 'selected' : ''}>Approve</option>
                            </select>`;
                    }
                },

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

    // Approved Reviews
    function renderTableApproved(order)
    {
        $('.approve-datatable').DataTable().destroy();
        let att = $('.approve-datatable').DataTable({
            data: order,

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

                        return `<img src="${root + full.product.photo}" class="w-75" alt="image">`;
                    }
                },
                {
                    render: function(data, type, full, meta) {
                        return full.product.title;
                    }
                },
                {
                    render: function(data, type, full, meta) {
                        if (full.user != null) {
                            return full.user.name
                        } else {
                            return '--';
                        }
                    }
                },
                {
                    render: function(data, type, full, meta) {
                        return full.email;
                    }
                },
                {
                    render: function(data, type, full, meta) {
                        return full.title;
                    }
                },
                {
                    render: function(data, type, full, meta) {
                        return full.rating;
                    }
                },
                {
                    render: function(data, type, full, meta) {
                        return full.review;
                    }
                },
                {
                    render: function(data, type, full, meta) {
                        if (full.status == 1) {
                            return `<span class="badge badge-light-success">Approved</span>`
                        } else {
                            return `<span class="badge badge-light-warning">Pending</span>`
                        }
                    }
                },
                {
                    render: function(data, type, full, meta) {
                        return `<select onchange="changeStatus(${full.id},this.value)" class="select2 form-select w-100">
                                <option value="0" ${full.status == '0' ? 'selected' : ''}>Pending</option>
                                <option value="1" ${full.status == '1' ? 'selected' : ''}>Approve</option>
                            </select>`;
                    }
                },

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
            url: "{{route('review.store')}}",
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
                    renderTablePending(response.pending_reviews)
                    renderTableApproved(response.approved_reviews)
                    alertNotification('success','Review',response.message)
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
