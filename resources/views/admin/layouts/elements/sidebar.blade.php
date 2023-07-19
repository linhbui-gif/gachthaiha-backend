<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <?php
                $avatar = asset('assets/admin/dist/img/user2-160x160.jpg');
                $admin = \Illuminate\Support\Facades\Auth::guard('admin')->user();
                if (!empty($admin->avatar)) {
                    $avatar = $admin->avatar;
                }
                ?>
                <img src="{{ $avatar }}" class="img-circle" alt="{{ $admin->name }}"
                     style="width: 45px; height: 45px; object-fit: cover">
            </div>
            <div class="pull-left info">
                <p>{{ $admin->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <?php
            $admin = \Illuminate\Support\Facades\Auth::guard('admin')->user();
            ?>
            <li>
                <a href="{{ route('admin.dashboard.index') }}">
                    <i class="fa fa-dashboard"></i> <span>{{ trans('admin.dashboard') }}</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.order.index') }}">
                    <i class="fa fa-product-hunt"></i> <span>Quản lý đơn hàng</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-product-hunt"></i>
                    <span>Sản phẩm</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @if($admin->can(config('permission.list.product.list')))
                        <li>
                            <a href="{{ route('admin.product.index') }}">
                                <i class="fa fa-th-list"></i> {{ trans('admin.product_list') }}
                            </a>
                        </li>
                    @endif

{{--                        <li>--}}
{{--                            <a href="{{ route('admin.product.excel_update') }}">--}}
{{--                                <i class="fa fa-upload"></i> Update Excel--}}
{{--                            </a>--}}
{{--                        </li>--}}

                    @if($admin->can(config('permission.list.product_category.list')))
                        <li>
                            <a href="{{ route('admin.product_category.index') }}">
                                <i class="fa fa-th-list"></i> {{ trans('admin.product_category') }}
                            </a>
                        </li>
                    @endif

                        <li>
                            <a href="{{ route('admin.brand.index') }}">
                                <i class="fa fa-bandcamp"></i> Hãng sản xuất
                            </a>
                        </li>

                    <li>
                        <a href="{{ route('admin.size.index') }}">
                            <i class="fa fa-adjust"></i> Kích thước
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('admin.product_type.index') }}">
                            <i class="fa fa-tasks"></i> Loại gạch
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('admin.product_surface.index') }}">
                            <i class="fa fa-list"></i> Bề mặt gạch
                        </a>
                    </li>

{{--                    <li>--}}
{{--                        <a href="{{ route('admin.product_comment.index') }}">--}}
{{--                            <i class="fa fa-comments"></i> Bình luận sản phẩm--}}
{{--                        </a>--}}
{{--                    </li>--}}

{{--                    <li>--}}
{{--                        <a href="{{ route('admin.product_review.index') }}">--}}
{{--                            <i class="fa fa-star"></i> Đánh giá sản phẩm--}}
{{--                        </a>--}}
{{--                    </li>--}}
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-book"></i>
                    <span>Quản lý nội dung</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @if($admin->can(config('permission.list.news_category.list')))
                        <li>
                            <a href="{{ route('admin.news_category.index') }}">
                                <i class="fa fa-list-alt"></i> Danh mục tin tức
                            </a>
                        </li>
                    @endif
                    @if($admin->can(config('permission.list.news.list')))
                        <li>
                            <a href="{{ route('admin.news.index') }}">
                                <i class="fa fa-newspaper-o"></i> Danh sách tin tức
                            </a>
                        </li>
                    @endif
                    @if($admin->can(config('permission.list.page.list')))
                        <li>
                            <a href="{{ route('admin.page.index') }}">
                                <i class="fa fa-file"></i> Quản lý trang
                            </a>
                        </li>
                    @endif
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>Đối tác & liên hệ</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
{{--                    @if($admin->can(config('permission.list.customer_review.list')))--}}
{{--                        <li>--}}
{{--                            <a href="{{ route('admin.customer_review.index') }}">--}}
{{--                                <i class="fa fa-commenting-o"></i> Khách hàng review--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    @endif--}}
                    @if($admin->can(config('permission.list.contact.list')))
                        <li>
                            <a href="{{ route('admin.contact.index') }}">
                                <i class="fa fa-user"></i> Yêu cầu liên hệ
                            </a>
                        </li>
                    @endif
{{--                    @if($admin->can(config('permission.list.subscription.list')))--}}
{{--                        <li>--}}
{{--                            <a href="{{ route('admin.subscription.index') }}">--}}
{{--                                <i class="fa fa-envelope"></i> Email đăng ký nhận tin--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    @endif--}}
                </ul>
            </li>


            <li class="treeview">
                <a href="#">
                    <i class="fa fa-gears"></i>
                    <span>{{ trans('admin.system_setting') }}</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @if($admin->can(config('permission.list.setting.list')))
                        <li>
                            <a href="{{ route('admin.setting.index') }}">
                                <i class="fa fa-gear"></i> {{ trans('admin.common_setting') }}
                            </a>
                        </li>
                    @endif
                    @if($admin->can(config('permission.list.banner.list')))
                        <li>
                            <a href="{{ route('admin.banner.index') }}">
                                <i class="fa fa-image"></i> {{ trans('admin.banner') }}
                            </a>
                        </li>
                    @endif
                    @if($admin->can(config('permission.list.administrator.list')))
                        <li>
                            <a href="{{ route('admin.administrator.index') }}">
                                <i class="fa fa-user"></i> Quản lý tài khoản quản trị
                            </a>
                        </li>
                    @endif
                    @if($admin->can(config('permission.list.role.list')))
                        <li>
                            <a href="{{ route('admin.role.index') }}">
                                <i class="fa fa-user-secret"></i> Phân quyền
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
