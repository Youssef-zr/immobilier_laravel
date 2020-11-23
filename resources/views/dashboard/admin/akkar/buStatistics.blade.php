
@extends('dashboard.layouts.app')
@push('css')
<!-- Morris chart -->
{!! Html::style('my-tools/adminlte/bower_components/morris.js/morris.css') !!}

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
        .box-header:not(.not){
            padding-bottom: 20px
        }

        .box-title{
            font-size: 15px !important
        }

        .title-bar-chart{
            text-align: center;
            color:#555;
            font-size: 18px
        }
        .select{
            width:calc(100% - 120px);
            float: right;
        }
        .btn-submit{
            width: 120px
            float: right;
        }

        @media(max-width:768px){
            .select{
                width:100%;
            }
            .btn-submit{
                margin-top: 10px;
            }
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
        <li><a href="{{ adminUrl('/') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li class="active"><i class="fa fa-bar-chart"></i> احصاء العقارات </li>
    </ol>
    </section>
@endsection

@section('content')
    <div class="box box-danger">
        <div class="box-header not">
            <h3 class="statistics"><i class="fa fa-line-chart"></i> العقارات المضافة</h3>
        </div>
        <div class="box-body">
            <!-- Main content -->
            <section class="content">
              <!-- latest users and count building/mount -->
                <div class="row">
                    {!! Form::open(['route'=>'ak.statistics','method'=>'Post']) !!}
                    <div class="col-xs-12 col-md-8 col-lg-6">
                        {!! Form::select('year', bu_years(), $date,["class"=>"select"]) !!}
                        <button type="submit" class="btn btn-danger btn-submit btn-sm">اظهار الاحصائيات</button>
                    </div>
                    {!! Form::close() !!}
                </div>
                <br>
                <!--count building in month -->
                <div class="row">

                    <div class="col-md-12">
                        <!-- LINE CHART -->
                        <div class="box box-danger">
                          <div class="box-header with-border">
                            <h3 class="box-title statistics">العقارات / الشهر</h3>

                            <div class="box-tools pull-right">
                              <button type="button" class="btn btn-danger btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                              </button>
                              <button type="button" class="btn btn-danger btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                          </div>
                          <div class="box-body">
                              <h5 class="title-bar-chart">احصاء العقارات المضافة سنة {{ $date }}</h5>
                            <div class="chart">
                              <canvas id="lineChart" style="height:250px"></canvas>
                            </div>
                          </div>
                          <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>

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

<script>
    $(function () {
      /* ChartJS
       * -------
       * Here we will create a few charts using ChartJS
       */

      var areaChartData = {
        labels  :[
                @foreach (month_str() as $month)
                    '{{ $month }}',
                @endforeach
        ],
        datasets: [
          {
            label               : 'العقارات',
            fillColor           : 'transparent',
            strokeColor         : '#555',
            pointColor          : '#dd4b39',
            pointStrokeColor    : '#dd4b39',
            pointHighlightFill  : 'azure',
            pointHighlightStroke: 'red',
            data                :[
                @foreach ($chartData as $item)
                    {{$item}},
                @endforeach
            ]
          },
        ]
      }

      var barChartOptions                  = {
        //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
        scaleBeginAtZero        : false,
        //Boolean - Whether grid lines are shown across the chart
        scaleShowGridLines      : true,
        //String - Colour of the grid lines
        scaleGridLineColor      : '#fb8273',
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


    //-------------
    //- LINE CHART -
    //--------------
    var lineChartCanvas          = $('#lineChart').get(0).getContext('2d')
    var lineChart                = new Chart(lineChartCanvas)
    var lineChartOptions         = areaChartData
    lineChartOptions.datasetFill = true
    lineChart.Line(areaChartData, barChartOptions)

    })
  </script>

@endpush
