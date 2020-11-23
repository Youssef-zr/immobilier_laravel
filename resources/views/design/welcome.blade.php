@extends('design/layouts.app')


@push('css')
    {!! Html::style('css/main.css') !!}
    <style>

        .btn-default{
            background: #ff4c59;
            border-color: #ff4c59;
            color:#fff
        }
        .btn-default:hover{
            background: #ff5762;
            border-color: #fc5964;
            color:#fff
        }
        .product__item__pic{
            position: relative;
        }
        .product_place{
            background: #ff4c59;
            font-size: 14px;
            color: #ffffff;
            line-height: 25px;
            text-align: center;
            position: absolute;
            right: -21px;
            top: 16px;
            padding: 1px 15px;
            height: 26px;
            width: 120px;
            transform: rotate(40deg);
            box-shadow: 3px -6px 7px 1px rgba(0, 0, 0, 0.2);
        }
    </style>

@endpush

@section('content')

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section">

    <div class="overlay-search"></div>
    <div class="container">
        <div class="row">
            <div class="search_form">
                <div class="row">

                    {!! Form::open(['route'=>'search','method'=>'get']) !!}

                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::select('bu_place', bu_place(),null, ['class'=>'form-control','placeholder'=>"كل المدن"]) !!}
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::select('bu_rooms_count', bu_rooms(),null, ['class'=>'form-control','placeholder'=>"كل الغرف"]) !!}
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::select('bu_type', bu_type(),null, ['class'=>'form-control','placeholder'=>"كل العقارات"]) !!}
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::select('bu_rent', bu_rent(),null, ['class'=>'form-control','placeholder'=>"كل المعاملات"]) !!}
                        </div>
                    </div>

                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-info btn-flat"><i class="fa fa-search"></i> ابحث</button>
                    </div>
                </div>

                {!! Form::close() !!}

            </div>
            <div class="row"></div>
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>{{ settings()->sitename }}</h2>
                        <div class="breadcrumb__option">
                            <a href="{{url('/')}}">الرئيسة</a>
                            <a href="{{url('bu/show_all')}}">العقارات</a>
                        </div>
                        <br>
                        <a href="{{ url('bu/add') }}" class="btn btn-default  btn-sm btn-flat">أضف عقار جديد مجانا</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Product Section Begin -->
