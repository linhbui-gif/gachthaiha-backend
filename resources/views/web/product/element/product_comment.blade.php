<div class="comment-area">
    <div class="content_title">
        <h5>(03) Comments</h5>
    </div>
    <ul class="list_none comment_list">
        @php
            $comment = $product->comment()->whereNull('parent_id')->orWhere('parent_id', 0)->with(['child'])->paginate(15)
        @endphp
        @if(!empty($comment) && !$comment->isEmpty())
            @foreach($comment as $key => $value)
                <li class="comment_info">
                    <div class="d-flex">
                        <div class="comment_user">
                            <img src="assets/images/user2.jpg" alt="user2">
                        </div>
                        <div class="comment_content">
                            <div class="d-flex">
                                <div class="meta_data">
                                    <h6><a href="#">{{ $value->name }}</a></h6>
                                    <div class="comment-time">MARCH 5, 2018, 6:05 PM</div>
                                </div>
                                <div class="ml-auto">
                                    <a href="#" class="comment-reply"><i class="ion-reply-all"></i>Reply</a>
                                </div>
                            </div>
                            <p>{{ $value->comment }}</p>
                        </div>
                    </div>
                    @if(!$value->child->isEmpty())
                        <ul class="children">
                            @foreach($value->child as $child)
                                <li class="comment_info">
                                    <div class="d-flex">
                                        <div class="comment_user">
                                            <img src="assets/images/user3.jpg" alt="user3">
                                        </div>
                                        <div class="comment_content">
                                            <div class="d-flex align-items-md-center">
                                                <div class="meta_data">
                                                    <h6><a href="#">Quản trị viên<</a></h6>
                                                    <div class="comment-time">april 8, 2018, 5:15 PM</div>
                                                </div>
                                                <div class="ml-auto">
                                                    <a href="#" class="comment-reply"><i class="ion-reply-all"></i>Reply</a>
                                                </div>
                                            </div>
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
    <div class="content_title">
        <h5>Để lại bình luận của bạn</h5>
    </div>
    <form class="field_form" action="{{ route('web.product.comment') }}" method="post">
        <div class="row">
            <div class="form-group col-md-4">
                <input name="name" class="form-control" placeholder="Họ và Tên..." required="required" type="text">
            </div>
            <div class="form-group col-md-4">
                <input name="email" class="form-control" placeholder="Email..." required="required" type="email">
            </div>
            <div class="form-group col-md-12">
                <textarea rows="3" name="comment" class="form-control"
                          placeholder="Mời bạn tham gia thảo luận, vui lòng nhập tiếng Việt có dấu"
                          required="required"></textarea>
            </div>
            <div class="form-group col-md-12">
                <button class="btn btn-fill-out" title="Bình luận!">Để lại bình luận</button>
                <input type="hidden" value="{{ $product->id }}" name="product_id">
            </div>
        </div>
    </form>
</div>