<!-- jQuery -->
<script src="{{ asset(config('common.path_template_member') . 'plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset(config('common.path_template_member') . 'plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset(config('common.path_template_member') . 'plugins/bootstrap/js/bootstrap.bundle.min.js') }}">
</script>
<script
    src="{{ asset(config('common.path_template_member') . 'plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}">
</script>
<!-- SweetAlert2 -->
<script src="{{ asset(config('common.path_template_member') . 'plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<!-- Moment -->
<script src="{{ asset(config('common.path_template_member') . 'plugins/moment/moment.min.js') }}"></script>
