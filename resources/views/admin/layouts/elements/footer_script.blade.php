<!-- jQuery 3 -->
<script src="{{ asset('assets/admin/plugin/jquery/dist/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('assets/admin/plugin/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('assets/admin/plugin/bootstrap/dist/js/bootstrap.min.js') }}"></script>

<script src="{{ asset('assets/admin/plugin/datepicker/bootstrap-datepicker.js') }}"></script>

<script src="{{ asset('assets/admin/plugin/iCheck/icheck.min.js') }}"></script>

<script src="{{ asset('assets/admin/plugin/select2/dist/js/select2.full.min.js') }}"></script>

<script src="{{ asset('assets/admin/dist/js/adminlte.min.js') }}"></script>

@yield('before_script')

<script src="{{ asset('assets/admin/dist/js/functions.js') }}"></script>

<script src="{{ asset('assets/admin/dist/js/form.js') }}"></script>

<script src="{{ asset('assets/admin/dist/js/notify.js') }}"></script>

@yield('script')

<script type="text/javascript" language="JavaScript">
    $(document).ready(function () {
        $('.btn_clear_cache').click(function () {
            $.ajax({
                url: $(this).attr('data-url'),
                type: 'get',
                dataType: 'json',
                beforeSend: function () {
                    showPreload();
                },
                complete: function () {
                    hidePreload();
                },
                success: function(res){
                    if(res.success){
                        showNotify('success', res.message);
                    }else{
                        showNotify('error', res.message);
                    }
                },
                error: function () {
                    showNotify('error', 'Có lỗi trong quá trình xử lý. Mời bạn thử lại sau');
                }
            });
        });
    });
</script>