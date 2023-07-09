$(document).ready(function(){
    $('.notify_make_all_read').click(function(){
        $.ajax({
            url: $(this).attr('data-url'),
            type: 'post',
            dataType: 'json',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                read: true
            },
            success: function(res){
                if(res.success){
                    $('.notifications-menu .dropdown-toggle').html('<i class="fa fa-globe"></i>');
                    $('.notify_unread.a_make_read').addClass('notify_read').removeClass('notify_unread');
                }else{
                    showNotify('error', res.message);
                }
            },
            error: function(){
                showNotify('error', 'Có lỗi trong quá trình xử lý. Mời bạn thử lại sau');
            }
        });
        return false;
    });

    $('.a_make_read').click(function(){
        $.ajax({
            url: $('.ajax_make_read_notify_url').val(),
            type: 'post',
            dataType: 'json',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                id: $(this).attr('data-notify-id')
            },
            success: function(res){
                if(res.success){
                    location.href = res.link;
                }else{
                    showNotify('error', res.message);
                }
            },
            error: function(){
                showNotify('error', 'Có lỗi trong quá trình xử lý. Mời bạn thử lại sau');
            }
        });
        return false;
    });
});