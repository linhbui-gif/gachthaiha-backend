<div class="container-fluid">
    <div class="block_container">
        <div class="block_title text-uppercase">
            Đối tác của chúng tôi
        </div>
        <div class="block_content">
            <div class="row">
                <div class="partner_carousel owl-carousel owl-theme">
                    <?php $listPartner = \App\Libs\WebLib::getPartner(); ?>
                    @if(!empty($listPartner))
                        @foreach($listPartner as $key => $value)
                            <div class="partner_image">
                                <a href="#">
                                    <img src="{{ $value->image }}" class="img-responsive" alt="{{ $value->name }}" />
                                </a>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>