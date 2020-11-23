@extends('dashboard.layouts.app')
@push('css')
<!-- Morris chart -->
{!! Html::style('my-tools/adminlte/bower_components/morris.js/morris.css') !!}
<!-- jvectormap -->
{!! Html::style('my-tools/adminlte/bower_components/jvectormap/jquery-jvectormap.css') !!}
    <style>
        .statistics{
            position: relative;
            color:#777 !important;
            display: inline-block;
        }
        .statistics::after{
            content: "";
            position: absolute;
            height: 3px;
            background: #777;
            width: 100%;
            right: 0;
            bottom: -7px
        }
        .jvectormap-zoomin, .jvectormap-zoomout {
            padding: 2px;
            width: 14px;
            height: 14px;
        }
        .box-header{
            padding-bottom: 20px
        }

        .box-title{
            font-size: 15px !important
        }
        .users-list > li {
            width: 25%;
            float: right;
        }

        .product-title{
            display: inline-block;
            width: 100%;
            text-align: left
        }

        .users-list > li img{
            width: 70px;
            height: 70px;
        }

        .direct-chat-text::after, .direct-chat-text::before{
            border-right-color: #f39c12;
        }

        .direct-chat-text{
            background: #f39c12;
            border: 1px solid #f39c12;
            color:azure;
        }

        .direct-chat-text a{
            color: inherit;
            display: inline-block;
            width: 100%;
        }

        .tooltip{
            width:80px
        }

        .direct-chat .tooltip .tooltip-inner{
            background: #f39c12
        }
        .direct-chat .tooltip .tooltip-arrow{
            border-top-color: #f39c12 !important
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
        <li class="active"><i class="fa fa-dashboard"></i> الرئيسية</li>
    </ol>
    </section>
@endsection

@section('content')
    <div class="box box-warning">
        <div class="box-header">
            <h3 class="statistics">اخر الاحصائيات</h3>
        </div>
        <div class="box-body">
            <!-- Main content -->
            <section class="content">
              <!-- count some statistics -->
              <div class="row">
                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-aqua">
                    <div class="inner">
                      <h3>{{$usersCount}}</h3>
                      <p>عدد الأعضاء</p>
                    </div>
                    <div class="icon">
                      <i class="fa fa-users"></i>
                    </div>
                    <a href="{{adminUrl('users')}}" class="small-box-footer"><i class="fa fa-arrow-circle-left"></i> قائمة الاعضاء</a>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-green">
                    <div class="inner">
                      <h3>{{$buApprovedCount}}</h3>

                      <p>العقارات المفعلة</p>
                    </div>
                    <div class="icon">
                      <i class="fa fa-building"></i>
                    </div>
                    <a href="{{adminUrl('bu')}}" class="small-box-footer"><i class="fa fa-arrow-circle-left"></i> قائمة العقارات</a>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-yellow">
                    <div class="inner">
                      <h3>{{ $buWattingCount }}</h3>

                      <p>عقارات في انتظار التفعيل</p>
                    </div>
                    <div class="icon">
                      <i class="fa fa-building-o"></i>
                    </div>
                    <a href="{{adminUrl('bu')}}" class="small-box-footer"><i class="fa fa-arrow-circle-left"></i> قائمة العقارات</a>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-red">
                    <div class="inner">
                      <h3>{{$messagesCount}}</h3>

                      <p>رسائل الموقع</p>
                    </div>
                    <div class="icon">
                      <i class="fa fa-envelope-o"></i>
                    </div>
                    <a href="{{adminUrl('contact')}}" class="small-box-footer"><i class="fa fa-arrow-circle-left"></i> قائمة الرسائل</a>
                  </div>
                </div>
                <!-- ./col -->
              </div>

              <br>

              <!-- map / latest building -->
              <div class="row">

                <!-- map building -->
                <div class="col-md-7">
                    <!-- MAP & BOX PANE -->
                    <div class="box box-solid bg-light-blue-gradient">
                        <div class="box-header with-border">
                            <h3 class="box-title">عناوين العقارات على الخريظة</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-primary" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-primary" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">

                                <div class="pad">
                                    <div id="world-map-markers" style="height: 325px;"></div>
                                </div>

                            <!-- /.row -->
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>

                <!-- latest building added -->
                <!-- PRODUCT LIST -->
                <div class="col-md-5">
                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title statistics">اخر العقارات المضافة</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <ul class="products-list product-list-in-box">
                                @foreach ($latestBu as $item)
                                    <li class="item">
                                    <div class="product-img">
                                        <img src="{{ image_path($item->image,'website/bu_images/default.png') }}" alt="صورة العقار">
                                    </div>
                                    <div class="product-info">
                                        <a href="{{ route('bu.edit',['id'=>$item->id]) }}" class="product-title">
                                            {{ $item->bu_name }}
                                            <span class="label label-warning pull-right">{{ $item->bu_price }} د.م</span>
                                        </a>
                                        <span class="product-description">
                                            {{ str_limit($item->bu_small_desc,60) }}
                                        </span>
                                    </div>
                                    </li>
                                    <!-- /.item -->
                                @endforeach
                            </ul>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer text-center">
                            <a href="{{ adminUrl('bu') }}" class="uppercase text-primary">كل العقارات</a>
                        </div>
                        <!-- /.box-footer -->
                    </div>
                <!-- /.box -->
                </div>

              </div>
              <!-- /.row -->
              <br>

              <!-- latest users and count building/mount -->
              <div class="row">

                <!--count building in month -->
                <div class="col-md-7">
                    <!-- BAR CHART -->
                    <div class="box box-danger">
                        <div class="box-header with-border">
                        <h3 class="box-title statistics"> احصائيات عدد [ العقارات / الشهر ]</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                        </div>
                        <div class="box-body">
                        <div class="chart">
                            <canvas id="barChart" style="height:230px"></canvas>
                        </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>

                <!-- latest users added -->
                <div class="col-md-5">
                    <!-- USERS LIST -->
                    <div class="box box-primary">
                      <div class="box-header with-border">
                        <h3 class="box-title statistics">اخر الأعضاء المسجلين</h3>

                        <div class="box-tools pull-right">
                          <span class="label bg-primary"> {{ count($latestUsers) }} أعضاء جدد </span>
                          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                          </button>
                          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                          </button>
                        </div>
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body no-padding">
                        <ul class="users-list clearfix">

                            @foreach ($latestUsers as $user)
                                <li>
                                <img src="{{ image_path($user->image,'website/users/default.png') }}" alt="صورة العضو">
                                <a class="users-list-name" href="{{ route('users.edit',['id'=>$user->id]) }}" dir="ltr">{{ $user->name }}</a>
                                <span class="users-list-date">{{ date_str($user->created_at) }}</span>
                                </li>
                            @endforeach

                        </ul>
                        <!-- /.users-list -->
                      </div>
                      <!-- /.box-body -->
                      <div class="box-footer text-center">
                        <a href="{{ adminUrl('users') }}" class="uppercase text-primary">كل الاعضاء</a>
                      </div>
                      <!-- /.box-footer -->
                    </div>
                    <!--/.box -->
                </div>
              </div>

              <!-- latest messages from contact us -->
              <div class="row">
                <div class="col-md-7">
                    <!-- DIRECT CHAT -->
                    <div class="box box-warning direct-chat direct-chat-warning">
                      <div class="box-header with-border">
                        <h3 class="box-title statistics">رسائل الموقع</h3>

                        <div class="box-tools pull-right">
                          <span data-toggle="tooltip" title="" class="badge bg-yellow" data-original-title="{{ count($latestMessages) }} رسائل جديدة">{{ count($latestMessages) }}</span>
                          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                          </button>
                          <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="" data-widget="chat-pane-toggle" data-original-title="الرسائل">
                            <i class="fa fa-comments"></i></button>
                          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                          </button>
                        </div>
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body">
                        <!-- Conversations are loaded here -->
                        <div class="direct-chat-messages">
                            <!-- Message. Default to the left -->
                            @foreach ($latestMessages as $message)

                                <div class="direct-chat-msg">
                                    <div class="direct-chat-info clearfix">
                                    <span class="direct-chat-name pull-left">{{ $message->name}}</span>
                                    <span class="direct-chat-timestamp pull-right">{{ date_str($message->created_at) }}</span>
                                    </div>
                                    <!-- /.direct-chat-info -->
                                    <img class="direct-chat-img" src="{{image_path('jyg','website/users/default.png')}}" alt="message user image">
                                    <!-- /.direct-chat-img -->
                                    <div class="direct-chat-text">
                                        <a href="{{ route('contact.edit',['id'=>$message->id]) }}">{{ str_limit($message->msg,40) }}</a>
                                    </div>
                                    <!-- /.direct-chat-text -->
                                </div>

                            @endforeach
                            <!-- direct-chat-msg -->
                        </div>
                        <!--/.direct-chat-messages-->
                      </div>
                      <div class="box-footer text-center">
                          <a href="{{ adminUrl('contact')}}">كل الرسائل</a>
                      </div>
                    </div>
                    <!--/.direct-chat -->
                  </div>
              </div>
            </section>
            <!-- /.content -->
        </div>
    </div>
@endsection

@push('js')
<!-- FastClick -->
{!! Html::script('my-tools/adminlte/bower_components/chart.js/Chart.js') !!}
{!! Html::script('my-tools/adminlte/bower_components/fastclick/lib/fastclick.js') !!}
<!-- jvectormap  -->
{!! Html::script('my-tools/adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') !!}
{!! Html::script('my-tools/adminlte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') !!}

<script>
    $(function () {
      /* ChartJS
       * -------
       * Here we will create a few charts using ChartJS
       */

      var areaChartData = {
        labels  :[
                @foreach (month_str() as $record)
                    '{{ $record }}',
                @endforeach
        ],
        datasets: [
          {
            label               : 'العقارات',
            fillColor           : 'rgba(210, 214, 222, 1)',
            strokeColor         : 'rgba(210, 214, 222, 1)',
            pointColor          : 'rgba(210, 214, 222, 1)',
            pointStrokeColor    : '#c1c7d1',
            pointHighlightFill  : '#fff',
            pointHighlightStroke: 'rgba(220,220,220,1)',
            data                :[
                @foreach ($chartData as $item)
                    {{$item}},
                @endforeach
            ]
          },
        ]
      }

      var areaChartOptions = {
        //Boolean - If we should show the scale at all
        showScale               : true,
        //Boolean - Whether grid lines are shown across the chart
        scaleShowGridLines      : false,
        //String - Colour of the grid lines
        scaleGridLineColor      : 'rgba(0,0,0,.05)',
        //Number - Width of the grid lines
        scaleGridLineWidth      : 1,
        //Boolean - Whether to show horizontal lines (except X axis)
        scaleShowHorizontalLines: true,
        //Boolean - Whether to show vertical lines (except Y axis)
        scaleShowVerticalLines  : true,
        //Boolean - Whether the line is curved between points
        bezierCurve             : true,
        //Number - Tension of the bezier curve between points
        bezierCurveTension      : 0.3,
        //Boolean - Whether to show a dot for each point
        pointDot                : false,
        //Number - Radius of each point dot in pixels
        pointDotRadius          : 4,
        //Number - Pixel width of point dot stroke
        pointDotStrokeWidth     : 1,
        //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
        pointHitDetectionRadius : 20,
        //Boolean - Whether to show a stroke for datasets
        datasetStroke           : true,
        //Number - Pixel width of dataset stroke
        datasetStrokeWidth      : 2,
        //Boolean - Whether to fill the dataset with a color
        datasetFill             : true,
        //String - A legend template
        legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
        //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
        maintainAspectRatio     : true,
        //Boolean - whether to make the chart responsive to window resizing
        responsive              : true
      }

      //-------------
      //- BAR CHART -
      //-------------
      var barChartCanvas                   = $('#barChart').get(0).getContext('2d')
      var barChart                         = new Chart(barChartCanvas)
      var barChartData                     = areaChartData
      barChartData.datasets[0].fillColor   = '#f56954'
      barChartData.datasets[0].strokeColor = '#f56954'
      barChartData.datasets[0].pointColor  = '#f56954'
      var barChartOptions                  = {
        //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
        scaleBeginAtZero        : true,
        //Boolean - Whether grid lines are shown across the chart
        scaleShowGridLines      : true,
        //String - Colour of the grid lines
        scaleGridLineColor      : 'rgba(0,0,0,.05)',
        //Number - Width of the grid lines
        scaleGridLineWidth      : 1,
        //Boolean - Whether to show horizontal lines (except X axis)
        scaleShowHorizontalLines: true,
        //Boolean - Whether to show vertical lines (except Y axis)
        scaleShowVerticalLines  : true,
        //Boolean - If there is a stroke on each bar
        barShowStroke           : true,
        //Number - Pixel width of the bar stroke
        barStrokeWidth          : 2,
        //Number - Spacing between each of the X value sets
        barValueSpacing         : 5,
        //Number - Spacing between data sets within X values
        barDatasetSpacing       : 1,
        //String - A legend template
        legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
        //Boolean - whether to make the chart responsive
        responsive              : true,
        maintainAspectRatio     : true
      }

      barChartOptions.datasetFill = false
      barChart.Bar(barChartData, barChartOptions)

      /*map building data  */
      $('#world-map-markers').vectorMap({
        map              : 'world_mill_en',
        normalizeFunction: 'polynomial',
        hoverOpacity     : 0.7,
        hoverColor       : false,
        backgroundColor  : 'transparent',
        regionStyle      : {
          initial      : {
            fill            : 'azure',
            'fill-opacity'  : 1,
            stroke          : 'none',
            'stroke-width'  : 0,
            'stroke-opacity': 1
          },
          hover        : {
            'fill-opacity': 0.7,
            cursor        : 'pointer'
          },
          selected     : {
            fill: 'yellow'
          },
          selectedHover: {}
        },
        markerStyle      : {
          initial: {
            fill  : '#f39c12',
            stroke: '#444'
          }
        },
        markers          : [
            @foreach ($map as $item)
                { latLng: [{{ $item->bu_latituide }}, {{ $item->bu_langtituide }}], name: '{{ bu_place()[$item->bu_place] }}' },
            @endforeach
        ]
      });
    })
  </script>

@endpush
