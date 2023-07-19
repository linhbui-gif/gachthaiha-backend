@php
$numberReview = $product->review()->where('status', 1)->count();
function checkRate($rate){
    switch ($rate){
        case 1 :
            return "20%";
        case 2 :
            return "40%";
        case 3 :
            return "60%";
        case 4 :
            return "80%";
        case 5 :
            return "100%";
    }
}
$productReview = $product->review()->where('status', 1)->get();
@endphp
<div class="comments">
    <h5 class="product_tab_title">{{ $numberReview }} đánh giá cho <span>{{ $product->name }}</span></h5>
    <ul class="list_none comment_list mt-4">
        @if(!empty($productReview) && !$productReview->isEmpty())
            @foreach($productReview as $key => $value)
               <li>
            <div class="comment_img">
                <img src="https://bestwebcreator.com/shopwise/demo/assets/images/user2.jpg" alt="user1">
            </div>
            <div class="comment_block">
                <div class="rating_wrap">
                    <div class="rating">
                        <div class="product_rate" style="width:{{checkRate($value->point)}}"></div>
                    </div>
                </div>
                <p class="customer_meta">
                    <span class="review_author">{{ $value->name }}</span>
                    <span class="comment-date">{{ $value->created_at->format('d/m/y') }}</span>
                </p>
                <div class="description">
                    <p>{{ $value->review_content }}</p>
                </div>
            </div>
        </li>
            @endforeach
        @endif
    </ul>
</div>