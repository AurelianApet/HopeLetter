@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        도, 시 추가
                    </div>
                    <form action="{{ route('street.store') }}" method="post" class="form-horizontal">
                        <div class="card-body card-block">
                            {!! csrf_field() !!}
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="name" class=" form-control-label">Name</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="name" name="name" placeholder="Enter Name..." class="form-control">
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <span class="help-block">{!! $errors->first('name') !!}</span>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-dot-circle-o"></i> 저장
                            </button>
                            <a class="btn btn-danger btn-sm" href="{{ route('street.index') }}">
                                <i class="fa fa-ban"></i> 취소
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection