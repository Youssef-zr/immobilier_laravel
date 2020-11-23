@extends('design.layouts.app')

@push('css')
    {!! Html::style('css/bu_all.css') !!}
    <style>
        .panel{
            direction: rtl;
            color:#555;
        }
        .panel .panel-heading h3{
            color:#444;
        }
        .panel .row [class*='col']{
            float:right
        }

        .panel .btn-warning{
            background: #ff4c59;
            border-color: #ff4c59
        }
        .panel .btn-warning:hover{
            background: #f85c66;
            border-color: #ff4c59
        }
    </style>
@endpush

@section('content')
<div class="container m-top m-bottom">


    <div class="row">
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3> {{$title}} </h3>
                </div>
                <div class="panel-body">

                    {!! Form::open(['route'=>'userBu.create','method'=>'POST','files'=>true]) !!}
                        @include('dashboard.admin.akkar.form')
                    {!! Form::close() !!}

                </div>
            </div>
        </div>

        <div class="col-md-3">

            @include('design.bu.sidebar')

        </div>
        <!-- END MENU -->
    </div>
</div>

@endsection
