@extends('layouts.auth')

@section('content')
    <div class="container">
        <div class="login-wrap">
            <div class="login-content">
                <div class="login-logo">
                    <a href="#">
                        <img src="{{ asset('images/icon/logo.png') }}" alt="CoolAdmin">
                    </a>
                </div>
                <div class="login-form">
                    <form action="{{ url('/admin/login') }}" method="post">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            {{--<label>아이디</label>--}}
                            <input class="au-input au-input--full" type="text" name="username" placeholder="아이디를 입력하세요" value="{{ old('username') }}">

                            @if ($errors->has('username'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            {{--<label>비번</label>--}}
                            <input class="au-input au-input--full" type="password" name="password"
                                   placeholder="비번을 입력하세요">
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        {{--<div class="login-checkbox">--}}
                            {{--<label>--}}
                                {{--<input type="checkbox" name="remember">나를 기억하기--}}
                            {{--</label>--}}
                            {{--<label>--}}
                                {{--<a href="#">Forgotten Password?</a>--}}
                            {{--</label>--}}
                        {{--</div>--}}
                        <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">로그인</button>
                    </form>
                    {{--<div class="register-link">
                        <p>
                            Don't you have account?
                            <a href="{{ url('/register') }}">Sign Up Here</a>
                        </p>
                    </div>--}}
                </div>
            </div>
        </div>
    </div>
@endsection
