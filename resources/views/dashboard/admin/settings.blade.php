@extends('dashboard.layouts.app')

@section('braidcrump')
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <h1>
    لوحة تحكم المدير
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{adminurl('/')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li class="active"><i class="fa fa-gears"></i> الاعدادات </li>
    </ol>
    </section>
@endsection

@section('content')

<div class="box">
    <div class="box-header">
        <h4>{{$title}}</h4>
    </div>
    <div class="box-body">

        {!! Form::model($settings, ['route'=>['settings.edit'],'methode'=>'POST','files'=>'true']) !!}

        {!! Form::hidden('id', null) !!}
        <hr>
        <div class="row">

            <div class="col-md-4">
                <div class="form-group {{$errors->has('sitename') ? 'has-error' : ''}}">
                    {!! Form::label('sitename', 'اسم الموقع :', ['class'=>'form-label']) !!}
                    {!! Form::text('sitename', old('sitename'), ['class'=>'form-control',"placeholder"=>"اسم الموقع"]) !!}

                    @if ($errors->has('sitename'))
                    <span class="help-block">
                        <strong>{{$errors->first('sitename')}}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">

                    {!! Form::label('email', 'بريد الموقع :', ['class'=>'form-label']) !!}

                    {!! Form::text('email', old('email'), ['class'=>'form-control',"placeholder"=>"بريد الموقع"]) !!}

                    @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{$errors->first('email')}}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group {{$errors->has('adress') ? 'has-error' : ''}}">

                    {!! Form::label('adress', 'العنوان :', ['class'=>'form-label']) !!}

                    {!! Form::text('adress', old('adress'), ['class'=>'form-control',"placeholder"=>"العنوان"]) !!}

                    @if ($errors->has('adress'))
                    <span class="help-block">
                        <strong>{{$errors->first('adress')}}</strong>
                    </span>
                    @endif
                </div>
            </div>
        </div>
        <hr>
        <div class="row">

            <div class="col-md-6">
                <div class="form-group {{$errors->has('description') ? 'has-error' : ''}}">

                    {!! Form::label('description', 'وصف الموقع :', ['class'=>'form-label']) !!}
                    {!! Form::textarea('description', old('description'), ['class'=>'form-control',"placeholder"=>"وصف الموقع"]) !!}

                    @if ($errors->has('description'))
                    <span class="help-block">
                        <strong>{{$errors->first('description')}}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group {{$errors->has('keywords') ? 'has-error' : ''}}">

                    {!! Form::label('keywords', ' كلمات دلالية :', ['class'=>'form-label']) !!}

                    {!! Form::textarea('keywords', old('keywords'), ['class'=>'form-control',"placeholder"=>"كلمات دلالية للموقع"]) !!}

                    @if ($errors->has('keywords'))
                    <span class="help-block">
                        <strong>{{$errors->first('keywords')}}</strong>
                    </span>
                    @endif
                </div>
            </div>
        </div>
        <hr>
        <div class="row">

            <div class="col-md-6">
                <div class="form-group {{$errors->has('status') ? 'has-error' : ''}}">

                    {!! Form::label('status', 'حالة الموقع :', ['class'=>'form-label']) !!}

                    {!! Form::select('status', ['0'=>'قيد الصيانة' , '1'=>'مفعل'] , $settings->pluck('status') , ['class'=>'form-control',"placeholder"=>"حالة الموقع",'style'=>'padding:0 8px']) !!}
                    @if ($errors->has('status'))
                    <span class="help-block">
                        <strong>{{$errors->first('status')}}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group {{$errors->has('message_maintenance') ? 'has-error' : ''}}">

                    {!! Form::label('message_maintenance', 'رسالة وضع الصيانة :', ['class'=>'form-label']) !!}

                    {!! Form::text('message_maintenance', old('message_maintenance'), ['class'=>'form-control',"placeholder"=>"رسالة وضع الصيانة"]) !!}

                    @if ($errors->has('message_maintenance'))
                    <span class="help-block">
                        <strong>{{$errors->first('message_maintenance')}}</strong>
                    </span>
                    @endif
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-8 parent">
                        <div class="form-group {{$errors->has('icon') ? 'has-error' : ''}}">

                            {!! Form::label('icon', 'ايقونة الموقع :', ['class'=>'form-label']) !!}

                            {!! Form::file('icon', ['class'=>'form-control avatar']) !!}

                            @if ($errors->has('icon'))
                            <span class="help-block">
                                <strong>{{$errors->first('icon')}}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class='text-center'>
                            <img src="{{$settings->icon_src}}" alt="site icon" srcset="" class="img-thumbnail image-preview"
                            style="width:65px;height:65px;margin-top:23px;border-radius:50% !important"
                            >
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-8 parent">
                        <div class="form-group {{$errors->has('logo') ? 'has-error' : ''}}">

                            {!! Form::label('logo', 'شعار الموقع :', ['class'=>'form-label']) !!}

                            {!! Form::file('logo', ['class'=>'form-control avatar']) !!}

                            @if ($errors->has('logo'))
                            <span class="help-block">
                                <strong>{{$errors->first('logo')}}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class='text-center'>
                            <img src="{{$settings->logo_src}}" alt="site icon" srcset="" class="img-thumbnail image-preview"
                            style="width:65px;height:65px;margin-top:23px;border-radius:50% !important"
                            >
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <div class="form-group {{$errors->has('facebook_link') ? 'has-error' : ''}}">

                        {!! Form::label('facebook_link', 'رابط حساب facebook :', ['class'=>'form-label']) !!}
                        {!! Form::text('facebook_link', null , ['class'=>'form-control','placeholder'=>'رابط حساب facebook']) !!}

                        @if ($errors->has('facebook_link'))
                        <span class="help-block">
                            <strong>{{$errors->first('facebook_link')}}</strong>
                        </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <div class="form-group {{$errors->has('twitter_link') ? 'has-error' : ''}}">

                        {!! Form::label('twitter_link', 'رابط حساب twitter :', ['class'=>'form-label']) !!}
                        {!! Form::text('twitter_link', null , ['class'=>'form-control','placeholder'=>'رابط حساب twitter']) !!}

                        @if ($errors->has('twitter_link'))
                        <span class="help-block">
                            <strong>{{$errors->first('twitter_link')}}</strong>
                        </span>
                        @endif
                    </div>

                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <div class="form-group {{$errors->has('linkedin_link') ? 'has-error' : ''}}">

                        {!! Form::label('linkedin_link', 'رابط حساب linkedin :', ['class'=>'form-label']) !!}
                        {!! Form::text('linkedin_link', null , ['class'=>'form-control','placeholder'=>'رابط حساب linkedin']) !!}

                        @if ($errors->has('linkedin_link'))
                        <span class="help-block">
                            <strong>{{$errors->first('linkedin_link')}}</strong>
                        </span>
                        @endif
                    </div>

                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <div class="form-group {{$errors->has('mobile') ? 'has-error' : ''}}">

                        {!! Form::label('mobile', 'رقم الهاتف :', ['class'=>'form-label']) !!}
                        {!! Form::text('mobile', null , ['class'=>'form-control','placeholder'=>'رقم الهاتف']) !!}

                        @if ($errors->has('mobile'))
                        <span class="help-block">
                            <strong>{{$errors->first('mobile')}}</strong>
                        </span>
                        @endif
                    </div>

                </div>
            </div>

        </div>
        <hr>

        <div class="form-group">
            <button type="submit" class="btn btn-black "><i class="fa fa-save"></i> حفظ</button>
        </div>

    {!! Form::close() !!}
    </div>
</div>



@endsection
