<script>
    $('.datatable').DataTable().destroy();
    let tt = $('.datatable').DataTable({
        data: @json($users),

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
                    return full.first_name;
                }
            },
            {
                render: function(data, type, full, meta) {
                    return full.last_name;

                }
            },
            {
                render: function(data, type, full, meta) {
                    return full.email
                }
            },
            {
                render: function(data, type, full, meta) {
                    return full.gender
                }
            },
            {
                render: function(data, type, full, meta) {
                    return full.date_of_birth
                }
            },
            {
                render: function(data, type, full, meta) {
                    if (full.status == 1) {
                        return `<span class="badge badge-light-success">Active</span>`
                    } else {
                        return `<span class="badge badge-light-warning">Inactive</span>`
                    }
                }
            },
            {
                render: function(data, type, full, meta) {
                    return moment(full.created_at).calendar()
                }
            },
            {
                render: function(data, type, full, meta) {
                    return `
                                <div class="dropdown ms-50">
                                    <div role="button" class="dropdown-toggle hide-arrow" id="email_more" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical font-medium-2"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                    </div>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="email_more">
                                        <a class="dropdown-item"
                                            href="user/${(full.id != null ? full.id : '-')}/edit">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                width="14" height="14"
                                                viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                class="feather feather-edit-2 me-50">
                                                <path
                                                    d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                </path>
                                            </svg>
                                            <span>Edit</span>
                                        </a>
                                        <a class="dropdown-item w-100 delete-record" type="button" onclick="sendAjaxOnDelete('user/${(full.id != null ? full.id : '-')}/destroy','GET',${full.id},'#user-${full.id}')">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                width="14" height="14"
                                                viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                class="feather feather-trash me-50">
                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                <path
                                                    d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                </path>
                                            </svg>
                                            Delete
                                        </a>
                                    </div>
                                </div>`;
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
            {
                text: '+ Add New',
                className: 'add-new btn btn-primary',
                action: function(e, dt, button, config) {
                    window.location = 'user/create';
                },
                init: function(api, node, config) {
                    $(node).removeClass('btn-secondary');
                }
            }
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
