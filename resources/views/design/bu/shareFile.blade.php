@if (count($all_bu) > 0)

{{--  change object to array and chnak this array to 4 small arrays to be used the row of bootstrap with 4 column --}}
@foreach($all_bu as $key=>$bu)

    @if ($key%3 == 0 and $key!=0)
        <div class="clearfix"></div>
    @endif
    <div class="col-xs-12 col-sm-6 col-md-4 pull-right">
        <div class="card">
            <div class="ratio-holder">
                <div class="ratio-content">
                    {{--  <img src="{{url('img/avatar.png')}}" alt="Denim Jeans" style="width:100%">  --}}

                        <img class="img-thumbnail" src="{{image_path($bu->image,'website/bu_images/default.png')}}" alt="">

                </div>
            </div>
            <div class="card-content">
                <h3 class="title"><a href="{{ url('singleBu/'.$bu->id) }}"> {{str_limit($bu->bu_name,30)}} </a> </h3>
                <p class="price">{{$bu->bu_price}} درهم</p>
                <p class="place">{{bu_place()[$bu->bu_place]}}</p>

                <p class="small_desc">{{str_limit($bu->bu_large_desc,70)}}</p>
                <p class="d_created" style="width: 40%"> <i class="fa fa-calendar-o"></i> {{ \Carbon\Carbon::parse($bu->created_at)->format('d-m-Y') }}</p>
                <div class="more" style="width: 60%">

                    @if ($bu->bu_status)
                        <a href="{{url('singleBu/'.$bu->id)}}" class="btn btn-info btn-flat btn-sm">التفاصيل <i class="fa fa-eye"></i></a>
                    @else
                        <div class="btn-group">
                            <a class="btn label btn-sm" style="background:#ff4c59 !important">غير مفعل <i class="fa fa-spinner fa-spin"></i></a>
                            <a href="{{ url('user/bu/edit/'.$bu->id) }}" class="btn label label-warning btn-sm">تعديل <i class="fa fa-edit"></i></a>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>

@endforeach

<div class="clearfix"></div>

@else
    <div class="alert alert-danger alert-dismissible show text-center" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="left:0;right:auto">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        <h5 style="color:rgb(241, 53, 53)">
            <strong>لا يوجد أي عقارات حاليا !</strong>
        </h5>
    </div>
@endif
