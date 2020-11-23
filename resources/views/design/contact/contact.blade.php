@extends('design/layouts.app')


@push('css')
    {!! Html::style('css/main.css') !!}
    <style>
        .text-white{
            color:#eee
        }
        .contact{
            background: url('{{ url("img/map-image.png") }}') no-repeat top center fixed #333;
            background-size: cover;
            border-top: 1px solid #ff4c59;
        }
        .input-group-addon{
            background: #ff4c59;
            border-color: #ff4c59;
        }
        .input-group-addon i{
            color:#fff
        }
        .us .head{
            font-size:22px;
            color:#fff;
            margin-bottom: 8px;
            text-decoration: underline;
            margin-bottom: 10px;
        }
        .us p{
            font-size: 17px;
        }
        .us p i{
            color:#ff4c59
        }
        .us address{
            color:#fff;
            margin-bottom: 8px;
            direction: rtl
        }
        .us address h5{
            color:inherit;
            margin: 0
        }
        .us address span{
            font-size: 19px;
            margin-bottom: 3px;
            display:block;
        }
        .adress:last-of-type{
            margin-top: 10px;
        }

        .btn-danger{
            background: #ff4c59;
            border-color: #ff4c59;
        }

        .btn-danger:hover{
            background:#fd545f;
            border-color:#fd545f;
        }

        .has-error .input-group-addon {
            background: #ff4c59;
            border-color: #ff4c59;
            color:white;
        }

        @media(max-width:767px){
            .us{
                padding:0 15px
            }
        }

    </style>
@endpush

@section('content')
    <div class="contact text-right">
        <div class="container">
            <div class="row">
                <div class="col-md-8">


                    {!! Form::open(['method'=>'post']) !!}
                        <div class="col-md-6">
                            <div class="form-group {{$errors->has('msg') ? 'has-error' : ''}}">
                                {!! Form::label('msg', 'الرسالة', ['class'=>'form-label text-white']) !!}
                                {!! Form::textarea('msg', null, ['class'=>'form-control text-right','placeholder'=>"من فضلك أدخل رسالتك"]) !!}
                                @if ($errors->has('msg'))
                                <span class="help-block">
                                    <strong dir="rtl">{{$errors->first('msg')}}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group {{$errors->has('name') ? 'has-error' : ''}}">
                                {!! Form::label('name', 'الاسم', ['class'=>'form-label text-white']) !!}
                                {!! Form::text('name', auth()->check()?auth()->user()->name:null, ['class'=>'form-control text-right','placeholder'=>"من فضلك أدخل اسمك"]) !!}
                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong dir="rtl">{{$errors->first('name')}}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
                                {!! Form::label('email', 'البريد الالكتروني', ['class'=>'form-label  text-white']) !!}
                                <div class="input-group">
                                    {!! Form::text('email', auth()->check()?auth()->user()->email:null , ['class'=>'form-control text-right','placeholder'=>"من فضلك أدخل بريدك الالكتروني"]) !!}
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                </div>

                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong dir="rtl">{{$errors->first('email')}}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group {{$errors->has('type') ? 'has-error' : ''}}">
                                {!! Form::label('tupe', 'الحالة', ['class'=>'form-label  text-white']) !!} <br>
                                {!! Form::select('type', contact(), null, ['class'=>'form-control','placeholder'=>"نوع الرسالة"]) !!}

                                @if ($errors->has('type'))
                                <span class="help-block">
                                    <strong dir="rtl">{{$errors->first('type')}}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <button class="btn btn-danger"><i class="fa fa-send"></i> ارسل رسالتك</button>
                            </div>
                        </div>
                    {!! Form::close() !!}

                </div>
                <div class="col-md-3">
                    <div class="us">

                        <h3 class="head"><strong>اتصل بنا</strong></h3>
                        <p class="text-white">مكتبنا <i class="fa fa-outdent"></i></p>

                        <address>
                            <h5>{{settings()->adress}}</h5>
                        </address>

                        <address>
                            <span>{{settings()->sitename}}</span>
                            <h5>{{settings()->email}}</h5>
                        </address>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
