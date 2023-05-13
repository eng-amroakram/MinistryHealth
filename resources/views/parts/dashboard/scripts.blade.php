<!--   Core JS Files   -->
<script src="{{ asset('dashboard/assets/js/core/jquery.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/js/core/popper.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/js/core/bootstrap.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>

<!--  Notifications Plugin    -->
<script src="{{ asset('dashboard/assets/js/plugins/bootstrap-notify.js') }}"></script>
<!-- Control Center for Black Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{ asset('dashboard/assets/js/black-dashboard.min.js') }}"></script><!-- Black Dashboard DEMO methods, don't include it in your project! -->
<script src="{{ asset('dashboard/assets/demo/demo.js') }}"></script>
@stack('employee_script')


<script>
    $(document).ready(function() {
        // Javascript method's body can be found in assets/js/demos.js


        demo.initDashboardPageCharts();

    });
</script>
<script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
<script>
    window.TrackJS &&
        TrackJS.install({
            token: "ee6fab19c5a04ac1a32a645abde4613a",
            application: "black-dashboard-free"
        });
</script>
</body>

</html>
