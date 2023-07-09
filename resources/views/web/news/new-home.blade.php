<div class="section small_pt pb_70">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="heading_s1 text-center">
                    <h2>Tin tức mới</h2>
                </div>
                <p class="leads text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
            </div>
        </div>
        <div class="row justify-content-center">
            @if(!empty($hotNews))
                @foreach($hotNews as $key => $value)
                    <div class="col-lg-4 col-md-6">
                        @include('web.components.news.new-item',['value' => $value])
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>