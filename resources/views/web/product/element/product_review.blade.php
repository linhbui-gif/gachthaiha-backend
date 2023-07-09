@php
$numberReview = $product->review->count();
@endphp
<div id="reviews" class="woocommerce-Reviews">
    <div id="comments">
        <h2 class="woocommerce-Reviews-title"> {{ $numberReview }} đánh giá cho
            <span>{{ $product->name }}</span>
        </h2>
        <div class="star_box">
            <div class="star_box_left">
                <div class="star-average">
                    <div class="woocommerce-product-rating">
                        <span class="star_average">5.00</span>
                        <div class="star-rating" role="img" aria-label="Được xếp hạng 5.00 5 sao">
							<span style="width:100%">
								<strong class="rating">5.00</strong> trên 5 dựa trên
								<span class="rating">{{ $numberReview }}</span> đánh giá
							</span>
                        </div>
                        <a href="#reviews" class="woocommerce-review-link" rel="nofollow">
                            <span class="count">{{ $numberReview }}</span> đánh giá của khách hàng
                        </a>
                    </div>
                </div>
                <div class="reviews_bar">
                    @for($i = 5; $i >= 1; $i--)
                        <div class="devvn_review_row">
						<span class="devvn_stars_value">{{ $i }}
							<i class="devvn-star"></i>
						</span>
                            <span class="devvn_rating_bar">
							<span style="background-color: #eee" class="devvn_scala_rating">
								<span class="devvn_perc_rating" style="width: 100%; background-color: #f5a623"></span>
							</span>
						</span>
                            <span class="devvn_num_reviews">
							<b>100%</b> | 7 đánh giá
						</span>
                        </div>
                    @endfor
                </div>
            </div>
            <div class="star_box_right">
                <a href="javascript:void(0)" title="Đánh giá ngay" class="btn-reviews-now">Đánh giá ngay</a>
            </div>
        </div>
        <div id="review_form_wrapper" class="mfp-hide">
            <div id="review_form">
                <div id="respond" class="comment-respond">
					<span id="reply-title" class="comment-reply-title">Đánh giá {{ $product->name }}
						<small>
							<a rel="nofollow" id="cancel-comment-reply-link" href="#" style="display:none;">Hủy</a>
						</small>
					</span>
                    <form action="{{ route('web.product.review') }}" method="post" id="commentform"
                          class="comment-form" novalidate="novalidate" enctype="multipart/form-data">
                        <div class="comment-form-comment">
                            <textarea id="comment" name="comment" cols="45" rows="8" minlength="10" required=""
                                      placeholder="Mời bạn chia sẻ thêm một số cảm nhận..."></textarea>
                        </div>
                        <div class="wrap-attaddsend">
                            <div class="review-attach">
                                <span class="btn-attach devvn_insert_attach">Gửi ảnh thực tế</span>
                            </div>
                            <span id="countContent">0 ký tự (Tối thiểu 50)</span>
                        </div>
                        <div class="list_attach">
                            <ul class="devvn_attach_view"></ul>
                            <span class="devvn_insert_attach">
								<i class="devvn-plus">+</i>
							</span>
                        </div>
                        <div class="comment-form-rating">
                            <label for="rating">Bạn cảm thấy thế nào về sản phẩm? (Chọn sao)</label>
                            <p class="stars selected">
								<span>
									<a class="star-1" href="#">Rất tệ</a>
									<a class="star-2" href="#">Tệ</a>
									<a class="star-3" href="#">Bình thường</a>
									<a class="star-4" href="#">Tốt</a>
									<a class="star-5 active" href="#">Rất tốt</a>
								</span>
                            </p>
                            <select name="rating" id="rating" required="" style="display: none;">
                                <option value="">Xếp hạng…</option>
                                <option value="5">Rất tốt</option>
                                <option value="4">Tốt</option>
                                <option value="3">Trung bình</option>
                                <option value="2">Không tệ</option>
                                <option value="1">Rất tệ</option>
                            </select>
                        </div>
                        <div class="form_row_reviews">
                            <p class="comment-form-author">
                                <input id="author" name="author" type="text" value="" size="30" required=""
                                       placeholder="Họ tên (bắt buộc)">
                            </p>
                            <p class="comment-form-phone">
                                <input id="phone" name="phone" type="text" size="30" required=""
                                       placeholder="Số điện thoại (bắt buộc)">
                            </p>
                            <p class="comment-form-email">
                                <input id="email" name="email" type="email" value="" size="30" placeholder="Email ">
                            </p>
                        </div>
                        <p class="form-submit">
                            <input name="submit" type="submit" id="submit" class="submit" value="Gửi đánh giá">
                            <input type="hidden" name="comment_post_ID" value="512" id="comment_post_ID">
                            <input type="hidden" name="comment_parent" id="comment_parent" value="0">
                        </p>
                    </form>
                </div>
            </div>
            <button type="button" data-fancybox-close="" class="fancybox-button fancybox-close-small" title="Close">
                <svg
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path d="M13 12l5-5-1-1-5 5-5-5-1 1 5 5-5 5 1 1 5-5 5 5 1-1z"></path>
                </svg>
            </button>
        </div>
        <ol class="commentlist">
            @if(!empty($product->review) && !$product->review->isEmpty())
                @foreach($product->review as $key => $value)
                    <li class="review even thread-even depth-1">
                        <div class="comment_container devvn_review_box">
                            <div class="comment-text">
                                <div class="devvn_review_top">
                                    <p class="meta">
                                        <strong class="woocommerce-review__author">{{ $value->name }}</strong>
                                        <em class="woocommerce-review__verified verified">Đã mua tại gachthaiha.vn</em>
                                    </p>
                                </div>
                                <div class="devvn_review_mid">
                                    <div class="star-rating" role="img" aria-label="Được xếp hạng 5 5 sao">
                                <span style="width:100%">Được xếp hạng
                                    <strong class="rating">{{ $value->point }}</strong> 5 sao
                                </span>
                                    </div>
                                    <div class="description">
                                        <p>{{ $value->review_content }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            @endif
        </ol>
    </div>
    <div class="clearfix"></div>
</div>