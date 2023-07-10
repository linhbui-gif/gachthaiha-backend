<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container">
        <!-- STRART CONTAINER-->
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="page-title">
                    <h1>{{$title}}</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    @if(!empty($breadcrumbList))
                        <?php
                        $lastIndex   = key(array_slice($breadcrumbList, -1, 1, true));
                        ?>
                        @foreach($breadcrumbList as $k => $value)
                          <li class="breadcrumb-item {{$k == $lastIndex ? "active" : ''}}"><a href="#">{{$value}}</a></li>
                        @endforeach
                    @endif
                </ol>
            </div>
        </div>
    </div>
</div>