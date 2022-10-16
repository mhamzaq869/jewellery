
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <footer class="footer footer-static footer-light">
        <p class="clearfix mb-0"><span class="float-md-start d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2021<a class="ms-25" href="https://1.envato.market/pixinvent_portfolio" target="_blank">Pixinvent</a><span class="d-none d-sm-inline-block">, All rights Reserved</span></span><span class="float-md-end d-none d-md-block">Hand-crafted & Made with<i data-feather="heart"></i></span></p>
    </footer>
    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>



    <!-- BEGIN: Vendor JS-->
    <script src="{{asset('backend/app-assets/vendors/js/vendors.min.js')}}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{asset('backend/app-assets/vendors/js/extensions/toastr.min.js')}}"></script>
    {{-- <script src="{{asset('backend/app-assets/js/scripts/extensions/ext-component-toastr.js')}}"></script> --}}

    {{-- <script src="{{asset('backend/app-assets/vendors/js/charts/apexcharts.min.js')}}"></script> --}}
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{asset('backend/app-assets/js/core/app-menu.js')}}"></script>
    <script src="{{asset('backend/app-assets/js/core/app.js')}}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    {{-- <script src="{{asset('backend/app-assets/js/scripts/pages/dashboard-ecommerce.js')}}"></script> --}}
    <!-- END: Page JS-->

    <script src="{{asset('backend/app-assets/vendors/js/extensions/moment.min.js')}}"></script>

    <script src="{{asset('backend/app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
    <script src="{{asset('backend/app-assets/js/scripts/forms/form-select2.js')}}"></script>

     <!-- BEGIN: Datatable JS-->
     <script src="{{asset('backend/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js')}}"></script>
     <script src="{{asset('backend/app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js')}}"></script>
     <script src="{{asset('backend/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js')}}"></script>
     <script src="{{asset('backend/app-assets/vendors/js/tables/datatable/responsive.bootstrap5.min.js')}}"></script>
     <script src="{{asset('backend/app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js')}}"></script>
     <script src="{{asset('backend/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js')}}"></script>
     <script src="{{asset('backend/app-assets/vendors/js/tables/datatable/jszip.min.js')}}"></script>
     <script src="{{asset('backend/app-assets/vendors/js/tables/datatable/pdfmake.min.js')}}"></script>
     <script src="{{asset('backend/app-assets/vendors/js/tables/datatable/vfs_fonts.js')}}"></script>
     <script src="{{asset('backend/app-assets/vendors/js/tables/datatable/buttons.html5.min.js')}}"></script>
     <script src="{{asset('backend/app-assets/vendors/js/tables/datatable/buttons.print.min.js')}}"></script>
     <script src="{{asset('backend/app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js')}}"></script>
     <script src="{{asset('backend/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>


     <script src="{{asset('backend/app-assets/vendors/js/editors/quill/katex.min.js')}}"></script>
     <script src="{{asset('backend/app-assets/vendors/js/editors/quill/highlight.min.js')}}"></script>
     <script src="{{asset('backend/app-assets/vendors/js/editors/quill/quill.min.js')}}"></script>
     <script src="https://cdn.rawgit.com/kensnyder/quill-image-resize-module/3411c9a7/image-resize.min.js"></script>

     <script src="{{asset('backend/app-assets/js/scripts/tables/table-datatables-basic.js')}}"></script>
     <!-- END: Datatable JS-->

    <!-- BEGIN: Custom JS-->
    <script src="https://unpkg.com/filepond-plugin-file-encode/dist/filepond-plugin-file-encode.min.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.min.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-exif-orientation/dist/filepond-plugin-image-exif-orientation.min.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.js"></script>
    {{-- <script src="https://unpkg.com/filepond-plugin-image-edit/dist/filepond-plugin-image-edit.js"></script> --}}
    <script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>

    <!-- END: Custom JS-->

    <script src="https://js.pusher.com/7.0.2/pusher.min.js"></script>
    @include('scripts.backend.notification.pusherjs')

    <script>
        var root = "{{asset('')}}";

        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })

        getNotifications()
        setTimeout(function(){
            $(".alert").remove()
        },3000)

        // Define function to delete records
        function sendAjaxOnDelete(url,method,value,elementId){
            $.ajax({
                type: method,
                url: url,
                dataType: 'json',
                success: function(data) {
                    if(data.status == true){
                        console.log(data.message)
                        alertNotification('success','Coupon',data.message)

                    }
                }
            });
        }

        // Define function to show alert notification popup
        function alertNotification(type, heading, message) {
            toastr[type](message, heading, {
                closeButton: true,
                tapToDismiss: false,
            });
        }

        // Filepond to register plugins
        FilePond.registerPlugin(
            FilePondPluginFileEncode,
            FilePondPluginFileValidateSize,
            FilePondPluginImageExifOrientation,
            // FilePondPluginImageEdit,
            FilePondPluginImagePreview
        );

        // Select the file input and use create() to turn it into a pond
        FilePond.create(document.querySelector('.filepond'));

        // Define function to capitalize the first letter of a string
        function capitalizeFirstLetter(string){
            return string.charAt(0).toUpperCase() + string.slice(1);
        }

        // Define function to show all notifications
        function getNotifications() {
            $.ajax({
                url: "{{route('show.all.notification')}}",
                type: "get",
                dataType: 'json',
                cache: false,
                async: false,
                success: function(response) {

                    if (response.status_code == 200 && response.success == true) {

                        let notifications = response.data;
                        let count = response.total_notification;
                        let noti_div = ``;

                        if(count > 0){
                            $(".noti_count").removeClass('d-none');
                            $(".noti_count").text(count);
                        }

                        if (notifications.length > 0) {
                            for (var i = 0; i < notifications.length; i++) {
                                if (notifications[i].noti_desc != "") {
                                    var created_at = moment(notifications[i].created_at).calendar();

                                    noti_div +=`<span class="d-flex" onclick="markRead(${notifications[i].id})">
                                                    <div class="list-item d-flex align-items-start">
                                                        <div class="me-1">
                                                            <div class="avatar bg-light-${notifications[i].btn_class}">
                                                                <div class="avatar-content">
                                                                    <i class="avatar-icon" data-feather="${notifications[i].noti_icon}"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="list-item-body flex-grow-1">
                                                            <p class="media-heading">
                                                                <span class="fw-bolder">${notifications[i].noti_title}</span>
                                                            </p>
                                                            <small class="notification-text"> ${notifications[i].noti_desc} ${created_at}</small>
                                                        </div>
                                                    </div>
                                                </span>`;
                                }
                            }

                            $('.notifications').html(noti_div)

                        } else {
                            noti_div = `<li><span class="font-12 text-nowrap d-block text-muted text-truncate p-2" style="text-align:center">No Unread Notifications.</span></li>`;
                            $('.notifications').html(noti_div)
                        }
                    }
                },
                failure: function(errMsg) {
                    alertNotification('error','Problem', errMsg)
                }
            });
        }

        // Define function to mark as read notification
        function markRead(id){

            $.ajax({
                url: "{{url('read/notification/')}}"+'/'+id,
                type: "get",
                dataType: 'json',
                cache: false,
                async:false,
                success: function(data) {
                    for(var n = 0 ; n < notifications.length ; n++){
                        if(notifications[n].id == id){
                            slug = notifications[n].slug;
                            break;
                        }
                    }

                    if(data.success == true){
                        window.location.href = "{!! url('"+slug+"') !!}";
                    }else{

                    }
                },
                failure: function(errMsg) {
                    console.log(errMsg);
                }
            });

        }

        // Define function to mark all as read notification
        function markAllRead(id){

            $.ajax({
                url: "{{ route('read.all.notification') }}",
                type: "get",
                dataType: 'json',
                cache: false,
                async: false,
                success: function(data) {
                    getNotifications();
                    $('.notifications').remove();
                },
                failure: function(errMsg) {
                    console.log(errMsg);
                }
            });

        }

    </script>
