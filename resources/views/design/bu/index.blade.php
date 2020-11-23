@extends('design/layouts.app')

@push('css')
    {!! Html::style('css/bu_all.css') !!}
@endpush

@push("js")
    <script>
        $(function(){
            $('.non').on('click',function(e){
                e.preventDefault();
                $(this).css({
                    "cursor":'default !important'
                })
            })
        })
    </script>
@endpush

@section('content')

<div class="container m-top m-bottom">
    <div class="row">
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading text-right">
                    @if(isset($title))

                    <ul class="breadcrumb">
                        <li class="active">عقارات</li>
                        <li><a href="#" class="non">{{$title}}</a></li>
                    </ul>
                    @else
                    <ul class="breadcrumb">
                    <li class="active">العقارات</li>

                    @if (isset($breadcrumb))

                            @if (!empty($breadcrumb))
                                @foreach ($breadcrumb as $key=>$value)

                                    @if ($key=='bu_type')
                                        <li><a href="/search?bu_type={{$value}}">نوع العقار - [ {{bu_type()[$value]}} ]</a></li>
                                    @elseif ($key=='bu_rent')
                                        <li><a href="/search?bu_type={{$value}}">نوع المعاملة - [ {{bu_rent()[$value]}} ]</a></li>
                                    @elseif ($key=='bu_place')
                                        <li><a href="/search?bu_place={{$value}}">العنوان - [ {{bu_place()[$value]}} ]</a></li>
                                    @else
                                        <li><a href="/search?{{$key}}={{$value}}">{{breadcrumb_name($key)}} - [ {{$value}} ]</a></li>
                                    @endif

                                @endforeach

                            @endif

                    @endif
                    </ul>
                    @endif
                </div>
                <div class="panel-body">
                    @include('design/bu/shareFile')
                </div>
                <div class="panel-footer text-center">
                    {{--  @if (!isset($search))  --}}
                        {{--  {!! $all_bu->links() !!}  --}}

                        {{--  appends used to save the request and next request page --}}
                        {{ $all_bu->appends(Request::except('page'))->render() }}
                    {{--  @endif  --}}
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
