<div class="modal fade" id="modalContact" tabindex="-1" role="dialog" aria-labelledby="modalContactTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">YÊU CẦU BÁO GIÁ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('Home_contact')}}" class="form_contact" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="name" placeholder="Họ và tên..." class="form-control">
                    </div>
                     <div class="form-group">
                         <input type="text" name="phone" placeholder="Điện thoại..." class="form-control">
                     </div>
                    <div class="form-group">
                        <textarea name="content" class="form-control" id="" cols="30" rows="10"></textarea>
                    </div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary">Gửi</button>
                </form>
            </div>
        </div>
    </div>
</div>
@section('script')
    <script type="text/javascript" language="JavaScript">
        $(document).ready(function () {
            $("#modalContact").submit(function (e){
                e.preventDefault();
                $('.spinner').show();
                $.ajax({
                    url: $(this).attr('action'),
                    type: 'post',
                    dataType: 'json',
                    data: $(this).serialize(),
                    success: function(res){
                        if(res.success){
                            $('.spinner').hide();
                            swal({
                                title: "Thành công!",
                                text: res?.message,
                                icon: "success",
                                button: "OK",
                            })
                        }else{
                            $('.spinner').hide();
                            swal({
                                title: "THất bại!",
                                text: res?.message,
                                icon: "warning",
                                button: "OK",
                            })
                        }
                    },
                    error: function(error){
                        $('.spinner').hide();
                        swal({
                            title: "THất bại!",
                            text: res?.message,
                            icon: "warning",
                            button: "OK",
                        })
                    }
                });
            })
        });
    </script>
@endsection