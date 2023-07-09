<aside class="aside-item collection-category ">

    <div class="title_module_main_custome block">
        <h2>
			<span>
				Danh mục tin tức
			</span>
        </h2>
    </div>

    <div class="aside-content aside-cate-link-cls margin-bottom-15">
        <nav class="cate_padding nav-category navbar-toggleable-md">
            <ul class="nav-ul nav navbar-pills">
                <li class="nav-item  lv1">
                    <a class="nav-link" href="/">Trang chủ
                    </a>
                </li>

                @php
                    $newsCategories = \App\Libs\WebLib::getNewsCategories();
                @endphp
                @if(!$newsCategories->isEmpty())
                    @foreach($newsCategories as $key => $value)
                        <li class="nav-item lv1">
                            <a class="nav-link" href="{{ route('web.news.category', ['link' => $value->link]) }}">{{ $value->name }}</a>
                        </li>
                    @endforeach
                @endif
            </ul>
        </nav>
    </div>
</aside>

<div class="aside-item">
    <div>
        <div class="title_module_main_custome block">
            <h2>
                <a href="news" title="Tin liên quan">
                    Tin liên quan
                </a>
            </h2>
        </div>

        <div class="list-blogs">
            <div class="blog_list_item">

                @if(!$latestPost->isEmpty())
                    @foreach($latestPost as $key => $value)
                        @php $href = route('web.news.detail', ['link' => $value->link]); @endphp
                        <article class="blog-item blog-item-list ">
                            <div class="blog-item-thumbnail img1">
                                <a href="{{ $href }}">
                                    <img src="{{ $value->image }}"
                                         data-lazyload="{{ $value->image }}"
                                         style="max-width:100%;" class="img-responsive"
                                         alt="{{ $value->name }}">
                                </a>
                            </div>
                            <div class="ct_list_item">
                                <h3 class="blog-item-name">
                                    <a href="{{ $href }}" title="{{ $value->name }}">
                                        {{ $value->name }}
                                    </a>
                                </h3>
                            </div>
                        </article>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>