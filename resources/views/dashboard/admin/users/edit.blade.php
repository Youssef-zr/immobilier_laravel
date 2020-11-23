@extends('dashboard.layouts.app')

@push('css')
    <style>
        .nav-tabs-custom > .nav-tabs > li.active
        {
            border-top-color: #f74f4f !important
        }
    </style>
@endpush
@section('braidcrump')
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <h1>
    لوحة تحكم المدير
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{adminurl('/')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li><a href="{{adminUrl('users')}}"> <i class="fa fa-users"></i> الاعضاء</a></li>
        <li class="active">تعديل عضو</li>
    </ol>
    </section>
@endsection

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="box" style="border-left: 3px solid #f39c12;">
            <div class="box-header">
                <h4>{{$title}}</h4>
            </div>
            <div class="box-body">
                {!! Form::model($user,['route'=>['users.update',$user->id],'method'=>'PUT',"files"=>true]) !!}
                    @include('dashboard.admin.users.form')
                {!! Form::close() !!}
            </div>
        </div>
        {{-- change password --}}
        <div class="box" style="border-left: 3px solid #f39c12;">
            <div class="box-header">
                <h4>تغيير كلمة المرور للعضو {{$user->name}}</h4>
            </div>
            <div class="box-body">

                {!! Form::open(['route'=>['users/editPassword'],'method'=>'post']) !!}

                    {!! Form::hidden('user_id', $user->id) !!}

                <div class="text-2 {{$errors->has('password') ? 'has-error' : ''}}">
                    <div class="form-group">
                        {!! Form::password('password', ['class'=>'form-control',"placeholder"=>"كلمة المرور الجديدة"]) !!}
                    </div>

                    @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{$errors->first('password')}}</strong>
                    </span>
                    @endif
                    <div class="form-group">
                        <button type="submit" class="btn btn-black"><i class="fa fa-edit"></i> تغيير </button>
                    </div>
                </div>

                {!! Form::close() !!}

            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="box" style="border-right: 3px solid #f74f4f;">
            <div class="box-header">
                <h4>عقارات العضو {{$user->name}}</h4>
                <hr>
                <h5>عدد العقارات التي أضافها العضو <span class="badge">{{count(\App\akkar::where('user_id',$user->id)->get())}}</span></h5>
                <hr>
            </div>
            <div class="box-body">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                    <li class="active"><a href="#approved" data-toggle="tab"> مفعلة</a></li>
                    <li><a href="#watting" data-toggle="tab">غير مفعلة</a></li>
                    </ul>
                    <div class="tab-content">
                    <div class="active tab-pane" id="approved">
                        @if (count($approveds)>0)
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>اسم العقار</th>
                                        <th>السعر</th>
                                        <th>العنوان</th>
                                        <th>تاريخ الاضافة</th>
                                        <th>التحكم</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($approveds as $item)
                                    <tr>

                                        <td><a href="{{ adminUrl('bu/'.$item->id.'/edit') }}" class="label label-success">{{$item->bu_name}}</a></td>
                                        <td>{{$item->bu_price}} د.م</td>
                                        <td>{{bu_place()[$item->bu_place]}}</td>
                                        <td><span class="badge" style="background-color:#f74f4f">{{date_str($item->created_at)}}</span></td>
                                        <td><a href="{{ adminUrl('bu/edit/'.$item->id.'/0') }}">الغاء التفعيل</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="well well-sm alert-warning">
                                <span>
                                    <strong>لا توجد أي عقارات مفعلة للعضو {{ $user->name }} حاليا</strong>
                                </span>
                            </div>
                        @endif
                    </div>

                    <div class="tab-pane" id="watting">

                        @if (count($wattings)>0)
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>اسم العقار</th>
                                        <th>السعر</th>
                                        <th>العنوان</th>
                                        <th>تاريخ الاضافة</th>
                                        <th>التحكم</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($wattings as $record)
                                    <tr>
                                        <td><a href="{{ adminUrl('bu/'.$record->id.'/edit') }}" class="label label-warning">{{$record->bu_name}}</a></td>
                                        <td>{{$record->bu_price}} د.م</td>
                                        <td>{{bu_place()[$record->bu_place]}}</td>
                                        <td><span class="badge" style="background-color:#f74f4f">{{date_str($record->created_at)}}</span></td>
                                        <td><a href="{{ adminUrl('bu/edit/'.$record->id.'/1') }}">تفعيل</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="well well-sm alert-warning">
                                <span>
                                    <strong>لا توجد أي عقارات في انتظارالتفعيل للعضو {{ $user->name }} حاليا</strong>
                                </span>
                            </div>
                        @endif
                    </div>
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
        </div>
    </div>
</div>

@endsection
