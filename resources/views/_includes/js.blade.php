<!-- BEGIN: PAGE SCRIPTS -->

<!-- jQuery -->
<script src={{ asset('vendor/jquery/jquery-1.11.1.min.js') }}></script>
<script src={{ asset('vendor/jquery/jquery_ui/jquery-ui.min.js') }}></script>

<!-- Theme Javascript -->
<script src={{ asset('assets/js/utility/utility.js') }}></script>
<script src={{ asset('assets/js/demo/demo.js') }}></script>
<script src={{ asset('assets/js/main.js') }}></script>


<!-- jQuery Validate Plugin-->
<script src={{ asset('assets/admin-tools/admin-forms/js/jquery.validate.min.js') }}></script>

<!-- jQuery Validate Addon -->
<script src={{ asset('assets/admin-tools/admin-forms/js/additional-methods.min.js') }}></script>

<!-- Select2 JS -->
<script src={{ asset('assets/js/select2.min.js') }}></script>

<!-- MaskedInput Plugin -->
<script src={{ asset('vendor/plugins/jquerymask/jquery.maskedinput.min.js') }}></script>

<!-- Time/Date Plugin Dependencies -->
<script src={{ asset('vendor/plugins/globalize/globalize.min.js') }}></script>
<script src={{ asset('vendor/plugins/moment/moment.min.js') }}></script>

<!-- DateTime Plugin -->
<script src={{ asset('vendor/plugins/datepicker/js/bootstrap-datetimepicker.js') }}></script>

<!-- Datatables  -->
<script src={{ asset('vendor/plugins/datatables/media/js/jquery.dataTables.js') }}></script>

<!-- Datatables Bootstrap Modifications  -->
<script src={{ asset('vendor/plugins/datatables/media/js/dataTables.bootstrap.js') }}></script>

<!-- Datatables Tabletools addon -->
<script src={{ asset('vendor/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js') }}></script>

<!-- Datatables ColReorder addon -->
<script src={{ asset('vendor/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js') }}></script>




<script type="text/javascript">

    $('#flash-overlay-modal').modal();
    $('div.alert').not('.alert-important').delay(3000).slideUp(300);

    jQuery(document).ready(function() {
        resetStorage();

        "use strict";

        // Init Theme Core    
        Core.init();

        // Init Demo JS  
        Demo.init();

        // Init Admin Panels on widgets inside the ".admin-panels" container
        $('.admin-panels').adminpanel({
            grid: '.admin-grid',
            draggable: true,
            preserveGrid: true,
            mobile: false,
            onStart: function() {
                // Do something before AdminPanels runs
            },
            onFinish: function() {
                $('.admin-panels').addClass('animated fadeIn').removeClass('fade-onload');
            },
            onSave: function() {
                $(window).trigger('resize');
            }
        });
    });

    // Clear local storage button and confirm dialog
    function resetStorage(){
        localStorage.clear();
//        location.reload();
    }
</script>
<!-- END: PAGE SCRIPTS -->