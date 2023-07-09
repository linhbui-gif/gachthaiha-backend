<div class="partner_block container">
    <div class="module-block">
        {{--<div class="header-module-block">
            <h4>Đánh giá của khách hàng</h4>
        </div>--}}
        <div class="content-module-block customer_review">
            <div class="text-center form-group">
                <h4 class="text-uppercase form-group" style="font-size: 21px; font-weight: 700; color: #2e3259;">
                    Sự hài lòng của khách hàng<br/>là niềm hạnh phúc của chúng tôi
                </h4>
            </div>

            <div class="col-sm-10 col-sm-push-1">
                <div class="owl-carousel owl-theme">
                    <?php $customerReview = \App\Libs\WebLib::getCustomerReview(); ?>
                    @if(!empty($customerReview))
                        @foreach($customerReview as $key => $value)
                            <div class="item" style="background: #fff; padding: 15px; border-radius: 5px;">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <img src="{{ $value->image }}" class="img-responsive"
                                             style="width: 200px; height: 200px; object-fit: cover; border-radius: 100%;" alt="{{ 'Đánh giá của '.$value->customer_name.', '.$value->position.' '.$value->company }}"/>
                                    </div>
                                    <div class="col-sm-9">
                                        <h4 class="text-uppercase">{{ $value->customer_name }}</h4>
                                        <h5>{{ $value->position.', '.$value->company }}</h5>
                                        <p>
                                            {{ $value->content }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<style type="text/css">
    .customer_review .owl-stage-outer{
        border-radius: 5px;
        box-shadow: 0px 0px 10px 0px rgb(45, 48, 89);
    }
</style>