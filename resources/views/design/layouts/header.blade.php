<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        خدمات ويب
        @if (isset($title))
            | {{ $title }}
        @endif
    </title>

    <!-- Google Font -->
    {{--  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">  --}}
    {{--  <link href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@1,400;1,700&display=swap" rel="stylesheet">  --}}
    <!-- Css Styles -->
    {!! Html::style('my-tools/design/css/bootstrap-3.min.css') !!}
    {{--  {!! Html::style('my-tools/adminlte/RTL/bootstrap-rtl.min.css') !!}  --}}
    {!! Html::style('my-tools/design/css/font-awesome.min.css') !!}
    {!! Html::style('my-tools/design/css/elegant-icons.css') !!}
    {!! Html::style('my-tools/design/css/jquery-ui.min.css') !!}
    {!! Html::style('my-tools/design/css/owl.carousel.min.css') !!}
    {!! Html::style('my-tools/design/css/slicknav.min.css') !!}
    {!! Html::style('my-tools/adminlte/plugins/select2/css/select2.min.css') !!}

    {!! Html::style('my-tools/design/css/style.css') !!}


    {{-- noty plugin --}}
   {!! Html::style('my-tools/adminlte/plugins/Noty/themes/relax.css') !!}
   {!! Html::style('my-tools/adminlte/plugins/Noty/noty.css') !!}

   @stack('css')

   {!! Html::style('css/fonts.css') !!}

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesnt work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>

<body>
