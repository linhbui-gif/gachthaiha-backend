$(document).ready(function () {
    /**
     * Click to field in head of table in ajax list page
     *
     */
    $(document).on('click', '.order_by', function() {
        var order = $(this).attr('data-order'),
            orderBy = $(this).attr('data-order-by'),
            currentOrderBy = $('.input_order_by').val(),
            form = $(this).attr('data-form');

        if (currentOrderBy == orderBy) {
            order = (order == 'DESC') ? 'ASC' : 'DESC';
        }

        $('.input_order_by').val(orderBy);
        $('.input_order').val(order);
        $(form).submit();
    });

    /**
     * Click to page in pagination of table list
     *
     */
    $(document).on('click', '.pagination_ajax ul li a', function() {
        var rel = $(this).attr('rel');
        var page = $(this).text();
        var form = $('.frm_form_search');
        if (rel != undefined) {
            if (rel == 'next') {
                page = parseInt($('#page').val()) + 1;
            } else if (rel == 'prev') {
                page = parseInt($('#page').val()) - 1;
            }
        }
        $('#page').val(page);
        form.submit();
        return false;
    });


    /**
     * Click button delete record
     *
     */
    $(document).on('click', '.btn_delete_record', function() {
        if (confirm('Bạn có chắc chắn muốn xóa bản ghi này không?')) {
            var ajaxUrl = $(this).attr('data-url');
            $.ajax({
                url: ajaxUrl,
                type: 'post',
                dataType: 'json',
                data: {
                    _token: $('input[name=_token]').val(),
                    id: $(this).attr('data-id')
                },
                beforeSend: function() {
                    showPreload();
                },
                complete: function() {
                    hidePreload();
                },
                success: function(res) {
                    if (res.success) {
                        showNotify('success', res.message);
                        $('.frm_form_search').submit();
                    } else {
                        showNotify('error', res.message);
                    }
                },
                error: function(error) {
                    showAjaxError(error);
                }
            });
            return false;
        }
    });


    /**
     * Click button copy record
     */
    $(document).on('click', '.btn_copy_record', function() {
        var ajaxUrl = $(this).attr('data-url');
        $.ajax({
            url: ajaxUrl,
            type: 'post',
            dataType: 'json',
            data: {
                _token: $('input[name=_token]').val(),
                id: $(this).attr('data-id')
            },
            beforeSend: function() {
                showPreload();
            },
            complete: function() {
                hidePreload();
            },
            success: function(res) {
                if (res.success) {
                    showNotify('success', res.message);
                    $('.frm_form_search').submit();
                } else {
                    showNotify('error', res.message);
                }
            },
            error: function(error) {
                showAjaxError(error);
            }
        });
        return false;
    });


    /**
     * Click label status to update record status
     *
     */
    $(document).on('click', '.update_status', function () {
        var ajaxUrl = $(this).attr('data-url');
        var updateStatus = $(this).attr('data-update');
        $.ajax({
            url: ajaxUrl,
            type: 'post',
            dataType: 'json',
            data: {
                _token: $('input[name=_token]').val(),
                id: $(this).attr('data-id'),
                status: updateStatus
            },
            beforeSend: function() {
                showPreload();
            },
            complete: function() {
                hidePreload();
            },
            success: function(res) {
                if (res.success) {
                    showNotify('success', res.message);
                    $('.frm_form_search').submit();
                } else {
                    showNotify('error', res.message);
                }
            },
            error: function(error) {
                showAjaxError(error);
            }
        });
        return false;
    });


    /**
     * Submit form batch process in table foot
     *
     */
    $(document).on('submit', '.frm_batch_process', function(e){
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            type: 'post',
            dataType: 'json',
            data: $(this).serialize(),
            beforeSend: function(){
                showPreload();
            },
            complete: function () {
                hidePreload();
            },
            success: function(res){
                if (res.success) {
                    showNotify('success', res.message);
                    $('.frm_form_search').submit();
                } else {
                    showNotify('error', res.message);
                }
            },
            error: function (error) {
                showAjaxError(error);
            }
        });
    });


    /**
     * Change drop down limit of record in table
     *
     */
    $(document).on('change', '.change_limit', function(){
        $('.input_limit').val($(this).val());
        $('.frm_form_search').submit();
    });


    /**
     * Submit form search data
     *
     */
    $('.frm_form_search').submit(function() {
        $.ajax({
            url: $(this).attr('action'),
            type: 'post',
            dataType: 'json',
            data: $(this).serialize(),
            beforeSend: function() {
                showPreload();
            },
            complete: function() {
                hidePreload();
            },
            success: function(res) {
                if (res.success) {
                    $('.show_ajax_data').html(res.html);
                } else {
                    showNotify('error', res.message);
                }
                $(document).trigger('icheck');
                $('[data-toggle=tooltip]').tooltip();
                $('.select2').select2();
            },
            error: function(error) {
                showAjaxError(error);
            }
        });
        return false;
    });


    /**
     * Auto search data when access list page
     *
     */
    if ($('.frm_form_search').length) {
        $('.frm_form_search').submit();
    }


    /**
     * Add/edit a record
     * Submit form and process via ajax request
     *
     */
    $(document).on('submit', '.frm_form_add', function(e){
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            type: 'post',
            dataType: 'json',
            data: $(this).serialize(),
            beforeSend: function () {
                $('.validation_error').addClass('hide');
                showPreload();
            },
            complete: function(){
                hidePreload();
            },
            success: function(res){
                if(res.success){
                    showNotify('success', res.message);
                    if(typeof res.url != "undefined"){
                        window.location = res.url;
                    }
                }else{
                    showNotify('error', res.message);
                }
            },
            error: function(error){
                showAjaxError(error);
            }
        });
    });
});