<section class="product margin-top margin-bottom">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-5">
                <div class="sidebar">
                    <div class="sidebar__item">
                        <h4>الاصناف</h4>
                        <ul class="dep">
                            <li><a href="{{ url('search?bu_type=0') }}">فيلات <i class="fa fa-tag"></i></a></li>
                            <li><a href="{{ url('search?bu_type=1') }}">شقق <i class="fa fa-tag"></i></a></li>
                            <li><a href="{{ url('search?bu_type=2') }}">شاليهات <i class="fa fa-tag"></i></a></li>
                        </ul>
                    </div>

                    <div class="sidebar__item sidebar__item__color--option">
                        <h4> المعاملات</h4>
                        <div class="sidebar__item__color sidebar__item__color--white">
                            <label for="white">
                                <a href="{{ url('search?bu_rent=0') }}">
                                    بيع
                                    <input type="radio" id="white">
                                </a>
                            </label>
                        </div>
                        <div class="sidebar__item__color sidebar__item__color--red">
                            <label for="red">
                                <a href="{{ url('search?bu_rent=1') }}">
                                    ايجار
                                    <input type="radio" id="red">
                                </a>
                            </label>
                        </div>
                    </div>


                    @if (isset($bus) and count($bus)>0)
                    <div class="sidebar__item">
                        <div class="latest-product__text">
                            <h4 class="heading_carousel">اخر العقارات المضافة</h4>
                            <div class="latest-product__slider owl-carousel">
                                @foreach($bus as $bu)
                                <div class="latest-prdouct__slider__item">
                                    <a href="{{ url('singleBu/'.$bu->id) }}" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{image_path($bu->image,'website/bu_images/default.png')}}" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>{{$bu->bu_name}}</h6>
                                            <span>{{$bu->bu_price}}</span>
                                            <span>درهم</span>
                                        </div>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            <div class="col-lg-9 col-md-7">

                @if(isset($latest_villa) and count($latest_villa)>0)
                <div class="product__discount">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="section-title product__discount__title">
                                <h2>فيلات مضافة حديثا</h2>
                            </div>
                        </div>
                        <div class="panel-body">

                            <div class="row">
                                <div class="product__discount__slider owl-carousel">
                                    @foreach($latest_villa as $bu)
                                    <div class="col-lg-4" style="float:right !important">
                                        <div class="product__discount__item">
                                            <div class="product__discount__item__pic set-bg"
                                                data-setbg="{{image_path($bu->image,'website/bu_images/default.png')}}">
                                                <div class="product__discount__percent">{{bu_place()[$bu->bu_place]}}</div>
                                                <ul class="product__item__pic__hover">
                                                    <li><a href="{{url('singleBu/'.$bu->id)}}"><i class="fa fa-eye"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="product__discount__item__text">
                                                <span>{{$bu->d_created}} <i class="fa fa-calendar"></i></span>
                                                <h5><a href="#">{{$bu->bu_name}}</a></h5>
                                                <div class="product__item__price">{{$bu->bu_price}} درهم</div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                <div class="clearfix"></div>
                <hr>
                @if(isset($latest_choka) and count($latest_choka)>0)
                <div class="product__discount">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="section-title product__discount__title">
                                <h2>شقق مضافة حديثا</h2>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="product__discount__slider owl-carousel">
                                    @foreach($latest_choka as $bu)
                                    <div class="col-lg-4" style="float:right !important">
                                        <div class="product__discount__item">
                                            <div class="product__discount__item__pic set-bg"
                                                data-setbg="{{image_path($bu->image,'website/bu_images/default.png')}}">
                                                <div class="product__discount__percent">{{bu_place()[$bu->bu_place]}}</div>
                                                <ul class="product__item__pic__hover">
                                                    <li><a href="{{url('singleBu/'.$bu->id)}}"><i class="fa fa-eye"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="product__discount__item__text">
                                                <span>{{$bu->d_created}} <i class="fa fa-calendar"></i></span>
                                                <h5><a href="#">{{$bu->bu_name}}</a></h5>
                                                <div class="product__item__price">{{$bu->bu_price}} درهم</div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @endif
                <div class="clearfix"></div>
                <hr>
                @if(isset($latest_chalee) and count($latest_chalee)>0)
                <div class="product__discount">
                    <div class="panel panel-default">
                        <div class="panel-heading">

                            <div class="section-title product__discount__title">
                                <h2>شاليهات مضافة حديثا</h2>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="product__discount__slider owl-carousel">
                                    @foreach($latest_chalee as $bu)
                                    <div class="col-lg-4" style="float:right !important">
                                        <div class="product__discount__item">
                                            <div class="product__discount__item__pic set-bg"
                                                data-setbg="{{image_path($bu->image,'website/bu_images/default.png')}}">
                                                <div class="product__discount__percent">{{bu_place()[$bu->bu_place]}}</div>
                                                <ul class="product__item__pic__hover">
                                                    <li><a href="{{url('singleBu/'.$bu->id)}}"><i class="fa fa-eye"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="product__discount__item__text">
                                                <span>{{$bu->d_created}} <i class="fa fa-calendar"></i></span>
                                                <h5><a href="#">{{$bu->bu_name}}</a></h5>
                                                <div class="product__item__price">{{$bu->bu_price}} درهم</div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                <div class="clearfix"></div>

             <hr>

            @if (count($bu_all)>0)
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading" style="background: #fff !important">
                                <div class="section-title product__discount__title">
                                    <h2>كل العقارات</h2>
                                </div>
                            </div>
                            <div class="panel-body">
                                @foreach ($bu_all as $record)
                                <div class="col-lg-4 col-md-6 col-sm-6" style="float: right !important;">
                                    <div class="product__item">
                                        <div class="product__item__pic set-bg" data-setbg="{{image_path($record->image,'website/bu_images/default.png')}}">
                                            <ul class="product__item__pic__hover">
                                                <li><a href="{{url('singleBu/'.$record->id)}}"><i class="fa fa-eye"></i></a></li>
                                            </ul>
                                            <div class="product_place">{{bu_place()[$record->bu_place]}}</div>
                                        </div>
                                        <div class="product__item__text">
                                            <h6><a href="{{url('singleBu/'.$record->id)}}">{{$record->bu_name}}</a></h6>
                                            <h5 style="direction: rtl">{{$record->bu_price}} درهم </h5>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="panel-footer" style="background: #fff !important">
                                <div class="product__pagination">
                                    {!! $bu_all->links() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            </div>
        </div>
    </div>
</section>
<!-- Product Section End -->

@endsection
