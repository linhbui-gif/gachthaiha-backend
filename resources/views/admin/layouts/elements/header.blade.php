<header class="main-header">
    <!-- Logo -->
    <a href="{{ route('admin.dashboard.index') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">
            <img src="{{ asset('assets/frontend/images/favicon.png') }}"
                 style="width: 47px; height: 47px; object-fit: contain;" />
        </span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">
            <img src="{{ asset('assets/admin/dist/img/logo.png') }}"
                 style="width: 200px; height: 47px; object-fit: contain;"/>
        </span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav" style="display: flex;justify-content: center;align-items: center;">

                <li style="padding-right: 15px;">
                    <div class="btn_clear_cache btn btn-warning" data-url="{{ route('admin.setting.clear_cache') }}">
                        <i class="fa fa-refresh"></i> Clear cache
                    </div>
                </li>

                @if($user = \Illuminate\Support\Facades\Auth::guard('admin')->user())
                    @php $numberNotifyUnread = count($user->unreadNotifications); @endphp
                    <li class="dropdown notifications-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-globe"></i>
                            @if(!empty($numberNotifyUnread))
                            <span class="label label-primary">
                                {{ number_format($numberNotifyUnread) }}
                            </span>
                            @endif
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">
                                {{ 'Bạn có '.number_format($numberNotifyUnread).' thông báo mới' }}
                                <label class="label label-primary pull-right notify_make_all_read"
                                       data-url="{{ route('admin.notify.make_all_read') }}">
                                    Đánh dấu tất cả là đã đọc
                                </label>
                            </li>
                            <li>
                                <input type="hidden" class="ajax_make_read_notify_url" value="{{ route('admin.notify.make_read') }}"/>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    @php $userNotify = $user->notifications->take(20); @endphp
                                    @if(!$userNotify->isEmpty())
                                        @foreach($userNotify as $key => $value)
                                            @php $data = $value['data']; @endphp
                                            @if(!empty($data['message']))
                                                <li>
                                                    <a href="{{ !empty($data['url']) ? $data['url'] : '#' }}"
                                                       class="{{ $value->unread() ? 'notify_unread a_make_read' : 'notify_read' }}"
                                                       data-notify-id="{{ $value->id }}">
                                                        <i class="fa fa-info-circle  text-info"></i> {{ !empty($data['message']) ? $data['message'] : '' }}
                                                        <br/>
                                                        <small>
                                                            <i class="fa fa-clock-o"></i>
                                                            <i style="font-size: 9px;">
                                                                {{ date('H:i d/m/Y', strtotime($value->created_at)) }}
                                                            </i>
                                                        </small>
                                                    </a>
                                                </li>
                                            @endif
                                        @endforeach
                                    @endif
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="{{ route('admin.notify.index') }}">Xem tất cả</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            @php
                                $avatar = !empty($user->avatar) ? $user->avatar : asset('assets/admin/dist/img/user2-160x160.jpg');
                            @endphp
                            <img src="{{ $avatar }}" class="user-image" alt="User Image">
                            <span class="hidden-xs">{{ $user->name }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="{{ $avatar }}" class="img-circle" alt="User Image">
                                <p>
                                    {{ $user->name }}
                                </p>
                            </li>
                            <li class="user-body">
                                <ul>
                                    <li>
                                        {{ trans('admin.member_since') }} {{ date('m/Y', strtotime($user->created_at)) }}
                                    </li>
                                </ul>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="{{ route('admin.profile.index') }}"
                                       class="btn btn-default btn-flat">{{ trans('admin.profile') }}</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{{ route('admin.auth.logout') }}"
                                       class="btn btn-default btn-flat btn-logout">{{ trans('admin.logout') }}</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
</header>