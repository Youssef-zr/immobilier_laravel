<div class="panel panel-black">
    <div class="panel-heading">
        <h3 class="text-right">تغيير بياناتك الشخصية :</h3>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group {{$errors->has('name') ? 'has-error' : ''}}">

                    {!! Form::label('name', 'اسم العضو :', ['class'=>'form-label']) !!}
                    {!! Form::text('name', old('name'), ['class'=>'form-control',"placeholder"=>"اسم العضو"]) !!}

                    @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{$errors->first('name')}}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">

                    {!! Form::label('email', 'بريد العضو :', ['class'=>'form-label']) !!}
                    {!! Form::text('email', old('bu_name'), ['class'=>'form-control',"placeholder"=>"بريد العضو"]) !!}

                    @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{$errors->first('email')}}</strong>
                    </span>
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
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
            <div class="col-md-4">
                <div class='text-right'>

                    <img src="{{image_path($user->image,'website/users/default.png')}}" alt="site icon" srcset="" class="img-thumbnail image-preview"
                    style="width:75px;height:75px;margin-top:16px;border-radius:50%"
                    >
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-1">
                <div class="form-group">
                    <button class="btn btn-info"><i class="fa fa-edit"></i> حفظ</button>
                </div>
            </div>
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
