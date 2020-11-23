@php
$title='عضوية جديدة ';
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
        {!! Form::open(['url'=>'register_user','method'=>'post']) !!}


         <!-- start form login -->
            <!--- start validate name sestion--->
            <div class="form-group">
                <div class="box-container {{$errors->has('name') ?'not-valid' :'' }}">
                <label for="name" class="form-label">اسم المستخدم</label>
                <input
                    type="text"
                    class="form-control"
                    name="name"
                    id="name"
                    placeholder="أدخل اسم المستخدم"
                    value="{{ old('name') }}"
                />
                <span class="icon">
                    <i class="fa fa-user"></i>
                </span>
                </div>
                @if($errors->has('name'))
                    <span class="error" dir="rtl">
                    <span>{{$errors->first('name')}}</span>
                    </span>
                @endif
            </div>
            <!--- end validate name sestion--->

            <!--- start validate email sestion--->
            <div class="form-group">
                <div class="box-container {{$errors->has('email') ?'not-valid' :'' }}">
                <label for="email" class="form-label">البريد الالكتروني</label>
                <input
                    type="email"
                    class="form-control"
                    name="email"
                    id="email"
                    placeholder="أدخل عنوان البريد الالكتروني"
                    value="{{ old('email') }}"

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
                    placeholder="ادخل كلمة المرور"
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

            <!--- start validate password_confirmation sestion--->
            <div class="form-group">
                <div class="box-container {{$errors->has('password_confirmation') ?'not-valid' :'' }}">

                <label كلمة for="password_confirmation" class="form-label">كلمة المرور</label>
                <input
                    type="password"
                    class="form-control"
                    name="password_confirmation"
                    id="password_confirmation"
                    placeholder="تأكيد كلمة المرور"
                />
                <span class="icon">
                    <i class="fa fa-key"></i>
                </span>
                </div>
                @if($errors->has('password'))
                    <span class="error" dir="rtl">
                    <span>{{$errors->first('password_confirmation')}}</span>
                    </span>
                @endif
            </div>
            <!--- end validate password_confirmation sestion--->

            <!--- start btn submit--->
            <div class="form-group pull-right" style="width:100px">
                <button class="btn btn-danger btn-block btn-sm" type="submit">
                <i class="fa fa-sign-in"></i> تسجيل
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
