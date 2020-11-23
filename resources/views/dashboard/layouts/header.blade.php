<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>
    {{ settings()->sitename }} |
    @if (isset($title))
        {{$title}}
    @endif
  </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  {!! Html::style('my-tools/adminlte/bower_components/bootstrap/dist/css/bootstrap.css') !!}

  <!-- Font Awesome -->
  {!! Html::style('my-tools/adminlte/bower_components/font-awesome/css/font-awesome.min.css') !!}

  <!-- Theme style Rtl -->
  {!! Html::style('my-tools/adminlte/RTL/AdminLTE.min.css') !!}
  {!! Html::style('my-tools/adminlte/RTL/bootstrap-rtl.min.css') !!}
  {!! Html::style('my-tools/adminlte/RTL/profile.css') !!}
  {!! Html::style('my-tools/adminlte/RTL/rtl.css') !!}
  {!! Html::style('my-tools/adminlte/RTL/fonts/fonts-fa.css') !!}
  {{-- AdminLTE Skins. Choose a skin from the css/skins --}}
    {!! Html::style('my-tools/adminlte/dist/css/skins/skin-yellow-light.min.css') !!}
  {{-- folder instead of downloading all of theme to reduce the load --}}

  {{--  dataTabels  --}}
    {!! Html::style('my-tools/adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') !!}
  {{--  dataTabels  --}}

    {{-- select2 --}}
    {!! Html::style('my-tools/adminlte/plugins/select2/css/select2.min.css') !!}

   {{-- noty plugin --}}
   {!! Html::style('my-tools/adminlte/plugins/Noty/themes/relax.css') !!}
   {!! Html::style('my-tools/adminlte/plugins/Noty/noty.css') !!}

  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ url('/') }}/my-tools/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesnt work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

@stack('css')

</head>
<body class="hold-transition skin-yellow-light sidebar-mini">
<div class="wrapper">
