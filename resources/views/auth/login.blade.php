@php
$title='تسجيل الدخول';
@endphp
@extends('design/layouts.app')

@push('css')
    {!! Html::style('css/form.css') !!}
    {!! Html::style("my-tools/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css") !!}
@endpush

@section('content')
<div class="validate-form">
    <div class="container">
        <!-- start error message if the request axios not found -->
        <h6 class="text-center text-danger mb-4">
            @if($errors->has('no-user'))
                $errors->first('no-user')}}
            @endif
        </h6>
        <!-- start error message if the request axios not found -->
        <div class="col-md-4 col-md-offset-4 form">
            <div class="avatar">
                <img src="{{ url('img/avatar.png')}}" alt="avatar">
            </div>
        {!! Form::open(['route'=>'login_post','method'=>'post']) !!}

         <!-- start form login -->
            <!--- start validate email sestion--->
            <div class="form-group">
                <div class="box-container {{$errors->has('email') ?'not-valid' :'' }}">
                <label for="email" class="form-label">البريد لالكتروني</label>
                <input
                    type="email"
                    class="form-control"
                    name="email"
                    id="email"
                    placeholder="ادخل بريدك الالكتروني"
                />
                <span class="icon">
                    <i class="fa fa-envelope"></i>
                </span>
                </div>
                @if($errors->has('email'))
                    <span class="error" dir="rtl">
                    <span>{{$errors->first('email')}}</span>
                    </span>
                @endif
            </div>
            <!--- end validate email sestion--->

            <!--- start validate password sestion--->
            <div class="form-group">
                <div class="box-container {{$errors->has('password') ?'not-valid' :'' }}">

                <label for="password" class="form-label">كلمة المرور</label>
                <input
                    type="password"
                    class="form-control"
                    name="password"
                    id="password"
                    placeholder="أدخل كلمة المرور"
                />
                <span class="icon">
                    <i class="fa fa-lock"></i>
                </span>
                </div>
                @if($errors->has('password'))
                    <span class="error" dir="rtl">
                    <span>{{$errors->first('password')}}</span>
                    </span>
                @endif
            </div>
            <!--- end validate password sestion--->

            <!--- start remmeber me password sestion--->
            <div class="form-group text-left remember">
                <div class="form-check">
                    <div class="icheck-danger">
                        <input type="checkbox" id="remember" name="remember">
                        <label for="remember">
                            تذكرني
                        </label>
                    </div>
                </div>
            </div>
            <!--- end remmeber me password sestion--->

            <!--- start btn submit--->
            <div class="form-group pull-right" style="width:100px">
                <button class="btn btn-danger btn-block btn-sm" type="submit">
                <i class="fa fa-sign-in"></i> دخول
                </button>
            </div>
            <!--- end btn submit--->
        <!-- end form login -->

        {!! Form::close() !!}
            <div class="clearfix"></div>
        </div>
    </div>
</div>
@endsection
