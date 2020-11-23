<div class="row">
    <div class="col-md-12">
        <div class="form-group {{$errors->has('name') ? 'has-error' : ''}}">

            {!! Form::text('name', old('name'), ['class'=>'form-control',"placeholder"=>"اسم العضو"]) !!}

            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{$errors->first('name')}}</strong>
                </span>
            @endif
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
            {!! Form::text('email', old('email'), ['class'=>'form-control',"placeholder"=>"البريد الالكتروني"]) !!}

            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{$errors->first('email')}}</strong>
                </span>
            @endif
        </div>
    </div>
</div>


{{-- // hide password fileds in the edit --}}
@if (!isset($user))
<div class="row">
    <div class="col-md-6">
        <div class="form-group {{$errors->has('password') ? 'has-error' : ''}}">
            {!! Form::password('password', ['class'=>'form-control',"placeholder"=>"كلمة المرور"]) !!}

            @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{$errors->first('password')}}</strong>
            </span>
            @endif
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group {{$errors->has('password_confirmation') ? 'has-error' : ''}}">
            {!! Form::password('password_confirmation', ['class'=>'form-control',"placeholder"=>"تأكيد كلمة المرور"]) !!}

            @if ($errors->has('password_confirmation'))
            <span class="help-block">
                <strong>{{$errors->first('password_confirmation')}}</strong>
            </span>
            @endif
        </div>
    </div>
</div>
@endif

<div class="row">
    <div class="col-md-12">
        <div class="form-group {{$errors->has('is_admin') ? 'has-error' : ''}}">

            {!! Form::select("is_admin", ['0'=>'عضو','1'=>'مدير'], null, ['class'=>'form-control','placeholder'=>'نوع العضوية','style'=>'padding:0 12px']) !!}

            @if ($errors->has('is_admin'))
            <span class="help-block">
                <strong>{{$errors->first('is_admin')}}</strong>
            </span>
            @endif
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group {{$errors->has('image') ? 'has-error' : ''}}">

            {!! Form::label('image', ' صورة العضو :', ['class'=>'form-label']) !!}
            {!! Form::file("image", ['class'=>'form-control avatar']) !!}

            @if ($errors->has('image'))
            <span class="help-block">
                <strong>{{$errors->first('image')}}</strong>
            </span>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class='text-center'>

            @if (isset($user))
                <img src="{{image_path($user->image,'website/users/default.png')}}" alt="site icon" srcset="" class="img-thumbnail image-preview"
            @else
                <img src="{{ \Storage::url('website/users/default.png') }}" alt="site icon" srcset="" class="img-thumbnail image-preview"
            @endif
            style="width:105px;height:105px;margin-top:16px"
            >
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <button type="submit" class="btn btn-warning"><i class="fa fa-send"></i> تنفيذ </button>
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
