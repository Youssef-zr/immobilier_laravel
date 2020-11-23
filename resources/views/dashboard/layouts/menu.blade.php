<div class="navbar-custom-menu">
    <ul class="nav navbar-nav">

        <!-- User Account: style can be found in dropdown.less -->
      <li class="dropdown user user-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <img src="{{ image_path(auth()->user()->image,'website/users/default.png') }}" class='user-image' alt="admin image" >
          <span class="hidden-xs">
            @isset(auth()->user()->name)
               {{auth()->user()->name}}
              @endisset
          </span>
        </a>
        <ul class="dropdown-menu">
          <!-- User image -->
          <li class="user-header">
            <img src="{{ image_path(auth()->user()->image,'website/users/default.png') }}" class='img-circle' alt="admin image" >
            <p>
              @isset(auth()->user()->name)
               {{auth()->user()->name}}
              @endisset
               - Web Developer
              <small>تاريخ التسجيل : {{date_str(auth()->user()->created_at)}}</small>
            </p>
          </li>
          <!-- Menu Body -->
          <!-- Menu Footer-->
          <li class="user-footer">
            <div class="pull-left">
              <a href="{{route('users.edit',['id'=>auth()->user()->id])}}" class="btn btn-default btn-flat">بياناتك</a>
            </div>
            <div class="pull-right">
              <a href="{{url('logout')}}" class="btn btn-default btn-flat">تسجيل الخروج</a>
            </div>
          </li>
        </ul>
      </li>

      <!-- buildings not approved-->
      <li class="dropdown messages-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <i class="fa fa fa-bell-o"></i>
          <span class="label label-danger">{{ bu_wattings()[1] }}</span>
        </a>
        <ul class="dropdown-menu">
          <li class="header text-left" style="font-size:12px !important">

            @if (bu_wattings()[1] > 0)
                 {{ bu_wattings()[1] }}عقارات في انتظار التفعيل
            @else
                لا توجد أي عقارات غير مفعلة
            @endif

          </li>
          <li>
            <!-- inner menu: contains the actual data -->
            <ul class="menu bu_status">
            @foreach(bu_wattings()[0] as $item)
                <li><!-- start message -->

                    @if ($item->user_id != 00)
                        <a href="{{ route('users.edit',['id'=>$item->user_id]) }}" class="pull-right badge label label-warning"> {{ $item->userInfo['name'] }} </a>
                    @else
                        <span class="pull-right label badge"> زائر </span>
                    @endif

                    <h6 class="pull-left" style="color:#555">
                        <a href="{{ route('bu.edit',['id'=>$item->id]) }}">{{ str_limit($item->bu_name,30) }}</a>
                    </h6>

                    <span class="clearfix"></span>
                </li>
                <!-- end message -->
              @endforeach
            </ul>
          </li>
          <li class="footer"><a href="{{ adminUrl('bu') }}">تصفح جميع العقارات</a></li>
        </ul>
      </li>

      <!-- our messages of users / guest ... -->
      <li class="dropdown messages-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <i class="fa fa-envelope-o"></i>
          <span class="label label-danger">{{ messages()[1] }}</span>
        </a>
        <ul class="dropdown-menu">
          <li class="header text-left" style="font-size:12px !important">

            @if (messages()[1]>0)
                لديك {{ messages()[1] }} رسالة غير مقروءة
            @else
                ليس لديك أي رسائل جديدة
            @endif

          </li>
          <li>
            <!-- inner menu: contains the actual data -->
            <ul class="menu">
            @foreach(messages()[0] as $message)
                <li><!-- start message -->
                    <a href="{{ route('contact.edit',['id'=>$message->id]) }}">
                    <h4>
                        {{$message->name}}
                        <small><i class="fa fa-clock-o"></i> {{ date_str($message->created_at) }} </small>
                    </h4>
                    <p>{{ str_limit($message->msg,30) }}</p>
                    </a>
                </li>
                <!-- end message -->
              @endforeach
            </ul>
          </li>
          <li class="footer"><a href="{{ adminUrl('contact') }}">تصفح جميع الرسائل</a></li>
        </ul>
      </li>

      <!-- change language -->
      <li class="user user-menu">
        <a href="{{ url('/') }}">
          <i class="fa fa-globe"></i>
        </a>
      </li>
      <!-- Control Sidebar Toggle Button -->
      <li>
        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
      </li>
    </ul>
  </div>
