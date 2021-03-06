<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title') | Farmer's Market</title>
    <link href="{{asset ('css/frontend_css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{asset ('css/frontend_css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{asset ('css/frontend_css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{asset ('css/frontend_css/price-range.css') }}" rel="stylesheet">
    <link href="{{asset ('css/frontend_css/animate.css') }}" rel="stylesheet">
	<link href="{{asset ('css/frontend_css/main.css') }}" rel="stylesheet">
	<link href="{{asset ('css/frontend_css/responsive.css') }}" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">

    



<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
  
    <script src="{{asset ('js/frontend_js/html5shiv.js') }}"></script>
    <script src="{{asset ('js/frontend_js/respond.min.js') }}"></script>
         
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset ('images/frontend_images/ico/apple-touch-icon-144-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset ('images/frontend_images/ico/apple-touch-icon-114-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset ('images/frontend_images/ico/apple-touch-icon-72-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" href="{{asset ('images/frontend_images/ico/apple-touch-icon-57-precomposed.png') }}">
</head><!--/head-->

<body>
	@include('frontend.header');

    @yield('content');


    @include('frontend.footer');
	
	
	
	
	
	
	

  
    <script src="{{asset ('js/frontend_js/jquery.js') }}"></script>
	<script src="{{asset ('js/frontend_js/bootstrap.min.js') }}"></script>
	<script src="{{asset ('js/frontend_js/jquery.scrollUp.min.js') }}"></script>
	<script src="{{asset ('js/frontend_js/price-range.js') }}"></script>
    <script src="{{asset ('js/frontend_js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{asset ('js/frontend_js/main.js') }}"></script>
    
</body>
</html>