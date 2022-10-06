
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
    {{-- <script src="{{asset('backend/app-assets/vendors/js/charts/apexcharts.min.js')}}"></script> --}}
    <script src="{{asset('backend/app-assets/vendors/js/extensions/toastr.min.js')}}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{asset('backend/app-assets/js/core/app-menu.js')}}"></script>
    <script src="{{asset('backend/app-assets/js/core/app.js')}}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    {{-- <script src="{{asset('backend/app-assets/js/scripts/pages/dashboard-ecommerce.js')}}"></script> --}}
    <!-- END: Page JS-->

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

        function sendAjaxOnDelete(url,method,value,elementId){
            $.ajax({
                type: method,
                url: url,
                dataType: 'json',
                success: function(data) {
                    if(data.status == true){
                        $(elementId).fadeOut();
                        alertNotification('success',data.title,data.message)
                    }
                }
            });
        }

        function alertNotification(type, heading, message) {
            toastr[type](message, heading, {
                positionClass: 'toast-right-center',
                progressBar: true,
                showMethod: 'slideDown',
                hideMethod: 'slideUp',
                timeOut: 10000,
            });
        }
        setTimeout(function(){
            $(".alert").remove()
        },1600)


        FilePond.registerPlugin(
            FilePondPluginFileEncode,
            FilePondPluginFileValidateSize,
            FilePondPluginImageExifOrientation,
            // FilePondPluginImageEdit,
            FilePondPluginImagePreview
        );

        // Select the file input and use create() to turn it into a pond
        FilePond.create(document.querySelector('.filepond'));

    </script>
