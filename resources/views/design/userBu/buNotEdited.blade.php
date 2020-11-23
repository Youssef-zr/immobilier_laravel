@extends('design.layouts.app')

@push('css')
    {!! Html::style('css/bu_all.css') !!}
    <style>
        <style>
            .panel{
                direction: rtl;
                color:#555;
                border:none
            }
            .panel .panel-heading{
                border:none;
                background:#ff4c59 !important;
                color:#fff;
                border-radius: 5px 5px 0 0;
            }

            .panel-body{
                border:1px solid #ff4c59;
                border-top:none;
                border-left: 4px solid #ff4c59
            }
            .panel .panel-heading h3{
                color:inherit;
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
            .alert-default{
                border:1px solid #ccc;
                background: #fff;
            }
        </style>
    </style>
@endpush

<!-- this section showing if the building not active bu_status = 0 -->
@section('content')

<div class="container m-top m-bottom">
    <div class="row">
        <div class="col-md-9">
            <div class="panel panel-danger" style="direction: rtl;border:none">
                <div class="panel-heading">
                    <h3 style="color:inherit">{{ $title }}</h3>
                </div>
                <div class="panel-body">
                    <div class="alert alert-default">
                        <p style="text-align:center;color:#ea2b2b">
                            <strong>
                            {{ $msg }}
                            </strong>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            @include('design/bu/sidebar')
        </div>
    </div>
</div>
@stop
