<!-- user info -->

@auth

<div class="side-menu user-side">
    <div class="title" style="background:#5bc0de">
        <h3>خيارات العضو</h3>
    </div>
    <ul class="list-group">
        <li class="list-group-item {{ setActive(['user/profile']) }}">
            <a href="{{ url('user/profile') }}">
                <i class="fa fa-gears"></i>
             بياناتك الشخصية
            </a>
        </li>
        <li class="list-group-item {{ setActive(['user/bu_active']) }}">
            <a href="{{ url('user/bu_active') }}">
                <i class="fa fa-check"></i>
                 عقاراتك المفعلة
            </a>
        </li>
        <li class="list-group-item {{ setActive(['user/bu_wattings']) }}">
            <a href="{{ url('user/bu_wattings') }}">
                <i class="fa fa-clock-o"></i>
                 عقارات في انتظارالتفعيل
            </a>
        </li>
        <li class="list-group-item {{ setActive(['bu/add']) }}">
            <a href="{{ url('bu/add') }}">
                <i class="fa fa-plus"></i>
                 أضف عقار
            </a>
        </li>
    </ul>
</div>
@endauth

<!-- search building bar-->
<div class="search">
    <div class="title">
        <h3>بحث متقدم</h3>
    </div>

    {!! Form::open(['url'=>url('search'),'method'=>'get']) !!}

        <div class="form-group {{$errors->has('bu_price_from') ? 'has-error' : ''}}">
            {!! Form::text('bu_price_from', old('bu_price_from'), ['class'=>'form-control',"placeholder"=>'سعر العقار من','step'=>'1']) !!}

            @if ($errors->has('bu_price_from'))
            <span class="help-block">
                <strong>{{$errors->first('bu_price_from')}}</strong>
            </span>
            @endif
        </div>
        <div class="form-group {{$errors->has('bu_price_to') ? 'has-error' : ''}}">
            {!! Form::text('bu_price_to', old('bu_price_to'), ['class'=>'form-control',"placeholder"=>'سعر العقار الى','step'=>'1']) !!}

            @if ($errors->has('bu_price_to'))
            <span class="help-block">
                <strong>{{$errors->first('bu_price_to')}}</strong>
            </span>
            @endif
        </div>

        <div class="form-group list">
            {!! Form::select('bu_place', bu_place() , old('bu_place'), ["class"=>'form-control','placeholder'=>'كل المدن']) !!}
        </div>

        <div class="form-group list">
            {!! Form::select('bu_rooms_count', bu_rooms() , old('bu_rooms_count'), ["class"=>'form-control','placeholder'=>'كل الغرف']) !!}
        </div>

        <div class="form-group list">
            {!! Form::select('bu_type', bu_type() , old('bu_type'), ["class"=>'form-control','placeholder'=>'كل العقارات']) !!}
        </div>


        <div class="form-group list">
            {!! Form::select('bu_rent', bu_rent() , old('bu_rent'), ["class"=>'form-control','placeholder'=>'كل المعاملات']) !!}
        </div>

        <div class="form-group {{$errors->has('bu_square') ? 'has-error' : ''}}">
            {!! Form::text("bu_square", old('bu_square'), ['class'=>'form-control',"placeholder"=>'المساحة']) !!}

            @if ($errors->has('bu_square'))
            <span class="help-block">
                <strong>{{$errors->first('bu_square')}}</strong>
            </span>
            @endif
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-info"><i class="fa fa-search"></i> ابحث</button>
        </div>

    {!! Form::close() !!}


</div>

<!-- side menu -->
<div class="side-menu">
    <div class="title">
        <h3>خيارات العقارات</h3>
    </div>
    <ul class="list-group">
        <li class="list-group-item {{ setActive(['bu/show_all']) }}">
            <a href="{{ url('bu/show_all') }}">
                <i class="fa fa-building"></i>
                كل العقارات
            </a>
        </li>
        <li class="list-group-item {{ setActive(['bu/forRent']) }}">
            <a href="{{ url('bu/forRent') }}">
                <i class="fa fa-hotel"></i>
                    ايجــار
            </a>
        </li>
        <li class="list-group-item {{ setActive(['bu/forBuy']) }}">
            <a href="{{ url('bu/forBuy') }}">
                <i class="fa fa-key"></i>
                بيـع
            </a>
        </li>
        <li class="list-group-item {{ setActive(['bu/house']) }}">
            <a href="{{ url('bu/house') }}">
                <i class="fa fa-list-alt"></i>
                    شقق
            </a>
        </li>
        <li class="list-group-item {{ setActive(['bu/villa']) }}">
            <a href="{{ url('bu/villa') }}">
                <i class="fa fa-list-alt"></i>
                فيلات
            </a>
        </li>
        <li class="list-group-item {{ setActive(['bu/chalee']) }}">
            <a href="{{ url('bu/chalee') }}">
                <i class="fa fa-list-alt"></i>
                شاليات
            </a>
        </li>
    </ul>
</div>
