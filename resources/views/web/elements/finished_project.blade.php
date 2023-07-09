<div id="farm-cate-v3" class="farm-cate-v3">
    <div class="same-title white">
        <i>Danh mục </i>
        <h2>DỰ ÁN ĐÃ TRIỂN KHAI</h2>
    </div>
    <div class="container">
        <div class="row">
            @php
                $project = \App\Libs\WebLib::getFinishedProject();
            @endphp
            @if(!$project->isEmpty())
                @foreach($project as $key => $value)
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <div class="content-farm">
                            <img class="lazy"
                                 src="{{ $value->image }}" style="width: 277px; height: 411px; object-fit: cover;"
                                 alt="{{ $value->name }}">

                            <div class="desc-farm">
                                <div>
                                    <span>{{ $value->name }}</span>
                                    <a href="{{ route('web.news.detail', ['link' => $value->link]) }}">Xem chi
                                        tiết</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>