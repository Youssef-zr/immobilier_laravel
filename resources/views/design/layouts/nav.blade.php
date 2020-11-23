<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Humberger Begin -->
<div class="humberger__menu__overlay"></div>
<div class="humberger__menu__wrapper">
    <div class="humberger__menu__logo text-right">
        <a href="{{ url('/') }}"><img src="{{url('img/logo.png')}}" alt=""></a>
    </div>

    <div class="humberger__menu__widget">
        @if (auth()->check())
            <div class="header__top__right__language">
                {{--  <img src="img/language.png" alt="">  --}}
                <div class="dropdown">
                    <a type="button" data-toggle="dropdown">
                        {{auth()->user()->name}}
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        @if (auth()->user()->is_admin)
                            <li><a href="{{adminUrl('/')}}">لوحة التحكم <i class="fa fa-dashboard"></i></a></li>
                        @endif
                            <li><a href="{{url('user/profile')}}"> بياناتك الشخصية <i class="fa fa-user"></i></a></li>
                            <li><a href="{{route('logout')}}">تسجيل الخروج <i class="fa fa-sign-out"></i></a></li>
                    </ul>
                </div>
            </div>
        @else
            <div class="header__top__right__auth">
                <a href="{{url('login')}}"><i class="fa fa-user"></i> دخول</a>
            </div>
            <div class="header__top__right__auth" style="margin-left: 5px">
                <a href="{{url('register')}}"><i class="fa fa-sign-in"></i> تسجيل</a>
            </div>
        @endif
    </div>
    <nav class="humberger__menu__nav mobile-menu" dir="rtl">
        <ul>
            <li class="active"><a href="{{ url('/') }}">الرئيسية</a></li>
            <li><a href="#">العقارات</a>
                <ul class="header__menu__dropdown">
                    <li><a href="{{ url('bu/show_all') }}">كل العقارات</a></li>
                    <li><a href="{{ url('bu/forBuy')}}">بيع</a></li>
                    <li><a href="{{ url('bu/forRent')}}">ايجار</a></li>
                </ul>
            </li>
            <li><a href="{{ url('contact') }}">اتصل بنا</a></li>
        </ul>
    </nav>
    <div id="mobile-menu-wrap"></div>
    <div class="header__top__right__social text-right">
        <a href="{{ settings()->facebook_link }}" target="_blank"><i class="fa fa-facebook"></i></a>
        <a href="{{ settings()->twitter_link }}" target="_blank"><i class="fa fa-twitter"></i></a>
        <a href="{{ settings()->linkedin_link }}" target="_blank"><i class="fa fa-linkedin"></i></a>
    </div>
    <div class="humberger__menu__contact text-right">
        <ul>
            <li><i class="fa fa-envelope-o"></i>{{settings()->email}}</li>
            <li><i class="fa fa-phone"></i> {{settings()->mobile}}</li>
        </ul>
    </div>
</div>
<!-- Humberger End -->

<!-- Header Section Begin -->
<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-6">
                    <div class="header__top__left">
                        <ul>
                            <li><i class="fa fa-envelope-o"></i> {{settings()->email}}</li>
                            <li><i class="fa fa-phone"></i> {{settings()->mobile}}</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-md-6">
                    <div class="header__top__right">
                        <div class="header__top__right__social">
                            <a href="{{ settings()->facebook_link }}" target="_blank"><i class="fa fa-facebook"></i></a>
                            <a href="{{ settings()->twitter_link }}" target="_blank"><i class="fa fa-twitter"></i></a>
                            <a href="{{ settings()->linkedin_link }}" target="_blank"><i class="fa fa-linkedin"></i></a>
                        </div>

                        @if (auth()->check())
                            <div class="header__top__right__language">
                                {{--  <img src="{{ url('img/avatar.png')}}" alt="">  --}}

                                <div class="dropdown">
                                    <a type="button" data-toggle="dropdown">
                                        <span style="font-weight: bold">{{auth()->user()->name}}</span>
                                        <img src="{{ image_path(auth()->user()->image,'website/users/default.png') }}" alt="" style="width:40px;height:40px;border-radius:50%;border:1px solid #eee;background:#fff;padding:1px">
                                    </a>
                                    <ul class="dropdown-menu">
                                        @if (auth()->user()->is_admin)
                                            <li><a href="{{adminUrl('/')}}">لوحة التحكم <i class="fa fa-dashboard"></i></a></li>
                                        @endif
                                            <li><a href="{{url('user/profile')}}"> بياناتك الشخصية <i class="fa fa-gears"></i></a></li>
                                            <li><a href="{{url('user/bu_active')}}"> عقاراتك المفعلة<i class="fa fa-check"></i></a></li>
                                            <li><a href="{{url('user/bu_wattings')}}"> عقاراتك في انتظار التفعيل<i class="fa fa-clock-o"></i></a></li>
                                            <li><a href="{{route('logout')}}">تسجيل الخروج <i class="fa fa-sign-out"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        @else
                            <div class="header__top__right__auth">
                                <a href="{{url('login')}}"><i class="fa fa-user"></i>دخول</a>
                            </div>
                            <div class="header__top__right__auth" style="margin-left: 5px">
                                <a href="{{url('register')}}"><i class="fa fa-sign-in"></i>تسجيل</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div  class="navigation">
        <div class="container">
            <div class="row">
              <div class="col-sm-4 col-md-2">
                    <div class="header__logo">
                        <a href="{{ url('/') }}"><img src="{{ image_path(settings()->logo,'website/settings/default_logo.png') }}" alt=""></a>
                    </div>
                </div>
                <div class="col-md-10 text-center">
                    <nav class="header__menu">
                        <ul dir="rtl">
                            <li class="{{ setActive(['/']) }}"><a href="{{url('/')}}">الرئيسية</a></li>
                            <li class="{{ setActive(['bu/show_all','bu/forRent' , 'bu/forBuy','bu/villa','bu/chalee','bu/house','search','singleBu/*','user/bus']) }}"><a href="{{url('bu/show_all')}}">العقارات</a></li>
                            <li class="{{ setActive(['bu/add']) }}"><a href="{{ url('bu/add') }}">اضف عقار</a></li>
                            <li class="dropdown">
                                <a type="button">بيع
                                <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    @foreach (bu_type() as $key => $value)
                                        <li><a href="{{url('search?bu_rent=0&bu_type='.$key)}}">{{ bu_type()[$key] }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a type="button">ايجار
                                <span class="caret"></span></a>
                                <ul class="dropdown-menu" id="menu">
                                    @foreach (bu_type() as $key => $value)
                                        <li><a href="{{url('search?bu_rent=1&bu_type='.$key)}}">{{ bu_type()[$key] }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="{{ setActive(['contact']) }}"><a href="{{ url('contact') }}">اتصل بنا</a></li>
                        </ul>
                    </nav>
                </div>


              <!--  <div class="hidden-xs hidden-sm col-md-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                            <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
                        </ul>
                        <div class="header__cart__price">item: <span>$150.00</span></div>
                    </div>
                </div>
            -->

            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
     </div>
</header>
<!-- Header Section End -->

<!-- search-bar -->
<div id="app" class="search-bar">
    <div class="container">

        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <search-building></search-building>
            </div>
        </div>
    </div>
</div>
<!-- search-bar -->


@push('js')

<script>
    $(function(){


        $('li.dropdown a').click(function(){
            $(this).siblings('ul').fadeToggle(1000);
        })
    })
</script>

@endpush
