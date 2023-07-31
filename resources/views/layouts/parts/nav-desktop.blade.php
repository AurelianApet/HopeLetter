<!-- HEADER DESKTOP-->
<header class="header-desktop">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="header-wrap">
                <div></div>
                <div class="header-button">
                    <div class="account-wrap">
                        <div class="account-item clearfix js-item-menu">
                            <div class="image">
                                <img src="{{ asset('images/icon/no_avatar.jpg') }}" alt="John Doe" />
                            </div>
                            <div class="content">
                                <a class="js-acc-btn" href="#">{!! Auth::user()->name !!}</a>
                            </div>
                            <div class="account-dropdown js-dropdown">
                                {{--<div class="account-dropdown__body">--}}
                                    {{--<div class="account-dropdown__item">--}}
                                        {{--<a href="#">--}}
                                            {{--<i class="zmdi zmdi-account"></i>Account</a>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                <div class="account-dropdown__footer">
                                    <a href="{{ url('/admin/logout') }}">
                                        <i class="zmdi zmdi-power"></i>로그아웃
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- END HEADER DESKTOP-->