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
                    <form action="{{ url('admin/register') }}" method="post">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label>이름</label>
                            <input class="au-input au-input--full" type="text" name="name" placeholder="이름을 입력하세요" value="{{ old('name') }}">

                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label>아이디</label>
                            <input class="au-input au-input--full" type="text" name="username" placeholder="아이디를 입력하세요" value="{{ old('username') }}">
                            @if ($errors->has('username'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label>이메일</label>
                            <input class="au-input au-input--full" type="email" name="email" placeholder="이메일을 입력하세요" value="{{ old('email') }}">

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label>비번</label>
                            <input class="au-input au-input--full" type="password" name="password" placeholder="비번을 입력하세요">

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label>비번확인</label>

                            <input type="password" class="au-input au-input--full" name="password_confirmation" placeholder="비번을 다시 입력해주세요">

                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                            @endif
                        </div>

                        <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">등록하기</button>
                    </form>
                    <div class="register-link">
                        <p>
                            이미 계정을 가지고 계신가요?
                            <a href="{{ url('/admin/login') }}">로그인하기</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
