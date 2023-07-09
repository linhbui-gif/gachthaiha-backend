<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Blog</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="search_box">
            <div class="form-group">
                <input type="text" class="form-control search_menu_element" placeholder="Search" />
            </div>
        </div>

        <div class="list_menu_element" style="max-height: 300px; overflow-x: hidden; overflow-y: scroll;">
            @if(!empty($news))
                @foreach($news as $key => $value)
                    <div class="form-group menu_element" data-title="{{ str_replace('-', ' ', str_slug($value)) }}">
                        <label>
                            <input type="checkbox" value="{{ $key.'|'.$value }}" /> {{ $value }}
                        </label>
                    </div>
                @endforeach
            @endif
        </div>

    </div>
    <div class="box-footer text-right">
        <button type="button" class="btn btn-primary">
            <i class="fa fa-plus"></i> Add
        </button>
    </div>
</div>


@section('script')
<script type="text/javascript" language="JavaScript">
    $(document).ready(function () {
        $('.search_menu_element').keyup(function () {
            var keyword = $(this).val().trim();
            if(keyword != ''){
                keyword = str_slug(keyword);
                $('.menu_element').addClass('hide');
                $.each($('.menu_element'), function(key, value){
                    if($(value).attr('data-title').search(keyword) != -1){
                        $(value).removeClass('hide');
                    }
                });
            }else{
                $('.menu_element').removeClass('hide');
            }
        });
    });

    function str_slug(str) {
        str= str.toLowerCase();
        str= str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g,"a");
        str= str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g,"e");
        str= str.replace(/ì|í|ị|ỉ|ĩ/g,"i");
        str= str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g,"o");
        str= str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g,"u");
        str= str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g,"y");
        str= str.replace(/đ/g,"d");
        str= str.replace(/!|@|\$|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\'| |\"|\&|\#|\[|\]|~/g,"-");
        str= str.replace(/-+-/g,"-"); //thay thế 2- thành 1-
        str= str.replace(/^\-+|\-+$/g,"");//cắt bỏ ký tự - ở đầu và cuối chuỗi
        str= str.replace(/-/g," "); //thay thế 2- thành 1-
        return str;
    }
</script>
@endsection