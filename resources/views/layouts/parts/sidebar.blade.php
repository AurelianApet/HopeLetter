<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="#">
            <img src="{{ asset('images/icon/logo.png') }}" alt="Cool Admin" />
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li class="{!! Request::is('admin/request') ? 'active': '' !!}">
                    <a href="{{ route('admin.request.index') }}">
                        <i class="fa fa-star"></i> 신청리스트
                    </a>
                </li>
                {{--<li class="{!! Request::is('street') ? 'active': '' !!}">--}}
                    {{--<a href="{{ route('street.index') }}">--}}
                        {{--<i class="fa fa-map-marker"></i> 도,시 관리--}}
                    {{--</a>--}}
                {{--</li>--}}

            </ul>
        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR-->