
<div class="row">
    <div class="col-md-3">
        <div class="form-group {{$errors->has('bu_name') ? 'has-error' : ''}}">

            {!! Form::label('bu_name', 'العنوان :', ['class'=>'form-label']) !!}
            {!! Form::text('bu_name', old('bu_name'), ['class'=>'form-control',"placeholder"=>"عنوان العقار"]) !!}

            @if ($errors->has('bu_name'))
            <span class="help-block">
                <strong>{{$errors->first('bu_name')}}</strong>
            </span>
            @endif
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group {{$errors->has('bu_price') ? 'has-error' : ''}}">

            {!! Form::label('bu_price', 'السعر :', ['class'=>'form-label']) !!}
            {!! Form::text('bu_price', old('bu_price'), ['class'=>'form-control',"placeholder"=>"السعر"]) !!}

            @if ($errors->has('bu_price'))
            <span class="help-block">
                <strong>{{$errors->first('bu_price')}}</strong>
            </span>
            @endif
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group {{$errors->has('bu_place') ? 'has-error' : ''}}">

            {!! Form::label('bu_place', 'مكان العقار :', ['class'=>'form-label']) !!}
            {!! Form::select('bu_place', bu_place() , null , ['class'=>'form-control',"placeholder"=>"مكان العقار"]) !!}

            @if ($errors->has('bu_place'))
            <span class="help-block">
                <strong>{{$errors->first('bu_place')}}</strong>
            </span>
            @endif
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group {{$errors->has('bu_rent') ? 'has-error' : ''}}">

            {!! Form::label('bu_rent', 'نوع المعاملة :', ['class'=>'form-label']) !!}
            {!! Form::select('bu_rent', bu_rent() , null , ['class'=>'form-control','placeholder'=>'نوع المعاملة','style'=>'padding:0 12px']) !!}

            @if ($errors->has('bu_rent'))
            <span class="help-block">
                <strong>{{$errors->first('bu_rent')}}</strong>
            </span>
            @endif
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="form-group {{$errors->has('bu_square') ? 'has-error' : ''}}">

            {!! Form::label('bu_square', 'المساحة :', ['class'=>'form-label']) !!}
            {!! Form::number("bu_square", null , ['class'=>'form-control','placeholder'=>'مساحة العقار','min'=>'20','step'=>'1']) !!}

            @if ($errors->has('bu_square'))
            <span class="help-block">
                <strong>{{$errors->first('bu_square')}}</strong>
            </span>
            @endif
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group {{$errors->has('bu_type') ? 'has-error' : ''}}">

            {!! Form::label('bu_type', 'نوع العقار :', ['class'=>'form-label']) !!}
            {!! Form::select('bu_type', bu_type() , null , ['class'=>'form-control','placeholder'=>'نوع العقار','style'=>'padding:0 12px']) !!}

            @if ($errors->has('bu_type'))
            <span class="help-block">
                <strong>{{$errors->first('bu_type')}}</strong>
            </span>
            @endif
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group {{$errors->has('bu_rooms_count') ? 'has-error' : ''}}">

            {!! Form::label('bu_rooms_count', ' عدد الغرف :', ['class'=>'form-label']) !!}

            {!! Form::select('bu_rooms_count', bu_rooms() , null , ['class'=>'form-control',"placeholder"=>'عدد الغرف']) !!}

            @if ($errors->has('bu_rooms_count'))
            <span class="help-block">
                <strong>{{$errors->first('bu_rooms_count')}}</strong>
            </span>
            @endif
        </div>
    </div>

</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group {{$errors->has('bu_small_desc') ? 'has-error' : ''}}">

            {!! Form::label('bu_small_desc', ' الكلمات الدلالية :', ['class'=>'form-label']) !!}
            {!! Form::text("bu_small_desc", null , ['class'=>'form-control','placeholder'=>' الكلمات الدلالية']) !!}

            @if ($errors->has('bu_small_desc'))
            <span class="help-block">
                <strong>{{$errors->first('bu_small_desc')}}</strong>
            </span>
            @endif
        </div>
    </div>
