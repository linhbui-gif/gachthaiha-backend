@if(isset($menu))
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
        <div class="footer-column widget">
            <h4 class="widget-title">{{ $menu->name }}</h4>
            <ul> 
                @if(!empty($menu->detail))
                    @foreach($menu->detail as $key => $value)
                        <li>
                            <a href="{{ $value['link'] }}" rel="nofollow" title="{{ $value['title'] }}">{{ $value['title'] }}</a>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
@endif