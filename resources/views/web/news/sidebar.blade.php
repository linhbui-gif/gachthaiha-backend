<aside class="sidebar">
    <div class="widget">
        <div class="search_form">
            <form>
                <input required="" class="form-control" placeholder="Search..." type="text">
                <button type="submit" title="Subscribe" class="btn icon_search" name="submit" value="Submit">
                    <i class="ion-ios-search-strong"></i>
                </button>
            </form>
        </div>
    </div>
    <div class="widget">
        <h5 class="widget_title">Bài viết mới nhất</h5>
        <ul class="widget_recent_post">
            @if(!$latestPost->isEmpty())
                @foreach($latestPost as $key => $value)
                    @php $href = route('web.news.detail', ['link' => $value->link]); @endphp
                     <li>
                        <div class="post_footer">
                            <div class="post_img">
                                <a href="{{ $href }}"><img src="{{ $value->image }}" alt="{{ $value->name }}"></a>
                            </div>
                            <div class="post_content">
                                <h6><a href="{{ $href }}">{{ $value->name }}</a></h6>
                                <p class="small m-0">{{ $value->created_at->format('d/m/y') }}</p>
                            </div>
                        </div>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
    <div class="widget">
        <h5 class="widget_title">Danh mục tin tức</h5>
        <div class="tags">
            @php
                $newsCategories = \App\Libs\WebLib::getNewsCategories();
            @endphp
            @if(!$newsCategories->isEmpty())
                @foreach($newsCategories as $key => $value)
                   <a href="{{ route('web.news.category', ['link' => $value->link]) }}">{{ $value->name }}</a>
                @endforeach
            @endif
        </div>
    </div>
</aside>