<div class="devvn_prod_cmt">
    <strong>Hỏi đáp</strong>
    <div class="devvn_cmt_form">
        <form action="{{ route('web.product.comment') }}" method="post">
            <div class="devvn_cmt_input">
                <textarea placeholder="Mời bạn tham gia thảo luận, vui lòng nhập tiếng Việt có dấu." name="comment" id="devvn_cmt_content"></textarea>
            </div>
            <div class="devvn_cmt_form_bottom ">
                <div class="devvn_cmt_radio">
                    <label>
                        <input name="devvn_cmt_gender" type="radio" value="male" checked="checked">
                        <span>Anh</span>
                    </label>
                    <label>
                        <input name="devvn_cmt_gender" type="radio" value="female">
                        <span>Chị</span>
                    </label>
                </div>
                <div class="devvn_cmt_input">
                    <input name="devvn_cmt_name" type="text" id="devvn_cmt_name" placeholder="Họ tên (bắt buộc)">
                </div>
                <div class="devvn_cmt_submit">
                    <button type="submit" id="devvn_cmt_submit">Gửi</button>
                    <input type="hidden" value="{{ $product->id }}" name="product_id">
                </div>
            </div>
        </form>
    </div>


    <div class="devvn_cmt_list">
        <div class="devvn_cmt_list_header">
            <div class="devvn_cmt_lheader_left">
                <span class="devvn_cmt_count">{{ $product->comment->count()  }} bình luận</span>
            </div>
            <div class="devvn_cmt_lheader_right"></div>
        </div>
        <div class="devvn_cmt_list_box">
            <ul itemscope="" itemtype="https://schema.org/FAQPage">
                @php
                    $comment = $product->comment()->whereNull('parent_id')->orWhere('parent_id', 0)->with(['child'])->paginate(15);
                @endphp
                @if(!empty($comment) && !$comment->isEmpty())
                    @foreach($comment as $key => $value)
                        <li itemprop="mainEntity" itemscope="" itemtype="https://schema.org/Question">
                            <div class="devvn_cmt_box">
                                <span>KH</span>
                                <strong>{{ $value->name }}</strong>
                                <div class="devvn_cmt_box_content" itemprop="name">
                                    <p>{{ $value->comment }}</p>
                                </div>
                                <div class="devvn_cmt_tool">
                                    <span>
                                        <a href="#" rel="nofollow" class="devvn_cmt_reply">Trả lời</a>
                                    </span>
                                </div>
                            </div>

                            @if(!$value->child->isEmpty())
                                <ul class="devvn_cmt_child">
                                    @foreach($value->child as $child)
                                        <li itemprop="acceptedAnswer" itemscope="" itemtype="https://schema.org/Answer">
                                            <div class="devvn_cmt_box">
                                                <span>TH</span>
                                                <strong>Gạch Thái Hà</strong>
                                                <b class="qtv">Quản trị viên</b>
                                                <div class="devvn_cmt_box_content" itemprop="text">
                                                    <p>{{ $child->comment }}</p>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
</div>