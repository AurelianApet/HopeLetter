<!-- HEADER MOBILE-->
<header class="header-mobile d-block d-lg-none">
    <div class="header-mobile__bar">
        <div class="container-fluid">
            <div class="header-mobile-inner">
                <a class="logo" href="index.html">
                    <img src="{{ asset('images/icon/logo.png') }}" alt="CoolAdmin"/>
                </a>
                <button class="hamburger hamburger--slider" type="button">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <nav class="navbar-mobile">
        <div class="container-fluid">
            <ul class="navbar-mobile__list list-unstyled">
                <li class="{!! Request::is('request') ? 'active': '' !!}">
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
        </div>
    </nav>
</header>
<!-- END HEADER MOBILE-->