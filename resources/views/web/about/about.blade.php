
<section class="abouts mt-5">
    <div class="container">
        @if(!empty($categoriesProduct))
            @foreach($categoriesProduct as $key => $value)
             <div class="row mb-5">
                <div class="col-lg-6 {{$key % 2 == 0 ? "order-lg-1" : "order-lg-2"}}">
                    <div class="about-items">
                        <h3>{{ $value->name }}</h3>
                        <div class="style-content">
                            {!! $value->description !!}
                            <a href="{{ route('web.product.category', ['link' => $value->link]) }}">Xem sản phẩm</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 {{$key % 2 == 0 ? "order-lg-2" : "order-lg-1"}}"><img src="{{ $value->image }}" width="100%" alt="{{ $value->name }}" /></div>
            </div>
            @endforeach
        @endif
    </div>
</section>