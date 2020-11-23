@extends('design.layouts.app')

@push('css')
    {!! Html::style('css/bu_all.css') !!}
    <style>
        .jumbotron{
            background:#fff;
            box-shadow:0 0 4px 1px rgba(0,0,0,.3);
        }
        .panel{
            direction: rtl;
            color:#555;
            border:none
        }
        .panel .panel-heading{
            border:none;
            color:#fff;
            background:#333 !important;
            border-radius: 5px 5px 0 0;
        }

        .panel-body{
            border:1px solid #ddd;
            border-left: 4px solid #333;
            border-top:none;
        }
        .panel .panel-heading h3{
            color:inherit;
        }
        .panel .row [class*='col']{
            float:right
        }

        .panel .btn-warning{
            background: #5bc0de;
            border-color: #5bc0de
        }
        .panel .btn-warning:hover{
            background: #5cd9f8;
            border-color: #5bc0de
        }
    </style>
@endpush

@section('content')
<div class="container m-top m-bottom">


    <div class="row">
        <div class="col-md-9">
           <div class="jumbotron">
                {!! Form::model($user,['route'=>'user.profile','method'=>'Patch','files'=>true]) !!}
                    @include('design.profile.form')
                {!! Form::close() !!}

                <div class="clearfix"></div>
                <hr>
                <div class="clearfix"></div>

                {!! Form::open(['route'=>'user.changePassword','method'=>'Patch']) !!}
                    @include('design.profile.changePassword')
                {!! Form::close() !!}
            </div>
        </div>

        <div class="col-md-3">

            @include('design.bu.sidebar')

        </div>
        <!-- END MENU -->
    </div>
</div>

@endsection
