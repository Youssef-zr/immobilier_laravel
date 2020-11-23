<header class="main-header">
    <!-- Logo -->
    <a href="{{ adminUrl('/') }}" class="logo hidden-xs">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>K</b>W</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>khadamat </b>Web</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      {{-- include menu --}}
        @include('dashboard.layouts.menu')
      {{-- include menu --}}

    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
            <img src="{{ image_path(auth()->user()->image,'website/users/default.png') }}" alt="admin image" >
        </div>
        <div class="pull-left info">
          <p class="text-center">
              {{auth()->user()->name}}
          </p>
          <a href="#"><i class="fa fa-circle text-success"></i> متصل</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->

      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">الأقســـام</li>

        {{-- dashboard link --}}
        <li class="{{active_dashboard_item('admin')[0]}}">
          <a href="{{adminUrl('/')}}">
            <i class="fa fa-dashboard"></i> <span>الرئيسية</span>
          </a>
        </li>

        {{-- users link --}}
        <li class="treeview {{active_menu('users')[0]}}">
            <a href="#">
              <i class="fa fa-users"></i> <span>الأعضاء</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-left"></i>
              </span>
            </a>

            <ul class="treeview-menu" style="{{active_menu('users')[1]}}">
                <li class="{{ setActive([adminUrl('users/create')]) }}"><a href="{{ adminUrl('users/create') }}"><i class="fa fa-circle-o"></i> أضف عضو</a></li>
                <li class="{{ setActive([adminUrl('users')]) }}"><a href="{{ adminUrl('users') }}"><i class="fa fa-circle-o"></i> كل الاعضاء</a></li>
            </ul>
        </li>

        {{-- settings link --}}
        <li class="treeview {{active_menu('settings')[0]}}">
            <a href="#">
                <i class="fa fa-gears"></i> <span>الاعدادات</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-right pull-left"></i>
                </span>
            </a>

            <ul class="treeview-menu" style="{{active_menu('settings')[1]}}">
                <li class="{{ setActive([url('admin/settings')])}}"><a href="{{ adminUrl('settings') }}"><i class="fa fa-circle-o"></i> تعديل الاعدادات</a></li>
            </ul>
        </li>

        {{-- akkar link --}}
        <li class="treeview {{active_menu('bu')[0]}}">
            <a href="#">
              <i class="fa fa-building"></i> <span>العقارات</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-left"></i>
              </span>
            </a>

            <ul class="treeview-menu" style="{{active_menu('bu')[1]}}">
                <li class="{{ setActive([adminUrl('bu/create')]) }}"><a href="{{ adminUrl('bu/create') }}"><i class="fa fa-circle-o"></i> أضف عقار</a></li>
                <li class="{{ setActive([url('admin/bu')]) }}"><a href="{{ adminUrl('bu') }}"><i class="fa fa-circle-o"></i> كل العقارات</a></li>
            </ul>
        </li>
{{--
        <li class="active treeview">
            <a href="#">
              <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu" style="display: none;">
              <li><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
              <li class="active"><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
            </ul>
          </li> --}}

        {{-- contact link --}}
        <li class="treeview {{active_menu('contact')[0]}}">
            <a href="#">
              <i class="fa fa-envelope"></i> <span>رسائل الموقع</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-left"></i>
              </span>
            </a>

            <ul class="treeview-menu" style="{{active_menu('contact')[1]}}">
                <li class="{{ setActive([adminUrl('contact')]) }}"><a href="{{ adminUrl('contact') }}"><i class="fa fa-envelope-o"></i> كل الرسائل</a></li>
            </ul>
        </li>

        {{-- statistics bu add for month in a year selected link --}}
        <li>
            <a href="{{adminUrl('ak/statistics')}}">
              <i class="fa fa-line-chart"></i> <span>احصاء العقارات</span>
            </a>
        </li>
      </ul>

    </section>
    <!-- /.sidebar -->
  </aside>
