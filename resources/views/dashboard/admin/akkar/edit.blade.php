@extends('dashboard.layouts.app')

@section('braidcrump')
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <h1>
    لوحة تحكم المدير
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{adminurl('/')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li><a href="{{adminUrl('bu')}}"> <i class="fa fa-users"></i> العقارات</a></li>
        <li class="active">تعديل عقار</li>
    </ol>
    </section>
@endsection

@section('content')
<div class="box">

    <div class="box-header">
        <h3>{{$title}}</h3>
    </div>
    <div class="box-body">

        {!! Form::model($akkar,['route'=>['bu.update',$akkar->id],'method'=>'PUT','files'=>true]) !!}
            @include('dashboard.admin.akkar.form')
        {!! Form::close() !!}
    </div>
</div>

@endsection
