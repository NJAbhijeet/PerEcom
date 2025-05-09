<!-- Back to top -->
<a href="#top" id="back-to-top"><i class="fa fa-long-arrow-up"></i></a>

<!--Jquery.min js-->
<script src="{{ asset('admin/assets/js/jquery.min.js') }}"></script>

<!--popper js-->
<script src="{{ asset('admin/assets/js/popper.js') }}"></script>

<!--Bootstrap.min js-->
<script src="{{ asset('admin/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

<!-- Jquery star rating-->
<script src="{{ asset('admin/assets/plugins/rating/jquery.rating-stars.js') }}"></script>

<!--Sidemenu js-->
<script src="{{ asset('admin/assets/plugins/sidemenu/sidemenu-1/sidemenu-1.js') }}"></script>

<!-- Sidemenu-responsive-tabs  js -->
<script src="{{ asset('admin/assets/plugins/sidemenu-responsive-tabs/js/sidemenu-responsive-tabs.js') }}"></script>

<!-- Sidebar js-->
<script src="{{ asset('admin/assets/plugins/sidebar/sidebar.js') }}"></script>

<!--P-Scrollbar js-->
<script src="{{ asset('admin/assets/plugins/p-scroll/p-scroll.js') }}"></script>
<script src="{{ asset('admin/assets/js/p-scroll.js') }}"></script>

<!--Othercharts js-->
<script src="{{ asset('admin/assets/plugins/othercharts/jquery.knob.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/othercharts/jquery.sparkline.min.js') }}"></script>

<!--OtherCharts js-->
<script src="{{ asset('admin/assets/js/othercharts.js') }}"></script>

<!--Chart js-->
<script src="{{ asset('admin/assets/plugins/Chart.js/dist/Chart.min.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/Chart.js/dist/Chart.extension.js') }}"></script>

<!--Morris js-->
<script src="{{ asset('admin/assets/plugins/morris/morris.min.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/morris/raphael.min.js') }}"></script>

<!--Dashboard js-->
<script src="{{ asset('admin/assets/js/index5.js') }}"></script>

<script src="{{ asset('admin/assets/js/index3.js') }}"></script>


<!--Showmore js-->
<script src="{{ asset('admin/assets/js/jquery.showmore.js') }}"></script>

<!--Scripts js-->
<script src="{{ asset('admin/assets/js/scripts1.js') }}"></script>

<!-- ECharts js -->
<script src="{{ asset('admin/assets/plugins/echarts/echarts.js') }}"></script>

<script type="text/javascript" src="{{ asset('frontend/js/autocomplete.js') }}"></script>


<script src="{{ asset('assets/plugins/Datatable/js/jquery.dataTables.js') }}"></script>
<script src="{{ asset('assets/plugins/Datatable/js/dataTables.bootstrap4.js') }}"></script>

<script src="{{ asset('assets/plugins/Datatable/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/datatable.js') }}"></script>

<!--DataTables js-->
<script src="{{ asset('admin/assets/plugins/Datatable/js/jquery.dataTables.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/Datatable/js/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/Datatable/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/Datatable/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/Datatable/js/jszip.min.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/Datatable/js/pdfmake.min.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/Datatable/js/vfs_fonts.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/Datatable/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/Datatable/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/Datatable/js/buttons.colVis.min.js') }}"></script>



@if (Session::has('flash_success'))
    <script>
        var flashMessage = '{!! Session::get('flash_success') !!}';
        Swal.fire({
            title: flashMessage,
            // html: flashMessage,
            icon: 'success'
        });
    </script>
@endif
@if (Session::has('flash_error'))
    <script>
        var flashMessage = '{!! Session::get('flash_error') !!}';
        Swal.fire({
            title: flashMessage,
            // html: flashMessage,
            icon: 'danger'
        });
    </script>
@endif