</div>
<div class="row">
    <!--this form used when user add new building
        i used this variable is_admin to check if a user add new building or is the admin of website-->
    @if (!isset($is_user))
    <div class="col-md-6">
        <div class="form-group {{$errors->has('bu_meta') ? 'has-error' : ''}}">

            {!! Form::label('bu_meta', ' وصف محركات البحث :', ['class'=>'form-label']) !!}
            {!! Form::textarea('bu_meta' , null , ['class'=>'form-control','placeholder'=>' وصف محركات البحث']) !!}

            @if ($errors->has('bu_meta'))
            <span class="help-block">
                <strong>{{$errors->first('bu_meta')}}</strong>
            </span>
            @endif
        </div>
        <div class="well well-sm alert-warning text-right" role="alert">
          <span>لا يمكن ادخال أكثر من 160 حرف على حسب معيار جوجل</span>
        </div>
    </div>
    @endif
    <div class="col-md-6">
        <div class="form-group {{$errors->has('bu_large_desc') ? 'has-error' : ''}}">

            {!! Form::label('bu_large_desc', 'وصف العقار :', ['class'=>'form-label']) !!}
            {!! Form::textarea('bu_large_desc', null , ['class'=>'form-control','placeholder'=>'وصف للعقار']) !!}

            @if ($errors->has('bu_large_desc'))
            <span class="help-block">
                <strong>{{$errors->first('bu_large_desc')}}</strong>
            </span>
            @endif
        </div>
    </div>

</div>

<div class="row">
    <div class="col-md-4">
        <div class="form-group {{$errors->has('bu_langtituide') ? 'has-error' : ''}}">

            {!! Form::label('bu_langtituide', ' عنوان (خط الطول) :', ['class'=>'form-label']) !!}
            {!! Form::text("bu_langtituide", null , ['class'=>'form-control','placeholder'=>'خط الطول على الخريطة','min'=>'20','step'=>'1']) !!}

            @if ($errors->has('bu_langtituide'))
            <span class="help-block">
                <strong>{{$errors->first('bu_langtituide')}}</strong>
            </span>
            @endif
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group {{$errors->has('bu_latituide') ? 'has-error' : ''}}">

            {!! Form::label('bu_latituide', 'عنوان (خط العرض) :', ['class'=>'form-label']) !!}
            {!! Form::text('bu_latituide' , null , ['class'=>'form-control','placeholder'=>'خط العرض على الخريطة','style'=>'padding:0 12px']) !!}

            @if ($errors->has('bu_latituide'))
            <span class="help-block">
                <strong>{{$errors->first('bu_latituide')}}</strong>
            </span>
            @endif
        </div>
    </div>

    <!--this form used in when user add new building
    i used this variable is_admin to check if a user add new building or is the admin of website-->
    @if (!isset($is_user))
    <div class="col-md-4">
        <div class="form-group {{$errors->has('bu_status') ? 'has-error' : ''}}">

            {!! Form::label('bu_status', ' الحالة :', ['class'=>'form-label']) !!}
            {!! Form::select('bu_status', ['0'=>'قيد المعالجة' ,'1'=>'مفعل' ] , null , ['class'=>'form-control','placeholder'=>'حالة الطلب','style'=>'padding:0 12px']) !!}

            @if ($errors->has('bu_status'))
            <span class="help-block">
                <strong>{{$errors->first('bu_status')}}</strong>
            </span>
            @endif
        </div>
    </div>
    @endif

</div>
<div class="row">
    <div class="col-md-3">
        <div class="form-group {{$errors->has('image') ? 'has-error' : ''}}">

            {!! Form::label('image', ' صورة العقار :', ['class'=>'form-label']) !!}
            {!! Form::file("image", ['class'=>'form-control avatar']) !!}

            @if ($errors->has('image'))
            <span class="help-block">
                <strong>{{$errors->first('image')}}</strong>
            </span>
            @endif
        </div>
    </div>
    <div class="col-md-4">
        <div class='text-center'>

            @if (isset($akkar))
                <img src="{{image_path($akkar->image)}}" alt="site icon" srcset="" class="img-thumbnail image-preview"
            @else
                <img src="{{ \Storage::url('website/bu_images/default.png') }}" alt="site icon" srcset="" class="img-thumbnail image-preview"
            @endif
            style="width:105px;height:105px;margin-top:16px"
            >
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-1">
        <div class="form-group">
            <button class="btn btn-warning"><i class="fa fa-send"></i> تنفيذ</button>
        </div>
    </div>
</div>


@push('js')

<script>

    $(function(){
        // preview image when the file is changed
        $(".avatar").on("change", function() {

            if (this.files && this.files[0]) {
                var $reader = new FileReader();
                $reader.onload = function($e) {
                    $('.image-preview').attr("src", $e.target.result);
                };
            }
            $reader.readAsDataURL(this.files[0]);
        });
    });
    </script>
@endpush
