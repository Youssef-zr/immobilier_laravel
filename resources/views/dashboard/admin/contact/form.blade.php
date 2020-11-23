
<div class="row">
    <div class="col-md-12">

        <div class="col-md-6">
            <div class="form-group {{$errors->has('name') ? 'has-error' : ''}}">

                {!! Form::label('name', 'الاسم :', ['class'=>'form-label']) !!}
                {!! Form::text('name', old('name'), ['class'=>'form-control',"placeholder"=>"اسم المرسل"]) !!}

                @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{$errors->first('name')}}</strong>
                </span>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">

                {!! Form::label('email', 'البريد الالكتروني :', ['class'=>'form-label']) !!}
                {!! Form::text('email', old('email'), ['class'=>'form-control',"placeholder"=>"البريد الالكتروني"]) !!}

                @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{$errors->first('email')}}</strong>
                </span>
                @endif
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="col-md-6">
            <div class="form-group {{$errors->has('type') ? 'has-error' : ''}}">

                {!! Form::label('type', 'نوع الرسالة :', ['class'=>'form-label']) !!}
                {!! Form::select('type', contact() , null , ['class'=>'form-control',"placeholder"=>"نوع الرسالة"]) !!}

                @if ($errors->has('type'))
                <span class="help-block">
                    <strong>{{$errors->first('type')}}</strong>
                </span>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group {{$errors->has('status') ? 'has-error' : ''}}">

                {!! Form::label('status', 'حالة الرسالة :', ['class'=>'form-label']) !!}
                {!! Form::select('status', ['0'=>'جديدة','1'=>'قديمة'] , null , ['class'=>'form-control','placeholder'=>'حالة الرسالة','style'=>'padding:0 12px']) !!}

                @if ($errors->has('status'))
                <span class="help-block">
                    <strong>{{$errors->first('status')}}</strong>
                </span>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="col-md-6">
            <div class="form-group {{$errors->has('msg') ? 'has-error' : ''}}">

                {!! Form::label('msg', 'الرسالة :', ['class'=>'form-label']) !!}
                {!! Form::textarea('msg', null , ['class'=>'form-control','placeholder'=>'الرسالة']) !!}

                @if ($errors->has('msg'))
                <span class="help-block">
                    <strong>{{$errors->first('msg')}}</strong>
                </span>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="col-md-1">
            <div class="form-group">
                <button class="btn btn-warning"><i class="fa fa-save"></i> تنفيذ</button>
            </div>
        </div>
    </div>
</div>

