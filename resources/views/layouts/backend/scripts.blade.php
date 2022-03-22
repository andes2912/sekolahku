<!-- BEGIN: Vendor JS-->
<script src="{{asset('Assets/backend/vendors/js/vendors.min.js')}}"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="{{asset('Assets/backend/vendors/js/tables/datatable/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('Assets/backend/vendors/js/tables/datatable/datatables.bootstrap4.min.js')}}"></script>
<script src="{{asset('Assets/backend/vendors/js/tables/datatable/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('Assets/backend/vendors/js/tables/datatable/responsive.bootstrap4.js')}}"></script>
<script src="{{asset('Assets/backend/vendors/js/tables/datatable/datatables.checkboxes.min.js')}}"></script>
<script src="{{asset('Assets/backend/vendors/js/tables/datatable/datatables.buttons.min.js')}}"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{asset('Assets/backend/js/core/app-menu.js')}}"></script>
<script src="{{asset('Assets/backend/js/core/app.js')}}"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="{{asset('Assets/backend/js/scripts/tables/table-datatables-advanced.js')}}"></script>

<!-- END: Page JS-->

<script>
    $(window).on('load', function() {
        if (feather) {
            feather.replace({
                width: 14,
                height: 14
            });
        }
    })
</script>