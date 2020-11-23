
<div class="panel panel-black">
    <div class="panel-heading">
        <h3 class="text-right">تغيير كلمة السر :</h3>
    </div>
    <div class="panel-body">

        <div class="row">

            <!-- show dager message for user (the old passowrd not correct) -->
            @if(session()->has('msgDanger'))
                <div class="col-md-12">
                    <div class="well-sm well" style="background:#fc5661;color:#fff">
                        <span class="text-center" style="margin-bottom: 0;color:inherit">
                            <strong>
                                {{session()->get("msgDanger")}}
                            </strong>
                        </span>
                    </div>
                </div>
            @endif
            <div class="col-md-12">
                <div class="form-group {{$errors->has('oldPassword') ? 'has-error' : ''}}">

                    {!! Form::label('oldPassword', ' كلمة مرورك الحالية :', ['class'=>'form-label']) !!}
                    {!! Form::password('oldPassword',['class'=>'form-control',"placeholder"=>" كلمة مرورك الحالية "]) !!}

                    @if ($errors->has('oldPassword'))
                    <span class="help-block">
                        <strong>{{$errors->first('oldPassword')}}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group {{$errors->has('newPassword') ? 'has-error' : ''}}">

                    {!! Form::label('newPassword', ' كلمة مرورك الجديدة :', ['class'=>'form-label']) !!}
                    {!! Form::password('newPassword', ['class'=>'form-control',"placeholder"=>" كلمة مرورك الجديدة "]) !!}

                    @if ($errors->has('newPassword'))
                    <span class="help-block">
                        <strong>{{$errors->first('newPassword')}}</strong>
                    </span>
                    @endif
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-1">
                <div class="form-group">
                    <button class="btn btn-info"><i class="fa fa-key"></i> حفظ</button>
                </div>
            </div>
        </div>
    </div>
</div>
