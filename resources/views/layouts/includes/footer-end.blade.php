</div>
<!-- End Page -->

<!-- Back-to-top -->
<a href="#top" id="back-to-top"><i class="fe fe-arrow-up"></i></a>

<!-- Jquery js-->
<script src="{{ url('assets/plugins/jquery/jquery.min.js') }}"></script>

<!-- Bootstrap js-->
<script src="{{ url('assets/plugins/bootstrap/js/popper.min.js') }}"></script>
<script src="{{ url('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

<!-- Select2 js-->
<script src="{{ url('assets/plugins/select2/js/select2.min.js') }}"></script>

<!-- INTERNAL Data tables js-->
<script src="{{ url('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('assets/plugins/datatable/js/dataTables.bootstrap5.js') }}"></script>
<script src="{{ url('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ url('assets/plugins/datatable/js/buttons.bootstrap5.min.js') }}"></script>
<script src="{{ url('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
<script src="{{ url('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
<script src="{{ url('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
<script src="{{ url('assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>
<script src="{{ url('assets/plugins/datatable/responsive.bootstrap5.min.js') }}"></script>
<script src="{{ url('assets/js/table-data.js') }}"></script>

<!-- Perfect-scrollbar js -->
<script src="{{ url('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>

<!-- Sidemenu js -->
<script src="{{ url('assets/plugins/sidemenu/sidemenu.js') }}"></script>

<!-- Sidebar js -->
<script src="{{ url('assets/plugins/sidebar/sidebar.js') }}"></script>

<!-- Internal Morris js -->
<script src="{{ url('assets/plugins/raphael/raphael.min.js') }}"></script>
<script src="{{ url('assets/plugins/morris.js/morris.min.js') }}"></script>

<!-- Internal Dashboard js-->
<script src="{{ url('assets/js/index2.js') }}"></script>

<!-- INTERNAL Chart js-->
<script src="{{ url('assets/plugins/chart.js/Chart.bundle.min.js') }}"></script>

<!-- Color Theme js -->
<script src="{{ url('assets/js/themeColors.js') }}"></script>

<!-- Sticky js -->
<script src="{{ url('assets/js/sticky.js') }}"></script>

<!-- Custom js -->
<script src="{{ url('assets/js/custom.js') }}"></script>

<!-- Internal Form-elements js-->
<script src="{{ url('assets/js/select2.js') }}"></script>

<!-- SweetAlert -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<input type="hidden" class="base-url" value={{ url('/') }}>

<!-- Internal Jquery-Ui js-->
<script src="{{ url('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>

<script>
    $('.date-picker').datepicker({
        dateFormat: 'dd-mm-yy',
		showOtherMonths: true,
		selectOtherMonths: true
	});
</script>

</body>

</html>