@extends('design/layouts.app')

@push('css')
    {!! Html::style('css/bu_all.css') !!}

    <style>
        .single_desc{
            margin-top: 15px;
        }

        .single_desc p{
            color:#666;
            word-wrap:break-word;
            margin:10px 0;
            text-align:right;
        }
    </style>
@endpush

<!--this section has been  showing if the bu_status = 1-->

@section('content')

<div class="container m-top m-bottom">
    <div class="row">
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading text-right">
                    <h3 style="color:#666">{{ $buInfo->bu_name }}</h3>
                </div>
                <div class="panel-body">
                    <div class='bu_quick_info'>
                        <a href="{{ url('search?bu_place='.$buInfo->bu_place) }}" class="btn btn-default"> العنوان : {{ bu_place()[$buInfo->bu_place] }}</a>
                        <a href="{{ url('search?bu_price='.$buInfo->bu_price) }}" class="btn btn-default"> السعر : {{ $buInfo->bu_price }}</a>
                        <a href="{{ url('search?bu_square='.$buInfo->bu_square) }}" class="btn btn-default"> المساحة : {{ $buInfo->bu_square }}</a>
                        <a href="{{ url('search?bu_rooms_count='.$buInfo->bu_rooms_count) }}" class="btn btn-default"> عدد الغرف : {{ $buInfo->bu_rooms_count }}</a>
                        <a href="{{ url('search?bu_rent='.$buInfo->bu_rent) }}" class="btn btn-default"> نوع العملية : {{ bu_rent()[$buInfo->bu_rent] }}</a>
                        <a href="{{ url('search?bu_type='.$buInfo->bu_type) }}" class="btn btn-default"> نوع العقار : {{ bu_type()[$buInfo->bu_type] }}</a>
                        <span class="btn btn-default">أضيف في : {{ date_str($buInfo->created_at) }}</span>
                    </div>
                    <div class="clearfix"></div>
                    <div class="img">
                        <img src="{{image_path($buInfo->image),'website/bu_images/default.png'}}" alt="" class="img-responsive img-thumbnail">
                    </div>
                    <div class="single_desc">
                        <p>
                            {!! $buInfo->bu_large_desc !!}
                        </p>
                    </div>
                </div>

                {{--  bu maps locatioin  --}}
                <div id="googleMap" style="width:100%;height:400px;border-top:1px solid #eee;padding:5px"></div>
            </div>
            <div class="panel panel-default">
                <div class="panel-body">
                    {{--  more bu with equale rent  --}}
                    <section class="related-blog spad">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="section-title related-blog-title text-center">
                                        <h2> المزيد من العقارات ذات صلة {{ $buInfo->bu_rent=='1' ? 'للايجار': 'للبيع' }}</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                @foreach ($moreRent as $record)
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="card">
                                        <div class="ratio-holder">
                                            <div class="ratio-content">
                                                {{--  <img src="{{url('img/avatar.png')}}" alt="Denim Jeans" style="width:100%">  --}}
                                                <img class="img-thumbnail" src="{{image_path($record->img,'website/bu_images/default.png')}}" alt="">
                                            </div>
                                        </div>
                                        <div class="card-content">
                                            <h3 class="title"><a href="{{ url('singleBu/'.$record->id) }}"> {{str_limit($record->bu_name,30)}} </a> </h3>
                                            <p class="price">{{$record->bu_price}} درهم</p>
                                            <p class="place">{{bu_place()[$record->bu_place]}}</p>

                                            <p class="small_desc">{{str_limit($record->bu_large_desc,70)}}</p>
                                            <p class="d_created"> <i class="fa fa-calendar-o"></i> {{ date_str($record->created_at) }}</p>
                                            <div class="more">
                                                <a href="{{url('singleBu/'.$record->id)}}" class="btn btn-info btn-flat btn-sm">التفاصيل <i class="fa fa-eye"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </section>
                    <div class="clearfix"></div>
                    <hr>
                    {{--  more bu with equale type  --}}
                    <section class="related-blog spad">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="section-title related-blog-title text-center">
                                        <h2>المزيد من العقارات من نوع {{ bu_type()[$buInfo->bu_type] }}</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                @foreach ($moreType as $record)
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="card">
                                        <div class="ratio-holder">
                                            <div class="ratio-content">
                                                {{--  <img src="{{url('img/avatar.png')}}" alt="Denim Jeans" style="width:100%">  --}}
                                                <img class="img-thumbnail" src="{{image_path($record->img,'website/bu_images/default.png')}}" alt="">
                                            </div>
                                        </div>
                                        <div class="card-content">
                                            <h3 class="title"><a href="{{ url('singleBu/'.$record->id) }}"> {{str_limit($record->bu_name,30)}} </a> </h3>
                                            <p class="price">{{$record->bu_price}} درهم</p>
                                            <p class="place">{{bu_place()[$record->bu_place]}}</p>

                                            <p class="small_desc">{{str_limit($record->bu_large_desc,70)}}</p>
                                            <p class="d_created"> <i class="fa fa-calendar-o"></i> {{ date_str($record->created_at) }}</p>
                                            <div class="more">
                                                <a href="{{url('singleBu/'.$record->id)}}" class="btn btn-info btn-flat btn-sm">التفاصيل <i class="fa fa-eye"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </section>
                    <!-- Related Blog Section End -->
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


@push('js')

{!! Html::script('http://maps.googleapis.com/maps/api/js') !!}
<script>
    var myCenter = new google.maps.LatLng({{ $buInfo->bu_latituide }},{{ $buInfo->bu_langtituide }});
    var marker;

    function initialize(){
        var mapProp= {
            center:myCenter,
            zoom:12,
            mapTypeId:google.maps.MapTypeId.ROADMAP
        };

        var map = new google.maps.Map(document.getElementById('googleMap'),mapProp);

        var marker = new google.maps.Marker({
            position:myCenter,
            animation:google.maps.Animation.BOUNCE
        });

        marker.setMap(map);

    }

    google.maps.event.addDomListener(window, 'load' , initialize);
</script>
@endpush


